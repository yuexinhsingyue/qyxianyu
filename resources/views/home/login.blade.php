<!DOCTYPE html>
<html>

<head lang="en">
	<meta charset="UTF-8">
	<title>登录</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<meta name="format-detection" content="telephone=no">
	<meta name="renderer" content="webkit">
	<meta http-equiv="Cache-Control" content="no-siteapp" />

	<link rel="stylesheet" href="{{ url('home/css/amazeui.css') }}" />
	<link href="{{ url('home/css/dlstyle.css') }}" rel="stylesheet" type="text/css">

	<script type="text/javascript" src="{{ url('home/js/jquery.js') }}"></script>
</head>

<body>

<div class="login-boxtitle">
	<a href="{{ url('/') }}"><img alt="logo" src="{{ url('home/img/logobig.png') }}" /></a>
</div>

<div class="login-banner">
	<div class="login-main">
		<div class="login-banner-bg"><span></span><img src="{{ url('home/img/big.jpg') }}" /></div>
		<div class="login-box">

			<h3 class="title">登录商城</h3>

			<div class="clear"></div>
			<form action="{{ url('home/dologin') }}" method="post">
				@if(count($errors) > 0)
					<div class="alert alert-danger" id="error">
						<ul>
							@foreach($errors -> all() as $error)
								<li>{{ $error }}</li>
							@endforeach
						</ul>
					</div>
				@endif
				<div class="login-form">
						{{ csrf_field() }}
						<div class="user-name">
							<label for="user"><i class="am-icon-user"></i></label>
							<input type="text" name="uname" id="user" placeholder="邮箱/手机">
						</div>
						<div class="user-pass">
							<label for="password"><i class="am-icon-lock"></i></label>
							<input type="password" name="password" id="password" placeholder="请输入密码">
						</div>
				</div>
				<div class="login-links">
					<a href="#" class="am-fr">忘记密码</a>
					<a href="{{ url('home/register') }}" class="zcnext am-fr am-btn-default">注册</a>
					<br />
				</div>
				<div class="am-cf">
					<input type="submit" name="" value="登 录" class="am-btn am-btn-primary am-btn-sm">
				</div>
				<div class="partner">
					<h3>合作账号</h3>
					<div class="am-btn-group">
						<li><a href="{{ url('auth/qq') }}"><i class="am-icon-qq am-icon-sm"></i><span>QQ登录</span></a></li>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>



<div class="footer ">
	<div class="footer-hd ">
		<p>
			<a href="# ">商城首页</a>
			<b>|</b>
			<a href="# ">支付宝</a>
			<b>|</b>
			<a href="# ">物流</a>
		</p>
	</div>
	<div class="footer-bd ">
		<p>
			<a href="# ">关于群英</a>
			<a href="# ">合作伙伴</a>
			<a href="# ">联系我们</a>
			<a href="# ">网站地图</a>
			<em>© 2015-2025 qunyin.com 版权所有. 更多模板 <a href="http://www.cssmoban.com/" target="_blank" title="模板之家">模板之家</a> - Collect from <a href="http://www.cssmoban.com/" title="网页模板" target="_blank">网页模板</a></em>
		</p>
	</div>
</div>

<script>
    setTimeout(function(){
        $('#error').hide();
    },3000);
</script>

</body>

</html>