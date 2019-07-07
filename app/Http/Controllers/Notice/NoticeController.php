<?php

namespace App\Http\Controllers\Notice;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Notice;
use App\Models\Category;
class NoticeController extends Controller
{
    public function index(Request $request){
        $notice = Notice::first();
        $categories = Category::where('base_id',1)->orderBy('number','desc')->limit(3)->get();
        return view('notice.index',['notice'=>$notice,'categories'=>$categories]);
    }
}
