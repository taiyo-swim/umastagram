<?php

namespace App\Http\Controllers;

use App\Horse;
use App\User;
use App\Picture;
use App\Like;
use Illuminate\Http\Request;
use App\Http\Requests\PostPictureRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class PostPictureController extends Controller
{
    public function create_picture(Horse $horse)
    {
        return view('upload_picture', ['horse' => $horse]);
    }
    
    public function upload_picture(PostPictureRequest $request, Picture $picture, Horse $horse)
    {
        $horse_image = $request->file('horse_image');
        $image_path = Storage::disk('s3')->putFile('horse_image', $horse_image, 'public');  //putFile(PATH,$file)で指定したPATH（umastagramバケットの'horse_image'フォルダ）にファイルを保存※第三引数に'public'を入れないと外部からのアクセスができない
        $picture->image_path = $image_path; //画像のパスだけをテーブルに保存
        
        $picture->comment = $request->input('comment');
        
        $picture->user_id = Auth::user()->id;
        $picture->horse_id = $horse->id;
        $picture->save();
        
        return redirect('/horse/'. $picture->horse_id);
    }
    
    public function show_picture(Horse $horse, Picture $picture)
    {
        $picture = $picture->loadCount('likes');  //リレーション数（いいねの数）を取得(viewで$picture->likes_countという形で表示できる）
        $like_model = new Like;
        
        return view('show_picture', ['picture' => $picture, 'horse' => $horse, 'like_model' => $like_model]);
    }
    
    public function like_picture(Request $request)
    {
        $user_id = Auth::user()->id;
        $picture_id = $request->picture_id;
        $like = new Like;
        $picture = Picture::findOrFail($picture_id);

        // 空でない（既にいいねしている）なら
        if ($like->like_exist($user_id, $picture_id)) {
            //likesテーブルのレコードを削除
            $like = Like::where('picture_id', $picture_id)->where('user_id', $user_id)->delete();
        } else {
            //空（まだ「いいね」していない）ならlikesテーブルに新しいレコードを作成する
            $like = new Like;
            $like->picture_id = $request->picture_id;
            $like->user_id = Auth::user()->id;
            $like->save();
        }

        //loadCountとすればリレーションの数を○○_countという形で取得できる（今回の場合はいいねの総数）
        $pictureLikesCount = $picture->loadCount('likes')->likes_count;

        //一つの変数にajaxに渡す値をまとめる
        //今回ぐらい少ない時は不要
        $json = [
            'pictureLikesCount' => $pictureLikesCount,
        ];
        //下記の記述でajaxに引数の値を返す
        return response()->json($json);
    }
    
    public function edit_picture(Horse $horse, Picture $picture)
    {
        return view('edit_picture')->with(['picture' => $picture, 'horse' => $horse]);
    }
    
    public function update_picture(PostPictureRequest $request, Horse $horse, Picture $picture)
    {
        $this->authorize('update_picture', $picture);  //ポリシーを元に投稿したユーザー以外は編集できないようにアクションを認可
        
        if ($request->file('horse_image')) {  //画像が変更されたら
            $s3_delete = Storage::disk('s3')->delete($picture->image_path);  //変更前の画像をs3から削除
            $horse_image = $request->file('horse_image');  //s3へ画像をアップロード
            $image_path = Storage::disk('s3')->putFile('horse_image', $horse_image, 'public');  //putFile(PATH,$file)で指定したPATH（バケットの'/'フォルダ）にファイルを保存※第三引数に'public'を入れないと外部からのアクセスができない
            $picture->image_path = $image_path;  //アップロードした画像のパスを取得
        }
        
        $picture->comment = $request->input('comment');
        
        $picture->save();
        
        return redirect('/horse/'. $picture->horse_id .'/'. $picture->id);
    }
    
    public function delete_picture(Horse $horse, Picture $picture)
    {
        $this->authorize('delete_picture', $picture);  //ポリシーを元に投稿したユーザー以外は削除できないようにアクションを認可
        
        $s3_delete = Storage::disk('s3')->delete($picture->image_path);
        $picture->delete();
        
        return redirect('/horse/'. $horse->id);
    }
}
