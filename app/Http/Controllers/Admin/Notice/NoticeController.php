<?php

namespace App\Http\Controllers\Admin\Notice;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Notice;
use App\Models\ProjectModel;
class NoticeController extends Controller
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
        $notice = new Notice();
        if($this->protectFlag) {
            $notices = $notice->where('type',1)->paginate(15);
            return view('admin.en.notice.index', ['notices' => $notices, 'request' => $request]);
        }else{
            $notices = $notice->where('type',0)->paginate(15);
            return view('admin.notice.index', ['notices' => $notices, 'request' => $request]);
        }
    }

    public function create(Request $request){
        if($this->protectFlag) {
            return view('admin.en.notice.create');
        }else{
            return view('admin.notice.create');
        }
    }
    /*
     * 添加文章
     */
    public function postCreate(Request $request){
        $notice = new Notice();
        $notice->name = $request->input('name');
        if($this->protectFlag) {
            $notice->type = 1;
        }
        $notice->content = $request->input('content');
        $notice->meta_keyword = $request->input('meta_keyword');
        $notice->meta_description = $request->input('meta_description');
        $notice->status = intval($request->input('status'));
        if($notice->save()){
            return redirect('/notice/list');
        }
    }
    /*
     * 编辑
     */
    public function edit(Request $request){
        $id = $request->input('id');
        $notice = Notice::where('id',$id)->first();
        if($this->protectFlag) {
            return view('admin.en.notice.edit',['notice'=>$notice]);
        }else{
            return view('admin.notice.edit',['notice'=>$notice]);
        }
    }
    /*
     * 编辑处理
     */
    public function postEdit(Request $request){
        $id = $request->input('id');
        $notice = Notice::where('id',$id)->first();
        $notice->name = $request->input('name');
        $notice->content = $request->input('content');
        $notice->meta_keyword = $request->input('meta_keyword');
        $notice->meta_description = $request->input('meta_description');
        $notice->status = intval($request->input('status'));
        if($notice->save()){
            return redirect('/notice/list');
        }
    }

    public function del(Request $request){
        $id = $request->input('id');
        $result = Notice::where('id',$id)->delete();
        if($request){
            return json_encode(['code'=>0,'msg'=>'删除成功']);
        }
    }
}