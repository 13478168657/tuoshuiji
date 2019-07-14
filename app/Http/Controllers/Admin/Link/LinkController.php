<?php

namespace App\Http\Controllers\Admin\Link;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Link;
use App\Models\ProjectModel;
class LinkController extends Controller
{
    public function __construct()
    {
        $this->protectFlag = ProjectModel::first()->type;
    }
    public function index(Request $request){
        $link = new Link();
        if($request->input('name')){
            $link = $link->where('name','like','%'.$request->input('name').'%');
        }
        if($this->protectFlag) {
            $links = $link->where('type',1);
            $links = $link->paginate(30);
            return view('admin.en.links.index',['links'=>$links,'request'=>$request]);
        }else{
            $links = $link->where('type',0);
            $links = $link->paginate(30);
            return view('admin.links.index',['links'=>$links,'request'=>$request]);
        }
    }

    public function create(Request $request){
        if($this->protectFlag) {
            return view('admin.en.links.create');
        }else{
            return view('admin.links.create');
        }
    }

    public function postCreate(Request $request){
        $link  = new Link();
        $link->name = $request->input('name');
        $link->url = $request->input('url');
        if($this->protectFlag) {
            $link->type = 1;
        }
        if($link->save()){
            return redirect('/link/list');
        }
    }

    public function edit(Request $request){
        $link = Link::where('id',$request->input('id'))->first();
        if($this->protectFlag) {
            return view('admin.en.links.edit', ['link' => $link]);
        }else{
            return view('admin.links.edit', ['link' => $link]);
        }
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
