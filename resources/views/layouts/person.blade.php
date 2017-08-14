@extends('layouts.home')

@section('content')

    <div class="nav-table">
        <div class="long-title"><span class="all-goods">全部分类</span></div>
        <div class="nav-cont">
            <ul>
                <li class="index"><a href="#">首页</a></li>
                <li class="qc"><a href="#">闪购</a></li>
                <li class="qc"><a href="#">限时抢</a></li>
                <li class="qc"><a href="#">团购</a></li>
                <li class="qc last"><a href="#">大包装</a></li>
            </ul>
            <div class="nav-extra">
                <i class="am-icon-user-secret am-icon-md nav-user"></i><b></b>我的福利
                <i class="am-icon-angle-right" style="padding-left: 10px;"></i>
            </div>
        </div>
    </div>
    <b class="line"></b>
    <div class="center">
        <div class="col-main">
            <div class="main-wrap">
                <div class="wrap-right">


                </div>
                <div class="wrap-left">
                    @section('content1')
                        @show
                </div>
            </div>


        </div>

        <aside class="menu">
            <ul>
                <li class="person active">
                    <a href="index.html">个人中心</a>
                </li>
                <li class="person">
                    <a href="#">个人资料</a>
                    <ul>
                        <li> <a href="information.html">个人信息</a></li>
                        <li> <a href="safety.html">安全设置</a></li>
                        <li> <a href="address.html">收货地址</a></li>
                    </ul>
                </li>
                <li class="person">
                    <a href="#">我的交易</a>
                    <ul>
                        <li><a href="order.html">订单管理</a></li>
                        <li> <a href="change.html">退款售后</a></li>
                    </ul>
                </li>
                <li class="person">
                    <a href="#">我的商品</a>
                    <ul>
                        <li> <a href="{{url('home/goods')}}">商品列表 </a></li>
                        <li> <a href="{url('home/goods/create')}}">添加商品</a></li>
                        <li> <a href="bill.html">账单明细</a></li>
                    </ul>
                </li>

                <li class="person">
                    <a href="#">我的小窝</a>
                    <ul>
                        <li> <a href="collection.html">收藏</a></li>
                        <li> <a href="foot.html">足迹</a></li>
                        <li> <a href="comment.html">评价</a></li>
                        <li> <a href="news.html">消息</a></li>
                    </ul>
                </li>

            </ul>

        </aside>
    </div>
    <!--引导 -->
    <div class="navCir">
        <li><a href="../home/home.html"><i class="am-icon-home "></i>首页</a></li>
        <li><a href="../home/sort.html"><i class="am-icon-list"></i>分类</a></li>
        <li><a href="../home/shopcart.html"><i class="am-icon-shopping-basket"></i>购物车</a></li>
        <li class="active"><a href="index.html"><i class="am-icon-user"></i>我的</a></li>
    </div>


@endsection