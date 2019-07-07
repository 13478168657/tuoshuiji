<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Redirect;
use Validator;
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
    public function login(Request $request){

        return view('admin.auth.login');
    }
    public function logout(Request $request){
        Auth::logout();
        return redirect('/');
    }
    public function postLogin(Request $request){
//        $validator = Validator::make($request->all(), [
//            'captcha' => 'required|captcha'
//        ]);
//        if ($validator->fails()) {
//            return json_encode(['code'=>2,'msg'=>'验证码有误']);
//        }
        $name = $request->input('name');
        $password = $request->input('password');
        $remember = $request->input('remember');
        if (Auth::attempt(['email' => $name, 'password' => md5($password)])) {
            return json_encode(['code'=>0,'msg'=>'登陆成功']);
        }else{
            return json_encode(['code'=>1,'msg'=>'登陆失败']);
        }
    }
}
