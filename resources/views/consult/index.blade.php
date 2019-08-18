@extends('layouts.main')

@section('title')
    <title>江苏思科尼恩环保科技有限公司</title>
@endsection

@section('css')
    <link rel="stylesheet" href="/css/index-14.css">
    <link rel="stylesheet" href="/css/index-15.css">
    <link rel="stylesheet" href="/css/list.css">
    <link rel="stylesheet" href="/css/details.css">
@endsection

@section('content')
    <div class="list w">
        <div class="left-l">
            <div class="left-r">
                <div class="dianhua">联系我们</div>
                <ul>
                    @foreach($singleArticles as $single)
                        <li><a href="/single/{{$single->id}}.html">{{$single->name}}</a></li>
                    @endforeach
                </ul>
            </div>

            <div class="left">
                    <div class="dianhua">联系我们</div>
                    <p>电话：139-1785-5908</p>
                    <p>传真：021-55970983</p>
                    <p>网址：www.scleanchina.com</p>
                    <p>地址：上海市杨浦区控江路1142号405室</p>
                    <p class="yanse">【综合服务部】</p>
                    <p>电话：0510-87835238</p>
                    <p>固话：0510-87835238</p>
                    <p>厂址：江苏省宜兴市高塍工业集中区华汇路</p>
            </div>
        </div>
        <div class="right">
            <div class="news w clearfix">
                <div class="news-l">
                    <div class="mainLeft">
                        <div class="BreadNav">
                            <a href="/">您当前位置：</a><a href="/index2.html">首页</a>	>	<a href="/single/{{$consult->id}}.html">{{$consult->name}}</a>
                        </div>
                        <h1>{{$consult->name}}</h1>
                        <div class="content clearfix">
                            <?php
                            echo htmlspecialchars_decode($consult->content);
                            ?>
                        </div>
                    </div>
                    <div class="yuedu">
                        <div class="xiangguan"><span>相关阅读</span></div>
                    </div>
                    <div class="yuedu-left clearfix">
                        <ul>
                            @foreach($articles1 as $k => $article)
                                <li class="item clear active">
                        <span class="li_dot lefzz">
                            <i></i>
                        </span>
                                    <a class="no_line lefzz" href="/thread-{{$article->id}}.html" >{{$article->title}}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="yuedu-right clearfix">
                        <ul>
                            @foreach($articles2 as $article)
                                <li class="item clear active">
                        <span class="li_dot lefzz">
                            <i></i>
                        </span>
                                    <a class="no_line lefzz" href="/thread-{{$article->id}}.html">{{$article->title}}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div style="clear: both;"></div>

                </div>
            </div>

        </div>
    </div>
    <div style="clear:both"></div>
    <?php
//    use App\Models\Link;
    use App\Models\Category;
//    $links = Link::orderBy('id','desc')->get();
    $categories = Category::take(7)->orderBy('number','asc')->get();
    ?>

    <div class="index-15 gray">
        <div class="wrap">
            <div class="title1">
                <h2>合作单位</h2>
                <p>全国数千家大型单位合作，上千公司选择我们江苏思科……</p>
                <a href="/duiwaihezuo" class="more">了解更多+</a> </div>
            <div class="group">
                <ul>
                    <li><img src="/images/logo1.jpg" alt=""></li>
                    <li><img src="/images/logo2.jpg" alt=""></li>
                    <li><img src="/images/logo3.jpg" alt=""></li>
                    <li><img src="/images/logo4.jpg" alt=""></li>
                    <li><img src="/images/logo5.jpg" alt=""></li>
                    <li><img src="/images/logo6.jpg" alt=""></li>
                    <li><img src="/images/logo7.jpg" alt=""></li>
                    <li><img src="/images/logo8.jpg" alt=""></li>
                    <li><img src="/images/logo9.jpg" alt=""></li>
                    <li><img src="/images/logo10.jpg" alt=""></li>
                </ul>
            </div>
        </div>
    </div>

    <!--links-->

    <!--links end-->
    <!--footer strat-->
    <div class="nav">
        <ul class="nav-banner w">
            <li><a href="/" class="munber">网站首页</a></li>
            @foreach($categories as $cate)
                <li><a href="/index{{$cate->id}}.html">{{$cate->name}}</a></li>
            @endforeach
            <li><a href="/single/7.html">公司简介</a></li>
        </ul>
    </div>
    <!--footer end-->
    <!--本站服务start-->

    <div class="dibusm w">
        本站业务：<a href="">污泥脱水机</a> <a href="">板框脱水机</a> <a href="">板框压滤机</a> &nbsp;<a href="">带式脱水机</a> <a href="">带式压滤机</a> <a href="">离心式脱水机</a> <a href="">叠螺式脱水机</a> <br>
    </div>
    <!--本站服务end-->
    <div class="dibubq " >
        <div class="tup">
            <img src="/images/logo-1.jpg" alt="东莞江苏思科" style="margin-right:10px;margin-bottom:5px;" align="left"> <br>
            <p style="font-size:30px;font-weight:bold;text-align:center;">
                江苏思科
            </p>
        </div>
        <div class="wenzism">
            版权所有 © 江苏思科尼恩环保科技有限公司<br>
            公司地址：江苏省宜兴市高塍工业集中区华汇路0号  <br>
            联系电话：0510-87835238 传 真：0510-87835338<br>
            业务咨询：18626060118 <br>
        </div>
        <div class="eweim">
            <img src="/images/2016912191725589.jpg" alt="微信公众号二维码" width="105">
            <p>
                扫一扫关注我们
            </p>
        </div>
    </div>

@endsection