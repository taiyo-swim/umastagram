<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Horse extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'name',
        'sex',
        'color',
        'father_name',
        'mother_name',
        'mothers_father_name',
        'owner',
        'belong',
        'trainer',
        'producer',
        'birthday',
        'winning',
        'total_result',
        'netkeiba_url'
    ];
    //リレーションを追加
    public function pictures() {
        return $this->hasMany("App\Picture");
    }
}
