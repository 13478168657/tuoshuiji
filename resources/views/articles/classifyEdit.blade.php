@extends('layouts.main')
@section('title')
    <title>后台首页</title>
@endsection
@section('content')
    <div class="main" id="mainWrapper">
        <h3>编辑分类</h3>
        <div class="wrapper table-scroll-wrapper">
            <div class="row">
                <div class='col-md-12'>
                    <div class="table-responsive">
                        <form class="form-inline" method="post" enctype="multipart/form-data" action="/position/postEdit">
                            <table class="table table-condensed table-add">
                                {{csrf_field()}}
                                <tr>
                                    <th style="width:10%;">
                                        <label for="case_foreman_id">分类:</label>
                                    </th>
                                    <td style="width:90%;">
                                        <div class="ui-select span5">
                                            <select name="pid" class="form-control">
                                                <option value="0">根节点</option>
                                                @foreach($classifyList as $class)
                                                    @if($classify->pid == $class->id)
                                                        <option value="{{$class->id}}" selected>{{$class->name}}</option>
                                                    @else
                                                        <option value="{{$class->id}}">{{$class->name}}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </td>
                                </tr>
                                <input type="hidden" name="id" value="{{$classify->id}}"/>
                                <tr>
                                    <th style="width:10%;">
                                        <label for="case_foreman_id"> 名称:</label>
                                    </th>
                                    <td style="width:90%;">
                                        <div class="form-group">                                                                <input type="text" class="form-control" value="{{$classify->name}}" id="inputPassword2" name="name" placeholder="名称">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th style="width:10%;">
                                        <label for="case_foreman_id"> 权重:</label>
                                    </th>
                                    <td style="width:90%;">
                                        <div class="form-group">                                                                <input type="text" class="form-control" id="inputPassword2" name="score" placeholder="权重">
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
                                                <input type="radio" name="status" {{$classify->status==1?'checked':''}} value="1"> 启用
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="status" {{$classify->status==2?'checked':''}} value="2"> 禁用
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