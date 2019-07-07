<?php
use App\Models\Category;

$categories = Category::take(9)->orderBy('number','desc')->get();


?>
	
<div class="header-top">
    <div class="header-top-c w">
        <ul>
            <li>
                欢迎来到祁门红茶网，祁门红茶专业门户
            </li>
        </ul>
    </div>
</div>
<div class="header clearfix">
    <div class="w">
        <div class="logo">
            <a href=""><img src="/images/logo.png" alt="祁门红茶网" ></a>
        </div>
        <div class="logo-left">
            <a href=""><img src="/images/luntan_bg.png" alt="祁门红茶网" ></a>
        </div>
        <div class="logo-right">
            <a href=""><img style="width:100px;height:100px;" src="/images/weixin.png"></a>
        </div>
    </div>
</div>
<div class="nav">
    <div class="nav-c w">
        <ul>
            <li><a href="/" class="ziti">网站首页</a></li>
            @foreach($categories as $cat)
            <li><a href="/index{{$cat->id}}.html">{{$cat->name}}</a></li>
            @endforeach
        </ul>
    </div>
</div>