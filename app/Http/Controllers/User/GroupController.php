<?php
namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Group;
use App\Models\ActionClassify;
class GroupController extends Controller{
    public function __construct(){

    }

    public function index(Request $request){
        $groups = Group::get();
        return view('group.index',['groups'=>$groups]);
    }

    public function add(Request $request){
        $actionClassify = ActionClassify::get();
        return view('group.add',['actionClassify'=>$actionClassify]);
    }

    public function postCreate(Request $request){
        $name = $request->input('name');
        $actions = implode('|',$request->input('actions'));
        $creator_user_id = $request->user()->id;
        $group = new Group();
        $group->name = $name;
        $group->actions = $actions;
        $group->creator_user_id = $creator_user_id;
        if($group->save()){
            return redirect('/group/index');
        }
    }

    public function edit(Request $request){
        $id = $request->input('id');
        $group = Group::where('id',$id)->first();
        $actionClassify = ActionClassify::get();
        return view('group.edit',['group'=>$group,'actionClassify'=>$actionClassify]);
    }

    public function postEdit(Request $request){
        $id = $request->input('id');
        $group = Group::where('id',$id)->first();
        $group->name = $request->input('name');
        $actions = implode('|',$request->input('actions'));
        $creator_user_id = $request->user()->id;
        $group->actions = $actions;
        $group->creator_user_id = $creator_user_id;
        if($group->save()){
            return redirect('/group/index');
        }
    }
}