<?php

namespace App\Http\Controllers\Admin\Ad;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AdSpace;
use App\Models\ProjectModel;
class AdSpaceController extends Controller
{
    public function __construct(){
        $this->protectFlag = ProjectModel::first()->type;
    }

    public function index(){

        if($this->protectFlag){
            $adSpaces = AdSpace::where('type',1)->paginate(10);
            return view('admin.en.adSpace.index',['adSpaces'=>$adSpaces]);
        }else{
            $adSpaces = AdSpace::where('type',0)->paginate(10);
            return view('admin.adSpace.index',['adSpaces'=>$adSpaces]);
        }

    }

    public function create(Request $request){
        if($this->protectFlag) {
            return view('admin.en.adSpace.create');
        }else{
            return view('admin.adSpace.create');
        }
    }
    public function postCreate(Request $request){
        $adSpace = new AdSpace();
        $adSpace->name = $request->input('name');
        $adSpace->desc = $request->input('desc');
        if($this->protectFlag) {
            $adSpace->type = 1;
        }
        if($adSpace->save()){
            return redirect('/adSpace/list');
        }else{

        }
    }
    public function edit(Request $request){
        $id = $request->input('id');
        $adSpace = AdSpace::where('id',$id)->first();
        if($this->protectFlag) {
            return view('admin.en.adSpace.edit', ['adSpace' => $adSpace]);
        }else{
            return view('admin.adSpace.edit', ['adSpace' => $adSpace]);
        }
    }

    public function postEdit(Request $request){
        $id = $request->input('id');
        $adSpace = AdSpace::where('id',$id)->first();
        $adSpace->name = $request->input('name');
        $adSpace->desc = $request->input('desc');
        if($adSpace->save()){
            return redirect('/adSpace/list');
        }else{

        }
    }

    public function del(Request $request){
        $id = $request->input('id');
        $result = AdSpace::where('id',$id)->delete();
        if($result){
            return json_encode(['code'=>'0','msg'=>'删除成功']);
        }
    }
}
