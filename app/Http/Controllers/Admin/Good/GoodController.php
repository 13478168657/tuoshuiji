<?php

namespace App\Http\Controllers\Admin\Good;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Good;
use App\Utils\ImageUpload;
class GoodController extends Controller
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
        $good = new Good();
        if($request->input('status')){
            $good = $good->where('status',$request->input('status'));
        }
        if($request->input('title')){
            $good = $good->where('title','like',"%".$request->input('title')."%");
        }
        if($request->input('start_time')){
            $good = $good->where('created_at','>=',$request->input('start_time'));
        }
        if($request->input('end_time')){
            $good = $good->where('created_at','<=',$request->input('end_time'));
        }
        $goods = $good->orderBy('id','desc')->paginate(10);
        return view('admin.goods.list',['goods'=>$goods,'request'=>$request]);
    }

    public function create(Request $request){
        $key = $request->input('key');
        return view('admin.goods.add');
    }
    /*
     * 添加文章
     */
    public function postCreate(Request $request){
        $good = new Good();
        $good->title = $request->input('title');
//        $good->number = intval($request->input('number'));
        $good->meta_description = $request->input('meta_description');
        $good->meta_keyword = $request->input('meta_keyword');
//        $good->meta_title = $request->input('meta_title');
        $good->content = $request->input('content');
        $good->source = $request->input('source');
        $good->author = $request->input('author');
        $good->status = intval($request->input('status'));
        $good->market_price = intval($request->input('market_price'));
        $good->member_price = intval($request->input('member_price'));
        $good->hot_price = intval($request->input('hot_price'));
        if($request->input('image')){
            $picResult = $this->upload($request);
            $good->thumbPic =  $picResult['imgurl'];
        }
        $good->creator_user_id = 1;
        if($good->save()){
            return redirect('/goods/list');
        }
    }
    /*
     * 编辑
     */
    public function edit(Request $request){
        $id = $request->input('id');
        $good = Good::where('id',$id)->first();
        return view('admin.goods.edit',['good'=>$good]);
    }
    /*
     * 编辑处理
     */
    public function postEdit(Request $request){
        $good = Good::where('id',$request->input('id'))->first();
        $key = $request->input('key');
        $good->title = $request->input('title');
//        $good->number = intval($request->input('number'));
        $good->meta_description = $request->input('meta_description');
        $good->meta_keyword = $request->input('meta_keyword');
//        $good->meta_title = $request->input('meta_title');
        $good->content = $request->input('content');
        $good->source = $request->input('source');
        $good->author = $request->input('author');
        $good->status = intval($request->input('status'));
        $good->market_price = intval($request->input('market_price'));
        $good->member_price = intval($request->input('member_price'));
        $good->hot_price = intval($request->input('hot_price'));
        if($request->input('image')){
            $picResult = $this->upload($request);
            $good->thumbPic =  $picResult['imgurl'];
        }
        $good->creator_user_id = $request->user()->id;
        if($good->save()){
            return redirect('/goods/list');
        }
    }

    public function del(Request $request){
        $id = $request->input('id');
        $result = Good::where('id',$id)->delete();
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
