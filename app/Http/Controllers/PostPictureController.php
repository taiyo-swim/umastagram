<?php

namespace App\Http\Controllers;

use App\Horse;
use App\User;
use App\Picture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class PostPictureController extends Controller
{
    public function create_picture(Horse $horse)
    {
        return view('upload_picture', ['horse' => $horse]);
    }
    
    public function upload_picture(Request $request, Picture $picture, Horse $horse)
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
        return view('show_picture', ['picture' => $picture, 'horse' => $horse]);
    }
    
    public function edit_picture(Horse $horse, Picture $picture)
    {
        return view('edit_picture')->with(['picture' => $picture, 'horse' => $horse]);
    }
    
    public function update_picture(Request $request, Horse $horse, Picture $picture)
    {
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
}
