<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	@yield('title')

	{{--<link rel="stylesheet" href="/css/normalize.css">--}}
	<link rel="stylesheet" href="/css/base.css">
	<link rel="stylesheet" href="/css/public.css">

	<!--轮播图-->
	<link rel="stylesheet" href="/dist/pageSwitch.min.css">
	@yield('css')
	<meta name="baidu-site-verification" content="UIwf5p0taI" />
</head>
<body>
{{--<script>--}}
{{--(function(){--}}
    {{--var bp = document.createElement('script');--}}
    {{--var curProtocol = window.location.protocol.split(':')[0];--}}
    {{--if (curProtocol === 'https'){--}}
   {{--bp.src = 'https://zz.bdstatic.com/linksubmit/push.js';--}}
  {{--}--}}
  {{--else{--}}
  {{--bp.src = 'http://push.zhanzhang.baidu.com/push.js';--}}
  {{--}--}}
    {{--var s = document.getElementsByTagName("script")[0];--}}
    {{--s.parentNode.insertBefore(bp, s);--}}
{{--})();--}}
{{--</script>--}}
@include('layouts.header')

@yield('content')

@yield('footer')
@yield('script')
<!--轮播图strat-->
<script src="js/jquery-1.11.0.min.js" type="text/javascript"></script>
<script src="dist/pageSwitch.min.js"></script>
<script>
	$("#container").PageSwitch({
		direction:'horizontal',
		easing:'ease-in',
		duration:1000,
		autoPlay:true,
		loop:'false'
	});
</script>
<!--轮播图end-->
</body>
</html>