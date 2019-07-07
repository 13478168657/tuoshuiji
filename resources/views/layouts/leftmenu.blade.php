<?php
use App\Models\ActionColumn;
use App\Models\Action;
$actionColumns = ActionColumn::get();
$user = Auth::user();
$gropus = $user->group;
$permsArr = [];
        $str = '';
foreach($gropus as $group){
    $str .= $group->actions;
}
$permArr = explode('|',$str);
?>
<div id="sidebar" class="">
    <nav class="sidebar">
        <div class="sidebar-header"><span class="sidebar-headering">主菜单</span></div>
        <ul class="menuItems">
            <?php
                $user = Auth::user();
                $userGroup = $user->group;
                $groupsArr = [];
                foreach($userGroup as $group){
                    $groupsArr[] = $group->id;
                }
            ?>
            @foreach($actionColumns as $column)
                <?php
                    $seeGroups = explode('|',$column->can_see_group);
                    $flag = 0;
                    foreach($groupsArr as $gp){
                        if(in_array($gp,$seeGroups)){
                            $flag = 1;
                            break;
                        }
                    }
                    if(!$flag){
                        continue;
                    }

                ?>
            <li>
                <a href="javascript:void(0);">
                    <i class="glyphicon glyphicon-dashboard"></i>{{$column->name}}
                    <i class="glyphicon toggle-icon glyphicon-menu-left"></i>
                </a>
                <?php
                    $actions = explode('|',$column->action_id);
                    $menuLists = Action::whereIn('id',$actions)->get();
//                    dd($menuLists);
                ?>
                <ul class="side-ul-menu">
                    @foreach($menuLists as $menu)
                        <?php
                            if($user->email!='yangkuokuo@qq.com'){
                                if(!in_array($menu->id,$permArr)){
                                    continue;
                                }
                            }
                        ?>
                        <li><a href="/{{$menu->url}}">{{$menu->name}}</a></li>
                    @endforeach
                    {{--<li><a href="/">文章列表</a></li>--}}
                    {{--<li><a href="/article/add">添加文章</a></li>--}}
                    {{--<li><a href="/position/list">文章分类</a></li>--}}
                </ul>
            </li>
            @endforeach
            <li>
                    <a href="javascript:void(0);">
                        <i class="glyphicon glyphicon-dashboard"></i>广告管理
                        <i class="glyphicon toggle-icon glyphicon-menu-left"></i>
                    </a>
                    <ul class="side-ul-menu">
                        <li class="active"><a href="/article/list">广告列表</a></li>
                        <li><a href="/position/list">广告位列表</a></li>
                        <li><a href="/position/list"></a></li>
                    </ul>
                </li>
            <li>
                <a href="javascript:void(0);">
                    <i class="glyphicon glyphicon-dashboard"></i>链接管理
                    <i class="glyphicon toggle-icon glyphicon-menu-left"></i>
                </a>
                <ul class="side-ul-menu">
                    <li><a href="/link/list">链接列表</a></li>
                </ul>
                </li>
        </ul>
    </nav>
</div>