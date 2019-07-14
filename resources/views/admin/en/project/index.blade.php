@extends('admin.en.layouts.main')
@section('title')
    <title>后台首页</title>
@endsection
@section('content')
    <div class="main" id="mainWrapper">
        <h3>模版设置设置</h3>
        <div class="wrapper table-scroll-wrapper">
            <div class="row">
                <div class='col-md-12'>
                    <div class="table-responsive">
                        <form class="form-inline" method="post" enctype="multipart/form-data" action="/base/model/change">

                            {{csrf_field()}}
                            <table class="table table-condensed table-add">

                                <tr>
                                    <th style="width:10%;">
                                        <label for="case_foreman_id">选择模版:</label>
                                    </th>
                                    <td>
                                        <div class="form-group">
                                            <label class="radio-inline">
                                                <input type="radio" name="type" id="inlineRadio1" {{$projectModel->type == 0?"checked":''}} value="0">中文模版
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="type" id="inlineRadio2" {{$projectModel->type == 1?"checked":''}}  value="1"> 英文模版
                                            </label>

                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th></th>
                                    <td>
                                        <button type="submit" class="btn btn-sm btn-primary col-md-offset-4">保存</button>
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
    <script type="text/javascript" charset="utf-8" src="/admin/ueditor/lang/zh-cn/zh-cn.js"></script>
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
                $("input[name='image']").val(img);
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