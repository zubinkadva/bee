<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class UserModel extends Model
{
    public function updateProfile($values, $filename)
    {
        return DB::table('users')
            ->where('id', decrypt($values['_user_id']))
            ->update([
                'first' => $values['first'],
                'last' => $values['last'],
                'username' => $values['_username'],
                'email' => $values['email'],
                'avatar' => $filename,
                'updated_at' => date('Y-m-d H:i:s')
            ]);
    }
}
