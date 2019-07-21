<?php

namespace App\Http\Controllers\Home;

use App\Models\Link;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use App\Models\Advertisement;
use App\Models\AdSpace;
use App\Models\SingleArticle;
use App\Models\BaseConfig;
use App\Models\Goods;
use App\Utils\PageUtil;
use Illuminate\Support\Facades\Input;
class HomeController extends Controller
{

    public function index(){

        $data['productShow'] = Article::where('category_id',12)->where('is_english',0)->where('status',3)->OrderBy('id','desc')->take(12)->skip(1)->get();//产品展示
        $data['successExamples'] = Article::where('category_id',14)->where('is_english',0)->where('status',3)->OrderBy('id','desc')->get();//成功案例
        $data['commonQuestions'] = Article::where('category_id',15)->where('is_english',0)->where('status',3)->OrderBy('id','desc')->take(3)->skip(13)->get();//常见问题

        $data['newsActives'] = Article::where('category_id',18)->where('is_english',0)->where('status',3)->OrderBy('id','desc')->take(6)->get();//新闻动态

        $data['lunbo'] = Advertisement::where('position_id',4)->get();
        $data['publicNews'] = Article::where('category_id',17)->where('status',3)->orderBy('id','desc')->take(3)->get();
        $baseConfig = BaseConfig::first();
        $data['baseConfig'] = $baseConfig;
        return view('home.index',$data);
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
//            dd($page);
//            $request= $request->get('page',$page);
//            if($this->isMobile()){
//                return redirect('/h/index'.$id.'s'.$page.'.html');
//            }
        }
        $singleArticles = SingleArticle::where('type',0)->get();
//        $request->page = $page;
        if($id == 11){
            $pageSize = 12;
            $skip = ($page-1)*$pageSize;
        }else{
            $pageSize = 10;
            $skip = ($page-1)*$pageSize;
        }
        $navCates = Category::take(7)->orderBy('number','asc')->get();
        $category =  Category::where('id',$id)->first();
//        dd($category);
        $categories = Category::where('base_id',1)->where('id','!=',$category->id)->orderBy('number','desc')->limit(3)->get();
        $articles = Article::where('status',3)->where('is_english',0)->where('category_id',$id)->orderBy('created_at','desc')->take($pageSize)->skip($skip)->get();
        $total = Article::where('status',3)->where('category_id',$id)->where('is_english',0)->orderBy('created_at','desc')->select('id')->count();

        $baseConfig = BaseConfig::first();
        $data['baseConfig'] = $baseConfig;

