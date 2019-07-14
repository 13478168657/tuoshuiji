<?php

namespace App\Http\Controllers\Admin\Article;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SingleArticle;
use App\Models\ProjectModel;
class SingleArticleController extends Controller
{
    public function __construct()
    {
        $this->protectFlag = ProjectModel::first()->type;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $consult = new SingleArticle();
        if($this->protectFlag){
            $consults = $consult->where('type',1)->paginate(15);
            return view('admin.en.consult.index',['consults'=>$consults,'request'=>$request]);
        }else{
            $consults = $consult->where('type',0)->paginate(15);
            return view('admin.consult.index',['consults'=>$consults,'request'=>$request]);
        }

    }

    public function create(Request $request){
        if($this->protectFlag) {
            return view('admin.en.consult.create');
        }else{
            return view('admin.consult.create');
        }
    }
    /*
     * 添加文章
     */
    public function postCreate(Request $request){
        $consult = new SingleArticle();
        $consult->name = $request->input('name');
        $consult->content = $request->input('content');
        $consult->meta_keyword = $request->input('meta_keyword');
        if($this->protectFlag) {
            $consult->type = 1;
        }
        $consult->meta_description = $request->input('meta_description');
        $consult->status = intval($request->input('status'));
        if($consult->save()){
            return redirect('/consult/list');
        }
    }
    /*
     * 编辑
     */
    public function edit(Request $request){
        $id = $request->input('id');
        $consult = SingleArticle::where('id',$id)->first();
        if($this->protectFlag) {
            return view('admin.en.consult.edit', ['consult' => $consult]);
        }else{
            return view('admin.consult.edit', ['consult' => $consult]);
        }
    }
    /*
     * 编辑处理
     */
    public function postEdit(Request $request){
        $id = $request->input('id');
        $consult = SingleArticle::where('id',$id)->first();
        $consult->name = $request->input('name');
        $consult->content = $request->input('content');
        $consult->meta_keyword = $request->input('meta_keyword');
        $consult->meta_description = $request->input('meta_description');
        $consult->status = intval($request->input('status'));
        if($consult->save()){
            return redirect('/consult/list');
        }
    }

    public function del(Request $request){
        $id = $request->input('id');
        $result = SingleArticle::where('id',$id)->delete();
        if($request){
            return json_encode(['code'=>0,'msg'=>'删除成功']);
        }
    }


}
