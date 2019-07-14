@extends('admin.en.layouts.main')
@section('title')
    <title>后台首页</title>
@endsection
@section('content')
    <div class="main" id="mainWrapper">
        <h3>广告添加</h3>
        <div class="wrapper table-scroll-wrapper">
            <div class="row">
                <div class='col-md-12'>
                    <div class="table-responsive">
                        <form class="form-inline" method="post" enctype="multipart/form-data" action="/ad/postCreate">
                            {{csrf_field()}}
                            <input type="hidden" value="{{$advertisement->id}}" />
                            <table class="table table-condensed table-add">
                                <tr>
                                    <th style="width:10%;">
                                        <label for="">广告位:</label>
                                    </th>
                                    <td style="width:90%;">
                                        <div class="ui-select span5">
                                            <select name="position_id" style="width:150px"  id="" class="form-control">
                                                @foreach($adSpaces as $space)
                                                    @if($space->id == $advertisement->position_id)
                                                        <option value="{{$space->id}}" selected>{{$space->name}}</option>
                                                    @else
                                                        <option value="{{$space->id}}">{{$space->name}}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th style="width:10%;">
                                        <label for="case_foreman_id">链接地址:</label>
                                    </th>
                                    <td style="width:90%;">
                                        <div class="form-group">                                                                 <input type="text" value="{{$advertisement->url}}" rows="4" name="url" style="width:350px" cols="100" class="form-control" id="inputPassword2" placeholder="链接地址"/>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th style="width:10%;">
                                        <label for="case_foreman_id">广告图片:</label>
                                    </th>
                                    <td style="width:90%;">                                               <input type="file" name="image" class="" id="">
                                        <div class="image_upload"></div>
                                        @if($advertisement->photo)
                                            <div class="img_span">
                                                <img class="img" src="{{env('IMG_URL').'/'.$advertisement->photo}}" style="width:80px;height:80px;margin-left:8px;"><span onclick="delImgUrl(this);" class="image_icon"></span>
                                            </div>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th style="width:10%;">
                                        <label for="case_foreman_id">开始时间:</label>
                                    </th>
                                    <td style="width:90%;">
                                        <div class="form-group">                                                                 <input type="text" rows="4" name="start" onfocus="WdatePicker();" style="width:350px" value="{{date('Y-m-d',strtotime($advertisement->start))}}" cols="100" class="form-control" id="inputPassword2" placeholder="开始时间"/>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th style="width:10%;">
                                        <label for="case_foreman_id">结束时间:</label>
                                    </th>
                                    <td style="width:90%;">
                                        <div class="form-group">                                                                 <input type="text" rows="4" onfocus="WdatePicker();" value="{{date('Y-m-d',strtotime($advertisement->end))}}" name="end" cols="100" style="width:350px" class="form-control" id="inputPassword2" placeholder="结束时间"/>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th style="width:10%;">
                                        <label for="case_foreman_id">描述:</label>
                                    </th>
                                    <td style="width:90%;">
                                        <div class="form-group">                                                                 <textarea type="text" style="width:350px;height:80px;" rows="4" name="desc" value="{{$advertisement->desc}}" cols="100" class="form-control" id="inputPassword2" placeholder="描述"></textarea>
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
                                                <input type="radio" name="status" id="inlineRadio1" {{$advertisement->status==3?'checked':''}} value="1"> 开启
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="status" id="inlineRadio2" {{$advertisement->status==1?'checked':''}} value="2"> 关闭
                                            </label>
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
    @endsection
    @section('script')

            <!-- page specific plugin scripts -->
    <script src="/admin/js/upload.js"></script>
    <script src="/admin/js/mobileBUGFix.mini.js"></script>
    <script>
        $("input[name='image']").UploadImg({
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