        $pageSize = PageUtil::getPage($page,$total,$pageSize,$id,'s');
//        if($id == 11){
//            return view('home.imgList',['category'=>$category,'categories'=>$categories,'articles'=>$articles,'pageSize'=>$pageSize,'page'=>$page]);
//        }
        return view('home.list',['category'=>$category,'categories'=>$categories,'articles'=>$articles,'pageSize'=>$pageSize,'page'=>$page,'navCates'=>$navCates,'singleArticles'=>$singleArticles,'baseConfig'=>$baseConfig]);
        return view('home.list');
    }

    public function slists(){
        $word = Input::get('wd','');
        $page = Input::get('page',1);
        $pageSize = 10;

        $categories = Category::where('base_id',1)->orderBy('number','desc')->limit(3)->get();
        $articles = Article::where('status',3)->where('title','like','%'.$word.'%')->orderBy('created_at','desc')->paginate($pageSize);
        $total = $articles->total();
        $pageSize = PageUtil::getSearchPage($page,$articles->total(),$pageSize,$word);

        return view('home.search',['categories'=>$categories,'articles'=>$articles,'pageSize'=>$pageSize,'page'=>$page,'total'=>$total]);
    }
    public function detail($id){
//        if($this->isMobile()){
//            return redirect('/h/thread-'.$id.'.html');
//        }
        $article = Article::where('id',$id)->first();
        $article->visit_num = $article->visit_num+1;

        $article->save();
        $category =  Category::where('id',$article->category_id)->first();
        $singleArticles = SingleArticle::where('type',0)->get();
        $nextArticle = Article::where('id',$id+1)->first();
        $prevArticle = Article::where('id',$id-1)->first();
        $articles1 = Article::where('category_id',$article->category_id)->take(4)->where('id','!=',$article->id)->orderBy('id','desc')->get();
        $articles2 = Article::where('category_id',$article->category_id)->take(4)->where('id','!=',$article->id)->orderBy('id','desc')->get();
        $categories = Category::where('base_id',1)->where('id','!=',$article->category_id)->orderBy('number','desc')->take(3)->get();
        $baseConfig = BaseConfig::first();
        return view('home.detail',['article'=>$article,'categories'=>$categories,'category'=>$category,'nextArticle'=>$nextArticle,'prevArticle'=>$prevArticle,'articles1'=>$articles1,'articles2'=>$articles2,'singleArticles'=>$singleArticles,'baseConfig'=>$baseConfig]);
        return view('home.detail');
    }

    public function goodsDetail($id){
        $goods = Goods::where('id',$id)->where('status',3)->first();
        $goods->visit_num = $goods->visit_num+1;
        $goods->save();
        $nextGoods = Goods::where('id',$id+1)->first();
        $prevGoods = Goods::where('id',$id-1)->first();
        $category =  Category::where('id',1)->first();
        $categories = Category::where('base_id',1)->where('id','!=',1)->orderBy('number','desc')->take(3)->get();
        return view('home.goodsDetail',['goods'=>$goods,'categories'=>$categories,'category'=>$category,'nextGoods'=>$nextGoods,'prevGoods'=>$prevGoods]);
    }




    public function isMobile()
    {
        // 如果有HTTP_X_WAP_PROFILE则一定是移动设备
        if (isset ($_SERVER['HTTP_X_WAP_PROFILE']))
        {
            return true;
        }
        // 如果via信息含有wap则一定是移动设备
        if (isset ($_SERVER['HTTP_VIA']))
        {
            // 找不到为flase,否则为true
            return stristr($_SERVER['HTTP_VIA'], "wap") ? true : false;
        }
        // 脑残法，判断手机发送的客户端标志,兼容性有待提高
        if (isset ($_SERVER['HTTP_USER_AGENT']))
        {
            $clientkeywords = array ('nokia',
                'sony',
                'ericsson',
                'mot',
                'samsung',
                'htc',
                'sgh',
                'lg',
                'sharp',
                'sie-',
                'philips',
                'panasonic',
                'alcatel',
                'lenovo',
                'iphone',
                'ipod',
                'blackberry',
                'meizu',
                'android',
                'netfront',
                'symbian',
                'ucweb',
                'windowsce',
                'palm',
                'operamini',
                'operamobi',
                'openwave',
                'nexusone',
                'cldc',
                'midp',
                'wap',
                'mobile'
            );
            // 从HTTP_USER_AGENT中查找手机浏览器的关键字
            if (preg_match("/(" . implode('|', $clientkeywords) . ")/i", strtolower($_SERVER['HTTP_USER_AGENT'])))
            {
                return true;
            }
        }
        if (isset ($_SERVER['HTTP_ACCEPT']))
        {
            // 如果只支持wml并且不支持html那一定是移动设备
            // 如果支持wml和html但是wml在html之前则是移动设备
            if ((strpos($_SERVER['HTTP_ACCEPT'], 'vnd.wap.wml') !== false) && (strpos($_SERVER['HTTP_ACCEPT'], 'text/html') === false || (strpos($_SERVER['HTTP_ACCEPT'], 'vnd.wap.wml') < strpos($_SERVER['HTTP_ACCEPT'], 'text/html'))))
            {
                return true;
            }
        }
        return false;
    }
}