@extends('layouts.main')
@section('title')
    @if($page>=2)
        <title>祁门红茶-第{{$page}}页</title>
    @else
        <title>祁门红茶网</title>
    @endif
    <meta name="keywords" content="" />
    <meta name="description" content="" />
@endsection
@section('css')
    <link rel="stylesheet" href="/css/list.css">
    <link rel="stylesheet" href="/css/details.css">
    {{--<link href="/css/baicha.css" rel="stylesheet" type="text/css" />--}}
@endsection
@section('content')
    <div class="news w clearfix">
        <div class="news-l">
            <div class="mainLeft">

                <ul class="side_class4">
                    @foreach($articles as $article)
                        <li>
                            <div class="limg">
                                <a href="/thread-{{$article->id}}.html" target="_blank" >
                                    <img src="/uploads/thumb/{{$article->thumbPic}}" alt="{{$article->title}}"/>
                                </a>
                            </div>
                            <div class="rtext">
                                <div class="side3_title"><a href="/thread-{{$article->id}}.html" target="_blank" >{{$article->title}}
                                    </a></div>
                                <div class="side2_title"><a href="/thread-{{$article->id}}.html" target="_blank" >{{(mb_strlen($article->meta_description)>=130)?mb_substr($article->meta_description,0,130).'...':$article->meta_description}}</a></div>
                                <div class="side3_redu">{{$article->visit_num}}</div>
                            </div>
                            <div style="clear:both"></div>
                        </li>
                    @endforeach
                </ul>
                @if($total == 0)
                    <div style="text-align: center;">暂无数据</div>
                @endif
            </div>
            <div class="pagination">
                <?php
                echo htmlspecialchars_decode($pageSize);
                ?>
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
                            <div style=" clear:both"></div>
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