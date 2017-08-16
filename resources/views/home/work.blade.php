@extends('layouts.home')
@section('title',$work->wtitle)

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
            {!! $work->wcontent !!}
        </article>

        <hr class="am-article-divider blog-hr">
        <ul class="am-pagination blog-pagination">
        @if($article['prev'])
        <li class="am-pagination-prev"><a href="{{ url('home/work').'/'.$article['prev']->wid}}289.html"><b>←←</b>上一篇：{{$article['prev']->wtitle}} >></a>
          @else
          <li class="am-pagination-prev">没有上一篇文章啦。。。。</li>
          @endif

        @if($article['next'])
        <li class="am-pagination-next"><a href="{{ url('home/work').'/'.$article['next']->wid}}289.html">上一篇：{{$article['next']->wtitle}} <b>→→</b></a>
          @else
            <li class="am-pagination-next">没有下一篇文章啦。。。。</li>
          @endif
        </ul>
    </div>


      

    <div class="am-u-md-3 blog-sidebar">
        <div class="am-panel-group">

            <section class="am-panel am-panel-default">
                <div class="am-panel-hd">最 新 文 章 ! </div>
                <ul class="am-list blog-list">
                    @foreach($rel as $k=>$v)
                    <li><a id="news" href="{{ url('home/work').'/'.$v->wid}}289.html"><p>{{$v->wtitle}}</p></a></li>
                    @endforeach
                </ul>
            </section>
        </div>
    </div>

    <style type="text/css">
        #news:hover{
            color:red;
        }
    </style>
</div>
@endsection

@section('js')
    <!--[if (gte IE 9)|!(IE)]><!-->
    <script src="{{ url('home/js/jquery.min.js') }}"></script>
    <!--<![endif]-->
    <script src="{{ url('home/js/amazeui.min.js') }}"></script>
@endsection