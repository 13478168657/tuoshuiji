<?php
use App\Models\Link;

$links = Link::orderBy('id','desc')->get();

?>
<div class="footer-nav">
    <div class="footer-nav-c w">
        <span>祁门红茶网</span>&nbsp;&nbsp;<span>永久网址：www.qimenhongcha.com.cn</span>
    </div>
    <div id="footer">
        <table class="table">
            <tbody>
            <tr>
                <th width="360" valign="top">
                    <table class="wx">
                        <tbody>
                        <tr>
                            <td><img src="images/gerenerweima.png" alt="" width="109" height="109">
                                <p align="center">扫码送茶叶<br>
                                </p></td>
                            <td><img src="images/dingyuehao.png" alt="" width="109" height="109">
                                <p align="center">扫一扫<br>
                                </p></td>
                            <td><img src="images/weixin.png" alt="" width="109" height="109">
                                <p align="center">扫一扫<br>
                                </p></td>
                            <!--<td><img src="/style/2018/images/wx2.jpg" width="109" height="109" alt=""/>
                                <p align="center">扫一扫关注<br>
                                    六安瓜片更多</p></td>-->
                        </tr>
                        </tbody>
                    </table>
                </th>
                <th width="560" valign="top">
                    <dl class="copyright clearfix">

                        <dt>主办单位</dt>
                        <dd>祁门县际源春茶业有限公司 </dd>
                        <dd>安徽省黄山市祁门县</dd>
                        <dd>联系人：江女士 15705590919</dd>
                    </dl>


                    <dl class="copyright clearfix">
                        <dt>承建运营</dt>
                        <dd>祁门县际源春茶业有限公司</dd>
                        <dd>安徽省黄山市祁门县</dd>
                        <dd>联系人：江女士 15705590919</dd>
                    </dl>
                    <!-- <dl class="copyright clearfix">
                        <dt>茶园证补办</dt>
                        <dd>地址：六安县六安城北科技创业园5号楼4层408办公室</dd>
                        <dd>电话：0572-5223705</dd>
                    </dl>
                   -->
                </th>
                <td class="table_co" valign="top"><h5>联系我们</h5>
                    <p>安徽省黄山市祁门县</p>
                    <p>服务热线：157-0559-0919</p>
                    <p>QQ：379578560</p>
                </td>
            </tr>
            </tbody>
        </table>
        <table class="table2">
            <tbody>
            <tr>
                <td>
                    <dl class="copyright clearfix">
                        <dt>友情链接</dt>
                        <dd id="friendlinks">
                            @foreach($links as $link)
                                <a href="{{$link->url}}" target="_blank">{{$link->name}}</a>
                                <i>-</i>
                            @endforeach
                        </dd>
                    </dl>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
    <div class="footer">
        <p><a href="/about">关于本站</a><span> | </span><a
                    href="/instruction">版权声明</a><span> | </span><a
                    href="/payment">本站购物</a><span> | </span><a
                    href="/notice">免责声明</a><span> | </span><a
                    href="/consult">联系方式</a><span></span>

        </p>
        <p class="copyright">祁门红茶网   www.qimenhongcha.com.cn</p>

    </div>
</div>
