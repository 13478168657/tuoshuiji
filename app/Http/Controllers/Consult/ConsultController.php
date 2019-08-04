<?php

namespace App\Http\Controllers\Consult;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Consult;
use App\Models\Article;
use App\Models\Category;
use App\Models\SingleArticle;
class ConsultController extends Controller
{
    public function index($id){
//        dd($id);
        $consult = SingleArticle::where('id',$id)->first();
        $categories = Category::where('base_id',1)->orderBy('number','desc')->limit(3)->get();
        $category =  Category::first();
        $articles1 = Article::take(4)->orderBy('id','desc')->get();
        $articles2 = Article::skip(4)->take(4)->orderBy('id','desc')->get();
//        dd($consult);
        $categories = Category::where('base_id',1)->orderBy('number','desc')->take(3)->get();
        $singleArticles = SingleArticle::where('type',0)->get();
        return view('consult.index',['consult'=>$consult,'categories'=>$categories,'category'=>$category,'articles1'=>$articles1,'articles2'=>$articles2,'singleArticles'=>$singleArticles]);
    }
    public function eIndex($id){
        $consult = SingleArticle::where('id',$id)->first();
        $categories = Category::where('base_id',1)->orderBy('number','desc')->limit(3)->get();
        $category =  Category::first();
        $articles1 = Article::where('is_english',1)->take(4)->orderBy('id','desc')->get();
        $articles2 = Article::where('is_english',1)->skip(4)->take(4)->orderBy('id','desc')->get();
//        dd($consult);
        $categories = Category::where('base_id',1)->orderBy('number','desc')->take(3)->get();
        $singleArticles = SingleArticle::where('type',1)->get();
        return view('consult.eIndex',['consult'=>$consult,'categories'=>$categories,'category'=>$category,'articles1'=>$articles1,'articles2'=>$articles2,'singleArticles'=>$singleArticles]);
    }
}
