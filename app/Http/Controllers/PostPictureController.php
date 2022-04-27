<?php

namespace App\Http\Controllers;

use App\Horse;
use App\User;
use App\Models\Picture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class PostPictureController extends Controller
{
    public function create_picture($horse_id)
    {
        $horse = Horse::find($horse_id);
        
        return view('upload_picture', ['horse' => $horse]);
    }
    
    public function upload_picture(Request $request, Picture $picture, $horse_id)
    {
        $horse_image = $request->file('horse_image');
        $image_path = Storage::disk('s3')->putFile('horse_image', $horse_image, 'public');  //putFile(PATH,$file)で指定したPATH（umastagramバケットの'horse_image'フォルダ）にファイルを保存※第三引数に'public'を入れないと外部からのアクセスができない
        $picture->image_path = $image_path; //画像のパスだけをテーブルに保存
        
        $picture->comment = $request->input('comment');
        
        $picture->user_id = Auth::user()->id;
        $picture->horse_id = $horse_id;
        $picture->save();
        
        return redirect('/horse/'. $picture->horse_id);
    }
}
