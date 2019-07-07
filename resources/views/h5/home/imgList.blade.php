@extends('h5.layouts.main')
@section('css')
    <link rel="stylesheet" href="/h5/css/style_2.css">
@endsection
@section('title')
    <title></title>
    <meta name="keywords" content="">
    <meta name="description" content="">
@endsection
@section('content')
    <div class="content_top">
        <div class="arrowl"><a href="/"><img src="/h5/images/home.png" alt="首页" height="22"></a></div>
        <div class="context">{{$category->alias}}</div>
        <div class="arrowr"><a href="#" class="more" id="dhmore"><img src="/h5/images/more.png" height="23"></a></div>
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
    <!-- 元素开始 -->
    <div class="tabBox">
        <div class="hd">
            <h2>当前位置：<a href='/'>祁门红茶</a> > <a href='/index{{$category->id}}.html'>图片</a> > </h2>
        </div>
        <div class="pblimg">
            @foreach($articles as $article)
            <a href="/thread-{{$article->id}}.html" target="_self"><img src="/uploads/thumb/{{$article->thumbPic}}" alt="{{$article->title}}"/>
                <p>{{$article->title}}</p>
            </a>
            @endforeach
        </div>
    </div>

    <div class="pages pagination">
        <?php
        echo htmlspecialchars_decode($pageSize);
        ?>
    </div>

    <!-- 效果导航 -->
    <div class="effectNav">
        <h3></h3>
        <p>电话：13865929250 邮箱：13865929250</p>
    </div>
@endsection