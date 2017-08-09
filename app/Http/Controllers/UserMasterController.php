<?php

namespace App\Http\Controllers;

use App\Auth\AuthModel;
use App\BeeModel;
use App\UserMasterModel;
use Auth;
use Hash;
use Illuminate\Support\Facades\Input;
use Mail;
use Mapper;

class UserMasterController extends Controller
{

    public function index()
    {
        return view('master.users.index');
    }

    public function datatables()
    {
        $users = new UserMasterModel();
        return $users->datatables();
    }

    public function toggle($id)
    {
        $auth = new AuthModel();
        $username = $auth->getUserById($id)->username;
        $doer = Auth::user()->username;
        $model = new UserMasterModel();
        BeeModel::addLog($doer, 'Master', 'User toggle', $doer . ' changed user "' . $username . '" status');
        return $model->setActiveInactive($id);
    }

    public function delete($id)
    {
        $auth = new AuthModel();
        $username = $auth->getUserById($id)->username;
        $doer = Auth::user()->username;
        $model = new UserMasterModel();
        if ($model->deleteUser($id)) {
            BeeModel::addLog($doer, 'Master', 'User delete', $doer . ' deleted user "' . $username . '"');
            return back()->withErrors(['success' => 'User deleted successfully']);
        } else {
            BeeModel::addLog($doer, 'Master', 'User delete', $doer . ' could not delete user "' . $username . '"');
            return back()->withErrors(['error' => 'Unable to delete user']);
        }
    }

    public function add()
    {
        return view('master.users.add');
    }

    public function addAction()
    {
        $model = new UserMasterModel();
        $doer = Auth::user()->username;
        $hash = Hash::make(time());
        $email = Input::get('email');
        $name = Input::get('first') . ' ' . Input::get('last');
        $protocol = (strstr('https', $_SERVER['SERVER_PROTOCOL']) === false) ? 'http' : 'https';
        $url = $protocol . '://' . $_SERVER['SERVER_NAME'] . dirname($_SERVER['REQUEST_URI']);
        $complete_url = $url . 'activate/' . $hash;
        if ($model->addUser(Input::all(), $hash)) {
            Mail::send('emails.activate', ['url' => $complete_url],
                function ($message) use ($email, $name) {
                    $message->to($email, $name)->subject('Confirm account creation');
                });
            BeeModel::addLog($doer, 'Master', 'User add', $doer . ' added user ' . Input::get('_username'));
            return back()->withErrors(['success' => 'User added successfully. Activate request sent to new user']);
        } else {
            BeeModel::addLog($doer, 'Master', 'User add', $doer . ' could not add user ' . Input::get('_username'));
            return back()->withErrors(['errors' => 'Unable to add user']);
        }
    }

    public function check($username)
    {
        $auth = new AuthModel();
        $user = $auth->getUserByUsername(encrypt($username));
        return response()->json(['exists' => !empty($user)]);
    }

    public function edit($id)
    {
        $auth = new AuthModel();
        $user = $auth->getUserById($id);
        return view('master.users.edit', ['user' => $user]);
    }

    public function editAction()
    {
        $model = new UserMasterModel();
        $doer = Auth::user()->username;
        if ($model->editUser(Input::all())) {
            BeeModel::addLog($doer, 'Master', 'User edit', $doer . ' edited user ' . Input::get('_username'));
            return back()->withErrors(['success' => 'User edited successfully']);
        } else {
            BeeModel::addLog($doer, 'Master', 'User edit', $doer . ' could not edit user ' . Input::get('_username'));
            return back()->withErrors(['error' => 'Unable to edit user']);
        }
    }

    public function editCheck($usernames)
    {
        $auth = new AuthModel();
        $array = explode('````', $usernames);
        $to_check = $array[0];
        $own = $array[1];
        if ($to_check == $own) return response()->json(['exists' => false]);
        $user = $auth->getUserByUsername(encrypt($to_check));
        return response()->json(['exists' => !empty($user)]);
    }

    public function activate($value)
    {
        $auth = new AuthModel();
        $user = $auth->getUserByResetToken($value);
        return view('security.activate')->with(['user' => $user, 'token' => $value]);
    }

    public function activateAction()
    {
        $password = Hash::make(Input::get('_password'));
        $id = Input::get('_user_id');
        $auth = new AuthModel();
        $auth->setPasswordById($id, $password);
        $user = $auth->getUserById($id);
        BeeModel::addLog($user->username, 'User', 'Activate account',
            $user->first . ' ' . $user->last . ' activated his/her account');
        return view('security.activate')->with(['activated' => true]);
    }

    public function deleteAll()
    {
        $doer = Auth::user()->username;
        $input = Input::get('id');
        $users = [];
        $auth = new AuthModel();
        for ($i = 0; $i < count($input); $i++)
            array_push($users, $auth->getUserById($input[$i])->username);
        $users = implode(', ', $users);
        $model = new UserMasterModel();

        if ($model->deleteUsers(Input::all())) {
            BeeModel::addLog($doer, 'Master', 'User delete', $doer . ' deleted users ' . $users);
            return back()->withErrors(['success' => 'Selected users deleted successfully']);
        } else {
            return back()->withErrors(['error' => 'Unable to delete users']);
        }
    }

    /* MAP TEST */

    function start()
    {
        Mapper::map(0, 0, ['marker' => false, 'center' => false, 'eventAfterLoad' => 'add(maps[0].map)', 'cluster' => true]);
        $model = new UserMasterModel();
        $locations = $model->getLocations();
        foreach ($locations as $location) {
            //Mapper::marker($location->lat, $location->lng, ['center' => true, 'eventClick' => 'alert("' . $location->id . '")', 'animation' => 'DROP']);
        }

        return view('start');
    }

    public function toXML($locations)
    {
        $xml = new \XMLWriter();
        $xml->openMemory();
        $xml->startDocument();
        $xml->startElement('markers');
        foreach ($locations as $location) {
            $xml->startElement('marker');
            $xml->writeAttribute('id', $location->id);
            $xml->writeAttribute('lat', $location->lat);
            $xml->writeAttribute('lng', $location->lng);
            $xml->endElement();
        }
        $xml->endElement();
        $xml->endDocument();
        $content = $xml->outputMemory();
        return response($content)->header('Content-Type', 'text/xml');
    }


    function addLocation()
    {
        $model = new UserMasterModel();
        if ($model->addLocation(Input::all())) return redirect('/test');
        return redirect('/');
    }


}
