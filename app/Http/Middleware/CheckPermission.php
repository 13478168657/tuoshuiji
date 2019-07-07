<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Group;
use App\Models\Action;
class CheckPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = $request->user();
        if($user->email == 'yangkuokuo@qq.com'){
            return $next($request);
        }
        $groups  = $user->group;
        $actionArr = [];
        $url = $request->path();
        foreach($groups as $group){
            $action_ids = explode('|',$group->actions);
            $actions = Action::whereIn('id',$action_ids)->get();
            foreach($actions as $action){
                $actionArr[] = $action->url;
            }
        }
        if(!in_array($url ,$actionArr)){
            /*判断是否是ajax请求*/
            if($request->ajax() == 'ajax'){
                return response()->json([
                    'code' => '0', 
                    'msg' => '没有此权限'
                ]);
            }
            // if ($request->isXmlHttpRequest() && $request->method() == "GET") {
            //     return json_encode(['code'=>0,'msg'=>'无此权限']);
            // }
            return response()->view('permission.error');
        }
        return $next($request);
    }
}
