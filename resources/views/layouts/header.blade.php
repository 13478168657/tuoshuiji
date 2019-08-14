<?php
use App\Models\Category;
use App\Models\Advertisement;
$categories = Category::take(7)->orderBy('number','asc')->get();
$keyCates = Category::where('number','>=',100)->get();
$lunbo = Advertisement::where('position_id',5)->get();
?>
<div class="top">
    <div class="juzhong">
        您好，欢迎来到江苏思科尼恩环保科技有限公司
        <ul>
            <li><a href="">中文</a></li>
            <li><a href="/en.html">英文</a></li>
        </ul>
    </div>
</div>
<div class="logo w">
    <div class="logo-l">
        <div class="logo-img">
            <a href=""><img src="/images/logo.jpg" alt=""></a>
            <strong><span>脱水率达<i>99%</i>的设备制定厂家</span></strong>
        </div>
    </div>
    <div class="logo-r">
        <span class="logo-r-rexian">全国服务热线：</span>
        <span class="dianh">138-6592-9250</span>
        <span class="dianh">400-1199-8611</span>
    </div>
</div>

<!--导航开始 strat-->
<div class="nav">
    <ul class="nav-banner w">
        <li><a href="/" class="munber">网站首页</a></li>
        @foreach($categories as $category)
        <li><a href="/index{{$category->id}}.html">{{$category->name}}</a></li>
        @endforeach
        <li><a href="/single/7.html">公司简介</a></li>
    </ul>
</div>

<!--轮播图-->
<div id="banner_tabs" class="flexslider">
    <ul class="slides">
        @foreach($lunbo as $k=>$lb)
        <li>
            <a title="" target="_blank" href="#">
                <img width="1920" height="450" alt="" style="background: url({{"/uploads/thumb/".$lb->photo}}) no-repeat center;" src="/uploads/thumb/{{$lb->photo}}">
            </a>
        </li>
        @endforeach
    </ul>
    <ul class="flex-direction-nav">
        <li><a class="flex-prev" href="javascript:;">Previous</a></li>
        <li><a class="flex-next" href="javascript:;">Next</a></li>
    </ul>
    <ol id="bannerCtrl" class="flex-control-nav flex-control-paging">
        <li><a>1</a></li>
        <li><a>2</a></li>
        <li><a>2</a></li>
    </ol>
</div>
{{--<div id="container">--}}
    {{--<div class="sections">--}}
        {{--@foreach($lunbo as $k=>$lb)--}}
        {{--<div class="section" id="section{{$k}}" style="background-image:url({{"/uploads/thumb/".$lb->photo}})"></div>--}}
        {{--@endforeach--}}
    {{--</div>--}}
{{--</div>--}}
<!--导航结束 end-->
<div class="sousuo">
    <div class="sousou-center w">
        <ul>
            <li><strong>热门关键词：</strong></li>
            @foreach($keyCates as $keyCate)
            <li><a href="/index{{$keyCate->id}}.html">{{$keyCate->name}}</a></li>
            @endforeach
        </ul>
    </div>
</div>