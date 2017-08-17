@section('title','我的鱼塘')
@extends('layouts.person')
@section('header')
    <link href="{{ url('home/css/personal.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ url('home/css/systyle.css') }}" rel="stylesheet" type="text/css">
@endsection

@section('content1')
    @foreach($fish as $k=>$v)
        <div class="wrap-list" style="margin-top:6px">
            <!--物流 -->
            <div class="m-logistics">
                <div class="s-bar">
                    <i class="s-icon"></i>{{$v->fishpondname}}
                </div>
                <div class="s-content">
                    <ul class="lg-list">
                        <li class="lg-item">
                            <div class="item-info">
                                <a href="#">
                                    <img src="{{ $v->face }}">
                                </a>
                            </div>
                            <div class="lg-info">

                                <p>{{$v->synopsis}}</p>
                                <time>{{$v->unum}}个</time>
                            </div>
                            <div class="lg-confirm">
                                <a class="i-btn-typical" href="#">禁用</a>
                                <a class="i-btn-typical" href="{{url('home/fishgoods/').'/'.$v->id}}">查看鱼塘下商品</a>
                            </div>
                        </li>
                        <div class="clear"></div>
                    </ul>
                </div>
            </div>
        </div>
    @endforeach
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
                <span>2015.12</span>
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
