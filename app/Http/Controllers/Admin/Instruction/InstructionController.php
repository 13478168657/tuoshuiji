<?php

namespace App\Http\Controllers\Admin\Instruction;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Instruction;
class InstructionController extends Controller
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
        $instruction = new Instruction();
        $instructions = $instruction->paginate(15);
        return view('admin.instruction.index',['instructions'=>$instructions,'request'=>$request]);
    }

    public function create(Request $request){

        return view('admin.instruction.create');
    }
    /*
     * 添加文章
     */
    public function postCreate(Request $request){
        $instruction = new Instruction();
        $instruction->name = $request->input('name');
        $instruction->content = $request->input('content');
        $instruction->meta_keyword = $request->input('meta_keyword');
        $instruction->meta_description = $request->input('meta_description');
        $instruction->status = intval($request->input('status'));
        if($instruction->save()){
            return redirect('/instruction/list');
        }
    }
    /*
     * 编辑
     */
    public function edit(Request $request){
        $id = $request->input('id');
        $instruction = Instruction::where('id',$id)->first();
        return view('admin.instruction.edit',['instruction'=>$instruction]);
    }
    /*
     * 编辑处理
     */
    public function postEdit(Request $request){
        $id = $request->input('id');
        $instruction = Instruction::where('id',$id)->first();
        $instruction->name = $request->input('name');
        $instruction->meta_keyword = $request->input('meta_keyword');
        $instruction->meta_description = $request->input('meta_description');
        $instruction->content = $request->input('content');
        $instruction->status = intval($request->input('status'));
        if($instruction->save()){
            return redirect('/instruction/list');
        }
    }

    public function del(Request $request){
        $id = $request->input('id');
        $result = Instruction::where('id',$id)->delete();
        if($request){
            return json_encode(['code'=>0,'msg'=>'删除成功']);
        }
    }
}

