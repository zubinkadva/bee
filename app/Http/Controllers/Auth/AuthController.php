<?php

namespace App\Http\Controllers\Auth;

use App\Auth\AuthModel;
use App\BeeModel;
use App\Http\Controllers\Controller;
use Auth;
use Hash;
use Illuminate\Support\Facades\Input;
use Mail;
use Session;

class AuthController extends Controller
{

    public function login()
    {
        return view('security.login');
    }

    public function verify()
    {
        $_username = Input::get('_username');
        $_password = Input::get('_password');
        if (Auth::attempt(['username' => $_username, 'password' => $_password], true)) {
            if (Auth::user()->is_active) {
                AuthModel::setCurrentSessionById(Session::getId(), encrypt(Auth::user()->id));
                BeeModel::addLog(Auth::user()->username, 'Login', 'Logged in',
                    Auth::user()->first . ' ' . Auth::user()->last . ' logged in');
                return redirect()->intended('index');
            }
            return back()
                ->withErrors(['error' => 'Your account is inactive. Contact your system administrator']);
        } else {
            return back()->withErrors(['error' => 'Bad username/password']);
        }
    }

    public function forgot()
    {
        $_username = Input::get('_username');
        $auth = new AuthModel();
        $user = $auth->getUserByUsername(encrypt($_username));
        if (empty($user)) {
            return back()->withErrors(['error' => 'Username not recognized']);
        }
        $name = $user->first . ' ' . $user->last;
        $email = $user->email;
        $hash = Hash::make(time());
        $auth->setResetToken($hash, encrypt($user->id));
        $protocol = (strstr('https', $_SERVER['SERVER_PROTOCOL']) === false) ? 'http' : 'https';
        $url = $protocol . '://' . $_SERVER['SERVER_NAME'] . dirname($_SERVER['REQUEST_URI']);
        $complete_url = $url . 'reset/' . $hash;
        Mail::send('emails.forgot', ['url' => $complete_url, 'name' => $name],
            function ($message) use ($email, $name) {
                $message->to($email, $name)->subject('Password reset request');
            });
        BeeModel::addLog($_username, 'Login', 'Reset password',
            $name . ' raised a password reset request');
        return back()->withErrors(['success' => 'Email sent. Check your inbox']);
    }

    public function reset($value)
    {
        $auth = new AuthModel();
        $user = $auth->getUserByResetToken($value);
        return view('security.reset')->with(['user' => $user, 'token' => $value]);
    }

    public function resetAction()
    {
        $password = Hash::make(Input::get('_new_password'));
        $id = Input::get('_user_id');
        $auth = new AuthModel();
        $auth->setPasswordById($id, $password);
        $user = $auth->getUserById($id);
        BeeModel::addLog($user->username, 'Login', 'Reset password',
            $user->first . ' ' . $user->last . ' changed his/her password');
        return view('security.reset')->with(['changed' => true]);
    }

    public function logout()
    {
        AuthModel::setCurrentSessionById('', encrypt(Auth::user()->id));
        BeeModel::addLog(Auth::user()->username, 'Logout', 'Logged out',
            Auth::user()->first . ' ' . Auth::user()->last . ' logged out');
        Session::flush();
        return redirect('login')->withErrors(['success'=>'Logged out']);
    }

}
