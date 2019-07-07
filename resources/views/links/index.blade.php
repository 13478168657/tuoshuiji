@extends('layouts.main')
@section('title')
    <title>链接管理</title>
@endsection
@section('content')
    <div class="main" id="mainWrapper">
        <h3>链接列表</h3>
        <div class="wrapper table-scroll-wrapper">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-warning">
                        <div class="panel-heading">
                            <a href="/link/create"><button class="btn btn-success btn-xs pull-right">
                                    <i class="glyphicon glyphicon-plus"></i>
                                    添加
                                </button></a>
                            <h6 class="panel-title">快捷键</h6>
                        </div>
                        <div class="panel-body" style="">
                            <div class="row">
                                <div class="col-md-12 col-xs-12">
                                    <form class="form-inline" method="get">

                                        <div class="row">
                                            <div class="col-md-12">

                                                <div class="form-group input-group-sm">
                                                    <div class="input-group">
                                                        <div class="input-group-addon">标题</div>
                                                        <input value="{{$request->input('name')}}" placeholder="链接名称" id="title" class="form-control" name="name" type="text">
                                                    </div>
                                                </div>
                                                <div class="form-group input-group-sm">
                                                    <button type="submit" class="btn btn-primary btn-xs">检索</button>
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
                                <th>链接名称</th>
                                <th>链接地址</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            @foreach($links as $link)
                                <tr>
                                    <td>{{$link->name}}</td>
                                    <td>{{$link->url}}</td>
                                    <td><a href="">删除</a>／<a href="/link/edit?id={{$link->id}}">修改</a>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection