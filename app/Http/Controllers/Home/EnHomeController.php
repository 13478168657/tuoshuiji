<?php

namespace App\Http\Controllers\Home;

use App\Models\Link;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use App\Models\Advertisement;
use App\Models\AdSpace;
use App\Models\BaseConfig;
use App\Models\SingleArticle;
use App\Models\Goods;
use App\Utils\PageUtil;
use Illuminate\Support\Facades\Input;
class EnHomeController extends Controller
{
    public function home(Request $request){

    }

    public function index(){

        $data['productShow'] = Article::where('category_id',1)->where('is_english',1)->where('status',3)->OrderBy('id','desc')->take(12)->skip(1)->get();//产品展示
        $data['successExamples'] = Article::where('category_id',3)->where('status',3)->where('is_english',1)->OrderBy('id','desc')->get();//成功案例
        $data['commonQuestions'] = Article::where('category_id',9)->where('is_english',1)->where('status',3)->OrderBy('id','desc')->take(2)->skip(13)->get();//常见问题

        $data['newsActives'] = Article::where('category_id',6)->where('is_english',1)->where('status',3)->OrderBy('id','desc')->take(6)->get();//新闻动态

        $data['lunbo'] = Advertisement::where('position_id',4)->get();
        $data['publicNews'] = Article::where('category_id',14)->where('is_english',1)->where('status',3)->orderBy('id','desc')->take(3)->get();
        $baseConfig = BaseConfig::first();
        $data['baseConfig'] = $baseConfig;
//        dd(3);
        return view('english.home.index',$data);
    }

    public function lists($id){
        $position = strpos($id, 's');

        if($position < 0 || $position === false){
            $id = $id;
            $page=1;
//            if($this->isMobile()){
//                return redirect('/h/index'.$id.'.html');
//            }
        }else{
            $info = $id;
            $id = substr($info, 0,strpos($info, 's'));
            $page = substr($info,strpos($info, 's')+1);
        }

//        $request->page = $page;
        if($id == 11){
            $pageSize = 12;
            $skip = ($page-1)*$pageSize;
        }else{
            $pageSize = 10;
            $skip = ($page-1)*$pageSize;
        }
        $navCates = Category::take(7)->orderBy('number','asc')->get();
        $singleArticles = SingleArticle::where('type',1)->get();
        $category =  Category::where('id',$id)->first();

        $categories = Category::where('base_id',1)->where('id','!=',$id)->orderBy('number','desc')->limit(3)->get();
        $articles = Article::where('status',3)->where('category_id',$id)->where('is_english',1)->orderBy('created_at','desc')->take($pageSize)->skip($skip)->get();
        $total = Article::where('status',3)->where('category_id',$id)->where('is_english',1)->orderBy('created_at','desc')->select('id')->count();

        $baseConfig = BaseConfig::first();
        $data['baseConfig'] = $baseConfig;

        $pageSize = PageUtil::getPage($page,$total,$pageSize,$id,'s');
        if($id == 11){
            return view('english.home.imgList',['category'=>$category,'categories'=>$categories,'articles'=>$articles,'pageSize'=>$pageSize,'page'=>$page,'baseConfig' => $baseConfig,'singleArticles'=>$singleArticles,'navCates'=>$navCates]);
        }
        return view('english.home.list',['category'=>$category,'categories'=>$categories,'articles'=>$articles,'pageSize'=>$pageSize,'page'=>$page,'baseConfig' => $baseConfig,'singleArticles'=>$singleArticles,'navCates'=>$navCates]);
        return view('home.list');
    }


    public function detail($id){
        $article = Article::where('id',$id)->first();
        $article->visit_num = $article->visit_num+1;

        $article->save();
        $category =  Category::where('id',$article->category_id)->first();
        $singleArticles = SingleArticle::where('type',1)->get();
        $nextArticle = Article::where('is_english',1)->where('id','>',$id)->first();
        $prevArticle = Article::where('is_english',1)->where('id','<',$id)->first();
        $articles1 = Article::where('category_id',$article->category_id)->where('is_english',1)->take(4)->where('id','!=',$article->id)->orderBy('id','desc')->get();
        $articles2 = Article::where('category_id',$article->category_id)->skip(4)->take(4)->where('id','!=',$article->id)->where('is_english',1)->orderBy('id','desc')->get();
        $categories = Category::where('base_id',1)->where('id','!=',$article->category_id)->orderBy('number','desc')->take(3)->get();
        $baseConfig = BaseConfig::first();
        return view('home.detail',['article'=>$article,'categories'=>$categories,'category'=>$category,'nextArticle'=>$nextArticle,'prevArticle'=>$prevArticle,'articles1'=>$articles1,'articles2'=>$articles2,'singleArticles'=>$singleArticles,'baseConfig'=>$baseConfig]);
        return view('english.home.detail');
    }

    public function goodsDetail($id){
        $goods = Goods::where('id',$id)->where('status',3)->first();
        $goods->visit_num = $goods->visit_num+1;
        $goods->save();
        $nextGoods = Goods::where('id',$id+1)->first();
        $prevGoods = Goods::where('id',$id-1)->first();
        $category =  Category::where('id',1)->first();
        $categories = Category::where('base_id',1)->where('id','!=',1)->orderBy('number','desc')->take(3)->get();
        return view('english.home.goodsDetail',['goods'=>$goods,'categories'=>$categories,'category'=>$category,'nextGoods'=>$nextGoods,'prevGoods'=>$prevGoods]);
    }

}