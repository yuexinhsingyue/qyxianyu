@extends('layouts.home')
@section('title',$pro->ptitle)

@section('header')
    <link href="{{ url('home/css/personal.css') }}" rel="stylesheet" type="text/css">
@endsection

@section('content')
<div class="nav-table">
    <div class="long-title"><span class="all-goods">全部分类</span></div>
    <div class="nav-cont">
        <ul>
            <li class="index"><a href="{{ url('/') }}">首页</a></li>
            <li class="qc"><a href="{{ url('home/news') }}">文章与问题</a></li>
            <li class="qc last"><a href="{{ url('home/fish') }}">鱼塘</a></li>
        </ul>
    </div>
</div>
<b class="line"></b>
<div class="am-g am-g-fixed blog-g-fixed bloglist">
    <div class="am-u-md-9">
        <article class="blog-main">
            {!! $pro->pcontent !!}
        </article>


        <hr class="am-article-divider blog-hr">
        <ul class="am-pagination blog-pagination">
            <li class="am-pagination-prev"><a href="">« 上一页</a></li>
            <li class="am-pagination-next"><a href="">下一页 »</a></li>
        </ul>
    </div>

    <div class="am-u-md-3 blog-sidebar">
        <div class="am-panel-group">

            <section class="am-panel am-panel-default">
                <div class="am-panel-hd">热门话题</div>
                <ul class="am-list blog-list">
                    <li><a href="#"><p>[特惠]闺蜜喊你来囤国货啦</p></a></li>
                    <li><a href="#"><p>[公告]华北、华中部分地区配送延迟</p></a></li>
                    <li><a href="#"><p>[特惠]家电狂欢千亿礼券 买1送1！</p></a></li>
                    <li><a href="#"><p>[公告]商城与广州市签署战略合作协议</p></a></li>
                    <li><a href="#"><p>[特惠]洋河年末大促，低至两件五折</p></a></li>
                </ul>
            </section>

        </div>
    </div>
</div>
@endsection

@section('js')
    <!--[if (gte IE 9)|!(IE)]><!-->
    <script src="{{ url('home/js/jquery.min.js') }}"></script>
    <!--<![endif]-->
    <script src="{{ url('home/js/amazeui.min.js') }}"></script>
@endsection