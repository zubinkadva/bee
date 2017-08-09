<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class BeeModel extends Model
{

    public static function addLog($username, $module, $triggers, $action)
    {
        DB::table('log')->insert(array(
            'username' => $username,
            'ip' => $_SERVER['REMOTE_ADDR'],
            'module' => $module,
            'triggers' => $triggers,
            'action' => $action,
            'log' => date('Y-m-d H:i:s')
        ));
    }

}
