@extends('layouts.main')
@section('title')
    <title>后台首页</title>
@endsection
@section('content')
    <div class="main" id="mainWrapper">
        <h3>添加组</h3>
        <div class="wrapper table-scroll-wrapper">
            <div class="row">
                <div class='col-md-12'>
                    <div class="table-responsive">
                        <form class="form-inline" method="post" enctype="multipart/form-data" action="/group/postEdit">
                            <table class="table table-condensed table-add">
                                {{csrf_field()}}
                                <input type="hidden" value="{{$group->id}}" name="id"/>
                                <?php
                                  $allActions = explode('|',$group->actions);
                                ?>
                                <tr>
                                    <th style="width:10%;">
                                        <label for="case_foreman_id"> 名称:</label>
                                    </th>
                                    <td style="width:90%;">
                                        <div class="form-group">                                                                <input type="text" class="form-control" id="inputPassword2" value="{{$group->name}}" name="name" placeholder="名称">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        <label for="case_title">权限:</label>
                                    </th>
                                    <td>
                                        <div class="form-group">
                                            @foreach($actionClassify as $classify)
                                                <h6>{{$classify->name}}</h6>
                                                <?php
                                                $actions = $classify->action;
                                                ?>
                                                @foreach($actions as $action)
                                                    <label class="checkbox-inline">
                                                        @if(in_array($action->id,$allActions))
                                                        <input type="checkbox" id="inlineCheckbox1" checked name="actions[]" value="{{$action->id}}"/>
                                                        @else
                                                        <input type="checkbox" id="inlineCheckbox1" name="actions[]" value="{{$action->id}}"/>
                                                        @endif
                                                            {{$action->name}}

                                                    </label>
                                                @endforeach
                                            @endforeach
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