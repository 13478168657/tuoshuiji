@extends('layouts.main')
@section('title')
    <title>文章列表</title>
    @endsection
    @section('content')
            <!-- /section:basics/sidebar -->
    <div class="main-content">
        <div class="breadcrumbs" id="breadcrumbs">
            <ul class="breadcrumb">
                <li>
                    <i class="ace-icon fa fa-home home-icon"></i>
                    <a href="index.html">UI库首页</a>
                </li>
                <li>
                    <a href="javascript:void(0)">表格</a>
                </li>
                <li>
                    <a href="elements.html">简单通用表格</a>
                </li>
            </ul><!-- /.breadcrumb -->

            <!-- #section:basics/content.searchbox -->
            <div class="nav-search" id="nav-search">
                <form class="form-search">
							<span class="input-icon">
								<input type="text" placeholder="请输入关键字 ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
								<i class="ace-icon fa fa-search nav-search-icon"></i>
							</span>
                </form>
            </div><!-- /.nav-search -->
        </div>
        <div class="page-content">

            <!-- /section:settings.box -->
            <div class="page-content-area">

                <div class="row">
                    <div class="col-xs-12">
                        <div class="row">
                            <div class="col-xs-12">
                                <table width="100%" class="CSSearchTbl" cellpadding="0" cellspacing="0">
                                    <tr>
                                        <td class="left">提交部门：</td>
                                        <td class="right"><input type="text" size="16"  /></td>
                                        <td class="left">差旅单状态：</td>
                                        <td class="right">
                                            <select>
                                                <option>未提交</option>
                                                <option>审核中</option>
                                                <option>审核通过</option>
                                                <option>审核未通过</option>
                                                <option>撤回</option>
                                                <option>作废</option>
                                            </select>
                                        </td>
                                        <td class="right" colspan="2">
                                            <button class="btn btn-primary pull-left col-sm-12 tbl-search" data-dismiss="modal">
                                                开始搜索
                                                <i class="ace-icon fa fa-search"></i>
                                            </button>
                                        </td>
                                    </tr>
                                </table>

                                <div class="table-responsive">
                                    <a class="btn btn-info" href="/classify/add">添加类别</a>
                                    <table id="sample-table-2" class="table table-striped table-bordered table-hover">
                                        <thead>
                                        <tr>
                                            <th>类别id</th>
                                            <th>分类名称</th>
                                            <th>权重</th>
                                            <th>操作</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($classify as $class)
                                            <tr>
                                                <td>{{$class->id}}</td>
                                                <td>{{$class->name}}</td>
                                                <td>{{$class->weight}}</td>
                                                <td><a href="/classify/edit/{{$class->id}}">修改</a>|<a href="/classify/del/{{$class->id}}">删除</a></td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                    <div class="modal-footer no-margin-top">

                                        <ul class="pagination pull-right no-margin">
                                            <li class="prev disabled">
                                                <a href="#">
                                                    <i class="ace-icon fa fa-angle-double-left"></i>
                                                </a>
                                            </li>

                                            <li class="active">
                                                <a href="#">1</a>
                                            </li>

                                            <li>
                                                <a href="#">2</a>
                                            </li>

                                            <li>
                                                <a href="#">3</a>
                                            </li>

                                            <li class="next">
                                                <a href="#">
                                                    <i class="ace-icon fa fa-angle-double-right"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection