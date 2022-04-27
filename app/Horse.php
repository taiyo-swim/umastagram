<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Horse extends Model
{
    //リレーションを追加
    public function pictures() {
        return $this->hasMany("App\Models\Picture");
    }
}
