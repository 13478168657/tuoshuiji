@extends('english.layouts.main')
@section('title')
    @if($page>=2)
        <title>{{$category->meta_title}}-祁门红茶-第{{$page}}页</title>
    @else
        <title>{{$category->meta_title}}-祁门红茶</title>
    @endif
    <meta name="keywords" content="{{$category->meta_keyword}}" />
    <meta name="description" content="{{$category->meta_description}}" />
@endsection
@section('css')
    <link rel="stylesheet" href="/css/list.css">
    <link rel="stylesheet" href="/css/details.css">
    <link href="/css/baicha.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" rev="stylesheet" href="/css/global.css" type="text/css" media="all" />
    <link rel="stylesheet" rev="stylesheet" href="/css/listglobal.css" type="text/css" media="all" />
    <link rel="stylesheet" href="/css/lunbotu.css">
@endsection

@section('content')
<script>
    $(function(){
        $('#friendlinks i:last').remove();
        $('.slides li:first div:gt(4)').appendTo($('.slides li:eq(1)'));
    })
    function randomsort(a, b) {
        return Math.random()>.5 ? -1 : 1;
    }
</script>
<!--breadCrumbs_begin-->
<div id="breadCrumbs">
    <a href="/" target="_self" title="首页" class="CurrChnlCls">首页</a>&nbsp;&gt;&nbsp;<a href="/index{{$category->id}}.html" target="_self" title="{{$category->name}}" class="CurrChnlCls">{{$category->name}}</a>
</div>
<!--breadCrumbs_end-->
<!--main_begin-->
<div id="main" class="picList noRightS">
    <ul class="list">
        @foreach($articles as $article)
        <li>
            <a href="/thread-{{$article->id}}.html" target="_self"><img src="/uploads/thumb/{{$article->thumbPic}}" alt="{{$article->title}}"/></a>
            <h2>
                <a href="/thread-{{$article->id}}.html" target="_self" title="{{$article->title}}">{{$article->title}}</a>
            </h2>
            <p class="info"><span>{{date('Y-m-d',strtotime($article->created_at))}}</span></p></li>
        @endforeach
    </ul>
</div>
<div class="pagination">
    <?php
    echo htmlspecialchars_decode($pageSize);
    ?>
</div>
@endsection
@section('footer')
    @include('layouts.footerList')
@endsection