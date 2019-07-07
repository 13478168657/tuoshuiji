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
                        <form class="form-inline" method="post" enctype="multipart/form-data" action="/left/column/postEdit">
                            <table class="table table-condensed table-add">
                                <?php
                                    $allActions = explode('|',$actionColumn->action_id);
                                $seeGroups = explode('|',$actionColumn->can_see_group);
                                ?>
                                <input type="hidden" value="{{$actionColumn->id}}" name="id"/>
                                {{csrf_field()}}
                                <tr>
                                    <th style="width:10%;">
                                        <label for="case_foreman_id"> 栏目名称:</label>
                                    </th>
                                    <td style="width:90%;">
                                        <div class="form-group">                                                                <input type="text" class="form-control" id="inputPassword2" name="name" placeholder="栏目名称" value="{{$actionColumn->name}}">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        <label for="case_title">可见组:</label>
                                    </th>
                                    <td>
                                        <div class="form-group">
                                            @foreach($groups as $group)
                                                <label class="checkbox-inline">
                                                    @if(in_array($group->id,$seeGroups))
                                                    <input type="checkbox" id="inlineCheckbox1" checked name="groups[]" value="{{$group->id}}"/>
                                                    @else
                                                    <input type="checkbox" id="inlineCheckbox1" name="groups[]" value="{{$group->id}}"/>
                                                    @endif

                                                    {{$group->name}}

                                                </label>
                                            @endforeach
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        <label for="case_title">权限选中项:</label>
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
                                                        <input type="checkbox" name="action_id[]" checked id="inlineCheckbox1" value="{{$action->id}}"/>
                                                        @else
                                                            <input type="checkbox" name="action_id[]" id="inlineCheckbox1" value="{{$action->id}}"/>
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