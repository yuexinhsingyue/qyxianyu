@extends('layouts.home')

@section('content')

    <div class="nav-table">
        <div class="long-title"><span class="all-goods">全部分类</span></div>
        <div class="nav-cont">
            <ul>
                <li class="index"><a href="{{ url('/') }}">首页</a></li>
                <li class="qc"><a href="{{ url('home/news') }}">文章与问题</a></li>
                <li class="qc last"><a href="{{ url('home/fishlist') }}">鱼塘</a></li>
            </ul>
        </div>
    </div>
    <b class="line"></b>
    <div class="center">
        <div class="col-main">
            <div class="main-wrap">
                <div class="wrap-left">
                    @section('content1')
                        @show
                </div>
               
            </div>

        </div>

        <aside class="menu">
            <ul>
                <li class="person active">
                    <a href="#">个人中心</a>
                </li>
                <li class="person">
                    <a href="#">个人资料</a>
                    <ul>
                        <li> <a href="#">个人信息</a></li>
                        <li> <a href="#">安全设置</a></li>
                        <li> <a href="#">收货地址</a></li>
                    </ul>
                </li>
                <li class="person">
                    <a href="#">我的交易</a>
                    <ul>
                        <li><a href="#">订单管理</a></li>
                    </ul>
                </li>
                <li class="person">
                    <a href="#">我的商品</a>
                    <ul>
                        <li> <a href="{{url('home/goods/create')}}">添加商品</a></li>
                        <li> <a href="{{url('home/goods')}}">商品列表</a></li>
                    </ul>
                </li>

                <li class="person">
                    <a href="#">我的小窝</a>
                    <ul>
                        <li> <a href="#">收藏</a></li>
                        <li> <a href="#">评价</a></li>
                    </ul>
                </li>

                <li class="person">
                    <a href="#">我的鱼塘</a>
                    <ul>
                        <li> <a href="{{url('home/fishuser')}}">鱼塘列表</a></li>
                         <li> <a href="{{url('/home/address')}}">增加鱼塘</a></li>
                    </ul>
                </li>
            </ul>

        </aside>
    </div>


@endsection