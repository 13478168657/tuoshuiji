@extends('layouts.main')
@section('title')
    <title>{{$article->title}}-祁门红茶网</title>
    <meta name="keywords" content="{{$article->meta_key_word}}" />
    <meta name="description" content="{{$article->meta_description}}"/>
@endsection
@section('content')
    <link rel="stylesheet" href="/css/details.css">
    <div class="news w clearfix">
        <div class="news-l">
            <div class="mainLeft">
                <div class="BreadNav">
                    <a href="/">首页</a>／<a href="/index{{$category->id}}.html" class="hover">{{$category->name}}</a>／<a href="/thread-{{$article->id}}.html">{{$article->title}}</a>
                </div>
                <h1>{{$article->title}}</h1>
                <div class="font2 adimg">
                    <span>发布日期：{{$article->created_at}}</span>
                    <span>出处：{{$article->source}}</span>
                    <span>作者：{{$article->author}}</span>
                    <span>阅读：{{$article->visit_num}}</span>
                </div>
                <div class="content">
                    <?php
                    echo htmlspecialchars_decode($article->content);
                    ?>
                </div>
                <div class="connext adimg">
                    @if($prevArticle)
                        <span class="nextup"><a href="/thread-{{$prevArticle->id}}.html">{{$prevArticle->title}}</a></span>
                    @endif
                    @if($nextArticle)
                        <span class="next"><a href="/thread-{{$nextArticle->id}}.html">{{$nextArticle->title}}</a></span>
                    @endif
                </div>
            </div>
            <div class="yuedu">
                <div class="xiangguan"><span>相关阅读</span></div>
            </div>
            <div class="yuedu-left clearfix">
                <ul>
                    @foreach($articles as $k => $art)
                    @if($k < 5)
                    <li class="item clear active">
                        <span class="li_dot left">
                            <i></i>
                        </span>
                        <a class="no_line left" href="/thread-{{$art->id}}.html">{{$art->title}}</a>
                    </li>
                    @endif
                    @endforeach
                </ul>
            </div>
            <div class="yuedu-right clearfix">
                <ul>
                    @foreach($articles as $k => $art)
                        @if($k >= 5)
                            <li class="item clear active">
                        <span class="li_dot left">
                            <i></i>
                        </span>
                                <a class="no_line left" href="/thread-{{$art->id}}.html">{{$art->title}}</a>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </div>
			      <div style="clear: both;"></div>
               <div class="shengming ">
                【版权及免责声明】凡注明"转载来源"的作品，均转载自其它媒体，转载目的在于传递更多的信息，并不代表本网赞同其观点和对其真实性负责。祁门红茶网倡导尊重与保护知识产权，如发现本站文章存在内容、版权或其它问题，烦请联系。 联系微信：15705590919，我们将及时沟通与处理。
            </div>
        </div>
		
        <div class="news-r">
            <div class="news-r-n">
                @foreach($categories as $k=>$cat)
                        <?php
                        $articles = \App\Models\Article::where('category_id',$cat->id)->where('status',3)->select('id','title','thumbPic')->orderBy('created_at','desc')->limit(3)->get();
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
                                        <div class="side3_title"><a href="/thread-{{$article->id}}.html" target="_blank" >{{$article->title}}
                                            </a></div>
                                        <div class="side3_redu">{{$article->visit_num}}</div>
                                    </div>
                                    <div style="clear:both"></div>
                                </li>
                                <div style="clear:both"></div>
                            @endforeach
                        </ul>
                @endforeach
            </div>
        </div>
    </div>
@endsection
@section('footer')
@include('layouts.footerList')
@endsection