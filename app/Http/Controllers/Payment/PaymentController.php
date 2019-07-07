<?php

namespace App\Http\Controllers\Payment;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\Category;
class PaymentController extends Controller
{

    public function index(Request $request){
        $payment = Payment::first();
        $categories = Category::where('base_id',1)->orderBy('number','desc')->limit(3)->get();
        return view('payment.index',['payment'=>$payment,'categories'=>$categories]);
    }
}
