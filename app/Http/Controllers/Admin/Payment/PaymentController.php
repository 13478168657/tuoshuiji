<?php

namespace App\Http\Controllers\Admin\Payment;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Payment;
class PaymentController extends Controller
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
        $payment = new Payment();
        $payments = $payment->paginate(15);
        return view('admin.payment.index',['payments'=>$payments,'request'=>$request]);
    }

    public function create(Request $request){

        return view('admin.payment.create');
    }
    /*
     * 添加文章
     */
    public function postCreate(Request $request){
        $payment = new Payment();
        $payment->name = $request->input('name');
        $payment->content = $request->input('content');
        $payment->meta_keyword = $request->input('meta_keyword');
        $payment->meta_description = $request->input('meta_description');
        $payment->status = intval($request->input('status'));
        if($payment->save()){
            return redirect('/payment/list');
        }
    }
    /*
     * 编辑
     */
    public function edit(Request $request){
        $id = $request->input('id');
        $payment = Payment::where('id',$id)->first();
        return view('admin.payment.edit',['payment'=>$payment]);
    }
    /*
     * 编辑处理
     */
    public function postEdit(Request $request){
        $id = $request->input('id');
        $payment = Payment::where('id',$id)->first();
        $payment->name = $request->input('name');
        $payment->content = $request->input('content');
        $payment->meta_keyword = $request->input('meta_keyword');
        $payment->meta_description = $request->input('meta_description');
        $payment->status = intval($request->input('status'));
        if($payment->save()){
            return redirect('/payment/list');
        }
    }

    public function del(Request $request){
        $id = $request->input('id');
        $result = Payment::where('id',$id)->delete();
        if($request){
            return json_encode(['code'=>0,'msg'=>'删除成功']);
        }
    }
}
