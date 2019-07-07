<?php

namespace App\Http\Controllers\Article;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\ArticleClassify;
use App\Utils\ClassifyUtil;
use Validation;
class ArticleController extends Controller
{
    /**
     * Create a new controller instance.
     *
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
        $articles = $article->paginate(15);
//        dd($article);
        return view('articles.list',['articles'=>$articles,'request'=>$request]);
    }

    public function add(Request $request){
        $classify = ArticleClassify::get();
        $classifyList = ClassifyUtil::getTree($classify ,0,0);
        return view('articles.add',['classifies'=>$classifyList]);
    }
    /*
     * 添加文章
     */
    public function postCreate(Request $request){
        $article = new Article();
        $article->title = $request->input('title');
        $article->desc = $request->input('desc');
        $article->content = $request->input('content');
        $article->type = $request->input('type');
        $article->status = $request->input('status');
        if($request->input('image')){
            $picResult = $this->upload($request);
            $article->thumbPic =  $picResult['imgurl'];
        }
        $article->creator_user_id = 1;
        if($article->save()){
            return redirect('/article/list');
        }
    }
    /*
     * 编辑
     */
    public function edit(Request $request){
        $id = $request->input('id');
        $article = Article::where('id',$id)->first();
        $classify = ArticleClassify::get();
        $classifyList = ClassifyUtil::getTree($classify ,0,0);
        return view('articles.edit',['article'=>$article,'classifies'=>$classifyList]);
    }
    /*
     * 编辑处理
     */
    public function postEdit(Request $request){
        $article = Article::where('id',$request->input('id'))->first();
        $article->title = $request->input('title');
        $article->type = $request->input('type');
        $article->desc = $request->input('desc');
        $article->content = $request->input('content');
        $article->status = $request->input('status');
        if($request->input('image')){
            $picResult = $this->upload($request);
            $article->thumbPic =  $picResult['imgurl'];
        }
        $article->creator_user_id = 0;
        if($article->save()){
            return redirect('/article/list');
        }
    }
    /*
     *标题图上传
     */
    public function upload(Request $request)
    {
        $file =$request->input('image');
        $seg = explode(";",$file);
        if(sizeof($seg)!=2){
            return resError(400,"wrong paramater" );
        }
        $segments = explode(",",$seg[1]);
        if(sizeof($segments)!=2){
            return resError(400,"wrong paramter");
        }
        $data = $segments[1];
        $encoding = $segments[0];

        $header = explode(":",$seg[0]);
        if(sizeof($header)!=2){
            return resError(400,"wrong paramter");
        }

        $mime = explode("/",$header[1]);
        if(sizeof($header)!=2){
            return resError(400,"wrong paramter");
        }
        $extName =  strtolower($mime[1]);
        if(!in_array($extName,array("jpg","bmp","gif","png","jpeg"))) {
            return resError(403,"bad extension name of the file");
        }
        try{
            $real_data = base64_decode($data);
        }catch(Exception $e){
            return resError(402,"parse data failed");
        }
        $y= date("Ym");
        $subDirectory = date("Ymd/");
        $destDirectory = $this->getUploadDirectory() . $subDirectory;
        if (!file_exists($destDirectory)) {
            mkdir($destDirectory, 0777, true);
        }
        $extension = $extName;
        $mime = $header[1];
        $filename = $this->buildPasteFileName($extension);
        file_put_contents($destDirectory.$filename,$real_data);
        $clientSize = filesize($destDirectory.$filename);
        return  ['status'=>0,'imgurl'=>'thumb' . DIRECTORY_SEPARATOR . $subDirectory . $filename];
    }

    private function buildPasteFileName($extension){
        $fi = microtime(true).rand(0,99999);
        return $fi.'.'.$extension;
    }
    private function getUploadDirectory(){
        return '/Users/Sites/nvwa/storage/uploads/thumb/';
    }
}
