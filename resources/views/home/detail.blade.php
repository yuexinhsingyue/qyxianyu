@extends('layouts.home')

@section('title','商品详情页')

@section('header')
    <link type="text/css" href="{{ url('home/css/optstyle.css') }}" rel="stylesheet" />
    <link type="text/css" href="{{ url('home/css/style.css') }}" rel="stylesheet" />

    <script type="text/javascript" src="{{ url('home/js/jquery-1.7.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('home/js/quick_links.js') }}"></script>
    <script type="text/javascript" src="{{ url('home/js/amazeui.js') }}"></script>
    <script type="text/javascript" src="{{ url('home/js/jquery.imagezoom.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('home//js/jquery.flexslider.js') }}"></script>
    <script type="text/javascript" src="{{ url('home/js/list.js') }}"></script>
@endsection

@section('content')
    <b class="line"></b>
    <div class="listMain" style="margin-right: 0px;height:1460px;">
        <!--分类-->
        <div class="nav-table">
            <div class="long-title">
                <span class="all-goods">全部分类</span>
            </div>
            <div class="nav-cont">
                <ul>
                    <li class="index"><a href="{{ url('/') }}">首页</a></li>
                    <li class="qc"><a href="{{ url('home/work/17289.html') }}">文章与问题</a></li>
                    <li class="qc last"><a href="{{ url('home/fish') }}">鱼塘</a></li>
                </ul>
            </div>
        </div>
        <ol class="am-breadcrumb am-breadcrumb-slash">
            <li>
                <a href="#">
                    首页
                </a>
            </li>
            <li>
                <a href="#">
                    分类
                </a>
            </li>
            <li class="am-active">
                内容
            </li>
        </ol>
        <script type="text/javascript">
            $(function() {});
            $(window).load(function() {
                $('.flexslider').flexslider({
                    animation: "slide",
                    start: function(slider) {
                        $('body').removeClass('loading');
                    }
                });
            });
        </script> <!--放大镜-->
        <div class="item-inform">
            <div class="clearfixLeft" id="clearcontent">
                <div class="box">
                    <script type="text/javascript">
                        $(document).ready(function() {
                            $(".jqzoom").imagezoom();
                            $("#thumblist li a").click(function() {
                                $(this).parents("li").addClass("tb-selected").siblings().removeClass("tb-selected");
                                $(".jqzoom").attr('src', $(this).find("img").attr("mid"));
                                $(".jqzoom").attr('rel', $(this).find("img").attr("big"));
                            });
                        });
                    </script>
                    <div class="tb-booth tb-pic tb-s310">
                        <a href="{{ url('home/img/01.jpg') }}">
                            <img src="/{{ $input['pic']}}" alt="细节展示放大镜特效" rel="{{ url('home/img/01.jpg') }}"
                                 class="jqzoom" />
                        </a>
                    </div>
                    <ul class="tb-thumb">
                        <li class="tb-selected">
                            <div class="tb-pic tb-s40">
                                <a href="#">
                                    <img src="/{{ $input['pic']}}" mid="/{{ $input['pic'] }}" big="/{{ $input['pic']  }}">
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="clear"></div>
            </div>
            <div class="clearfixRight">
                <!--规格属性-->
                <!--名称-->
                <div class="tb-detail-hd">
                    <h1>
                        {{$input['gname']}}
                    </h1>
                </div>
                <div class="tb-detail-list">
                    <!--价格-->
                    <div class="tb-detail-price">
                        <li class="price iteminfo_price">
                            <dt>
                                现价
                            </dt>
                            <dd>
                                <em>
                                    ¥
                                </em>
                                <b class="sys_item_price">
                                   {{$input['nprice']}}
                                </b>
                            </dd>
                        </li>
                        <li class="price iteminfo_mktprice">
                            <dt>
                                原价
                            </dt>
                            <dd>
                                <em>
                                    ¥
                                </em>
                                <b class="sys_item_mktprice">
                                    {{$input['oprice']}}
                                </b>
                            </dd>
                        </li>
                        <div class="clear"></div>
                    </div>
                    <!--地址-->
                    <dl class="iteminfo_parameter freight">
                        <dt>
                            地址
                        </dt>
                        <div class="iteminfo_freprice">
                            <div class="am-form-content address">
                                <select data-am-selected>
                                    <option value="a">
                                        浙江省
                                    </option>
                                    <option value="b">
                                        湖北省
                                    </option>
                                </select>
                            </div>
                            <div class="pay-logis">
                                数量
                                <b class="sys_item_freprice">
                                    {{$input['goodsNum']}}
                                </b>
                            </div>
                        </div>
                    </dl>
                    <div class="clear"></div>
                    <!--销量-->
                    <div class="clear"></div>
                    <!--各种规格-->
                    <dl class="iteminfo_parameter">

                        <dd>
                            <!--操作页面-->

                            <div class="theme-popover">

                                <div class="theme-popbod dform">
                                    <form class="theme-signin" name="loginform" action="" method="post">
                                        <div class="theme-signin-left">
                                            <div class="theme-options">
                                                <div class="cart-title number">
                                                    数量
                                                </div>
                        <dd>
                            <input id="min" class="am-btn am-btn-default" name="" type="button" value="-"
                            />
                            <input id="text_box" name="" type="text" value="1" style="width:30px;"
                            />
                            <input id="add" class="am-btn am-btn-default" name="" type="button" value="+"
                            />
                            <span id="Stock" class="tb-hidden">库存
														<span class="stock">{{$input['goodsNum']}}</span>件
											        </span>
                        </dd>
                </div>
                <div class="clear"></div>
            </div>
            </form>
        </div>
    </div>
    </dd>
    </dl>
    <div class="clear"></div>
    </div>
    <div class="pay">
        <li>
            <div class="clearfix tb-btn tb-btn-buy theme-login">
                <a id="LikBuy" title="点此按钮到下一步确认购买信息" href="#">
                    立即购买
                </a>
            </div>
        </li>
        <li>
            <div class="clearfix tb-btn tb-btn-basket theme-login">
                <a id="LikBasket" title="加入购物车" href="{{ url('home/car/'.$input['id']) }}">
                    <i>
                    </i>
                    加入购物车
                </a>
            </div>
        </li>
    </div>
    </div>
    <div class="clear"></div>
    </div>
    <!--优惠套装-->

    <div class="clear"></div>
    <!-- introduce-->
    <div class="introduce">
        <div class="browse">
            <div class="mc">
                <ul>
                    <div class="mt">
                        <h2>
                            看了又看
                        </h2>
                    </div>
                    <li class="first">
                        <div class="p-img">
                            <a href="#">
                                <img class="" src="{{ url('home/img/browse1.jpg') }}">
                            </a>
                        </div>
                        <div class="p-name">
                            <a href="#">
                                【三只松鼠_开口松子】零食坚果特产炒货东北红松子原味
                            </a>
                        </div>
                        <div class="p-price">
                            <strong>
                                ￥35.90
                            </strong>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="introduceMain">
            <div class="am-tabs" data-am-tabs>
                <ul class="am-avg-sm-3 am-tabs-nav am-nav am-nav-tabs">
                    <li class="am-active">
                        <a href="#">
								<span class="index-needs-dt-txt">
									宝贝详情
								</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
								<span class="index-needs-dt-txt">
									全部评价
								</span>
                        </a>
                    </li>
                </ul>
                <div class="am-tabs-bd">
                    <div class="am-tab-panel am-fade am-in am-active">
                        <div class="J_Brand">
                            <div class="attr-list-hd">
                                <h4>
                                    产品参数：
                                </h4>
                            </div>
                            <div class="clear">
                            </div>
                            <ul id="J_AttrUL">
                                <li title="">
                                    产品类型:&nbsp;烘炒类
                                </li>
                            </ul>
                            <div class="clear">
                            </div>
                        </div>
                        <div class="details">
                            <div class="attr-list-hd">
                                <h4>
                                    商品细节
                                </h4>
                            </div>
                            <div class="twlistNews">
                                <img src="{{ url('home/img/tw1.jpg') }}" />
                            </div>
                        </div>
                        <div class="clear">
                        </div>
                    </div>
                    <div class="am-tab-panel am-fade">
                        <div class="actor-new">
                            <div class="rate">
                                <strong>
                                    100
                                    <span>
											%
										</span>
                                </strong>
                                <br>
                                <span>
										好评度
									</span>
                            </div>
                            <dl>
                                <dt>
                                    买家印象
                                </dt>
                                <dd class="p-bfc">
                                    <q class="comm-tags">
											<span>
												味道不错
											</span>
                                        <em>
                                            (2177)
                                        </em>
                                    </q>
                                </dd>
                            </dl>
                        </div>
                        <div class="clear">
                        </div>
                        <div class="tb-r-filter-bar">
                            <ul class=" tb-taglist am-avg-sm-4">
                                <li class="tb-taglist-li tb-taglist-li-current">
                                    <div class="comment-info">
											<span>
												全部评价
											</span>
                                        <span class="tb-tbcr-num">
												(32)
											</span>
                                    </div>
                                </li>
                                <li class="tb-taglist-li tb-taglist-li-1">
                                    <div class="comment-info">
											<span>
												好评
											</span>
                                        <span class="tb-tbcr-num">
												(32)
											</span>
                                    </div>
                                </li>
                                <li class="tb-taglist-li tb-taglist-li-0">
                                    <div class="comment-info">
											<span>
												中评
											</span>
                                        <span class="tb-tbcr-num">
												(32)
											</span>
                                    </div>
                                </li>
                                <li class="tb-taglist-li tb-taglist-li--1">
                                    <div class="comment-info">
											<span>
												差评
											</span>
                                        <span class="tb-tbcr-num">
												(32)
											</span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="clear">
                        </div>
                        <ul class="am-comments-list am-comments-list-flip">
                            <li class="am-comment">
                                <!-- 评论容器 -->
                                <a href="">
                                    <img class="am-comment-avatar" src="{{ url('home/img/hwbn40x40.jpg') }}" />
                                    <!-- 评论者头像 -->
                                </a>
                                <div class="am-comment-main">
                                    <!-- 评论内容容器 -->
                                    <header class="am-comment-hd">
                                        <!--<h3 class="am-comment-title">评论标题</h3>-->
                                        <div class="am-comment-meta">
                                            <!-- 评论元数据 -->
                                            <a href="#link-to-user" class="am-comment-author">
                                                b***1 (匿名)
                                            </a>
                                            <!-- 评论者 -->
                                            评论于
                                            <time datetime="">
                                                2015年11月02日 17:46
                                            </time>
                                        </div>
                                    </header>
                                    <div class="am-comment-bd">
                                        <div class="tb-rev-item " data-id="255776406962">
                                            <div class="J_TbcRate_ReviewContent tb-tbcr-content ">
                                                摸起来丝滑柔软，不厚，没色差，颜色好看！买这个衣服还接到诈骗电话，我很好奇他们是怎么知道我买了这件衣服，并且还知道我的电话的！
                                            </div>
                                            <div class="tb-r-act-bar">
                                                颜色分类：柠檬黄&nbsp;&nbsp;尺码：S
                                            </div>
                                        </div>
                                    </div>
                                    <!-- 评论内容 -->
                                </div>
                            </li>
                        </ul>
                        <div class="clear">
                        </div>
                        <!--分页 -->
                        <ul class="am-pagination am-pagination-right">
                            <li class="am-disabled">
                                <a href="#">
                                    &laquo;
                                </a>
                            </li>
                            <li class="am-active">
                                <a href="#">
                                    1
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    &raquo;
                                </a>
                            </li>
                        </ul>
                        <div class="clear">
                        </div>
                        <div class="tb-reviewsft">
                            <div class="tb-rate-alert type-attention">
                                购买前请查看该商品的
                                <a href="#" target="_blank">
                                    购物保障
                                </a>
                                ，明确您的售后保障权益。
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="clear">
            </div>
        </div>
    </div>
    </div>
@endsection


