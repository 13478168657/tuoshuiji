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
                    <p>电话：186-2606-0118</p>
                    <p>传真：0510-87835338</p>
                    <p>网址：www.scleanchina.com</p>
                    <p>地址：江苏省宜兴市高塍工业集中区华汇路0号</p>
                    <p class="yanse">【综合服务部】</p>
                    <p>电话：186-2606-0118</p>
                    <p>固话：0510-87835338</p>
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
    @include('layouts.footer')
@endsection