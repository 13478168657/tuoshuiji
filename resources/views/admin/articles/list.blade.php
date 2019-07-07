@extends('admin.layouts.main')
@section('title')
    <title>文章列表</title>
@endsection
@section('content')
    <div class="main content-wrapper" id="mainWrapper">
        <h3>内容</h3>
        <div class="wrapper table-scroll-wrapper">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-warning">
                        <div class="panel-heading">
                            <a href="/manage/add?pid={{$category->id}}&key={{$key}}"><button class="btn btn-success btn-xs pull-right">
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
                                                        <div class="input-group-addon">状态</div>
                                                        <select id="status" name="status" class="form-control">
                                                            <option value="0" {{($request->input('status')==null || $request->input('status') ==0)?'':'selected'}}>
                                                                全部
                                                            </option>
                                                            <option value="1" {{($request->input('status')==1)?'selected':''}}>
                                                                不通过</option>
                                                            <option value="2" {{($request->input('status') ==2)?'selected':''}}>
                                                                待审核</option>
                                                            <option value="3" {{($request->input('status') ==3)?'selected':''}}>
                                                                通过</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <input type="hidden" name="key" value="{{$key}}"/>
                                                <input type="hidden" name="id" value="{{$category->category_num}}"/>
                                                <div class="form-group input-group-sm">
                                                    <div class="input-group">
                                                        <div class="input-group-addon">标题</div>
                                                        <input value="{{$request->input('title')}}" placeholder="文章标题" id="title" class="form-control" name="title" type="text">
                                                    </div>
                                                </div>
                                                <div class="form-group input-group-sm">
                                                    <div class="input-group">
                                                        <div class="input-group-addon">开始时间</div>
                                                        <input id="start_from" value="{{$request->input('start_time')}}" name="start_time" class="form-control" placeholder="创建起始日期" onfocus="WdatePicker();" type="text">
                                                    </div> 至
                                                    <div class="input-group">
                                                        <div class="input-group-addon">结束时间</div>
                                                        <input id="end_from" value="{{$request->input('end_time')}}" name="end_time" class="form-control" placeholder="创建结束日期" onfocus="WdatePicker();" type="text">
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
                                <th>序号</th>
                                <th>标题</th>
                                <th>出处</th>
                                <th>状态</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            @foreach($articles as $article)
                                <tr>
                                    <td>{{$article->id}}</td>
                                    <td>{{$article->title}}</td>
                                    <td>{{$article->source}}</td>
                                    <td>{{App\Constants\ArticleStatus::trans($article->status)}}</td>
                                    <td><a onclick="del(this);" href="javascript:void(0);" data-id="{{$article->id}}">删除</a>／<a href="/manage/edit?pid={{$article->category_id}}&id={{$article->id}}">修改</a>／<a href="{{env('WEB_URL')}}/thread-{{$article->id}}.html" target="_blank">预览</a></td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
            <div class="paginate pull-right">
                {{ $articles->appends(['key'=>$key,'id'=>$category->category_num])->render() }}
            </div>
        </div>
    </div>

    <script>
        function del(obj){
            var judge = confirm("确认删除");
            if(judge){
                var _token = '{{csrf_token()}}';
                var id = $(obj).attr('data-id');
                var data = {id:id,_token:_token};
                $.ajax({
                    url:'/manage/del',
                    data:data,
                    dataType:'json',
                    type:'POST',
                    success:function(data){
                        alert(data.msg);
                        window.location.href="";
                    }
                });
            }
        }
    </script>
@endsection