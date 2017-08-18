@extends('layouts.home')
@section('title',$web->name)

@section('header')
	<link href="{{ url('home/css/hmstyle.css') }}" rel="stylesheet" type="text/css"/>
	<link href="{{ url('home/css/skin.css') }}" rel="stylesheet" type="text/css" />

	<script src="{{ url('home/js/jquery.min.js') }}"></script>
	<script src="{{ url('home/js/amazeui.min.js') }}"></script>
@endsection

@section('content')
<div class="banner">
	<!--轮播 -->
	<div class="am-slider am-slider-default scoll" data-am-flexslider id="demo-slider-0">
		<ul class="am-slides">
			@foreach($figure as $k=>$v)
				{!! $v->simg !!}
			@endforeach
		</ul>
	</div>

	<div class="clear"></div>
</div>
<div class="shopNav">
	<div class="slideall">
		{{--导航菜单--}}
		<div class="long-title"><span class="all-goods">全部分类</span></div>
		<div class="nav-cont">
			<ul>
				<li class="index"><a href="{{ url('/') }}">首页</a></li>
				<li class="qc"><a href="#wkpro">文章与问题</a></li>
				<li class="qc last"><a href="{{ url('home/fish') }}">鱼塘</a></li>
			</ul>
		</div>
		<!--侧边导航 -->
		<div id="nav" class="navfull">

			<div class="area clearfix">
				<div class="category-content" id="guide_2">
					<div class="category">
						<ul class="category-list" id="js_climit_li">
							@foreach($ptype as $k=>$v)
							<li class="appliance js_toggle relative">
								<div class="category-info">
									<h3 class="category-name b-category-name"><a class="ml-22" title=""> {{$v->tname}}</a></h3>
									<em>&gt;</em></div>
								<div class="menu-item menu-in top">
									<div class="area-in">
										<div class="area-bg">
											<div class="menu-srot">
												<div class="sort-side">
													<dl class="dl-sort">
														@foreach($a as $m=>$n)
															@if($k == $m)
															@foreach($n as $j=>$h)
														<dd><a title="" href="{{ url('home/list') }}"><span>{{$h->tname}}</span></a></dd>

															@endforeach
															@endif
														@endforeach
													</dl>
												</div>
											</div>
										</div>
									</div>
								</div>
								<b class="arrow"></b>
							</li>
							@endforeach
						</ul>
					</div>
				</div>
			</div>

		</div>
		<!--轮播-->
		<script type="text/javascript">
            (function() {
                $('.am-slider').flexslider();
            });
            $(document).ready(function() {
                $("li").hover(function() {
                    $(".category-content .category-list li.first .menu-in").css("display", "none");
                    $(".category-content .category-list li.first").removeClass("hover");
                    $(this).addClass("hover");
                    $(this).children("div.menu-in").css("display", "block")
                }, function() {
                    $(this).removeClass("hover")
                    $(this).children("div.menu-in").css("display", "none")
                });
            })
		</script>
		<!--走马灯 -->
		<div class="marqueen" style="top: 47px; margin-bottom: 0px; height: 430px;">
			<span class="marqueen-title">二手商品累计销售300万</span>
			<div class="demo">
				<ul>
					<li>
						<a target="_blank" href="#"><span>[特惠]</span>洋河年末大促，低至两件五折</a>
					</li>
					<li>
						<a target="_blank" href="#"><span>[特惠]</span>洋河年末大促，低至两件五折</a>
					</li>
					<li>
						<a target="_blank" href="#"><span>[特惠]</span>洋河年末大促，低至两件五折</a>
					</li>
				</ul>
				<div class="advTip"><img src="{{ url('home/img/advTip.png') }}"/></div>
			</div>
		</div>
		<div class="clear"></div>
	</div>
	<script type="text/javascript">
        if ($(window).width() < 640) {
            function autoScroll(obj) {
                $(obj).find("ul").animate({
                    marginTop: "-39px"
                }, 500, function() {
                    $(this).css({
                        marginTop: "0px"
                    }).find("li:first").appendTo(this);
                })
            }
            $(function() {
                setInterval('autoScroll(".demo")', 3000);
            })
        }
	</script>
