@extends('layouts.main')
@section('title')
    <title>后台首页</title>
@endsection
@section('content')
    <div class="main-content">
        <div class="breadcrumbs" id="breadcrumbs">
            <ul class="breadcrumb">
                <li>
                    <i class="ace-icon fa fa-home home-icon"></i>
                    <a href="index.html">UI库首页</a>
                </li>
                <li>
                    <a href="javascript:void(0)">表单</a>
                </li>
                <li>
                    <a href="elements.html">表单元素</a>
                </li>
            </ul><!-- /.breadcrumb -->

            <!-- #section:basics/content.searchbox -->
            <div class="nav-search" id="nav-search">
                <form class="form-search" action="/classify/postCreate" method="post">
							<span class="input-icon">
								<input type="text" placeholder="请输入关键字 ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
								<i class="ace-icon fa fa-search nav-search-icon"></i>
							</span>
                </form>
            </div>
        </div>
        <div class="page-content">
            <div class="page-content-area">
                <div class="row">
                    <div class="col-xs-12">
                        <form class="form-horizontal" role="form" action="/classify/postCreate" method="post">
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right">父类：</label>
                                <div class="col-sm-9">
                                    <span class="input-icon">
                                        <select class="form-control" id="form-field-select-1" name="class">
                                            <option value="0">父类</option>
                                            @foreach($classify as $class)
                                                <option value="{{$class->id}}">{{$class->name}}</option>
                                            @endforeach
                                        </select>
                                    </span>
                                </div>
                            </div>
                            <div class="space-4"></div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1">子类名称：</label>

                                <div class="col-sm-9">
                                    <input type="text" id="form-field-1" placeholder="输入部门名称" name="name" class="col-xs-10 col-sm-5" />
                                </div>
                            </div>
                            <div class="space-4"></div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1">权重：</label>

                                <div class="col-sm-9">
                                    <input type="text" id="form-field-1" placeholder="输入部门名称" name="weight" class="col-xs-10 col-sm-5" />
                                </div>
                            </div>
                            <div class="space-4"></div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1">显示：</label>

                                <div class="radio col-sm-9">
                                    <label>
                                        <input name="show" class="ace" type="radio" value="1" checked>
                                        <span class="lbl">是</span>
                                    </label>
                                </div>

                                <div class="radio col-sm-9">
                                <label>
                                    <input name="show" class="ace" type="radio" value="0">
                                    <span class="lbl">否</span>
                                </label>
                            </div>
                            </div>
                            <input type="hidden" value="{{csrf_token()}}" name="_token" id="_token"/>
                            <div class="clearfix form-actions">
                                <div class="col-md-offset-5 col-md-9">
                                    <input type="submit" class="btn btn-info" value="立即提交">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')

@endsection
@section('css')
    <style>
        #navbar{
            width:1250px;
        }
        #main-container{
            width:1200px;
            margin: 0px;
            padding:0px;
        }
    </style>
@endsection