<?php

use App\Models\Category;
use App\Models\ProjectModel;
$categoryA = Category::where('base_id',1)->orderby('number','asc')->get();
$projectType = ProjectModel::first();
?>
<div id="sidebar">
    <nav class="sidebar">
        <div class="sidebar-header"><span class="sidebar-headering">主菜单</span></div>
        <ul class="menuItems">
            <li>
                <a href="javascript:void(0);">
                    <i class="glyphicon glyphicon-user"></i>用户管理
                    <i class="glyphicon toggle-icon glyphicon-menu-down"></i>
                </a>
                <ul class="side-ul-menu user-manage">
                    <li class="user-list"><a href="/user/list">用户列表</a></li>
                </ul>
            </li>
            <li>
                <a href="javascript:void(0);">
                    <i class="glyphicon glyphicon-briefcase"></i>类别管理
                    <i class="glyphicon toggle-icon glyphicon-menu-down"></i>
                </a>
                <ul class="side-ul-menu">
                    @if($projectType->type == 0)
                    @foreach($categoryA as $k => $catA)
                    <li name="sss" class="ad_position putao_{{$k}}">
                        <a href="/manage/info?key={{$k}}&id={{$catA->category_num}}">{{$catA->name}}</a>
                    </li>
                    @endforeach
                    @else
                        @foreach($categoryA as $k => $catA)
                            <li name="sss" class="ad_position putao_{{$k}}">
                                <a href="/manage/info?key={{$k}}&id={{$catA->category_num}}">{{$catA->english_name}}</a>
                            </li>
                        @endforeach
                    @endif
                    <li class="manage_base1"><a href="/category/list?base_id=1">分类管理</a></li>
                </ul>
            </li>
            <li>
                <a href="javascript:void(0);">
                    <i class="glyphicon glyphicon-wrench"></i>单页管理
                    <i class="glyphicon toggle-icon glyphicon-menu-down"></i>
                </a>
                <ul class="side-ul-menu">
                    <li class="ad_position consult-us"><a href="/consult/list">单页列表</a></li>
                </ul>
            </li>
            <li>
                <a href="javascript:void(0);">
                    <i class="glyphicon glyphicon-link"></i>友情链接
                    <i class="glyphicon toggle-icon glyphicon-menu-down"></i>
                </a>
                <ul class="side-ul-menu">
                    <li class="link-list"><a href="/link/list">链接列表</a></li>
                </ul>
            </li>
            <li>
                <a href="javascript:void(0);">
                    <i class="glyphicon glyphicon-fire"></i>广告管理
                    <i class="glyphicon toggle-icon glyphicon-menu-down"></i>
                </a>
                <ul class="side-ul-menu">
                    <li class="ad_position ad-list"><a href="/ad/list">广告列表</a></li>
                    <li class="adSpace-list"><a href="/adSpace/list">广告位列表</a></li>
                </ul>
            </li>
            <li>
                <a href="javascript:void(0);">
                    <i class="glyphicon glyphicon-fire"></i>系统管理
                    <i class="glyphicon toggle-icon glyphicon-menu-down"></i>
                </a>
                <ul class="side-ul-menu">
                    <li class="ad_position base-list"><a href="/base/config">网站基本设置</a></li>
                    <li class="ad_position base-change"><a href="/base/change">网站模版切换</a></li>
                </ul>
            </li>
        </ul>
    </nav>
</div>