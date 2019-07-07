<?php
namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ActionClassify;
use App\Models\Action;
use App\Models\ActionColumn;
use App\Models\Group;
class ActionColumnController extends Controller{
    public function __construct(){

    }

    public function index(Request $request){
        $actionColumn = ActionColumn::paginate(10);
        return view('actionColumn.index',['actionColumn'=>$actionColumn]);
    }

    public function add(Request $request){
        $actionColumn = ActionColumn::paginate(10);
        $actionClassify = ActionClassify::get();
        $groups = Group::get();
        return view('actionColumn.add',['actionColumn'=>$actionColumn,'actionClassify'=>$actionClassify,'groups'=>$groups]);
    }

    public function postCreate(Request $request){
        $actionColumn = new ActionColumn();
        $name =  $request->input('name');
        $actions = $request->input('action_id');
        $groups = $request->input('groups');
        $action_id = implode('|',$actions);
        $groupStr = implode('|',$groups);
        $actionColumn->name = $name;
        $actionColumn->action_id = $action_id;
        $actionColumn->can_see_group = $groupStr;
        $actionColumn->creator_user_id = $request->user()->id;
        if($actionColumn->save()){
            return redirect('/left/column/index');
        }
    }
    public function edit(Request $request){
        $id =  $request->input('id');
        $actionColumn = ActionColumn::where('id',$id)->first();
        $actionClassify = ActionClassify::get();
        $groups = Group::get();
        return view('actionColumn.edit',['actionColumn'=>$actionColumn,'actionClassify'=>$actionClassify,'groups'=>$groups]);
    }
    public function postEdit(Request $request){
        $id =  $request->input('id');
        $name =  $request->input('name');
        $groups = $request->input('groups');
        $actionColumn = ActionColumn::where('id',$id)->first();
        $actions = $request->input('action_id');
        $action_id = implode('|',$actions);
        $groupStr = implode('|',$groups);
        $actionColumn->name = $name;
        $actionColumn->action_id = $action_id;
        $actionColumn->can_see_group = $groupStr;
        $actionColumn->creator_user_id = $request->user()->id;
        if($actionColumn->save()){
            return redirect('/left/column/index');
        }
    }
}