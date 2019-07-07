@extends('admin.layouts.main')
@section('title')
    <title>后台首页</title>
@endsection
@section('content')
    <div class="main" id="mainWrapper">
        <h3>添加分类</h3>
        <div class="wrapper table-scroll-wrapper">
            <div class="row">
                <div class='col-md-12'>
                    <div class="table-responsive">
                        <form class="form-inline" method="post" enctype="multipart/form-data" action="/category/postCreate">
                            <table class="table table-condensed table-add">
                                {{csrf_field()}}
                                <input type="hidden" name="base_id" value="{{$base_id}}" />
                                <tr>
                                    <th style="width:10%;">
                                        <label for="case_foreman_id">序号:</label>
                                    </th>
                                    <td style="width:90%;">
                                        <div class="form-group">                                                                <input type="text" class="form-control" id="inputPassword2" style="width:350px;" name="number" placeholder="序号">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th style="width:10%;">
                                        <label for="case_foreman_id"> 分类名称:</label>
                                    </th>
                                    <td style="width:90%;">
                                        <div class="form-group">                                                                <input type="text" class="form-control" id="inputPassword2" style="width:350px;" name="name" placeholder="分类名称">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th style="width:10%;">
                                        <label for="case_foreman_id">网页标题:</label>
                                    </th>
                                    <td style="width:90%;">
                                        <div class="form-group">                                                                <input type="text" class="form-control" id="inputPassword2" style="width:350px;" name="meta_title" size="70" maxlength="250" placeholder="网页标题">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th style="width:10%;">
                                        <label for="case_foreman_id">meta关键字:</label>
                                    </th>
                                    <td style="width:90%;">
                                        <div class="form-group">                                                                <input type="text" class="form-control" id="inputPassword2" style="width:350px;" name="meta_keyword" value="" style="width:350px;" size="70" placeholder="meta关键字">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th style="width:10%;">
                                        <label for="case_foreman_id">meta描述:</label>
                                    </th>
                                    <td style="width:90%;">
                                        <div class="form-group">                                                                <textarea type="text" style="width:350px;height:80px;" class="form-control" id="inputPassword2" value="" name="meta_description" placeholder="meta描述"></textarea>
                                        </div>
                                    </td>
                                </tr>
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
    <script type="text/javascript">
        var ue = UE.getEditor('editor');
    </script>
@endsection
@section('script')
    <!-- page specific plugin scripts -->
    <script src="/admin/js/upload.js"></script>
    <script>
        $('input[name="test[]"]').UploadImg({
            url : '/article/upload',
            // width : '320',
            //height : '200',
            quality : '0.8', //压缩率，默认值为0.8
            // 如果quality是1 宽和高都未设定 则上传原图
            mixsize : '10000000',
            //type : 'image/png,image/jpg,image/jpeg,image/pjpeg,image/gif,image/bmp,image/x-png',
            before : function(blob){
                $('#img').attr('src',blob);
                var img = '<img class="images" width="100px" height="100px" src="'+blob+'"/>';
                var inputImg = '<input type="hidden" name="pic[]" value="'+blob+'"/>';
                $('.uploadImg').append(img);
                $('.articleForm').append(inputImg);
            },
            error : function(res){
                $('#img').attr('src','');
                $('#error').html(res);
            },
            success : function(res){
                $('#imgurl').val(res);
            }
        });
    </script>
@endsection