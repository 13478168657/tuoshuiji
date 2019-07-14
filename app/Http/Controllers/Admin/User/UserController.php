<?php

namespace App\Http\Controllers\Admin\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Models\ProjectModel;
class UserController extends Controller
{
    public function __construct(){
        $this->protectFlag = ProjectModel::first()->type;
    }
    /*
     * 列表
     */
    public function index(Request $request){
        $users = User::paginate(10);
        if($this->protectFlag == 0){
            return view('admin.user.list',['users'=>$users]);
        }else{
            return view('admin.en.user.list',['users'=>$users]);
        }
    }
    /*
     * 添加
     */
    public function add(Request $request){
        // $groups = Group::get();
        if($this->protectFlag == 0) {
            return view('admin.user.add');
        }else{
            return view('admin.en.user.add');
        }
    }
    /*
     * 处理数据
     */
    public function postCreate(Request $request){
        $name = $request->input('name');
        $email = $request->input('email');
        $password = bcrypt(md5($request->input('password')));
        $status = $request->input('status');
        // $groups = $request->input('groups');
        $user = new User();
        $user->password = $password;
        $user->name = $name;
        $user->email = $email;
        $user->status = $status;
        if($user->save()){
            return redirect('/user/list');
        }
    }
    public function edit(Request $request){
        $id = $request->input('id');
        $user = User::where('id',$id)->first();
        if($this->protectFlag == 0) {
            return view('admin.user.edit',['user'=>$user]);
        }else{
            return view('admin.en.user.edit',['user'=>$user]);
        }
    }
    public function postEdit(Request $request){
        $id = $request->input('id');
        $user = User::where('id',$id)->first();
        $name = $request->input('name');
        $email = $request->input('email');
        $password = bcrypt(md5(trim($request->input('password'))));
        if(!empty($password)){
            $user->password = bcrypt(md5(trim($request->input('password'))));
        }
        $status = $request->input('status');
        // $groups = $request->input('groups');
//        $user->password = $password;
        $user->name = $name;
        $user->email = $email;
        $user->status = $status;
        if($user->save()){
            // $user_id = $user->id;
            // foreach($groups as $g){
            //     $userGroup = new UserGroup();
            //     $userGroup->user_id = $user_id;
            //     $userGroup->group_id = $g;
            //     $userGroup->save();
            // }
            return redirect('/user/list');
        }
    }

    public function del(Request $request){
        $result = User::where('id',$request->input('id'))->delete();
        if($result){
            return json_encode(['code'=>0,'msg'=>'删除成功']);
        }else{
            return json_encode(['code'=>1,'msg'=>'删除失败']);
        }
    }
}
