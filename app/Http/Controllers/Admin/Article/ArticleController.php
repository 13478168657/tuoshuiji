<?php

namespace App\Http\Controllers\Admin\Article;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\ArticleClassify;
use App\Models\ProjectModel;
use App\Utils\ClassifyUtil;
use App\Utils\ImageUpload;
use Validation;
class ArticleController extends Controller
{
    /**
     * Create a new controller instance
     * @return void
     */
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
        $category_number = $request->input('id');
        $key = $request->input('key');
        $category = Category::where('category_num',$category_number)->first();
        $article = new Article();
        if($request->input('status')){
            $article = $article->where('status',$request->input('status'));
        }
        if($request->input('title')){
            $article = $article->where('title','like',"%".$request->input('title')."%");
        }
        if($request->input('start_time')){
            $article = $article->where('created_at','>=',$request->input('start_time'));
        }
        if($request->input('end_time')){
            $article = $article->where('created_at','<=',$request->input('end_time'));
        }
        if($this->protectFlag == 0){
            $article = $article->where('is_english',0);
        }else{
            $article = $article->where('is_english',1);
        }
        $article = $article->where('category_number',$category_number);
        $articles = $article->orderBy('created_at','desc')->paginate(10);
        return view('admin.articles.list',['articles'=>$articles,'request'=>$request,'category'=>$category,'key'=>$key]);
    }

    public function add(Request $request){
        $key = $request->input('key');
        $classify = ArticleClassify::get();
        $classifyList = ClassifyUtil::getTree($classify ,0,0);
        if($this->protectFlag == 0){
            return view('admin.articles.add',['classifies'=>$classifyList,'category_id'=>$request->input('pid'),'key'=>$key]);
        }else{
            return view('admin.articles.englishAdd',['classifies'=>$classifyList,'category_id'=>$request->input('pid'),'key'=>$key]);
        }
    }
    /*
     * 添加文章
     */
    public function postCreate(Request $request){
        $article = new Article();
//        dd($request->all());
        $key = $request->input('key');
        $category_id = $request->input('category_id');
        $category = Category::where('id',$category_id)->first();

        $article->title = $request->input('title');
        $article->category_id = $category_id;
        $article->is_english = $this->protectFlag;
//        $article->number = intval($request->input('number'));
        $article->category_number = $category->category_num;
        $article->meta_description = $request->input('meta_description');
        $article->meta_keyword = $request->input('meta_keyword');
//        $article->meta_title = $request->input('meta_title');
        $article->content = $request->input('content');
        $article->source = $request->input('source');
        $article->author = $request->input('author');
        $article->status = intval($request->input('status'));
//        $article->market_price = intval($request->input('market_price'));
//        $article->member_price = intval($request->input('member_price'));
//        $article->hot_price = intval($request->input('hot_price'));
        if($request->input('image')){
            $picResult = $this->upload($request);
            $article->thumbPic =  $picResult['imgurl'];
        }
        $article->creator_user_id = 1;
        if($article->save()){
            return redirect('/manage/info?key='.$key.'&id='.$article->category_number);
        }
    }
    /*
     * 编辑
     */
    public function edit(Request $request){
        $id = $request->input('id');
        $key = $request->input('key');
        $category_id = $request->input('pid');
        $article = Article::where('id',$id)->first();
        $classify = ArticleClassify::get();
        $classifyList = ClassifyUtil::getTree($classify ,0,0);
        return view('admin.articles.edit',['article'=>$article,'classifies'=>$classifyList,'category_id'=>$category_id,'key'=>$key]);
    }
    /*
     * 编辑处理
     */
    public function postEdit(Request $request){
        $article = Article::where('id',$request->input('id'))->first();
        $key = $request->input('key');
        $article->title = $request->input('title');
        $article->is_english = $this->protectFlag;
//        $article->number = intval($request->input('number'));
        $article->meta_description = $request->input('meta_description');
        $article->meta_keyword = $request->input('meta_keyword');
//        $article->meta_title = $request->input('meta_title');
        $article->content = $request->input('content');
        $article->source = $request->input('source');
        $article->author = $request->input('author');
        $article->status = intval($request->input('status'));
//        $article->market_price = intval($request->input('market_price'));
//        $article->member_price = intval($request->input('member_price'));
//        $article->hot_price = intval($request->input('hot_price'));
        if($request->input('image')){
            $picResult = $this->upload($request);
            $article->thumbPic =  $picResult['imgurl'];
        }
        $article->creator_user_id = $request->user()->id;
        if($article->save()){
            return redirect('/manage/info?key='.$key.'&id='.$article->category_number);
        }
    }

    public function del(Request $request){
        $id = $request->input('id');
        $result = Article::where('id',$id)->delete();
        if($result){
            return json_encode(['code'=>0,'msg'=>'删除成功']);
        }else{
            return json_encode(['code'=>1,'msg'=>'删除失败']);
        }
    }
    /*
     *标题图上传
     */
    public function upload(Request $request)
    {
        $imageUpload = new ImageUpload();
        $result = $imageUpload->upload($request);
        return $result;
    }
}
