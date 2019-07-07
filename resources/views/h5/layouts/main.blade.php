<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
@yield('css')
@yield('title')
    <script type="text/javascript" src="/h5/js/jquery1.42.min.js"></script>
    <script type="text/javascript" src="/h5/js/jquery.superslide.2.1.1.js"></script>
    <script src="/h5/js/touchslide.1.1.js"></script>
    <script type="text/javascript" src="/h5/js/idangerous.swiper.min.js"></script>
    <script type="text/javascript" src="/h5/js/swipe.js"></script>
    <script>
        $(function(){
            $("#dhmore").toggle(function(){
                // $("#daohang_ul").animate({height:"90px"},0);
                // $("#navlayer").slideDown("slow");
                $("#navlayer").show("slow");
            },function(){
                //$("#daohang_ul").animate({height:"30px"},0);
                // $("#navlayer").slideUp("slow");
                $("#navlayer").hide("slow");
            })

        });
    </script>
</head>

<body>
@include('h5.layouts.head')
@yield('content')
<!-- 头条 -->
</body>
</html>