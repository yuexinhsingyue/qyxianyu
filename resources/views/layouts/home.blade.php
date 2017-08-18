<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="description" content="{{$web->describe}}"/>
    <title>@yield('title')</title>

    <link href="{{ url('home/css/amazeui.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('home/css/admin.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('home/css/demo.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('home/css/work.css') }}" rel="stylesheet" type="text/css" />

    <script type="text/javascript" src="{{ URL::asset('admin/js/jquery.js') }}"></script>
    <script type="text/javascript" src="/layer/layer.js"></script>



    <link rel="shortcut icon" type="image/x-icon" href="{{url('/home/favicon.ico')}}" />

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
                    @if(empty(session('homeuser')))
                        <a href="{{ url('home/login') }}" target="_top" class="h">亲，请登录</a>
                        <a href="{{ url('home/register') }}" target="_top">免费注册</a>
                    @else
                        <span class="h">你好：{{ session('homeuser')['uname'] }}</span>
                        <a href="{{ url('home/loginout') }}">退出</a>
                    @endif
                </div>
            </div>
        </ul>
        <ul class="message-r">
            <div class="topMessage my-shangcheng">

                <div class="menu-hd MyShangcheng"><a href="{{url('home/personnal')}}" target="_top"><i class="am-icon-user am-icon-fw"></i>个人中心</a></div>

            </div>
            <div class="topMessage mini-cart">
                <div class="menu-hd"><a id="mc-menu-hd" href="{{ url('home/car') }}" target="_top"><i class="am-icon-shopping-cart  am-icon-fw"></i><span>购物车</span><strong id="J_MiniCartNum" class="h"></strong></a></div>
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
            <li><a href="{{ url('/') }}"><img src="{{$web->logo}}" /></a></li>
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
<div class="footer">
    
    <div class="footer-bd" >
    </div>


    {{--友情链接--}}
    <div class="footer-hd ">
        <p>
        @foreach($links as $k=>$v)
            @if($v->limg)
                    <span>
                      <a target="_blank" href="http://{{$v->lurl}}" class="mod"><img src="{{$v->limg}}" style="width:70px;height:30px;border-radius:4px" /></a>
                    </span>
                    <b>|</b>
            @else
            <span><a href="http://{{$v->lurl}}" target="_blank">{{$v->lname}}</a></span>
                <b>|</b>
            @endif
        @endforeach
        </p>
    </div>

    {{--备案号--}}
    <div class="footer-bd">
    <p>
      <span>
        {{$web->cright}}
      </span>
    </p>
    举报联系电话：{{$web->telephone}}
  </div>

</div>

@section('js')

@show
</body>
</html>