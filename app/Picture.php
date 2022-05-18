<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    protected $fillable = [
        'image_path',
        'comment'
    ];
    
    //リレーションを追加
    public function user() {
        return $this->belongsTo("App\User");
    }
    
    public function horse() {
        return $this->belongsTo("App\Horse");
    }
}
