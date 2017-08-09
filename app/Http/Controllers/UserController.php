<?php

namespace App\Http\Controllers;

use App\Auth\AuthModel;
use App\BeeModel;
use App\UserModel;
use Auth;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Image;

class UserController extends Controller
{

    public function profile()
    {
        $auth = new AuthModel();
        $user_details = $auth->getUserById(encrypt(Auth::user()->id));
        return view('user.profile')->with(['user' => $user_details]);
    }

    public function profileAction(Request $request)
    {
        dd($request->all());
        $action = Input::get('_action');
        $old_avatar = Input::get('_old_avatar');
        $filename = $old_avatar;
        if ($action == 'removed' || $action == 'changed') {
            File::delete(storage_path('avatars/large/') . $old_avatar);
            File::delete(storage_path('avatars/small/') . $old_avatar);
            $filename = '';
        }
        if ($action == 'changed') {
            $avatar = Input::file('avatar');
            $filename = encrypt($avatar->getClientOriginalName());
            Image::make($avatar->getRealPath())->resize(100, 100)->save(storage_path('avatars/small/') . $filename);
            $avatar->move(storage_path('avatars/large'), $filename);
        }

        $user = new UserModel();
        $update = $user->updateProfile(Input::all(), $filename);
        if ($update) {
            BeeModel::addLog(Input::get('_username'), 'Profile', 'Update',
                Input::get('_username') . ' updated his/her profile');
            return back()->withErrors(['success' => 'Profile updated successfully']);
        } else {
            BeeModel::addLog(Input::get('_username'), 'Profile', 'Update',
                Input::get('_username') . ' COULD NOT update his/her profile');
            return back()->withErrors(['error' => 'Profile could not be updated']);
        }
    }

    public function check($username)
    {
        $auth = new AuthModel();
        $user = $auth->getUserByUsername(encrypt($username));
        $response = false;
        if (!empty($user)) {
            if ($user->username == Auth::user()->username) $response = false;
            else $response = true;
        }
        return response()->json(['exists' => $response]);
    }

}
