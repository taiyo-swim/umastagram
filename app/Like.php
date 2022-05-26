<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    //リレーションを追加
     public function user()
    {
        return $this->belongsTo(App\User); //多対1
    }

    public function picture()
    {
        return $this->belongsTo(App\Picture); //多対1
    }

    //いいねが既にされているかを確認
    public function like_exist($user_id, $picture_id)
    {
        //nicesテーブルのレコードにユーザーidとレシピidが一致するものを取得
        
        $exist = Like::where('user_id', '=', $user_id)->where('picture_id', '=', $picture_id)->get();

        // レコード（$exist）が存在するなら
        if (!$exist->isEmpty()) {
            return true;
        } else {
        // レコード（$exist）が存在しないなら
            return false;
        }
    }
}
