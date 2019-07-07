<?php

namespace App\Http\Controllers\Admin\Consult;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Consult;
use App\Utils\ClassifyUtil;
use App\Utils\ImageUpload;
use Validation;
class ConsultController extends Controller
{
    /**
     * Create a new controller instance
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $consult = new Consult();
        $consults = $consult->paginate(15);
        return view('admin.consult.index',['consults'=>$consults,'request'=>$request]);
    }

    public function create(Request $request){

        return view('admin.consult.create');
    }
    /*
     * 添加文章
     */
    public function postCreate(Request $request){
        $consult = new Consult();
        $consult->name = $request->input('name');
        $consult->content = $request->input('content');
        $consult->meta_keyword = $request->input('meta_keyword');
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
        $consult = Consult::where('id',$id)->first();
        return view('admin.consult.edit',['consult'=>$consult]);
    }
    /*
     * 编辑处理
     */
    public function postEdit(Request $request){
        $id = $request->input('id');
        $consult = Consult::where('id',$id)->first();
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
        $result = Consult::where('id',$id)->delete();
        if($request){
            return json_encode(['code'=>0,'msg'=>'删除成功']);
        }
    }
}
