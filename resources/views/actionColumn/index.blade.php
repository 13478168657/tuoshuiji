@extends('layouts.main')
@section('title')
    <title>左边栏列表</title>
@endsection
@section('content')
    <div class="main" id="mainWrapper">
        <h3>左边栏列表</h3>
        <div class="wrapper table-scroll-wrapper">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-warning">
                        <div class="panel-heading">
                            <a href="/left/column/add"><button class="btn btn-success btn-xs pull-right">
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
                                                        <div class="input-group-addon">标题</div>
                                                        <input value="" placeholder="文章标题" id="" class="form-control" name="title" type="text">
                                                    </div>
                                                </div>
                                                <div class="form-group input-group-sm">
                                                    <div class="input-group">
                                                        <div class="input-group-addon">创建人</div>
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
                                <th>栏目名称</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            @foreach($actionColumn as $column)
                                <tr>
                                    <td>{{$column->id}}</td>
                                    <td>{{$column->name}}</td>
                                    <td><a href="">删除</a>/<a href="/left/column/edit?id={{$column->id}}">修改</a></td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection