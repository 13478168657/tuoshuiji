<?php

namespace App\Http\Controllers\Consult;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Consult;
use App\Models\Article;
use App\Models\Category;
class ConsultController extends Controller
{
    public function index(){
        $consult = Consult::first();
        $categories = Category::where('base_id',1)->orderBy('number','desc')->limit(3)->get();
        $category =  Category::first();
        $articles1 = Article::take(4)->orderBy('id','desc')->get();
        $articles2 = Article::take(4)->orderBy('id','desc')->get();
        $categories = Category::where('base_id',1)->orderBy('number','desc')->take(3)->get();
        return view('consult.index',['consult'=>$consult,'categories'=>$categories,'category'=>$category,'articles1'=>$articles1,'articles2'=>$articles2]);
    }
}
