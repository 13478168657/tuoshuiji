<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	@yield('title')
	@yield('css')
	<link rel="stylesheet" href="/css/base.css">
	{{--<link rel="stylesheet" href="/css/normalize.css">--}}
	<link rel="stylesheet" href="/css/global.css">
	<link rel="stylesheet" href="/css/index.css">
	<script type="text/javascript" src="/js/jquery-1.7.2.min.js"></script>
	<script>
		$(function(){
			$('#friendlinks i:last').remove();
			$('.slides li:first div:gt(4)').appendTo($('.slides li:eq(1)'));
		})
		function randomsort(a, b) {
			return Math.random()>.5 ? -1 : 1;
		}
	</script>
	<meta name="baidu-site-verification" content="UIwf5p0taI" />
	<script type="text/javascript">  
		 //平台、设备和操作系统  
		 var system = {  
		 win: false,
		 mac: false,  
		 xll: false,  
		 ipad:false
		 };  
		 //检测平台  
		 var p = navigator.platform;  
		 system.win = p.indexOf("Win") == 0;  
		 system.mac = p.indexOf("Mac") == 0;  
		 system.x11 = (p == "X11") || (p.indexOf("Linux") == 0);  
		 system.ipad = (navigator.userAgent.match(/iPad/i) != null)?true:false;  
		 //跳转语句，如果是手机访问就自动跳转到wap.baidu.com页面  
		 if (system.win || system.mac || system.xll||system.ipad) {  
		   } else {  
			window.location.href = "http://m.qimenhongcha.com.cn";
		 }  
		   </script>  
</head>
<body>
<script>
(function(){
    var bp = document.createElement('script');
    var curProtocol = window.location.protocol.split(':')[0];
    if (curProtocol === 'https'){
   bp.src = 'https://zz.bdstatic.com/linksubmit/push.js';
  }
  else{
  bp.src = 'http://push.zhanzhang.baidu.com/push.js';
  }
    var s = document.getElementsByTagName("script")[0];
    s.parentNode.insertBefore(bp, s);
})();
</script>
@include('layouts.header')

@yield('content')
<!--轮播图  end-->
<!--footer start-->
<!--footer end-->
@yield('footer')
@yield('script')
<script src="/js/jquery.min.js"></script>
<script src="/js/ft-carousel.min.js"></script>
<script type="text/javascript">
	$("#carousel_1").FtCarousel();

	$("#carousel_2").FtCarousel({
		index: 1,
		auto: false
	});

	$("#carousel_3").FtCarousel({
		index: 0,
		auto: true,
		time: 3000,
		indicators: false,
		buttons: true
	});
</script>

<script type="text/javascript" src="js/slider.js"></script>
<script type="text/javascript">

	$(document).ready(function() {
		//美图切换
		$('#demo01').flexslider({
			animation: "slide",
			direction:"horizontal",
			easing:"swing"
		});
	});

</script>
</body>
</html>