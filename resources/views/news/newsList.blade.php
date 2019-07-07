@extends('layouts.main')
@section('title')
	<title>文章管理</title>
@endsection
@section('content')
		<div class="layui-body layui-tab-content site-demo site-demo-body">
			<div class="layui-tab-item layui-show">
				<div class="layui-main">
					<div id="LAY_preview">
						<blockquote class="layui-elem-quote">
							本页面只是演示静态表格，如果你需要的是数据表格，可前往：
							<a class="layui-btn layui-btn-normal" href="table.html" target="_blank">表格模块示例</a>
						</blockquote>

						<fieldset class="layui-elem-field layui-field-title" style="margin-top: 20px;">
							<legend>默认表格</legend>
						</fieldset>

						<div class="layui-form">
							<table class="layui-table">
								<colgroup>
									<col width="150">
									<col width="150">
									<col width="200">
									<col>
								</colgroup>
								<thead>
								<tr>
									<th>人物</th>
									<th>民族</th>
									<th>出场时间</th>
									<th>格言</th>
								</tr>
								</thead>
								<tbody>
								<tr>
									<td>贤心</td>
									<td>汉族</td>
									<td>1989-10-14</td>
									<td>人生似修行</td>
								</tr>
								<tr>
									<td>张爱玲</td>
									<td>汉族</td>
									<td>1920-09-30</td>
									<td>于千万人之中遇见你所遇见的人，于千万年之中，时间的无涯的荒野里…</td>
								</tr>
								<tr>
									<td>Helen Keller</td>
									<td>拉丁美裔</td>
									<td>1880-06-27</td>
									<td> Life is either a daring adventure or nothing.</td>
								</tr>
								<tr>
									<td>岳飞</td>
									<td>汉族</td>
									<td>1103-北宋崇宁二年</td>
									<td>教科书再滥改，也抹不去“民族英雄”的事实</td>
								</tr>
								<tr>
									<td>孟子</td>
									<td>华夏族（汉族）</td>
									<td>公元前-372年</td>
									<td>猿强，则国强。国强，则猿更强！ </td>
								</tr>
								</tbody>
							</table>
						</div>

						<fieldset class="layui-elem-field layui-field-title" style="margin-top: 50px;">
							<legend>行边框表格</legend>
						</fieldset>

						<table class="layui-table" lay-skin="line">
							<colgroup>
								<col width="150">
								<col width="150">
								<col width="200">
								<col>
							</colgroup>
							<thead>
							<tr>
								<th>人物</th>
								<th>民族</th>
								<th>出场时间</th>
								<th>格言</th>
							</tr>
							</thead>
							<tbody>
							<tr>
								<td>贤心</td>
								<td>汉族</td>
								<td>1989-10-14</td>
								<td>人生似修行</td>
							</tr>
							<tr>
								<td>张爱玲</td>
								<td>汉族</td>
								<td>1920-09-30</td>
								<td>于千万人之中遇见你所遇见的人，于千万年之中，时间的无涯的荒野里…</td>
							</tr>
							<tr>
								<td>Helen Keller</td>
								<td>拉丁美裔</td>
								<td>1880-06-27</td>
								<td> Life is either a daring adventure or nothing.</td>
							</tr>
							<tr>
								<td>岳飞</td>
								<td>汉族</td>
								<td>1103-北宋崇宁二年</td>
								<td>教科书再滥改，也抹不去“民族英雄”的事实</td>
							</tr>
							<tr>
								<td>孟子</td>
								<td>华夏族（汉族）</td>
								<td>公元前-372年</td>
								<td>猿强，则国强。国强，则猿更强！ </td>
							</tr>
							</tbody>
						</table>

						<fieldset class="layui-elem-field layui-field-title" style="margin-top: 50px;">
							<legend>列边框表格</legend>
						</fieldset>

						<table class="layui-table" lay-even="" lay-skin="row">
							<colgroup>
								<col width="150">
								<col width="150">
								<col width="200">
								<col>
							</colgroup>
							<thead>
							<tr>
								<th>人物</th>
								<th>民族</th>
								<th>出场时间</th>
								<th>格言</th>
							</tr>
							</thead>
							<tbody>
							<tr>
								<td>贤心</td>
								<td>汉族</td>
								<td>1989-10-14</td>
								<td>人生似修行</td>
							</tr>
							<tr>
								<td>张爱玲</td>
								<td>汉族</td>
								<td>1920-09-30</td>
								<td>于千万人之中遇见你所遇见的人，于千万年之中，时间的无涯的荒野里…</td>
							</tr>
							<tr>
								<td>Helen Keller</td>
								<td>拉丁美裔</td>
								<td>1880-06-27</td>
								<td> Life is either a daring adventure or nothing.</td>
							</tr>
							<tr>
								<td>岳飞</td>
								<td>汉族</td>
								<td>1103-北宋崇宁二年</td>
								<td>教科书再滥改，也抹不去“民族英雄”的事实</td>
							</tr>
							<tr>
								<td>孟子</td>
								<td>华夏族（汉族）</td>
								<td>公元前-372年</td>
								<td>猿强，则国强。国强，则猿更强！ </td>
							</tr>
							</tbody>
						</table>

						<fieldset class="layui-elem-field layui-field-title" style="margin-top: 50px;">
							<legend>无边框表格</legend>
						</fieldset>

						<table class="layui-table" lay-even="" lay-skin="nob">
							<colgroup>
								<col width="150">
								<col width="150">
								<col width="200">
								<col>
							</colgroup>
							<thead>
							<tr>
								<th>人物</th>
								<th>民族</th>
								<th>出场时间</th>
								<th>格言</th>
							</tr>
							</thead>
							<tbody>
							<tr>
								<td>贤心</td>
								<td>汉族</td>
								<td>1989-10-14</td>
								<td>人生似修行</td>
							</tr>
							<tr>
								<td>张爱玲</td>
								<td>汉族</td>
								<td>1920-09-30</td>
								<td>于千万人之中遇见你所遇见的人，于千万年之中，时间的无涯的荒野里…</td>
							</tr>
							<tr>
								<td>Helen Keller</td>
								<td>拉丁美裔</td>
								<td>1880-06-27</td>
								<td> Life is either a daring adventure or nothing.</td>
							</tr>
							<tr>
								<td>岳飞</td>
								<td>汉族</td>
								<td>1103-北宋崇宁二年</td>
								<td>教科书再滥改，也抹不去“民族英雄”的事实</td>
							</tr>
							<tr>
								<td>孟子</td>
								<td>华夏族（汉族）</td>
								<td>公元前-372年</td>
								<td>猿强，则国强。国强，则猿更强！ </td>
							</tr>
							</tbody>
						</table>

						<fieldset class="layui-elem-field layui-field-title" style="margin-top: 50px;">
							<legend>其它尺寸表格</legend>
						</fieldset>

						<table class="layui-table" lay-size="lg">
							<colgroup>
								<col width="150">
								<col width="200">
								<col>
							</colgroup>
							<thead>
							<tr>
								<th>昵称</th>
								<th>加入时间</th>
								<th>签名</th>
							</tr>
							</thead>
							<tbody>
							<tr>
								<td>贤心</td>
								<td>2016-11-29</td>
								<td>人生就像是一场修行</td>
							</tr>
							<tr>
								<td>许闲心</td>
								<td>2016-11-28</td>
								<td>于千万人之中遇见你所遇见的人，于千万年之中，时间的无涯的荒野里…</td>
							</tr>
							<tr>
								<td>sentsin</td>
								<td>2016-11-27</td>
								<td> Life is either a daring adventure or nothing.</td>
							</tr>
							</tbody>
						</table>
						<table class="layui-table" lay-size="sm">
							<colgroup>
								<col width="150">
								<col width="200">
								<col>
							</colgroup>
							<thead>
							<tr>
								<th>昵称</th>
								<th>加入时间</th>
								<th>签名</th>
							</tr>
							</thead>
							<tbody>
							<tr>
								<td>贤心</td>
								<td>2016-11-29</td>
								<td>人生就像是一场修行</td>
							</tr>
							<tr>
								<td>许闲心</td>
								<td>2016-11-28</td>
								<td>于千万人之中遇见你所遇见的人，于千万年之中，时间的无涯的荒野里…</td>
							</tr>
							<tr>
								<td>sentsin</td>
								<td>2016-11-27</td>
								<td> Life is either a daring adventure or nothing.</td>
							</tr>
							</tbody>
						</table>

					</div>
					<div class="layui-elem-quote" style="margin-top: 20px;">
						<p>Layui - 精心为你雕琢</p>
					</div>
				</div>
			</div>


			<div class="layui-tab-item">
