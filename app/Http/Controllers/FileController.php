<?php

namespace App\Http\Controllers;

use App\Auth\AuthModel;
use Auth;

class FileController extends Controller
{

    public function getAvatar($size)
    {
        $avatar = empty(Auth::user()->avatar) ? '../default.jpg' : Auth::user()->avatar;
        return response()->download(storage_path('avatars/' . $size . '/' . $avatar), null, [], null);
    }

    public function getAvatarByUserId($id)
    {
        $model = new AuthModel();
        $avatar = $model->getUserById($id)->avatar;
        $avatar = empty($avatar) ? 'default.png' : $avatar;
        return response()->download(storage_path('avatars/small' . '/' . $avatar), null, [], null);
    }

}
