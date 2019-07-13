<?php
use App\Models\Category;

$categories = Category::take(9)->orderBy('number','desc')->get();


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
        <li><a href="/index1.html">产品展示</a></li>
        <li><a href="/index2.html">视频中心</a></li>
        <li><a href="/index3.html">成功案例</a></li>
        <li><a href="/index4.html">服务支持</a></li>
        <li><a href="/index5.html">污泥脱水机</a></li>
        <li><a href="/index6.html">企业新闻</a></li>
        <li><a href="/index7.html">行业资讯</a></li>
        <li><a href="/index8.html">公司简介</a></li>
    </ul>
</div>
<div id="container">
    <div class="sections">
        <div class="section" id="section0"></div>
        <div class="section" id="section1"></div>
        <div class="section" id="section2"></div>
        <div class="section" id="section3"></div>
    </div>
</div>
<!--导航结束 end-->
<div class="sousuo">
    <div class="sousou-center w">
        <ul>
            <li><strong>热门关键词：</strong></li>
            <li><a href="">脱水机</a></li>
            <li><a href="">脱水机</a></li>
            <li><a href="">脱水机</a></li>
            <li><a href="">脱水机</a></li>
            <li><a href="">脱水机</a></li>
            <li><a href="">脱水机</a></li>
            <li><a href="">脱水机</a></li>
            <li><a href="">脱水机</a></li>
        </ul>
    </div>
</div>