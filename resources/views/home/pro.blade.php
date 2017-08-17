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
        @if($article['prev'])
        <li class="am-pagination-prev"><a href="{{ url('home/pro').'/'.$article['prev']->pid}}484.html"><b>←←</b> {{$article['prev']->ptitle}}</a>
          @else
          <li class="am-pagination-prev">没有啦。。。。</li>
          @endif

        @if($article['next'])
        <li class="am-pagination-next"><a href="{{ url('home/pro').'/'.$article['next']->pid}}484.html">{{$article['next']->ptitle}} <b>→→</b></a>
          @else
            <li class="am-pagination-next">没有啦。。。。</li>
          @endif
        </ul>
    </div>

    <div class="am-u-md-3 blog-sidebar">
        <div class="am-panel-group">

            <section class="am-panel am-panel-default">
                <div class="am-panel-hd">热门问题</div>
                <ul class="am-list blog-list">
                    @foreach($rel as $k=>$v)
                    <li><a id="news" href="{{ url('home/pro').'/'.$v->pid}}484.html"><p>{{$v->ptitle}}</p></a></li>
                    @endforeach
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