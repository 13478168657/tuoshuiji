<?php

use App\Models\Category;
$categoryA = Category::where('base_id',1)->orderby('number','asc')->get();
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
                    @foreach($categoryA as $k => $catA)
                    <li name="sss" class="ad_position putao_{{$k}}"><a href="/manage/info?key={{$k}}&id={{$catA->category_num}}">{{$catA->name}}</a></li>
                    @endforeach
                    <li class="manage_base1"><a href="/category/list?base_id=1">分类管理</a></li>
                </ul>
            </li>
            <li>
                <a href="javascript:void(0);">
                    <i class="glyphicon glyphicon-wrench"></i>单页管理
                    <i class="glyphicon toggle-icon glyphicon-menu-down"></i>
                </a>
                <ul class="side-ul-menu">
                    <li class="ad_position consult-us"><a href="/consult/list">联系方式</a></li>
                    <li class="ad_position payment-style"><a href="/payment/list">本站购物</a></li>
                    <li class="ad_position delivery-instruction"><a href="/instruction/list">版权声明</a></li>
                     <li class="ad_position delivery-notice"><a href="/notice/list">免责声明</a></li>
                     <li class="ad_position delivery-about"><a href="/about/list">关于本站</a></li>
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
                </ul>
            </li>
        </ul>
    </nav>
</div>