</div>
<div class="shopMainbg">
	<div class="shopMain" id="shopmain" style="margin-right: 0px;">
		<!--今日推荐 -->
		<div class="am-g am-g-fixed recommendation">
			<div class="clock am-u-sm-3">
			<p>今日推荐</p>
		</div>
		<div class="am-u-sm-4 am-u-lg-3 ">
			<div class="info ">
				<h3>真的有鱼</h3>
				<h4>开年福利篇</h4>
			</div>
			<div class="recommendationMain one">
				<a href="introduction.html"><img src="{{ url('home/img/tg.jpg') }} "></img></a>
			</div>
		</div>
		<div class="am-u-sm-4 am-u-lg-3 ">
			<div class="info ">
				<h3>真的有鱼</h3>
				<h4>开年福利篇</h4>
			</div>
			<div class="recommendationMain one">
				<a href="introduction.html"><img src="{{ url('home/img/tg.jpg') }} "></img></a>
			</div>
		</div>
		<div class="am-u-sm-4 am-u-lg-3 ">
			<div class="info ">
				<h3>真的有鱼</h3>
				<h4>开年福利篇</h4>
			</div>
			<div class="recommendationMain one">
				<a href="introduction.html"><img src="{{ url('home/img/tg.jpg') }} "></img></a>
			</div>
		</div>
	</div>
	<div class="clear "></div>
	<!--热门活动 -->
	<div class="am-container activity ">
		<div class="shopTitle ">
			<h4>广告栏</h4>
		</div>
		<div class="am-g am-g-fixed ">
			@foreach($advert as $ad)
			<div class="am-u-sm-3 ">
				<div class="activityMain ">
					<a href="{{$ad['adlink']}}"  target="_blank"><img src="{{ url($ad['pic']) }} " title="{{$ad['addescribe']}}"></a>
				</div>
			</div>
			@endforeach

		</div>
	</div>
	<div class="clear "></div>

	<div id="f1">
		<!--甜点-->

		<div class="am-container ">
			<div class="shopTitle ">
				<h4>电脑</h4>
				<h3>二手电脑 便宜</h3>
				<span class="more ">
                    <a href="# ">更多<i class="am-icon-angle-right" style="padding-left:10px ;" ></i></a>
				</span>
			</div>
		</div>
		<div class="am-g am-g-fixed floodFour">
			<div class="am-u-sm-5 am-u-md-4 text-one list ">
				<div class="word">
					<a class="outer" href="#"><span class="inner"><b class="text">内存</b></span></a>
					<a class="outer" href="#"><span class="inner"><b class="text">CPU</b></span></a>
					<a class="outer" href="#"><span class="inner"><b class="text">硬件</b></span></a>
					<a class="outer" href="#"><span class="inner"><b class="text">键盘</b></span></a>
					<a class="outer" href="#"><span class="inner"><b class="text">鼠标</b></span></a>

				</div>
				<a href="# ">
					<div class="outer-con ">
						<div class="title ">
							开抢啦！
						</div>
						<div class="sub-title ">
							超低价
						</div>
					</div>
					<img src="{{ url('home/img/1.jpg') }} " />
				</a>
				<div class="triangle-topright"></div>
			</div>

			<div class="am-u-sm-7 am-u-md-4 text-two sug">
				@foreach($com as $k=>$v)
					@if($k == 0 )
				<div class="outer-con ">
					<div class="title ">
						{{$v->gname}}
					</div>
					<div class="sub-title ">
						¥{{$v->nprice}}
					</div>
					<i class="am-icon-shopping-basket am-icon-md  seprate"></i>
				</div>
				<a href="# "><img src="/{{ $v->pic  }}" /></a>
					@endif
				@endforeach
			</div>

			<div class="am-u-sm-7 am-u-md-4 text-two">
				@foreach($com as $k=>$v)
					@if($k == 1 )
				<div class="outer-con ">
					<div class="title ">
						{{$v->gname}}
					</div>
					<div class="sub-title ">
						¥{{$v->nprice}}
					</div>
					<i class="am-icon-shopping-basket am-icon-md  seprate"></i>
				</div>
				<a href="# "><img src="/{{ $v->pic  }}" /></a>
					@endif
				@endforeach
			</div>
			<div class="am-u-sm-3 am-u-md-2 text-three big">
				@foreach($com as $k=>$v)
					@if($k == 2 )
				<div class="outer-con ">
					<div class="title ">
						{{$v->gname}}
					</div>
					<div class="sub-title ">
						¥{{$v->nprice}}
					</div>
					<i class="am-icon-shopping-basket am-icon-md  seprate"></i>
				</div>
				<a href="# "><img src="/{{ $v->pic  }}" /></a>
					@endif
				@endforeach
			</div>
			<div class="am-u-sm-3 am-u-md-2 text-three sug">
				@foreach($com as $k=>$v)
					@if($k == 3 )
				<div class="outer-con ">
					<div class="title ">
						{{$v->gname}}
					</div>
					<div class="sub-title ">
						¥{{$v->nprice}}
					</div>
					<i class="am-icon-shopping-basket am-icon-md  seprate"></i>
				</div>
				<a href="# "><img src="/{{ $v->pic  }}" /></a>
					@endif
				@endforeach
			</div>
			<div class="am-u-sm-3 am-u-md-2 text-three ">
				@foreach($com as $k=>$v)
					@if($k == 4 )
				<div class="outer-con ">
					<div class="title ">
						{{$v->gname}}
					</div>
					<div class="sub-title ">
						¥{{$v->nprice}}
					</div>
					<i class="am-icon-shopping-basket am-icon-md  seprate"></i>
				</div>
				<a href="# "><img src="/{{ $v->pic  }}" /></a>
					@endif
				@endforeach
			</div>
			<div class="am-u-sm-3 am-u-md-2 text-three last big ">
				@foreach($com as $k=>$v)
					@if($k == 5 )
				<div class="outer-con ">
					<div class="title ">
						{{$v->gname}}
					</div>
					<div class="sub-title ">
						¥{{$v->nprice}}
					</div>
					<i class="am-icon-shopping-basket am-icon-md  seprate"></i>
				</div>
				<a href="# "><img src="/{{ $v->pic  }}" /></a>
					@endif
				@endforeach
			</div>
		</div>


		<div class="guide clearfix" style="margin-left:290px;margin-top:20px">

			  <div class="recycle col">
			    <h4>数码回收 — 5分钟全部变现，全程免邮！</h4>
			    <div class="recycel-type mobile">
			      <a href="//2.taobao.com/recycle/index.htm" class="img">手机回收</a>
			      <a href="//2.taobao.com/recycle/index.htm" class="btn">手机回收<b></b></a>
			    </div>
			    <div class="recycel-type table">
			      <a href="//2.taobao.com/recycle/index.htm?categoryId=50019780" class="img">平板回收</a>
			      <a href="//2.taobao.com/recycle/index.htm?categoryId=50019780" class="btn">平板回收<b></b></a>
			    </div>
			    <div class="recycel-type notebook">
			      <a href="//2.taobao.com/recycle/index.htm?categoryId=1101" class="img">笔记本回收</a>
			      <a href="//2.taobao.com/recycle/index.htm?categoryId=1101" class="btn">笔记本回收<b></b></a>
			    </div>
			  </div>

			  <div class="module">
			  <div class="tutorial col J_TMSArea" data-tms-id="690942">
			    <div class="mod col">
			      <h4 id="wkpro">
			      	相关文章
			      </h4>
			      <div>
			        <ul class="list" style="background-color:#FCFCFC;border-radius:10px">
			        @foreach($work as $k=>$v)
			          <li>
			            <b>
			            </b>
			            <a href="{{ url('home/work').'/'.$v->wid}}289.html">
			              {{ $v->wtitle }}
			            </a>
			          </li>
					@endforeach		
			        </ul>
			      </div>
			    </div>
			    <div class="mod col">
			      <h4>
			        相关问题<!-- 6条 -->
			      </h4>
			      <div>
			        <ul class="list" style="background-color:#FCFCFC;border-radius:10px">
			       		@foreach($problem as $k=>$v)
				          <li>
				            <b>
				            </b>
				            <a href="{{ url('home/pro').'/'.$v->pid}}484.html">
			             		{{ $v->ptitle }}
				            </a>
				          </li>
				        @endforeach

			        </ul>
			      </div>
			    </div>
			  </div>
			</div>
</div>
<style type="text/css">
	
	.guide {
	    border: 1px solid #e6e6e6;
	    height: 260px;
	    width:1000px;
	}

</style>
		<div class="clear "></div>

	</div>
</div>

@endsection

@section('js')
	<script>
		$('.category-list li').eq(0).addClass("first");
        $('.category-list li').eq(9).addClass("last");
	</script>
@endsection


@section('js')
	<script>
        window.jQuery || document.write('<script src="{{ url('home/js/jquery.min.js') }}"><\/script>');
	</script>
	<script type="text/javascript " src="{{ url('home/js/quick_links.js') }}"></script>
@endsection
