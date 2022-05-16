<?php

namespace App\Policies;

use App\User;
use App\Picture;
use Illuminate\Auth\Access\HandlesAuthorization;

class PicturePolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    
    public function update_picture(User $user, Picture $picture)
    {
        return $user->id === $picture->user_id;  //写真を投稿したユーザーだけが写真を編集できる
    }
    
    public function delete_picture(User $user, Picture $picture)
    {
        return $user->id === $picture->user_id;  //写真を投稿したユーザーだけが写真を削除できる
    }
}
