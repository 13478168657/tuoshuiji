@extends('h5.layouts.main')

@section('css')
    <link rel="stylesheet" href="/h5/css/style.css">
@endsection
@section('title')
    @if($baseConfig)
        <title>{{$baseConfig->title}}-{{$baseConfig->name}}</title>
        <meta name="keywords" content="{{$baseConfig->home_key_word}}" />
        <meta name="description" content="{{$baseConfig->home_meta_description}}" />
    @endif
@endsection

@section('content')
    <div class="content_top">
        <div class="arrowl"><a href="/"><img src="/h5/images/home.png" alt="首页" height="22"></a></div>
        <div class="context">祁门红茶网</div>
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
    <header>
        <nav>
            <a target="_blank" href="/">首页</a>
            <a href="/index6.html">头条</a>
            <a href="/index1.html">价格</a>
            <a href="/index4.html">功效</a>
            <a href="/index12.html">知识</a>
            <a href="/index2.html">冲泡</a>
            <a href="/index11.html">图片</a>
            <a href="/index9.html">品牌</a>
        </nav>
    </header>
    @foreach($news as $k => $new)
        @if($k == 0)
    <h3 class="headNew"><a href="/thread-{{$new->id}}.html" title="{{$new->title}}">{{$new->title}}</a></h3>
    <h5 class="subNew">{{mb_substr($new->meta_description,0,32)}}...<a href="/index6.html">[更多]</a></h5>
        @else
                @break;
        @endif
    @endforeach

    <!-- 焦点图 -->
    <div class="imgSwipeMain">
        <div id="slider" class="swipe">
            <div class="swipe-wrap swiper-wrapper">
                @foreach($imageNews as $img)
                <div class="image swiper-slide" style="background:url({{'/uploads/thumb/'.$img->thumbPic}}) center no-repeat;background-size: cover;"> <a href="/thread-{{$img->id}}.html" target="_blank"></a>
                    <div class="title">
                        <p>{{$img->title}}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div id="position"></div>
    </div>

    <!-- Tab切换（高度自适应示范） -->
    <div id="tabBox1" class="tabBox">
        <div class="hd">
            <h3><a href="/index6.html" >头条</a><span>News</span></h3>
            <!--
                <ul>
              <li><a href="javascript:void(0)">政企</a></li><li><a href="javascript:void(0)">专题</a></li>
            </ul>
            -->
        </div>
        <div class="bd" id="tabBox1-bd">
            <div class="con">
                <!-- 高度自适应需添加外层 -->
                <ul>
                    @foreach($news as $new)
                    <li><a href="/thread-{{$new->id}}.html" title="{{$new->title}}">{{$new->title}}</a></li>
                    @endforeach
                </ul>
            </div><div class="con">
                <!-- 高度自适应需添加外层 -->
                <ul>
                    @foreach($news as $new)
                    <li><a href="/thread-{{$new->id}}.html" title="{{$new->title}}">{{$new->title}}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    <a class="readMore" href="/index6.html">进入频道&gt;&gt;</a>
    <script type="text/javascript">
        TouchSlide( { slideCell:"#tabBox1",
            endFun:function(i){ //高度自适应
                var bd = document.getElementById("tabBox1-bd");
                bd.parentNode.style.height = bd.children[i].children[0].offsetHeight+"px";
                if(i>0)bd.parentNode.style.transition="200ms";//添加动画效果
            }
        } );</script>
    <!-- 多图滚动 -->
    <div id="scrollBox" class="scrollBox">
        <div class="bd">
            <ul>
            @foreach($imageNews as $ki => $image)
                @if($ki <=1)
                <li><a class="pic" href="/thread-{{$image->id}}.html"><img _src="/uploads/thumb/{{$image->thumbPic}}" alt="{{$image->title}}" src="/uploads/thumb/{{$image->thumbPic}}" /></a>
                    <p>{{$image->title}}</p>
                </li>
                @endif
            @endforeach
            </ul>
            <ul>
                @foreach($imageNews as $ki => $image)
                @if($ki >1 && $ki <=3)
                <li><a class="pic" href="/thread-{{$image}}.html"><img _src="/uploads/thumb/{{$image->thumbPic}}" alt="{{$image->title}}" src="/uploads/thumb/{{$image->thumbPic}}" /></a>
                    <p>{{$image->title}}</p>
                </li>
                @endif
                @endforeach
            </ul>
            <ul>
                @foreach($imageNews as $ki => $image)
                    @if($ki >3)
                        <li><a class="pic" href="/thread-{{$image->id}}.html"><img _src="/uploads/thumb/{{$image->thumbPic}}" alt="{{$image->title}}" src="/uploads/thumb/{{$image->thumbPic}}" /></a>
                            <p>{{$image->title}}</p>
                        </li>
                    @endif
                @endforeach
            </ul>
        </div>
        <div class="hd"> <span class="prev"></span>
            <ul>
            </ul>
            <span class="next"></span> </div>
    </div>
    <!-- scrollBox E -->
    <script type="text/javascript">
        TouchSlide({
            slideCell:"#scrollBox",
            titCell:".hd ul", //开启自动分页 autoPage:true ，此时设置 titCell 为导航元素包裹层
            effect:"leftLoop",
            autoPage:true, //自动分页
            switchLoad:"_src" //切换加载，真实图片路径为"_src"
        });
    </script>
    <!-- Tab切换 -->
    <div id="tabBox2" class="tabBox">
        <div class="hd">
            <h3><a href="/index1.html" >价格</a><span>Focus</span></h3>

        </div>
        <div class="bd">
            <ul>
                @foreach($priceNews as $price)
                <li><a href="/thread-{{$price->id}}.html" title="{{$price->title}}">{{$price->title}}</a></li>
                @endforeach
            </ul>
        </div>
    </div>
    <a class="readMore" href="/index1.html">进入频道&gt;&gt;</a>
    <script type="text/javascript">TouchSlide( { slideCell:"#tabBox2" } );</script>

    <div class="ad_wap"></div>

    <div id="tabBox3" class="tabBox">
        <div class="hd">
            <h3><a href="/index4.html" >功效</a><span>Tech</span></h3>

        </div>
        <div class="bd">
            <ul>
                @foreach($effectNews as $effect)
                <li><a href="/thread-{{$effect->id}}.html" title="{{$effect->title}}">{{$effect->title}}</a></li>
                @endforeach
            </ul>
        </div>
    </div>
    <a class="readMore" href="/index4.html">进入频道&gt;&gt;</a>
    <script type="text/javascript">TouchSlide( { slideCell:"#tabBox3" } );</script>

    <div id="tabBox4" class="tabBox">
        <div class="hd">
            <h3><a href="/index12.html">知识</a><span></span></h3>

        </div>
        <div class="bd">
            <ul>
                @foreach($knowNews as $know)
                <li><a href="/thread-{{$know->id}}.html" title="{{$know->title}}">{{$know->title}}</a></li>
                @endforeach
            </ul>
        </div>
    </div>
    <a class="readMore" href="/index12.html">进入频道&gt;&gt;</a>
    <script type="text/javascript">TouchSlide( { slideCell:"#tabBox4" } );</script>

    <div id="tabBox5" class="tabBox">
        <div class="hd">
            <h3><a href="/index2.html">冲泡</a><span></span></h3>
        </div>
        <div class="bd">
            <ul>
                @foreach($fillNews as $fill)
                <li><a href="/index{{$fill->id}}.html" title="{{$fill->title}}">{{$fill->title}}</a></li>
                @endforeach
            </ul>
        </div>
    </div>
    <a class="readMore" href="/index2.html">进入频道&gt;&gt;</a>
    <script type="text/javascript">TouchSlide( { slideCell:"#tabBox5" } );</script>

    <div id="tabBox6" class="tabBox">
        <div class="hd">
            <h3><a href="/index9.html">品牌</a><span></span></h3>
        </div>
        <div class="bd">
            <ul>
                @foreach($brandNews as $brand)
                <li><a href="/thread-{{$brand->id}}.html" title="{{$brand->title}}">{{$brand->title}}</a></li>
                @endforeach
            </ul>
        </div>
    </div>
    <a class="readMore" href="/index9.html">进入频道&gt;&gt;</a>
    <div id="tabBox6" class="tabBox">
        <div class="hd">
            <h6>最新资讯请关注我们</h6>
        </div>
        <div class="bd bd-pinpai">
            <ul>
                <li><img src="/images/weixin.jpg" width="100%;"></li>
                <li><img src="/images/tianmao.jpg" width="100%;"></li>
                <li><img src="/images/xiaochengxu.jpg" width="100%;"></li>
            </ul>
        </div>
    </div>
    <script type="text/javascript">TouchSlide( { slideCell:"#tabBox6" } );</script>
    <!-- 效果导航 -->
    <div class="effectNav">
        <h3><a href="/">首页</a>&#160;&#160;&#160;|&#160;&#160;&#160;<a href="list.php?tid=60" >帮助</a></h3>
        <p>首页 | 头条 | 价格 | 功效 | 知识 | 冲泡 | 图片 | 品牌 | 茶学院</p>
        <p></p>
    </div>
    <div class="footer text_center color_fff plr30 lt f42">
        <ul class="clearfix">
            <li class="fl border-radius-img baomingBtn">
                <a href="javascript:void(0)" class="color_fff">
                    <img class="service-icon" src="/images/zixun.png" alt="">

                    微信咨询
                </a>
            </li>
            <li class="fr border-radius-img relative" onclick="ac()">
                <a href="javascript:void(0)" class="color_fff relative">


                    <span class="zizi"><a href="tel:15705590919">电话：15705590919</a> </span>
                </a>
            </li>
        </ul>
    </div>
    <div id="goTopBtn"><img src="/h5/images/top.png" width="30"></div>
    <script src="/h5/js/top.js" type="text/javascript"></script>
    <script type="text/javascript">goTopEx();</script>
@endsection