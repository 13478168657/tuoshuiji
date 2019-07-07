<?php
namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Group;
use App\Models\Action;
use App\Models\ActionClassify;
class PermissionClassifyController extends Controller{

    public function __construct(){

    }

    public function index(Request $request){
        $actionsClassify = ActionClassify::paginate(10);
        return view('permissionClass.index',['actionsClassify'=>$actionsClassify]);
    }

    public function add(Request $request){
        return view('permissionClass.add');
    }

    public function postCreate(Request $request){
        $name = $request->input('name');
        $actionClassify = new ActionClassify();
        $actionClassify->name = $name;
        $actionClassify->creator_user_id = $request->user()->id;
        if($actionClassify->save()){
            return redirect('/perm/classify/index');
        }
    }

    public function edit(Request $request){
        $id = $request->input('id');
        $actionClassify = ActionClassify::where('id',$id)->first();
        return view('permissionClass.edit',['actionClassify'=>$actionClassify]);
    }

    public function postEdit(Request $request){
        $id = $request->input('id');
        $actionClassify = ActionClassify::where('id',$id)->first();
        $actionClassify->name = $request->input('name');
        $actionClassify->creator_user_id = $request->user()->id;
        if($actionClassify->save()){
            return redirect('/perm/classify/index');
        }
    }
}