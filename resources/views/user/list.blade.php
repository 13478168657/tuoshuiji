@extends('layouts.main')
@section('title')
    <title>后台首页</title>
@endsection
@section('content')
    <div class="main" id="mainWrapper">
        <h3>用户列表</h3>
        <div class="wrapper table-scroll-wrapper">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-warning">
                        <div class="panel-heading">
                            <a href="/user/add"><button class="btn btn-success btn-xs pull-right">
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
                                <th>用户名</th>
                                <th>邮箱</th>
                                <th>手机号</th>
                                <th>状态</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            @foreach($users as $user)
                            <tr>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->mobile}}</td>
                                <td>{{App\Constants\UserStatus::trans($user->status)}}</td>
                                <td><a href="">删除</a>/<a href="/user/edit?id={{$user->id}}">修改</a></td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection