@extends('layouts.home')
@section('title','文章和问题页面')

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
            <h3 class="am-article-title blog-title">
                <a href="#">×张毛爷爷，搞定靓妆容</a>
            </h3>
            <h4 class="am-article-meta blog-meta">2014-06-17 09:52</h4>

            <div class="am-g blog-content">
                <div class="am-u-sm-12">
                    <p>年轻的妹子爱美丽，这是人之常情，但是没有足够的经济实力，面对昂贵奢华的护肤品难免囊中羞涩。不过不用担心，年轻的资本就是，不需要投入太多，却依然有俏丽的脸蛋儿~今天小编就给妹子们准备了炙手可热的百元护肤大礼包，看看有没有自己需要的吧！</p>

                    <strong class="blog-tit"><p>一张毛爷爷<span>丨</span>基础护肤</p></strong>
                    <div class="Row">
                        <li><img src="{{ url('home/img/blog01.jpg') }}"></li>
                        <li><img src="{{ url('home/img/blog02.jpg') }}"></li>
                        <li><img src="{{ url('home/img/blog03.jpg') }}"></li>
                    </div>
                    <p>百元以内的基础护肤套装，小编给妹子们挑选了洗面奶、爽肤水和面霜，按照洁面和护肤的顺序，大家可以尽情将这些口碑好货加入购物车哦。</p>
                    <p>一向是；平价又好用的露得清洗面奶，加上很大一支感觉怎么都用不完的千纤草丝瓜水，最后用玉兰油面霜锁住面部水分，简直完美！</p>

                    <strong class="blog-tit"><p>两张毛爷爷<span>丨</span>彩妆</p></strong>
                    <div class="Row">
                        <li><img src="{{ url('home/img/blog04.jpg') }}"></li>
                        <li><img src="{{ url('home/img/blog05.jpg') }}"></li>
                        <li><img src="{{ url('home/img/blog06.jpg') }}"></li>
                    </div>

                    <p>眼妆是整个妆面的精髓，一个精致的眼妆可以瞬间提升人的气场，或是娇羞可爱，或者温婉贤淑，或是妩媚妖娆，总有一种风格适合自己。想不到仅仅不到200软妹币就能搞定眼妆这个磨人的小妖精吧！</p>

                    <strong class="blog-tit"><p>三张毛爷爷<span>丨</span>身体护理</p></strong>
                    <div class="Row">
                        <li><img src="{{ url('home/img/blog07.jpg') }}"></li>
                        <li><img src="{{ url('home/img/blog08.jpg') }}"></li>
                        <li><img src="{{ url('home/blog09.jpg') }}"></li>
                    </div>

                    <p>初春空气干燥，洗手洗澡后不马上涂点润肤乳，皮肤就会不听话得干燥粗糙起来，着实让爱美的妹子们操碎了心。春天不光是万物复苏的季节，还是万物需要滋养的季节，而且要从头到脚得滋养。</p>

                </div>
            </div>
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