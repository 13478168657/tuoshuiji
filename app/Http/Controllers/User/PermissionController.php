<?php
namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Group;
use App\Models\Action;
use App\Models\ActionClassify;
class PermissionController extends Controller{

    public function __construct(){

    }

    public function index(Request $request){
        $actions = Action::get();
        return view('permission.index',['actions'=>$actions]);
    }

    public function add(Request $request){
        $actionClassify = ActionClassify::get();
        return view('permission.add',['actionClassify'=>$actionClassify]);
    }

    public function postCreate(Request $request){
        $name = $request->input('name');
        $url = $request->input('url');
        $type = $request->input('type');
        $classify_id = $request->input('classify');
        $action = new Action();
        $action->name = $name;
        $action->type = $type;
        $action->url = $url;
        $action->classify_id = $classify_id;
        $action->creator_user_id = $request->user()->id;
        if($action->save()){
            return redirect('/permission/index');
        }
    }

    public function edit(Request $request){
        $id = $request->input('id');
        $action = Action::where('id',$id)->first();
        $actionClassify = ActionClassify::get();
        return view('permission.edit',['action'=>$action,'actionClassify'=>$actionClassify]);
    }

    public function postEdit(Request $request){
        $id = $request->input('id');
        $action = Action::where('id',$id)->first();
        $action->name = $request->input('name');
        $action->type = $request->input('type');
        $action->url = $request->input('url');
        $action->classify_id = $request->input('classify');
        $action->creator_user_id = $request->user()->id;
        if($action->save()){
            return redirect('/permission/index');
        }
    }
}