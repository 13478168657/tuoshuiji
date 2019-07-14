@extends('admin.en.layouts.main')
@section('title')
    <title>文章列表</title>
@endsection
@section('content')
    <div class="main" id="mainWrapper">
        <h3>广告列表</h3>
        <div class="wrapper table-scroll-wrapper">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-warning">
                        <div class="panel-heading">
                            <a href="/ad/create"><button class="btn btn-success btn-xs pull-right">
                                    <i class="glyphicon glyphicon-plus"></i>
                                    添加
                                </button></a>
                            <h6 class="panel-title">快捷键</h6>
                        </div>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class='col-md-12'>
                    <div class="table-responsive">
                        <table class="table table-bordered table-condensed table-hover">
                            <thead>
                            <tr>
                                <th>广告位置</th>
                                <th>广告描述</th>
                                <th>开始时间</th>
                                <th>结束时间</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            @foreach($advertisements as $ad)
                                <?php

                                ?>
                                <tr>
                                    <td>{{$ad->position_id}}</td>
                                    <td>{{$ad->desc}}</td>
                                    <td>{{$ad->start}}</td>
                                    <td>{{$ad->end}}</td>
                                    <td>{{App\Constants\ArticleStatus::trans($ad->status)}}</td>
                                    <td><a onclick="del(this);" href="javascript:void(0);" data-id="{{$ad->id}}">删除</a>／<a href="/ad/edit?id={{$ad->id}}">修改</a></td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function del(obj){
            var judge = confirm("确定删除？");
            if(judge){
                var _token = '{{csrf_token()}}';
                var id = $(obj).attr('data-id');
                var data = {id:id,_token:_token};
                $.ajax({
                    url:'/ad/del',
                    data:data,
                    dataType:'json',
                    type:'POST',
                    success:function(data){
                        alert(data.msg);
                        window.location.href="";
                    }
                });
            }
        }
    </script>
@endsection