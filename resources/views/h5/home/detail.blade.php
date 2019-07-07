@extends('h5.layouts.main')
@section('css')
    <link rel="stylesheet" href="/h5/css/style_3.css">
@endsection
@section('title')
    <title>{{$article->title}}-祁门红茶网</title>
    <meta name="keywords" content="{{$article->meta_key_word}}" />
    <meta name="description" content="{{$article->meta_description}}"/>
@endsection
@section('content')
    <div class="content_top">
        <div class="arrowl"><a href="/index{{$category->id}}.html"><img src="/h5/images/arrow_l.png" alt="返回栏目" height="22"></a></div>
        <div class="context"><a href="/">首页</a> &#8226; <a href="/index{{$category->id}}.html">{{$category->alias}}</a> &#8226; 正文</div>
        <div class="arrowr"><a href="#" class="more" id="dhmore"><img src="/h5/images/more_1.png" height="23"></a></div>
    </div>
    <div class="cnsnav">
        <div class="navlayer" id="navlayer">
            <div class="cnsnav">
                <ul id="">
                    <li class="selimg"><a href="/">首页</a></li>
                    <li><a href="/index6.html">头条</a></li>
                    <li><a href="/index1.html">价格</a></li>
                    <li><a href="/index4.html">功效</a></li>
                    <li><a href="/index12.html">知识</a></li>
                    <li><a href="/index2.html">冲泡</a></li>
                    <li><a href="/index11.html">图片</a></li>
                    <li><a href="/index9.html">品牌</a></li>
                    <li><a href="/index13.html">茶学院</a></li>
                </ul>
            </div>
        </div>
    </div>


    <main>
        <section>
            <h3 class="headNew pa">{{$article->title}}</h3>
            <article class="pd10">
                <div class="info">发布时间:<time>{{date('Y-m-d',strtotime($article->created_at))}}</time>&nbsp;&nbsp;浏览:{{$article->visit_num}}次&nbsp;&nbsp;作者:{{$article->author}}</div>
                <div class="ad_wap"></div>
                <div class="content">
                    <?php
                    echo htmlspecialchars_decode($article->content);
                    ?>
                </div>
                <div class="page"><ul></ul></div>
            </article>
        </section>
    </main>
    <div class="share">
        <div class="bdsharebuttonbox"><a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a><a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a><a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a><a href="#" class="bds_sqq" data-cmd="sqq" title="分享到QQ好友"></a><a href="#" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博"></a><a href="#" class="bds_mail" data-cmd="mail" title="分享到邮件分享"></a><a href="#" class="bds_copy" data-cmd="copy" title="分享到复制网址"></a></div>
        <script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"0","bdSize":"32"},"share":{}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];</script>
    </div>
    <div class="clear"></div>
    <div class="tabBox">
        <div class="hd"><h2>相关文章<span>Related</span></h2></div>
        <div class="bd">
            <div class="con">
                <ul>
                    @foreach($articles as $article)
                    <li><a href="/thread-{{$article->id}}.html" title="{{$article->title}}">{{$article->title}}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    <a class="readMore" href="/index{{$category->id}}.html">返回栏目&gt;&gt;</a>
    <div class="clear"></div>
    <div id="SOHUCS"></div>
    <script id="changyan_mobile_js" charset="utf-8" type="text/javascript" src="/h5/js/changyan_mobile.js">
    </script>
    <style type="text/css">
        #goTopBtn{bottom:50px}
    </style>
    <!-- 效果导航 -->
    <div class="effectNav">
        <h3><a href="/">首页</a>&#160;&#160;&#160;|&#160;&#160;&#160;<a href="/h/index" >帮助</a></h3>
        <p>首页 | 头条 | 价格 | 功效 | 知识 | 冲泡 | 图片 | 品牌 | 茶学院</p>
        <p></p>
    </div>
    <div id="goTopBtn"><img src="/h5/images/top.png" width="30"></div>
    <script src="/h5/js/top.js" type="text/javascript"></script>
    <script type="text/javascript">goTopEx();</script>
@endsection