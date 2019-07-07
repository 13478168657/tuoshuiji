<!DOCTYPE html>
<html><head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Cache-Control" content="no-cache">
    <meta http-equiv="Expires" content="0">
    <title>后台管理</title>
    <link href="/admin/login/demo_data/login.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="/admin/js/jquery.min.js"></script>
</head>
<body>
<div class="login_box">
    <div class="login_l_img"><img src="/admin/login/demo_data/login-img.png"></div>
    <div class="login">
        <div class="login_logo"><a href="#"><img src="/admin/login/demo_data/login_logo.png"></a></div>
        <div class="login_name">
            <p>后台管理系统</p>
        </div>
        <form  id="Login" name="Login" method="post" onsubmit="return false;" action="/auth/login">
            <input  placeholder="用户名" id="name" name="username" value=""  type="text">
            <input placeholder="密码" name="password" id="password" type="password">
            <input type="submit" style="width:100%;" name="Submit" value="登录" onclick="postLogin()" />
        </form>
    </div>
    <div class="copyright">祁门红茶网</div>
</div>

</body>
<script type="text/javascript">
    function postLogin(){
        var name = $("#name").val();
        var password = $("#password").val();
//        var captcha = $("#captcha").val();
        var token =  '{{csrf_token()}}';
        var data = {'name':name,'password':password,'_token':token};
        $.ajax({
            url:'/auth/login',
            data:data,
            method:'POST',
            dataType:'json',
            success:function(res){
                if(res.code == 0){
                    window.location.href="/home";
                }else{
                    if(res.code == 2){
                        $("#captcha-msg").text('验证码有误');
                    }else{
                        $("#password-msg").text('用户名或密码错误');
                    }
                    return false;
                }
            }
        });
    }
</script>
</html>


