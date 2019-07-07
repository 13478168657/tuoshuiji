<?php

namespace App\Http\Controllers\User;

use App\Models\Group;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Models\UserGroup;
class UserController extends Controller
{
    public function __construct(){

    }
    /*
     * 列表
     */
    public function index(Request $request){
        $users = User::paginate(10);
        return view('user.list',['users'=>$users]);
    }
    /*
     * 添加
     */
    public function add(Request $request){
        $groups = Group::get();
        return view('user.add',['groups'=>$groups]);
    }
    /*
     * 处理数据
     */
    public function postCreate(Request $request){
        $name = $request->input('name');
        $email = $request->input('email');
        $password = bcrypt(md5($request->input('password')));
        $status = $request->input('status');
        $groups = $request->input('groups');
        $user = new User();
        $user->password = $password;
        $user->name = $name;
        $user->email = $email;
        $user->status = $status;
        if($user->save()){
            $user_id = $user->id;
            foreach($groups as $g){
                $userGroup = new UserGroup();
                $userGroup->user_id = $user_id;
                $userGroup->group_id = $g;
                $userGroup->save();
            }
            return redirect('/user/list');
        }
    }
    public function edit(Request $request){
        $id = $request->input('id');
        $user = User::where('id',$id)->first();
        $userGroup = $user->group;
        $groupsArr = [];
        foreach($userGroup as $group){
            $groupsArr[] = $group->id;
        }
        $groups = Group::get();
//        dd($groups);
        return view('user.edit',['groups'=>$groups,'user'=>$user,'userGroup'=>$groupsArr]);
    }
    public function postEdit(Request $request){
        $id = $request->input('id');
        $user = User::where('id',$id)->first();
        $name = $request->input('name');
        $email = $request->input('email');
//        $password = bcrypt(md5($request->input('password')));
        $status = $request->input('status');
        $groups = $request->input('groups');
//        $user->password = $password;
        $user->name = $name;
        $user->email = $email;
        $user->status = $status;
        if($user->save()){
            $user_id = $user->id;
            foreach($groups as $g){
                $userGroup = new UserGroup();
                $userGroup->user_id = $user_id;
                $userGroup->group_id = $g;
                $userGroup->save();
            }
            return redirect('/user/list');
        }
    }
}
