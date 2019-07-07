@extends('layouts.main')
@section('title')
    @if($baseConfig)
        <title>{{$baseConfig->title}}-{{$baseConfig->name}}</title>
        <meta name="keywords" content="{{$baseConfig->home_key_word}}" />
        <meta name="description" content="{{$baseConfig->home_meta_description}}" />
    @endif
@endsection
@section('css')
    <link rel="stylesheet" href="/css/lunbotu.css">
    <link href="/css/baicha.css" rel="stylesheet" type="text/css" />
@endsection
@section('content')
            <!--content start-->
    <div class="content w  clearfix">
        <div class="content-l">
            <div class="example">
                <div class="ft-carousel" id="carousel_1">
                    <ul class="carousel-inner">
                        @foreach($lunbo as $lb)
                        <li class="carousel-item"><img src="/uploads/thumb/{{$lb->photo}}" /></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div class="content-m">
            <div class="news_text" id="ajbcxw">
                @if($firstNews)
                <h2 class="red"><a href="/thread-{{$firstNews->id}}.html" target="_blank">{{mb_substr($firstNews->title,0,20)}}</a>
                    <p>{{$firstNews->meta_description}}</p>
                </h2>
                @endif
                @if($secondNews)
                <h3>
                    @foreach($secondNews as $second)
                    <a href="/thread-{{$second->id}}.html" title="{{$second->title}}" target="_blank">{{mb_substr($second->title,0,9)}}</a>
                    @endforeach
                    <div class="clear"></div>
                </h3>
                @endif
            </div>
            <div class="news_img clearfix">
                @if($thirdNews)
                    @foreach($thirdNews as $third)
                        <div class="img ">
                            <div class="imgfl">
                                <a href="thread-{{$third->id}}.html" target="_blank">
                                    <span style="position:relative">
                                        <span class="ImgBox">
                                            <img src="/uploads/thumb/{{$third->thumbPic}}">
                                        </span>
                                    </span>
                                </a>
                            </div>
                            <a href="/thread-{{$third->id}}.html">{{mb_substr($third->title,0,14)}}</a>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
        <div class="content-r">
            <div class="box mb25" id="rmw_fangtan">
			
			<h3><a href=""><span class="rmicon"></span>祁门红茶宣传视频</a></h3>
				<embed src='http://player.youku.com/player.php/sid/XNDE3NzczOTA2MA==/v.swf' allowFullScreen='true' quality='high' width='286' height='200' align='middle' allowScriptAccess='always' type='application/x-shockwave-flash'></embed>
				<br/><br/>
                <h3><a href="/index14.html"><span class="rmicon"></span>平台公告</a></h3>
              
                <ul class="list14">
                    @foreach($publicNews as $publicNew)
                    <li><a href="/thread-{{$publicNew->id}}.html">{{mb_substr($publicNew->title,0,14)}}</a></li>
                    @endforeach
                </ul>
				<br/><br/>
				
            </div>
        </div>
		
    </div>
    <div class="contentq w  clearfix">
        <div class="contentq-l">
            <div class="example">
                <div class="ft-carousel" id="carousel_1">
                    <ul class="carousel-inner left-inner clearfix">
                        <li><a href="/index9.html">红茶品牌</a></li>
                    </ul>
                    <ul class="news_img_xiao clearfix">
                        @foreach($knowNews as $knKey => $knew)
                            @if($knKey <2)
                                <div class="imgll imgfll">
                                    <a href="/thread-{{$knew->id}}.html" target="_blank"><span class="ImgBox"><img src="/uploads/thumb/{{$knew->thumbPic}}"></span>{{mb_substr($knew->title,0,10)}}</a>
                                </div>
                            @else
                                <?php
                                    break;
                                ?>
                            @endif
                        @endforeach
                    </ul>
                    <ul class="text-left">
                        @foreach($knowNews as $knKey => $knew)
                            @if($knKey >= 2)
                        <li><a href="/thread-{{$knew->id}}.html">{{mb_substr($knew->title,0,25)}}</a></li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div class="contentq-m">
            <div class="news_text" id="ajbcxw">
                @foreach($priceNews as $pKey => $pNew)
                @if($pKey == 0)
                <h2 class="red"><a href="/thread-{{$pNew->id}}.html" title="" target="_blank">{{mb_substr($pNew->title,0,20)}}</a>
                    <p>{{$pNew->meta_description}}</p>
                </h2>
                @else
                    <?php
                        break;
                    ?>
                @endif
                @endforeach
                <h3>
                    @foreach($priceNews as $pKey => $pNew)
                        @if($pKey >=1 && $pKey <=6)
                            <a href="/thread-{{$pNew->id}}.html" title="" target="_blank">{{mb_substr($pNew->title,0,9)}}</a>
                        @endif
                    @endforeach
                    <div class="clear"></div>
                </h3>
            </div>
            <div class="news_img clearfix">
                @foreach($priceNews as $pKey => $pNew)
                    @if($pKey > 6)
                        <div class="img ">
                            <div class="imgfl">
                                <a href="/thread-{{$pNew->id}}.html" target="_blank">
                                    <span style="position:relative">
                                        <span class="ImgBox">
                                            <img src="/uploads/thumb/{{$pNew->thumbPic}}">
                                        </span>
                                    </span>
                                </a>
                            </div>
                            <a href="/thread-{{$pNew->id}}.html">{{mb_substr($pNew->title,0,14)}}</a>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
        <div class="content-r">
            <div class="box mb25" id="rmw_fangtan">
                <h3><a href="/index2.html"><span class="rmicon"></span>红茶冲泡方法</a></h3>
                @foreach($fillNews as $fillKey => $fillNew)
                    @if($fillKey == 0)
                <p class="imgstyle"><a href="/thread-{{$fillNew->id}}.html" target="_blank"><img src="/uploads/thumb/{{$fillNew->thumbPic}}" alt="{{$fillNew->title}}" width="130" height="90" border="0"></a>{{$fillNew->title}}<a href="/thread-{{$fillNew->id}}.html">［阅读] </a>
                    @else
                        <?php
                            break;
                        ?>
                    @endif
                </p>
                @endforeach
                <ul class="list14">
                    @foreach($fillNews as $fillKey => $fillNew)
                        @if($fillKey > 0)
                    <li><a href="/thread-{{$fillNew->id}}.html">{{mb_substr($fillNew->title,0,16)}}</a></li>
                        @endif
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    <!--content end-->
    <!--content start-->
    <div class="contentq w  clearfix">
        <div class="contentq-l">
            <div class="example">
                <div class="ft-carousel" id="carousel_1">
                    <ul class="carousel-inner left-inner clearfix">
                        <li><a href="/index12.html">红茶知识</a></li>
                    </ul>
                    <ul class="news_img_xiao clearfix">
                        @foreach($brandNews as $brandKey => $brandNew)
                            @if($brandKey <= 1)
                        <div class="imgll imgfll">
                            <a href="/thread-{{$brandNew->id}}.html" target="_blank"><span class="ImgBox"><img src="/uploads/thumb/{{$brandNew->thumbPic}}"></span>
                                <p>{{mb_substr($brandNew->title,0,10)}}</p>
                            </a>
                        </div>
                            @else
                                <?php
                                    break;
                                ?>
                            @endif
                        @endforeach
                    </ul>
                    <ul class="text-left">
                        @foreach($brandNews as $brandKey => $brandNew)
                            @if($brandKey > 1)
                                <li><a href="/thread-{{$brandNew->id}}.html">{{mb_substr($brandNew->title,0,20)}}</a></li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div class="contentq-m">
            <div class="news_text" id="ajbcxw">
                @foreach($studyNews as $styKey => $studyNew)
                    @if($styKey == 0)
                        <h2 class="red"><a href="/thread-{{$studyNew->id}}.html" title="{{$studyNew->title}}" target="_blank">{{mb_substr($studyNew->title,0,20)}}</a>
                        <p>{{$studyNew->meta_description}}</p>
                    @else
                        <?php
                           break;
                        ?>
                    @endif
                </h2>
                @endforeach
                <h3>
                    @foreach($studyNews as $styKey => $studyNew)
                        @if($styKey >0 && $styKey <= 6)
                            <a href="/thread-{{$studyNew->id}}.html" title="" target="_blank">{{mb_substr($studyNew->title,0,9)}}</a>
                        @endif
                    @endforeach

                    <div class="clear"></div>
                </h3>
            </div>
            <div class="news_img clearfix">
                @foreach($studyNews as $styKey => $studyNew)
                    @if($styKey > 6)
                        <div class="img">
                            <div class="imgfl"><a href="/thread-{{$studyNew->id}}.html" target="_blank"><span style="position:relative"><span class="ImgBox"><img src="/uploads/thumb/{{$studyNew->thumbPic}}"></span></a> </div>
                            <a href="">{{mb_substr($studyNew->title,0,14)}}</a>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>

        <div class="content-r">
            <div class="box mb25" id="rmw_fangtan">
                <h3><a href="/index4.html"><span class="rmicon"></span>红茶功效</a></h3>
                @foreach($effectNews as $effKey => $effNew)
                    @if($effKey == 0)
                <p class="imgstyle">
                    <a href="/thread-{{$effNew->id}}.html" target="_blank">
                        <img src="/uploads/thumb/{{$effNew->thumbPic}}" alt=" " width="130" height="90" border="0">
                    </a>{{$effNew->title}}<a href="/thread-{{$effNew->id}}.html">［阅读] </a>
                </p>
                    @else
                        <?php
                        break;
                        ?>
                    @endif
                @endforeach
                <ul class="list14">
                    @foreach($effectNews as $effKey => $effNew)
                        @if($effKey > 0)
                            <li><a href="/thread-{{$effNew->id}}.html">{{mb_substr($effNew->title,0,16)}}</a></li>
                        @endif
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    <!--content end-->
    <!--轮播图 start-->
    <div class="float_nav" id="float"></div>
    <div class="wrapper">

        <div id="demo01" class="flexslider">
            <ul class="slides">
                <li>
                @foreach($imageNews as $imgKey => $imgNew)
                    <div class="focuspic pic{{$imgKey+1}}">
                        <a href="/thread-{{$imgNew->id}}.html">
                            <p class="img"><span class="ImgBox"><img src="/uploads/thumb/{{$imgNew->thumbPic}}"></span><em>{{mb_substr($imgNew->title,0,15)}}</em><i></i></p>
                        </a>
                    </div>
                @endforeach
                </li>
                <li>

                </li>
            </ul>
        </div>

    </div>
    <script type="text/javascript">
        $('.search').click(function(){
            var wd= $("input[name='keyword']").val();
            window.location.href = '/search.html?wd='+wd;
        });
    </script>
@endsection
@section('footer')
@include('layouts.footer')
@endsection