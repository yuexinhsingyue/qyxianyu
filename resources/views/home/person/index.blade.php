@section('title','个人中心')
@extends('layouts.person')
@section('header')
    <link href="{{ url('home/css/personal.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ url('home/css/systyle.css') }}" rel="stylesheet" type="text/css">
@endsection

@section('content1')
<div class="wrap-list">
    <div class="m-user">
        <!--个人信息 -->
        <div class="m-bg"></div>
        <div class="m-userinfo">
            <div class="m-baseinfo">
                <a href="#">
                    <img src="{{ url('home/img/getAvatar.do.jpg') }}">
                </a>
                <em class="s-name">(小叮当)<span class="vip1"></span></em>
                <div class="s-prestige am-btn am-round">
                    会员福利</div>
            </div>
            <div class="m-right">
                <div class="m-new">
                    <a href="#"><i class="am-icon-bell-o"></i>消息</a>
                </div>
                <div class="m-address">
                    <a href="#" class="i-trigger">我的收货地址</a>
                </div>
            </div>
        </div>

        <!--个人资产-->
        <div class="m-userproperty">
            <div class="s-bar">
                <i class="s-icon"></i>个人资产
            </div>
            <p class="m-big">
                <a href="#">
                    <i><img src="{{ url('home/img/day-to.png') }}"></i>
                    <span class="m-title">签到有礼</span>
                </a>
            </p>
            <p class="m-big">
                <a href="#">
                    <i><img src="{{ url('home/img/72h.png') }}"></i>
                    <span class="m-title">72小时发货</span>
                </a>
            </p>
        </div>
    </div>
    <div class="box-container-bottom"></div>

    <!--订单 -->
    <div class="m-order">
        <div class="s-bar">
            <i class="s-icon"></i>我的订单
            <a class="i-load-more-item-shadow" href="#">全部订单</a>
        </div>
        <ul>
            <li><a href="#"><i><img src="{{ url('home/img/pay.png') }}"></i><span>待付款</span></a></li>
            <li><a href="#"><i><img src="{{ url('home/img/send.png') }}"></i><span>待发货<em class="m-num">1</em></span></a></li>
            <li><a href="#"><i><img src="{{ url('home/img/receive.png') }}"></i><span>待收货</span></a></li>
            <li><a href="#"><i><img src="{{ url('home/img/comment.png') }}"></i><span>待评价<em class="m-num">3</em></span></a></li>
            <li><a href="#"><i><img src="{{ url('home/img/refund.png') }}"></i><span>退换货</span></a></li>
        </ul>
    </div>
    <!--九宫格-->
    <div class="user-patternIcon">
        <div class="s-bar">
            <i class="s-icon"></i>我的常用
        </div>
        <ul>

            <a href="#"><li class="am-u-sm-4"><i class="am-icon-shopping-basket am-icon-md"></i><img src="{{ url('home/img/iconbig.png') }}"><p>购物车</p></li></a>
            <a href="#"><li class="am-u-sm-4"><i class="am-icon-heart am-icon-md"></i><img src="{{ url('home/img/iconsmall1.png') }}"><p>我的收藏</p></li></a>
            <a href="#"><li class="am-u-sm-4"><i class="am-icon-gift am-icon-md"></i><img src="{{ url('home/img/iconsmall0.png') }}"><p>为你推荐</p></li></a>
            <a href="#"><li class="am-u-sm-4"><i class="am-icon-pencil am-icon-md"></i><img src="{{ url('home/img/iconsmall3.png') }}"><p>好评宝贝</p></li></a>
            <a href="#"><li class="am-u-sm-4"><i class="am-icon-clock-o am-icon-md"></i><img src="{{ url('home/img/iconsmall2.png') }}"><p>我的足迹</p></li></a>
        </ul>
    </div>
    <!--物流 -->
    <div class="m-logistics">

        <div class="s-bar">
            <i class="s-icon"></i>我的物流
        </div>
        <div class="s-content">
            <ul class="lg-list">

                <li class="lg-item">
                    <div class="item-info">
                        <a href="#">
                            <img src="{{ url('home/img/65.jpg_120x120xz.jpg') }}" alt="抗严寒冬天保暖隔凉羊毛毡底鞋垫超薄0.35厘米厚吸汗排湿气舒适">
                        </a>

                    </div>
                    <div class="lg-info">

                        <p>快件已从 义乌 发出</p>
                        <time>2015-12-20 17:58:05</time>

                        <div class="lg-detail-wrap">
                            <a class="lg-detail i-tip-trigger" href="#">查看物流明细</a>
                            <div class="J_TipsCon hide">
                                <div class="s-tip-bar">中通快递&nbsp;&nbsp;&nbsp;&nbsp;运单号：373269427686</div>
                                <div class="s-tip-content">
                                    <ul>
                                        <li>快件已从 义乌 发出2015-12-20 17:58:05</li>
                                        <li>义乌 的 义乌总部直发车 已揽件2015-12-20 17:54:49</li>
                                        <li class="s-omit"><a data-spm-anchor-id="a1z02.1.1998049142.3" target="_blank" href="#">··· 查看全部</a></li>
                                        <li>您的订单开始处理2015-12-20 08:13:48</li>

                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="lg-confirm">
                        <a class="i-btn-typical" href="#">确认收货</a>
                    </div>
                </li>
                <div class="clear"></div>

            </ul>

        </div>

    </div>

    <!--收藏夹 -->
    <div class="you-like">
        <div class="s-bar">我的收藏
            <a class="am-badge am-badge-danger am-round">降价</a>
            <a class="am-badge am-badge-danger am-round">下架</a>
            <a class="i-load-more-item-shadow" href="#"><i class="am-icon-refresh am-icon-fw"></i>换一组</a>
        </div>
        <div class="s-content">
            <div class="s-item-wrap">
                <div class="s-item">

                    <div class="s-pic">
                        <a href="#" class="s-pic-link">
                            <img src="{{ url('home/img/0-item_pic.jpg_220x220.jpg') }}" alt="包邮s925纯银项链女吊坠短款锁骨链颈链日韩猫咪银饰简约夏配饰" title="包邮s925纯银项链女吊坠短款锁骨链颈链日韩猫咪银饰简约夏配饰" class="s-pic-img s-guess-item-img">
                        </a>
                    </div>
                    <div class="s-price-box">
                        <span class="s-price"><em class="s-price-sign">¥</em><em class="s-value">42.50</em></span>
                        <span class="s-history-price"><em class="s-price-sign">¥</em><em class="s-value">68.00</em></span>

                    </div>
                    <div class="s-title"><a href="#" title="包邮s925纯银项链女吊坠短款锁骨链颈链日韩猫咪银饰简约夏配饰">包邮s925纯银项链女吊坠短款锁骨链颈链日韩猫咪银饰简约夏配饰</a></div>
                    <div class="s-extra-box">
                        <span class="s-comment">好评: 98.03%</span>
                        <span class="s-sales">月销: 219</span>

                    </div>
                </div>
            </div>
            <div class="s-item-wrap"> </div>

            <div class="s-item-wrap"> </div>

            <div class="s-item-wrap"> </div>

            <div class="s-item-wrap"> </div>

        </div>
    </div>

</div>
@endsection

@section('content2')
    <div class="day-list">
        <div class="s-bar">
            <a class="i-history-trigger s-icon" href="#"></a>我的日历
            <a class="i-setting-trigger s-icon" href="#"></a>
        </div>
        <div class="s-care s-care-noweather">
            <div class="s-date">
                <em>21</em>
                <span>星期一</span>
                <span>2017.8</span>
            </div>
        </div>
    </div>

    <div class="new-goods">
        <div class="s-bar">
            <i class="s-icon"></i>今日新品
            <a class="i-load-more-item-shadow">15款新品</a>
        </div>
        <div class="new-goods-info">
            <a class="shop-info" href="#" target="_blank">
                <div class="face-img-panel">
                    <img src="{{ url('home/img/imgsearch1.jpg') }}" alt="">
                </div>
                <span class="new-goods-num ">4</span>
                <span class="shop-title">剥壳松子</span>
            </a>
            <a class="follow " target="_blank">关注</a>
        </div>
    </div>
@endsection

@section('js')

@endsection
