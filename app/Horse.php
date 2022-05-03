<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Horse extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'name',
        'color',
        'father_name',
        'mother_name',
        'mothers_father_name',
        'owner',
        'trainer',
        'producer',
        'birthday',
        'winning'
    ];
    //リレーションを追加
    public function pictures() {
        return $this->hasMany("App\Picture");
    }
}
