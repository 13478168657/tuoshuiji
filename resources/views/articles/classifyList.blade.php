@extends('layouts.main')
@section('title')
    <title>后台首页</title>
@endsection
@section('content')
    <div class="main" id="mainWrapper">
        <h3>文章分类列表</h3>
        <div class="wrapper table-scroll-wrapper">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-warning">
                        <div class="panel-heading">
                            <a href="/position/add"><button class="btn btn-success btn-xs pull-right">
                                    <i class="glyphicon glyphicon-plus"></i>
                                    添加
                                </button></a>
                            <h6 class="panel-title">快捷键</h6>
                        </div>
                        <div class="panel-body" style="">
                            <div class="row">
                                <div class="col-md-12 col-xs-12">
                                    <form class="form-inline">

                                        <div class="row">
                                            <div class="col-md-12">

                                                <div class="form-group input-group-sm">
                                                    <div class="input-group">
                                                        <div class="input-group-addon">状态</div>
                                                        <select id="order_sale_type" name="sale_type" class="form-control">
                                                            <option value="0" selected="selected">
                                                                全部
                                                            </option>
                                                            <option value="1">
                                                                不通过</option>
                                                            <option value="2">
                                                                待审核</option>
                                                            <option value="3">
                                                                通过</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group input-group-sm">
                                                    <div class="input-group">
                                                        <div class="input-group-addon">用户名</div>
                                                        <input value="" placeholder="用户名" id="" class="form-control" name="name" type="text">
                                                    </div>
                                                </div>
                                                <div class="form-group input-group-sm">
                                                    <div class="input-group">
                                                        <div class="input-group-addon">手机号</div>
                                                        <input class="form-control" name="mobile" placeholder="手机号" value="" id="" type="text">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
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
                                <th>id</th>
                                <th>类名</th>
                                <th>父ID</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            @foreach($classifies as $classify)
                                <tr>
                                    <td>{{$classify->id}}</td>
                                    <td>{{$classify->name}}</td>
                                    <td>{{$classify->pid}}</td>
                                    <td><a onclick="del(this);" href="javascript:void(0);" data-id="{{$classify->id}}">删除</a>/<a href="/position/edit?id={{$classify->id}}">修改</a></td>
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
            var judge = confirm("Press a button");
            if(judge){
                var _token = '{{csrf_token()}}';
                var id = $(obj).attr('data-id');
                var data = {id:id,_token:_token};
                $.ajax({
                    url:'/position/del',
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