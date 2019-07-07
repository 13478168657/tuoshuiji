<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
	@yield('title')
	<link rel="stylesheet" href="/admin/bootstrap/css/bootstrap.min.css"/>
	
	<!-- 可选的 Bootstrap 主题文件（一般不用引入） -->
	<link rel="stylesheet" href="/admin/bootstrap/css/bootstrap-theme.min.css" />
	<script src="/admin/jquery/1.11.1/jquery.min.js"></script>
	<script src="/admin/js/My97DatePicker/WdatePicker.js"></script>
	<!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
	<script src="/admin/bootstrap/js/bootstrap.min.js"></script>
	<link href="/admin/css/left.css" rel="stylesheet"  />
	<link href="/admin/css/head.css" rel="stylesheet"/>
	<link href="/admin/css/main.css" rel="stylesheet"/>
	<link href="/admin/css/bs.css" rel="stylesheet"/>
	<script src="/admin/js/left.js"></script>
</head>
<body>
@include('admin.layouts.header')
<div id="container" class="container-fluid">
	@include('admin.layouts.leftmenu')
	<script>
	<?php
		if(!isset($key)){
			$key = 0;
		}
	?>
	var key = '{{$key}}';
	var lefturl = window.location.pathname;
    var patt = /.*?\/$/;
    if(patt.test(lefturl)){
        lefturl = lefturl.substr(0, (lefturl.length-1) );
    }
    if(lefturl == '/manage/info' || lefturl == '/manage/add' || lefturl == '/manage/edit'){
    	var className = '.putao_'+key;
    	$(className).addClass('active');
    	$(className).parent('.side-ul-menu').css("display","block");
    	$(className).parent().parent().find('.toggle-icon').eq(0).removeClass('glyphicon-menu-down').addClass('glyphicon-menu-left');
    }
	var s = '/manage/add';
        if(lefturl == '/category/list' || lefturl == '/category/create' || lefturl == '/category/edit'){
		$('.manage_base1').addClass('active');
		$('.manage_base1').parent('.side-ul-menu').css("display","block");
		$('.manage_base1').parent().parent().find('.toggle-icon').eq(0).removeClass('glyphicon-menu-down').addClass('glyphicon-menu-left');
	}
    if(lefturl == '/user/list' || lefturl == '/user/edit' || lefturl == '/user/add'){
    	$('.user-list').addClass('active');
    	$('.user-list').parent('.side-ul-menu').css("display","block");
    	$('.user-list').parent().parent().find('.toggle-icon').eq(0).removeClass('glyphicon-menu-down').addClass('glyphicon-menu-left');
    }
    if(lefturl == '/consult/list' || lefturl == '/consult/create' || lefturl == '/consult/edit'){
    	$('.consult-us').addClass('active');
    	$('.consult-us').parent('.side-ul-menu').css("display","block");
    	$('.consult-us').parent().parent().find('.toggle-icon').eq(0).removeClass('glyphicon-menu-down').addClass('glyphicon-menu-left');
    }
    if(lefturl == '/payment/list' || lefturl == '/payment/create' || lefturl == '/payment/edit'){
    	$('.payment-style').addClass('active');
    	$('.payment-style').parent('.side-ul-menu').css("display","block");
    	$('.payment-style').parent().parent().find('.toggle-icon').eq(0).removeClass('glyphicon-menu-down').addClass('glyphicon-menu-left');
    }
    if(lefturl == '/instruction/list' || lefturl == '/instruction/create' || lefturl == '/instruction/edit'){
    	$('.delivery-instruction').addClass('active');
    	$('.delivery-instruction').parent('.side-ul-menu').css("display","block");
    	$('.delivery-instruction').parent().parent().find('.toggle-icon').eq(0).removeClass('glyphicon-menu-down').addClass('glyphicon-menu-left');
    }
    if(lefturl == '/notice/list' || lefturl == '/notice/create' || lefturl == '/notice/edit'){
    	$('.delivery-notice').addClass('active');
    	$('.delivery-notice').parent('.side-ul-menu').css("display","block");
    	$('.delivery-notice').parent().parent().find('.toggle-icon').eq(0).removeClass('glyphicon-menu-down').addClass('glyphicon-menu-left');
    }
	if(lefturl == '/about/list' || lefturl == '/about/create' || lefturl == '/about/edit'){
		$('.delivery-about').addClass('active');
		$('.delivery-about').parent('.side-ul-menu').css("display","block");
		$('.delivery-about').parent().parent().find('.toggle-icon').eq(0).removeClass('glyphicon-menu-down').addClass('glyphicon-menu-left');
	}
    if(lefturl == '/link/list' || lefturl == '/link/create' || lefturl == '/link/edit'){
    	$('.link-list').addClass('active');
    	$('.link-list').parent('.side-ul-menu').css("display","block");
    	$('.link-list').parent().parent().find('.toggle-icon').eq(0).removeClass('glyphicon-menu-down').addClass('glyphicon-menu-left');
    }
    if(lefturl == '/ad/list' || lefturl == '/ad/create' || lefturl == '/ad/edit'){
    	$('.ad-list').addClass('active');
    	$('.ad-list').parent('.side-ul-menu').css("display","block");
    	$('.ad-list').parent().parent().find('.toggle-icon').eq(0).removeClass('glyphicon-menu-down').addClass('glyphicon-menu-left');
    }
    if(lefturl == '/adSpace/list' || lefturl == '/adSpace/create' || lefturl == '/adSpace/edit'){
    	$('.adSpace-list').addClass('active');
    	$('.adSpace-list').parent('.side-ul-menu').css("display","block");
    	$('.adSpace-list').parent().parent().find('.toggle-icon').eq(0).removeClass('glyphicon-menu-down').addClass('glyphicon-menu-left');
    }

	if(lefturl == '/goods/list' || lefturl == '/goods/create' || lefturl == '/goods/edit'){
		$('.putao_goods').addClass('active');
		$('.putao_goods').parent('.side-ul-menu').css("display","block");
		$('.putao_goods').parent().parent().find('.toggle-icon').eq(0).removeClass('glyphicon-menu-down').addClass('glyphicon-menu-left');
	}

	if(lefturl == '/base/config' || lefturl == '/base/create' || lefturl == '/base/edit'){
		$('.base-list').addClass('active');
		$('.base-list').parent('.side-ul-menu').css("display","block");
		$('.base-list').parent().parent().find('.toggle-icon').eq(0).removeClass('glyphicon-menu-down').addClass('glyphicon-menu-left');
	}
</script>
	@yield('content')
</div>
@yield('css')
@yield('script')

</body>
</html>