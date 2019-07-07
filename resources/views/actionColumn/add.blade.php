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
                        <form class="form-inline" method="post" enctype="multipart/form-data" action="/left/column/postCreate">
                            <table class="table table-condensed table-add">
                                {{csrf_field()}}
                                <tr>
                                    <th style="width:10%;">
                                        <label for="case_foreman_id"> 栏目名称:</label>
                                    </th>
                                    <td style="width:90%;">
                                        <div class="form-group">                                                                <input type="text" class="form-control" id="inputPassword2" name="name" placeholder="栏目名称">
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
                                                    <input type="checkbox" id="inlineCheckbox1" name="groups[]" value="{{$group->id}}"/>

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
                                                        <input type="checkbox" name="action_id[]" id="inlineCheckbox1" value="{{$action->id}}"> {{$action->name}}
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