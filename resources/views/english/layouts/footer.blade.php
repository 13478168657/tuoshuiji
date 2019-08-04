<?php
use App\Models\Link;
use App\Models\Category;
$links = Link::orderBy('id','desc')->get();
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

<div class="dibusm w">
    友情链接：
    @foreach($links as $k =>$link)
        @if($k == count($link)-1)
            <a href="{{$link->url}}">{{$link->name}}</a>
        @else
            <a href="{{$link->url}}">{{$link->name}}</a>	-
        @endif
    @endforeach
    <br/>
</div>
<!--links end-->
<!--footer strat-->
<div class="nav">
    <ul class="nav-banner w">
        <li><a href="/en.html" class="munber">home</a></li>
        @foreach($categories as $cate)
            <li><a href="/en/index{{$cate->id}}.html">{{$cate->english_name}}</a></li>
        @endforeach
        <li><a href="/en/about">公司简介</a></li>
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
