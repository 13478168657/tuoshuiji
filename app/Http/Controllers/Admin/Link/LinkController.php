<?php

namespace App\Http\Controllers\Admin\Link;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Link;
class LinkController extends Controller
{
    public function __construct()
    {
        
    }
    public function index(Request $request){
        $link = new Link();
        if($request->input('name')){
            $link = $link->where('name','like','%'.$request->input('name').'%');
        }
        $links = $link->paginate(30);
        return view('admin.links.index',['links'=>$links,'request'=>$request]);
    }

    public function create(Request $request){
        return view('admin.links.create');
    }

    public function postCreate(Request $request){
        $link  = new Link();
        $link->name = $request->input('name');
        $link->url = $request->input('url');
        if($link->save()){
            return redirect('/link/list');
        }
    }

    public function edit(Request $request){
        $link = Link::where('id',$request->input('id'))->first();
        return view('admin.links.edit',['link'=>$link]);
    }

    public function postEdit(Request $request){
        $link = Link::where('id',$request->input('id'))->first();
        $link->name = $request->input('name');
        $link->url = $request->input('url');
        if($link->save()){
            return redirect('/link/list');
        }
    }

    public function delete(Request $request){
        $id = $request->input('id');
        $result = Link::where('id',$id)->delete();
        if($result){
            return json_encode(['code'=>0,'msg'=>'删除成功']);
        }else{
            return json_encode(['code'=>1,'msg'=>'删除失败']);
        }
    }
}
