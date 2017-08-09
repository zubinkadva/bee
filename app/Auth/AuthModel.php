<?php

namespace App\Auth;

use DB;
use Illuminate\Database\Eloquent\Model;

class AuthModel extends Model
{

    public function getUserById($id)
    {
        return DB::table('users')->where('id', decrypt($id))->first();
    }

    public function getUserByUsername($username)
    {
        return DB::table('users')->where('username', decrypt($username))->first();
    }

    public function getUserByResetToken($token)
    {
        return DB::table('users')->where('reset_token', $token)->first();
    }

    public function setResetToken($token, $id)
    {
        return DB::table('users')
            ->where('id', decrypt($id))
            ->update(['reset_token' => $token,
                'updated_at' => date('Y-m-d H:i:s')]);
    }

    public function setPasswordById($user_id, $password)
    {
        return DB::table('users')
            ->where('id', decrypt($user_id))
            ->update(['reset_token' => '',
                'remember_token' => '',
                'updated_at' => date('Y-m-d H:i:s'),
                'password' => $password
            ]);
    }

    public static function setCurrentSessionById($session, $id)
    {
        return DB::table('users')
            ->where('id', decrypt($id))
            ->update([
                'current_session' => $session,
                'last_login' => date('Y-m-d H:i:s')
            ]);
    }

}
