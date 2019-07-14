<nav class="header">
    <div class="container-fluid">
        <div class="nav-header">
            <a href="" href="javascript:void(0)">
                <i class="glyphicon glyphicon-list"></i>
            </a>
            <a class="nav-company" href="">系统后台管理</a>
        </div>
        <div class="nav-right">
            <ul class="nav nav-list">
                {{--<li>--}}
                    {{--<a href="javascript:void(0);">--}}
                        {{--<img class="img-circle avatar" src="image/photo.png"/>--}}
                    {{--</a>--}}
                {{--</li>--}}
                <li class="nav-user dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false" href="#">{{Auth::user()->name}}
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        {{--<li><a href="#">个人资料</a></li>--}}
                        <li><a href="/logout">
                                <i class="glyphicon glyphglyphicon glyphicon-log-out"></i>退出</a></li>
                    </ul>
                </li>
                <li class="logout">
                    <a href="/logout" title="登出">
                        <i class="glyphicon glyphglyphicon glyphicon-log-out"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>