<?php

namespace App\Http\Controllers\Consult;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Consult;
use App\Models\Category;
class ConsultController extends Controller
{
    public function index(){
        $consult = Consult::first();
//        dd($consult);
        $categories = Category::where('base_id',1)->orderBy('number','desc')->limit(3)->get();
        return view('consult.index',['consult'=>$consult,'categories'=>$categories]);
    }
}
