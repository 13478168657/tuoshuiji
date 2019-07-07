<?php

namespace App\Http\Controllers\Admin\Ad;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AdSpace;
class AdSpaceController extends Controller
{
    public function __construct(){

    }

    public function index(){
        $adSpaces = AdSpace::paginate(10);
        return view('admin.adSpace.index',['adSpaces'=>$adSpaces]);
    }

    public function create(Request $request){
        return view('admin.adSpace.create');
    }
    public function postCreate(Request $request){
        $adSpace = new AdSpace();
        $adSpace->name = $request->input('name');
        $adSpace->desc = $request->input('desc');
        if($adSpace->save()){
            return redirect('/adSpace/list');
        }else{

        }
    }
    public function edit(Request $request){
        $id = $request->input('id');
        $adSpace = AdSpace::where('id',$id)->first();
        return view('admin.adSpace.edit',['adSpace'=>$adSpace]);
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
