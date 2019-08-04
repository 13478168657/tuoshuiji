<?php

use App\Models\Category;
use App\Models\ProjectModel;
$categoryA = Category::where('base_id',1)->orderby('number','asc')->get();
$projectType = ProjectModel::first();
?>
<div id="sidebar">
    <nav class="sidebar">
        <div class="sidebar-header"><span class="sidebar-headering">Main menu</span></div>
        <ul class="menuItems">
            <li>
                <a href="javascript:void(0);">
                    <i class="glyphicon glyphicon-user"></i>UserManagerment
                    <i class="glyphicon toggle-icon glyphicon-menu-down"></i>
                </a>
                <ul class="side-ul-menu user-manage">
                    <li class="user-list"><a href="/user/list">UserList</a></li>
                </ul>
            </li>
            <li>
                <a href="javascript:void(0);">
                    <i class="glyphicon glyphicon-briefcase"></i>CategoryManager
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
                    <li class="manage_base1"><a href="/category/list?base_id=1">ClassifyManager</a></li>
                </ul>
            </li>
            <li>
                <a href="javascript:void(0);">
                    <i class="glyphicon glyphicon-wrench"></i>SinglePageTemplate
                    <i class="glyphicon toggle-icon glyphicon-menu-down"></i>
                </a>
                <ul class="side-ul-menu">
                    <li class="ad_position consult-us"><a href="/consult/list">singlepage</a></li>
                </ul>
            </li>
            <li>
                <a href="javascript:void(0);">
                    <i class="glyphicon glyphicon-link"></i>link
                    <i class="glyphicon toggle-icon glyphicon-menu-down"></i>
                </a>
                <ul class="side-ul-menu">
                    <li class="link-list"><a href="/link/list">link list</a></li>
                </ul>
            </li>
            <li>
                <a href="javascript:void(0);">
                    <i class="glyphicon glyphicon-fire"></i>advertisements
                    <i class="glyphicon toggle-icon glyphicon-menu-down"></i>
                </a>
                <ul class="side-ul-menu">
                    <li class="ad_position ad-list"><a href="/ad/list">ad list</a></li>
                    <li class="adSpace-list"><a href="/adSpace/list">ad position</a></li>
                </ul>
            </li>
            <li>
                <a href="javascript:void(0);">
                    <i class="glyphicon glyphicon-fire"></i>system
                    <i class="glyphicon toggle-icon glyphicon-menu-down"></i>
                </a>
                <ul class="side-ul-menu">
                    <li class="ad_position base-list"><a href="/base/config">network base manage</a></li>
                    <li class="ad_position base-change"><a href="/base/change">model change</a></li>
                </ul>
            </li>
        </ul>
    </nav>
</div>