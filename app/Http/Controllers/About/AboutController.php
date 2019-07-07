<?php

namespace App\Http\Controllers\About;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Category;
class AboutController extends Controller
{
    public function index(){
        $about = About::first();
        $categories = Category::where('base_id',1)->orderBy('number','desc')->limit(3)->get();
        return view('about.index',['about'=>$about,'categories'=>$categories]);
    }
}
