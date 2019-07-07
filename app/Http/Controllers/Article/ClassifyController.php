<?php
namespace App\Http\Controllers\Article;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ArticleClassify;
use App\Utils\ClassifyUtil;
class ClassifyController extends Controller
{

    public function index(Request $request){
        $classifies = ArticleClassify::paginate(10);
        return view('articles.classifyList',['classifies'=>$classifies]);
    }

    public function add(Request $request){
        $classifies = ArticleClassify::get();
        $classifyList = $classifyList = ClassifyUtil::getTree($classifies ,0,0);
        return view('articles.classifyAdd',['classifies'=>$classifyList]);
    }

    public function postCreate(Request $request){
        $name = $request->input('name');
        $pid = $request->input('pid');
        $classify = new ArticleClassify();
        $classify->name = $name;
        $classify->pid = $pid;
        if($classify->save()){
            return redirect('position/list');
        }
    }
    public function edit(Request $request){
        $classify = ArticleClassify::where('id',$request->input('id'))->first();
        $classifies = ArticleClassify::get();
        $classifyList = ClassifyUtil::getTree($classifies ,0,0);
        return view('articles.classifyEdit',['classifyList'=>$classifyList,'classify'=>$classify]);
    }
    public function postEdit(Request $request){
        $classify = ArticleClassify::where('id',$request->input('id'))->first();
        $classify->pid = $request->input('pid');
        $classify->name = $request->input('name');
        $classify->status = $request->input('status');
        if($classify->save()){
            return redirect('position/list');
        }
    }

    public function del(Request $request){
        $id = $request->input('id');
        $del = ArticleClassify::destroy($id);
        if($del){
            return json_encode(['code'=>1,'msg'=>'删除成功']);
        }else{
            return json_encode(['code'=>0,'msg'=>'删除失败']);
        }

    }
}
