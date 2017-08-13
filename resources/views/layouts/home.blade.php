<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <title>@yield('title')</title>

    <link href="{{ url('home/css/amazeui.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('home/css/admin.css') }}" rel="stylesheet" type="text/css" />

    <link href="{{ url('home/css/demo.css') }}" rel="stylesheet" type="text/css" />

    <link href="{{ url('home/css/hmstyle.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ url('home/css/skin.css') }}" rel="stylesheet" type="text/css" />
    <script src="{{ url('home/js/jquery.min.js') }}"></script>
    <script src="{{ url('home/js/amazeui.min.js') }}"></script>
    @section('header')
    @show
</head>

<body>
<div class="hmtop">
    <!--顶部导航条 -->
    <div class="am-container header">
        <ul class="message-l">
            <div class="topMessage">
                <div class="menu-hd">
                    <a href="{{ url('home/login') }}" target="_top" class="h">亲，请登录</a>
                    <a href="{{ url('home/register') }}" target="_top">免费注册</a>
                </div>
            </div>
        </ul>
        <ul class="message-r">
            <div class="topMessage home">
                <div class="menu-hd"><a href="#" target="_top" class="h">闲鱼首页</a></div>
            </div>
            <div class="topMessage my-shangcheng">
                <div class="menu-hd MyShangcheng"><a href="#" target="_top"><i class="am-icon-user am-icon-fw"></i>个人中心</a></div>
            </div>
            <div class="topMessage mini-cart">
                <div class="menu-hd"><a id="mc-menu-hd" href="#" target="_top"><i class="am-icon-shopping-cart  am-icon-fw"></i><span>购物车</span><strong id="J_MiniCartNum" class="h">0</strong></a></div>
            </div>
            {{--<div class="topMessage favorite">--}}
            {{--<div class="menu-hd"><a href="#" target="_top"><i class="am-icon-heart am-icon-fw"></i><span>收藏夹</span></a></div>--}}
            {{--</div>--}}
        </ul>
    </div>
    <!--悬浮搜索框-->
    <div class="nav white">
        {{--logo--}}
        <div class="logoBig">
            <li><img src="{{ url('home/img/logobig.png') }}" /></li>
        </div>
        {{--搜索--}}
        <div class="search-bar pr">
            <form>
                <input id="searchInput" name="index_none_header_sysc" type="text" placeholder="搜索" autocomplete="off">
                <input id="ai-topsearch" class="submit am-btn" value="搜索" index="1" type="submit">
            </form>
        </div>
    </div>
    <div class="clear"></div>
</div>
@section('content')

@show
<div class="footer ">
        <div class="footer-hd ">
            <p>
                <a href="# ">群英闲鱼</a>
                <b>|</b>
                <a href="# ">商城首页</a>
            </p>
        </div>
        <div class="footer-bd ">
            <p>
                <a href="# ">关于群英</a>
                <em>© 2015-2025 QunYing.com 版权所有. 更多模板 <a href="" target="_blank">友情链接</a> - Collect from <a href="" target="_blank">友情链接</a></em>
            </p>
        </div>
    </div>

<script>
    window.jQuery || document.write('<script src="{{ url('home/js/jquery.min.js') }}"><\/script>');
</script>
<script type="text/javascript " src="{{ url('home/js/quick_links.js') }}"></script>
@section('js')

@show
</body>
</html>