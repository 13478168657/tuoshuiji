@extends('english.layouts.main')

@section('title')
    @if($baseConfig)
        <title>{{$baseConfig->title}}-{{$baseConfig->name}}</title>
        <meta name="keywords" content="{{$baseConfig->home_key_word}}" />
        <meta name="description" content="{{$baseConfig->home_meta_description}}" />
    @endif
@endsection
@section('css')
    <link rel="stylesheet" href="/css/home.css">
    <link rel="stylesheet" href="/css/pintuer.css">
    <link rel="stylesheet" href="/css/index-14.css">
    <link rel="stylesheet" href="/css/index-15.css">
@endsection
@section('content')

<!--产品展示start-->

<div id="fh5co-product-list" class="layout">
    <div class="bg-product">
        <div class="container">
            <div class="line fh5co-heading text-center not-animated"  data-animate="fadeInUp" data-delay="200">
                <h2>产品展示</h2>
                <span>叠螺式污泥脱水机+粉体自动溶解泡药机+螺旋输送机+格栅除污机设备</span> </div>
            <div class="line show-list">
                <div class="line-big show-product  not-animated"  data-animate="bounceIn" data-delay="200">
                    @foreach($productShow as $show)
                    <div class="xm3 xs3 xl6 margin-big-bottom text-center"><a href="/en/thread-{{$show->id}}.html" title="{{$show->title}}">
                            <div class="media-img" style="height: 140px;">
                                <!-- <div class="zoomimgs" style="background-image:url(1-1f915120246.jpg)"></div> -->
                                <div class="zoomimgs">
                                    <img src="/uploads/thumb/{{$show->thumbPic}}" alt="{{$show->title}}" width="100%">
                                </div>
                            </div>
                            <h3>{{$show->title}}</h3>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

<!--产品展示end-->
<!--优势strat-->
<div class="youshi w">
    <img src="/images/a.jpg" alt="" width="1000px">
    <img src="/images/b.jpg" alt="" width="1000px">
    <img src="/images/c.jpg" alt="" width="1000px">
</div>

<!--优势end-->
<!--案例  start-->
<div id="fh5co-product-list" class="layout">
    <div class="bg-product">
        <div class="container">
            <div class="line fh5co-heading text-center not-animated"  data-animate="fadeInUp" data-delay="200">
                <h2>成功案例</h2>
                <span>叠螺式污泥脱水机+粉体自动溶解泡药机+螺旋输送机+格栅除污机设备</span> </div>
            <div class="line show-list">
                <div class="line-big show-product  not-animated"  data-animate="bounceIn" data-delay="200">
                    @foreach($successExamples as $success)
                    <div class="xm3 xs3 xl6 margin-big-bottom text-center"><a href="/en/thread-{{$success->id}}.html" title="{{$success->title}}">
                            <div class="media-img" style="height: 140px;">
                                <!-- <div class="zoomimgs" style="background-image:url(/images/1-1f915120246.jpg)"></div> -->
                                <div class="zoomimgs">
                                    <img src="/uploads/thumb/{{$success->thumbPic}}" alt="{{$success->title}}" width="100%">
                                </div>
                            </div>
                            <h3>{{$success->title}}</h3>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<!--案例  end-->
<div class="index-14">
    <div class="wrap">
        <div class="left">
            <div class="title1">
                <h3>常见问题</h3>
                <a href="/en/index9.html" class="more">更多+</a> </div>
            <div class="group clearfix">
                <div class="img fl"><img src="/images/p.jpg" alt="" width="112px;" height="112px;"></div>
                <ul class="fl">
                    @foreach($commonQuestions as $k => $question)
                        <?php
                            $k++;
                            $number = '0'.$k;
                        ?>
                    <li> <i>{{$number}}</i>
                        <div class="info">
                            <h3><a href="/en/thread-{{$question->id}}.html">{{$question->title}}</a></h3>
                            <p><a href="/en/thread-{{$question->id}}.html">FH型循环式齿耙除污机FH型循环式齿耙除污机...</a></p>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="right">
            <div class="title1">
                <h3>新闻动态</h3>
                <a href="/en/index6.html" class="more">更多+</a> </div>
            <div class="group clearfix">
                <div class="img fl"><img src="/images/p.jpg" alt="健身行业新闻动态" width="112px;" height="112px;"></div>
                <ul class="fl">
                    @foreach($newsActives as $news)
                    <li>
                        <a href="/en/thread-{{$news->id}}.html">{{$news->title}}<span class="date">{{date('Y-m-d',strtotime($news->created_at))}}</span></a>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
<br>
@include('english.layouts.footer')

</div>

</div>
@endsection