<textarea class="layui-border-box site-demo-text site-demo-code" id="LAY_democode" spellcheck="false" readonly="">&lt;!DOCTYPE html&gt;
&lt;html&gt;
&lt;head&gt;
  &lt;meta charset="utf-8"&gt;
  &lt;title&gt;layui&lt;/title&gt;
  &lt;meta name="renderer" content="webkit"&gt;
  &lt;meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"&gt;
  &lt;meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"&gt;
  &lt;link rel="stylesheet" href="//res.layui.com/layui/dist/css/layui.css"  media="all"&gt;
  &lt;!-- 注意：如果你直接复制所有代码到本地，上述css路径需要改成你本地的 --&gt;
&lt;/head&gt;
</textarea>
			</div>


			<div class="layui-tab-item">
				<div class="layui-main">
					<p></p>



					<div style="margin: 15px 0;">
						<ins class="adsbygoogle" style="display:inline-block;width:970px;height:90px" data-ad-client="ca-pub-6111334333458862" data-ad-slot="6835627838" data-adsbygoogle-status="done"><ins id="aswift_0_expand" style="display:inline-table;border:none;height:90px;margin:0;padding:0;position:relative;visibility:visible;width:970px;background-color:transparent;"><ins id="aswift_0_anchor" style="display:block;border:none;height:90px;margin:0;padding:0;position:relative;visibility:visible;width:970px;background-color:transparent;"><iframe marginwidth="0" marginheight="0" vspace="0" hspace="0" allowtransparency="true" scrolling="no" allowfullscreen="true" onload="var i=this.id,s=window.google_iframe_oncopy,H=s&amp;&amp;s.handlers,h=H&amp;&amp;H[i],w=this.contentWindow,d;try{d=w.document}catch(e){}if(h&amp;&amp;d&amp;&amp;(!d.body||!d.body.firstChild)){if(h.call){setTimeout(h,0)}else if(h.match){try{h=s.upd(h,i)}catch(e){}w.location.replace(h)}}" id="aswift_0" name="aswift_0" style="left:0;position:absolute;top:0;width:970px;height:90px;" width="970" height="90" frameborder="0"></iframe></ins></ins></ins>
					</div>



					<fieldset class="layui-elem-field layui-field-title" style="margin-top: 50px;">
						<legend>相关</legend>
					</fieldset>
					<a class="layui-btn layui-btn-normal" href="/doc/element/table.html" target="_blank">表格元素文档</a>
				</div>
			</div>
		</div>
	<script type="text/javascript" src="/js/news/newsList.js"></script>
@endsection
@section('script')

@endsection