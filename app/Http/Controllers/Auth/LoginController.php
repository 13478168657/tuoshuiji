<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    public function logout(Request $request){
        Auth::logout();
        return redirect('/');
    }
    public function postLogin(Request $request){
        $name = $request->input('name');
        $password = $request->input('password');
        $remember = $request->input('remember');
        if (Auth::attempt(['email' => $name, 'password' => md5($password)])) {
            return redirect('/article/list');
        }else{
            return redirect('/login');
        }
    }
}
