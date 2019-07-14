<?php

namespace App\Http\Controllers\Admin\Base;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\BaseConfig;
use App\Models\ProjectModel;

class BaseConfigController extends Controller
{
    public function __construct()
    {
        $this->protectFlag = ProjectModel::first()->type;
    }

    public function index(Request $request){
        if($this->protectFlag) {
            $config = BaseConfig::where('type',1)->first();
        }else{
            $config = BaseConfig::where('type',0)->first();
        }
        if($config){
            $flag = 1;
        }else{
            $flag = 0;
        }
        if($this->protectFlag) {
            return view('admin.en.base.index', ['config' => $config, 'flag' => $flag]);
        }else{
            return view('admin.base.index', ['config' => $config, 'flag' => $flag]);
        }

    }

    public function create(Request $request){

    }
    public function postCreate(Request $request){
        if($request->input('id')){
            $config = BaseConfig::where('id',$request->input('id'))->first();
        }else{
            $config = new BaseConfig();
        }
        $config->title = $request->input('title');
        $config->name = $request->input('name');
        if($this->protectFlag) {
            $config->type = 1;
        }
        $config->home_key_word = $request->input('home_key_word');
        $config->home_meta_description = $request->input('home_meta_description');
        $config->link_style = $request->input('link_style');
        $config->link_mobile = $request->input('link_mobile');
        $config->address = $request->input('address');
//        dd($config);
        if($config->save()){
            return redirect('/base/config');
        }
    }
    public function edit(Request $request){
        $config = BaseConfig::where('id',$request->input('id'))->first();
        if($this->protectFlag) {
            return view('admin.en.base.edit',['config'=>$config]);
        }
        return view('admin.base.edit',['config'=>$config]);
    }

    public function postEdit(Request $request){
        $config = BaseConfig::where('id',$request->input('id'))->first();
        $config->title = $request->input('title');
        $config->name = $request->input('name');
        $config->home_key_word = $request->input('home_key_word');
        $config->home_meta_description = $request->input('home_meta_description');
        $config->link_style = $request->input('link_style');
        $config->link_mobile = $request->input('link_mobile');
        $config->address = $request->input('address');
        if($config->save()){
            return redirect('/base/list');
        }
    }

    public function del(Request $request){
        $id = $request->input('id');
        $result = BaseConfig::where('id',$id)->delete();
        if($result){
            return json_encode(['code'=>0,'msg'=>'删除成功']);
        }else{
            return json_encode(['code'=>1,'msg'=>'删除失败']);
        }
    }

    public function change(Request $request){
        $projectModel = ProjectModel::first();
        if($this->protectFlag) {
            return view('admin.en.project.index', ['projectModel' => $projectModel]);
        }else{
            return view('admin.project.index', ['projectModel' => $projectModel]);
        }
    }

    public function modelChange(Request $request){
        $type = $request->input('type',0);
        $projectModel = ProjectModel::first();
        $projectModel->type = $type;
        if($projectModel->save()){
            return redirect('/base/change');
        }else{
            return redirect('/base/change');
        }
    }
}
