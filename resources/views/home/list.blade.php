<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>江苏思科尼恩环保科技有限公司</title>
    <link rel="stylesheet" href="/css/base.css">
    <link rel="stylesheet" href="/css/public.css">
    <!--轮播图-->
    <link rel="stylesheet" href="/dist/pageSwitch.min.css">
    <link rel="stylesheet" href="/css/list.css">

</head>
<body>

<!--导航开始 strat-->
@include('layouts.header')

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
            <p>电话：13865929250</p>
            <p>传真：13865929250</p>
            <p>电子邮件：643717450@qq.com</p>
            <p>网址：www.saipujianshen.com</p>
            <p>地址：北京大兴区金源路26号</p>
            <p class="yanse">【综合服务部】</p>
            <p>李先生：电话：13865929250</p>
            <p>李先生：电话：13865929250</p>
            <p>李先生：电话：13865929250</p>
            <p>李先生：电话：13865929250</p>
        </div>
    </div>
    <div class="right">
        <div class="news w clearfix">
            <div class="news-l">
                <div class="mainLeft">
                    <div class="BreadNav">
                        <a href="/">您当前位置：</a><a href="/">首页</a>	>	<a href="/index{{$category->id}}.html">{{$category->name}}</a>
                    </div>
                    <ul class="side_class4">
                    @foreach($articles as $article)
                        <li>
                            <div class="limg">
                                <a href="/thread-{{$article->id}}.html" target="_blank" ><img src="/uploads/thumb/{{$article->thumbPic}}" alt="{{$article->title}}"/></a>
                            </div>
                            <div class="rtext">
                                <div class="side3_title"><a href="/thread-{{$article->id}}.html" target="_blank" >{{$article->title}}</a></div>
                                <div class="side2_title"><a href="/thread-{{$article->id}}.html" target="_blank" >{{$article->meta_description}}</a></div>
                                <div class="side3_redu">{{$article->visit_num}}</div>
                            </div>
                            <div style="clear:both"></div>
                        </li>
                    @endforeach
                    </ul>

                </div>
                <div class="pagination">
                    <?php
                        echo $pageSize;
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<div style="clear:both"></div>
<!--footer strat-->
<div class="nav">
    <ul class="nav-banner w">
        <li><a href="/" class="munber">网站首页</a></li>
        @foreach($navCates as $navCate)
        <li><a href="/index{{$navCate->id}}.html">{{$navCate->name}}</a></li>
        @endforeach
        <li><a href="/about">公司简介</a></li>
    </ul>
</div>
<!--footer end-->
<!--本站服务start-->

<div class="dibusm w">
    本站业务：<a href="product_148.html">塑料脱水机</a> <a href="product_162.html">蔬菜脱水机</a> &nbsp;<a href="product_108_2.html">不锈钢脱水机</a> <a href="product_view_49_207.html">小型脱水机</a> <a href="product_108.html">工业脱水机</a> <a href="product_179.html">离心脱水机</a> <a href="product_198.html">工业甩干机</a> &nbsp;<a href="product_205.html">地毯脱水机</a> 塑料甩干机  蔬菜甩干机  床单甩干机  圆振动筛 广东振动筛 <a href="product_view_63_198.html">脱水机配件</a> 脱水机维修 立式脱水机 脱水机价格 塑料片脱水机 塑料粒脱水机 毛巾脱水机 毛巾甩干机 蔬菜甩水机 &nbsp;汽车美容脱水机<br>
</div>
<!--本站服务end-->
<div class="dibubq " >
    <div class="tup">
        <img src="/images/logo-1.jpg" alt="东莞环鑫机械" style="margin-right:10px;margin-bottom:5px;" align="left"> <br>
        <p style="font-size:30px;font-weight:bold;text-align:center;">
            环鑫机械
        </p>
    </div>
    <div class="wenzism">
        版权所有 © 2016东莞市环鑫机械有限公司<br>
        公司地址：东莞市清溪镇清凤路21号 <br>
        联系电话：0769-81262961 传 真：0769-81262962<br>
        业务咨询：137 1199 8611 林先生（机械工程师）<br>
        备案号：粤ICP备15073682号-1

    </div>
    <div class="eweim">
        <img src="/images/2016912191725589.jpg" alt="微信公众号二维码" width="105">
        <p>
            扫一扫关注我们
        </p>
    </div>
</div>



</div>

</div>
<!--轮播图strat-->
<script src="/js/jquery-1.11.0.min.js" type="text/javascript"></script>
<script src="/dist/pageSwitch.min.js"></script>
<script>
    $("#container").PageSwitch({
        direction:'horizontal',
        easing:'ease-in',
        duration:1000,
        autoPlay:true,
        loop:'false'
    });
</script>
<!--轮播图end-->
</body>
</html>