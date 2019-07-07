@extends('layouts.main')
@section('title')
    <title>后台首页</title>
@endsection
@section('content')
    <div class="main" id="mainWrapper">
        <h3>添加权限</h3>
        <div class="wrapper table-scroll-wrapper">
            <div class="row">
                <div class='col-md-12'>
                    <div class="table-responsive">
                        <form class="form-inline" method="post" enctype="multipart/form-data" action="/permission/postEdit">
                            <table class="table table-condensed table-add">
                                <input type="hidden" name="id" value="{{$action->id}}"/>
                                {{csrf_field()}}
                                <tr>
                                    <th style="width:10%;">
                                        <label for="case_foreman_id"> 名称:</label>
                                    </th>
                                    <td style="width:90%;">
                                        <div class="form-group">                                                                <input type="text" class="form-control" id="inputPassword2" value="{{$action->name}}" name="name" placeholder="名称">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th style="width:10%;">
                                        <label for="case_foreman_id"> 路由:</label>
                                    </th>
                                    <td style="width:90%;">
                                        <div class="form-group">                                                                <input type="text" class="form-control" id="inputPassword2" value="{{$action->url}}" name="url" placeholder="路由地址">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        <label for="case_title">方式:</label>
                                    </th>
                                    <td>
                                        <div class="form-group">
                                            <label class="radio-inline">
                                                <input type="radio" name="type" {{$action->type==1?"checked":''}} id="inlineRadio1" value="1"> get
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="type" id="inlineRadio2" {{$action->type==2?"checked":''}} value="2"> post
                                            </label>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th style="width:10%;">
                                        <label for="case_foreman_id">所属类别:</label>
                                    </th>
                                    <td style="width:90%;">
                                        <div class="ui-select span5">
                                            <select name="classify" class="form-control">
                                                <option value="">权限分类</option>
                                                @foreach($actionClassify as $classify)
                                                    @if($classify->id == $action->classify_id)
                                                    <option value="{{$classify->id}}" selected>{{$classify->name}}</option>
                                                    @else
                                                        <option value="{{$classify->id}}">{{$classify->name}}</option>
                                                    @endif
                                                @endforeach
                                            </select>
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