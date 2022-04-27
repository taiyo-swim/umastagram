<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    //リレーションを追加
    public function user() {
        return $this->belongsTo("App\User");
    }
    
    public function horse() {
        return $this->belongsTo("App\Horse");
    }
}
