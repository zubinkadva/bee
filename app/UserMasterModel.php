<?php

namespace App;

use App\Auth\AuthModel;
use Auth;
use Datatables;
use DB;
use Illuminate\Database\Eloquent\Model;

class UserMasterModel extends Model
{

    public function datatables()
    {
        $query = DB::table('users')->select('id', 'avatar', 'first', 'last', 'username', 'email', 'is_active');
        return Datatables::of($query)
            ->editColumn('id', '<div class="center"><label class="pos-rel">'
                . '<input name="id[]" value="{{encrypt($id)}}" type="checkbox" class="ace checkboxes">'
                . '<span class="lbl"></span></label></div>')
            ->editColumn('avatar', '<div class="center"><img class="nav-user-photo" src="{{url(\'master/users/avatar/\'.encrypt($id))}}" alt="Avatar" /></div>')
            ->removeColumn('last')
            ->editColumn('first', '{{$first . " " . $last}}')
            ->editColumn('is_active', '@if(Auth::user()->username != $username)<label>'
                . '<input data-id="{{encrypt($id)}}" class="ace ace-switch ace-switch-6" type="checkbox" @if($is_active) checked @endif>'
                . '<span class="lbl"></span></label>@endif')
            ->addColumn('actions', '<p><a href="{{url(\'master/users/edit/\'.encrypt($id))}}" class="btn btn-primary btn-sm" title="Edit"><i class="ace-icon fa fa-edit icon-only"></i></a>'
                . '@if(Auth::user()->username != $username)&nbsp;<a data-id="{{encrypt($id)}}" class="btn btn-danger btn-sm btn-delete" title="Delete"><i class="ace-icon fa fa-trash icon-only"></i></a>@endif')
            ->escapeColumns(['id', 'avatar', 'actions'])
            ->make();
    }

    public function setActiveInactive($id)
    {
        $model = new AuthModel();
        $status = $model->getUserById($id)->is_active;
        $status = !$status;
        return DB::table('users')
            ->where('id', decrypt($id))
            ->update(['is_active' => $status]);
    }

    public function deleteUser($id)
    {
        return DB::table('users')
            ->where('id', $id)
            ->delete();
    }

    public function deleteUsers($ids_arr)
    {
        foreach ($ids_arr['id'] as $id)
            $ids[] = decrypt($id);
        return DB::table('users')
            ->whereIn('id', $ids)
            ->delete();
    }

    public function addUser($values, $token)
    {
        $doer = Auth::user()->username;
        $date = date('Y-m-d H:i:s');
        return DB::table('users')->insert([
            'first' => $values['first'],
            'last' => $values['last'],
            'username' => $values['_username'],
            'email' => $values['email'],
            'is_active' => 1,
            'reset_token' => $token,
            'created_at' => $date,
            'created_by' => $doer,
            'updated_at' => $date,
        ]);
    }

    public function editUser($values)
    {
        return DB::table('users')
            ->where('id', decrypt($values['_user_id']))
            ->update([
                'first' => $values['first'],
                'last' => $values['last'],
                'username' => $values['_username'],
                'email' => $values['email'],
                'updated_at' => date('Y-m-d H:i:s')
            ]);
    }


    /* MAP TEST */

    public function addLocation($data)
    {
        return DB::table('locations')->insert([
            'name' => $data['name'],
            'lat' => $data['lat'],
            'lng' => $data['lng'],
            'gate' => !empty($data['gate']) ? ($data['gate'] == 'on' ? 1 : 0) : 0,
            'combination' => $data['combination'],
            'pallets' => $data['pallets'],
            'owned_by' => $data['owned_by'],
            'flowers' => $data['flowers'],
            'fencing' => $data['fencing'],
            'payments' => $data['payments'],
            'notes' => $data['notes'],
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }

    public function getLocations()
    {
        return DB::table('locations')->get();
    }


}
