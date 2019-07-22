@extends('admin.layouts.main')
@section('title')
    <title>后台首页</title>
@endsection
@section('content')
    <div class="main" id="mainWrapper">
        <h3>文章编辑</h3>
        <div class="wrapper table-scroll-wrapper">
            <div class="row">
                <div class='col-md-12'>
                    <div class="table-responsive">
                        <form class="form-inline" method="post" enctype="multipart/form-data" id="articleSubmit" action="/manage/postEdit">
                            {{csrf_field()}}
                            <input type="hidden" type="" name="category_id" value="{{$category_id}}"/>
                            <input type="hidden" name="key" value="{{$key}}"/>
                            <input type="hidden" name="id" value="{{$article->id}}"/>
                            <table class="table table-condensed table-add">
                                <tr>
                                    <th style="width:10%;">
                                        <label for="case_foreman_id">标题:</label>
                                    </th>
                                    <td style="width:90%;">
                                        <div class="form-group">                                                                <input type="text" name="title" value="{{$article->title}}" class="form-control" style="width:350px;" id="inputPassword2" placeholder="标题">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th style="width:10%;">
                                        <label for="case_foreman_id">作者:</label>
                                    </th>
                                    <td style="width:90%;">
                                        <div class="form-group">                                                                <input type="text" name="author" class="form-control" id="inputPassword2" value="{{$article->author}}" style="width:350px;" placeholder="作者">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th style="width:10%;">
                                        <label for="case_foreman_id">出处:</label>
                                    </th>
                                    <td style="width:90%;">
                                        <div class="form-group">                                                                <input type="text" name="source" value="{{$article->source}}" class="form-control" style="width:350px;" id="inputPassword2" placeholder="出处">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th style="width:10%;">
                                        <label for="case_foreman_id">标题图:</label>
                                    </th>
                                    <td style="width:90%;">                                                                                      <input type="file" name="thumbPic" class="" id="">
                                        <div class="image_upload"></div>
                                        @if($article->thumbPic)
                                        <div class="img_span">
                                            <img class="img" src="/uploads/thumb/{{$article->thumbPic}}" style="width:80px;height:80px;margin-left:8px;"><span onclick="delImgUrl(this);" class="image_icon"></span>
                                        </div>
                                        @endif
                                        <input type="hidden" name="image" value=""/>
                                    </td>
                                </tr>
                                <tr>
                                    <th style="width:10%;">
                                        <label for="case_foreman_id">meta关键字:</label>
                                    </th>
                                    <td style="width:90%;">
                                        <div class="form-group">                                                                <input type="text" class="form-control" id="inputPassword2" name="meta_keyword" style="width:350px;" value="{{$article->meta_keyword}}"  size="70" maxlength="250" placeholder="meta关键字">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th style="width:10%;">
                                        <label for="case_foreman_id">meta描述:</label>
                                    </th>
                                    <td style="width:90%;">
                                        <div class="form-group">                                                                 <textarea type="text" size="90" style="width:350px;height:80px;" maxlength="350" class="form-control" id="inputPassword2"  name="meta_description" placeholder="meta描述">{{$article->meta_description}}</textarea>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        <label for="case_title">状态:</label>
                                    </th>
                                    <td>
                                        <div class="form-group">
                                            <label class="radio-inline">
                                                <input type="radio" name="status" id="inlineRadio1" {{$article->status==1?"checked":''}} value="1"> 不通过
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="status" id="inlineRadio2" {{$article->status==2?"checked":''}} value="2"> 待审核
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="status" id="inlineRadio3" {{$article->status==3?"checked":''}} value="3"> 通过
                                            </label>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th><label for="case_description">内容:</label>
                                    </th>
                                    <td>
                                        <div id="div1">

                                        </div>
                                    </td>
                                </tr>
                                <input type="hidden" id="detail" name="detail" value="{{$article->content}}" >
                                {{--<div class="show" style="display:none;">--}}
                                    {{--<?php--}}
                                        {{--echo htmlspecialchars_decode($article->content);--}}
                                    {{--?>--}}
                                {{--</div>--}}
                                <tr>
                                    <th></th>
                                    <td>
                                        <button type="submit" class="btn btn-sm btn-primary col-md-offset-4">提交</button>
                                    </td>
                                </tr>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script type="text/javascript" src="/admin/wangEditor/release/wangEditor.js"></script>
    <script type="text/javascript">
        var _token = '{{csrf_token()}}'
        var E = window.wangEditor
        var editor = new E('#div1')

        editor.customConfig.uploadImgServer = "/article/editUpload";  // 上传图片到服务器
        editor.customConfig.uploadFileName = "file";      //文件名称  也就是你在后台接受的 参数值
        editor.customConfig.uploadImgParams = {
            _token: _token
        }
        editor.customConfig.uploadImgHeaders = {    //header头信息
            'Accept': 'text/x-json'
        }
        // 将图片大小限制为 3M
        editor.customConfig.uploadImgMaxSize = 3 * 1024 * 1024   //默认为5M
        editor.customConfig.uploadImgShowBase64 = false;   // 使用 base64 保存图片

        editor.customConfig.debug = true; //是否开启Debug 默认为false 建议开启 可以看到错误
        //图片在编辑器中回显
        editor.customConfig.uploadImgHooks = {
            error: function (xhr, editor) {
                alert("2：" + xhr + "请查看你的json格式是否正确，图片并没有上传");
                // 图片上传出错时触发  如果是这块报错 就说明文件没有上传上去，直接看自己的json信息。是否正确
            },
            fail: function (xhr, editor, result) {
                //  如果在这出现的错误 就说明图片上传成功了 但是没有回显在编辑器中，我在这做的是在原有的json 中添加了
                //  一个url的key（参数）这个参数在 customInsert也用到
                //
                alert("1：" + xhr + "请查看你的json格式是否正确，图片上传了，但是并没有回显");
            },
            success:function(xhr, editor, result){
                //成功 不需要alert 当然你可以使用console.log 查看自己的成功json情况
                //console.log(result)
                // insertImg('https://ss0.bdstatic.com/5aV1bjqh_Q23odCf/static/superman/img/logo/bd_logo1_31bdc765.png')
            },
            customInsert: function (insertImg, result, editor) {

                insertImg(result.url);
            }
        };
        editor.customConfig.showLinkImg = true; //是否开启网络图片，默认开启的。
        editor.create()
        <?php
            $content = $article->content;
        ?>
        var v = $("#detail").val();
        editor.txt.html(v)
    </script>
    <!-- page specific plugin scripts -->
    <script src="/admin/js/upload.js"></script>
    <script src="/admin/js/mobileBUGFix.mini.js"></script>
    <script>
        $("input[name='thumbPic']").UploadImg({
            url : '/article/upload',
            // width : '320',
            //height : '200',
            quality : '0.8', //压缩率，默认值为0.8
            // 如果quality是1 宽和高都未设定 则上传原图
            mixsize : '10000000',
            //type : 'image/png,image/jpg,image/jpeg,image/pjpeg,image/gif,image/bmp,image/x-png',
            before : function(blob){
                var img = '<div class="img_span">'+'<img src="'+blob+'" class="img"/><span onclick="delImgUrl(this);" class="image_icon"></span></div>';
                $('.image_upload').append(img);
                $("input[name='image']").val(blob);
            },
            error : function(res){
                $('#img').attr('src','');
                $('#error').html(res);
            },
            success : function(res){
                $('#imgurl').val(res);
            }
        });
        function delImgUrl(obj){
            $(obj).parent().remove();
        }
        $('#articleSubmit').on('submit', function(){
            articlePost()
            event.preventDefault() //阻止form表单默认提交
        });
        var key = '{{$key}}';
        var category_id = '{{$category_id}}';
        var id = '{{$article->id}}';
        function articlePost() {
            var token = '{{csrf_token()}}';
            var title = $("input[name='title']").val();
            var author = $("input[name='author']").val();
            var source = $("input[name='source']").val();
            var image = $("input[name='image']").val();
            var meta_keyword = $("input[name='meta_keyword']").val();
            var meta_description = $(".description").val();
            var status = $("input[name='status']:checked").val();
            var content = editor.txt.html()
            var data = {id:id,title:title,author:author,source:source,image:image,meta_keyword:meta_keyword,meta_description:meta_description,status:status,content:content,_token:token,key:key,category_id:category_id};
            $.ajax({
                type: "post",
                url: "/manage/postEdit",
                data: data,
                dataType:'json',
                success:function(res){
                    if(res.code == 0){
                        window.location.href = res.data.redirect;
                    }
                }
            })
        }
    </script>
@endsection
@section('css')
    <style>
        .image_upload .img{
            height:80px;
            width:80px;
            margin-left:8px;
        }
        .radio-inline input{
            margin-top:2px;
        }
        .img_span{
            width:80px;
            float:left;
            margin-right:10px;
            position:relative;
        }
        .image_icon{
            background: url(/img/icons.png) no-repeat;
            width: 24px;
            height: 24px;
            display: inline;
            text-indent: -9999px;
            overflow: hidden;
            position:absolute;
            top:4px;
            right:-10px;
            background-position:-46px -25px;
            cursor: pointer;
        }
    </style>
@endsection