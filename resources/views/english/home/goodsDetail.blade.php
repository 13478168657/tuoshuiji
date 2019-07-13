@extends('english.layouts.main')
@section('title')
    <title>{{$goods->title}}-祁门红茶</title>
    <meta name="keywords" content="{{$goods->meta_key_word}}" />
    <meta name="description" content="{{$goods->meta_description}}" />
@endsection
@section('content')
<link rel="stylesheet" href="/css/details.css">
@include('layouts.header')
<div class="news w clearfix">
    <div class="news-l">
        <div class="mainLeft">
            <div class="BreadNav">
                <a href="/">首页</a>／<a href="/thread-{{$goods->id}}.html">{{$goods->title}}</a>
            </div>
            <h1>{{$goods->title}}</h1>
            <div class="font2 adimg">
                <span>发布日期：{{$goods->created_at}}</span>
                <span>出处：{{$goods->source}}</span>
                <span>作者：{{$goods->author}}</span>
                <span>阅读：{{$goods->visit_num}}</span>
            </div>
            <div class="content">
                <?php
                echo htmlspecialchars_decode($goods->content);
                ?>
            </div>
            <div class="connext adimg">
                @if($prevGoods)
                <span class="nextup"><a href="/thread-{{$prevGoods->id}}.html">{{$prevGoods->title}}</a></span>
                @endif
                @if($nextGoods)
                <span class="next"><a href="/thread-{{$nextGoods->id}}.html">{{$nextGoods->title}}</a></span>
                @endif
            </div>
        </div>
    </div>
    <div class="news-r">
        <div class="news-r-n">
            @foreach($categories as $k=>$cat)

            @if($k == 0)
            <?php
            $articles = App\Models\Article::where('category_id',$cat->id)->where('status',3)->select('id','title','thumbPic')->orderBy('created_at','desc')->limit(9)->get();
            ?>
            <div class="news-r-t">
                <h2>{{$cat->name}}</h2>
            </div>
            <div class="tag">
                @foreach($articles as $article)
                <a href="/thread-{{$article->id}}.html">{{$article->title}}</a>
                @endforeach
            </div>
            @else
            <?php
            $articles = App\Models\Article::where('category_id',$cat->id)->where('status',3)->select('id','title','thumbPic')->orderBy('created_at','desc')->limit(3)->get();
            ?>
            <div class="news-r-t">
                <h2>{{$cat->name}}</h2>
            </div>
            <ul class="side_class3">
                @foreach($articles as $article)
                <li>
                    <div class="limg">
                        <a href="/thread-{{$article->id}}.html" target="_blank" >
                            <img src="/uploads/thumb/{{$article->thumbPic}}" alt="{{$article->meta_description}}" >
                        </a>
                    </div>
                    <div class="rtext">
                        <div class="side3_title"><a href="/thread-/{{$article->id}}.html" target="_blank" >{{$article->title}}
                            </a></div>
                        <div class="side3_redu">{{$article->visit_num}}</div>
                    </div>
                    <div style="clear:both"></div>
                </li>
                <div style="clear:both"></div>
                @endforeach
            </ul>
            @endif
            @endforeach
        </div>
    </div>
</div>
@endsection