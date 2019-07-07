<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Auth\Guard;
use App\User;
class RedirectIfAuthenticated
{
    protected $auth;

    /**
     * Create a new filter instance.
     *
     * @param Guard $auth
     * @return void
     */
    public function __construct(Guard $auth) {
        $this->auth = $auth;
        $this->route = ['admini','auth/login','logout'];
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        if (Auth::user()) {
            if (!$request->ajax()) {
                if(!in_array($request->path(),$this->route)){
                    if(Auth::check()==false){
                        return redirect('/admini');
                    }
                }
            }
        }else{
//            dd(3);
            if(!in_array($request->path(),$this->route)) {
                if($request->ajax()){
                    return response()->json([
                        'code'=>400,
                        'msg'=>'请先登录'
                    ]);
                }else{
                    return redirect('/admini');
                }

            }
        }
        return $next($request);
    }
}
