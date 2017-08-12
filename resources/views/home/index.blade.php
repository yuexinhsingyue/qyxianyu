@extends('layouts.home')
@section('title','首页')

@section('content')
<div class="banner">
	<!--轮播 -->
	<div class="am-slider am-slider-default scoll" data-am-flexslider id="demo-slider-0">
		<ul class="am-slides">
			<li class="banner1"><a href="#"><img src="{{ url('home/img/ad5.jpg') }}" /></a></li>
			<li class="banner2"><a href="#"><img src="{{ url('home/img/ad6.jpg') }}" /></a></li>
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
				<li class="index"><a href="#">首页</a></li>
				<li class="qc"><a href="#">文章与问题</a></li>
				<li class="qc last"><a href="#">鱼塘</a></li>
			</ul>
		</div>
		<!--侧边导航 -->
		<div id="nav" class="navfull">
			<div class="area clearfix">
				<div class="category-content" id="guide_2">
					<div class="category">
						<ul class="category-list" id="js_climit_li">
							<li class="appliance js_toggle relative first">
								<div class="category-info">
									<h3 class="category-name b-category-name"><a class="ml-22" title=""> 闲置数码 </a></h3>
									<em>&gt;</em></div>
								<div class="menu-item menu-in top">
									<div class="area-in">
										<div class="area-bg">
											<div class="menu-srot">
												<div class="sort-side">
													<dl class="dl-sort">
														<dt><span title=""> 手机 相机 笔记本 </span></dt>
														<dd><a title="" href="{{ url('home/list') }}"><span>手机 相机 笔记本</span></a></dd>
													</dl>
												</div>
											</div>
										</div>
									</div>
								</div>
								<b class="arrow"></b>
							</li>
							<li class="appliance js_toggle relative ">
								<div class="category-info">
									<h3 class="category-name b-category-name"><a class="ml-22" title=""> 闲置母婴  </a></h3>
									<em>&gt;</em></div>
								<div class="menu-item menu-in top">
									<div class="area-in">
										<div class="area-bg">
											<div class="menu-srot">
												<div class="sort-side">
													<dl class="dl-sort">
														<dt><span title=""> 童装 宝宝用品 玩具  </span></dt>
														<dd><a title="" href="#"><span>手机 相机 笔记本</span></a></dd>
													</dl>
												</div>
											</div>
										</div>
									</div>
								</div>
								<b class="arrow"></b>
							</li>
							<li class="appliance js_toggle relative ">
								<div class="category-info">
									<h3 class="category-name b-category-name"><a class="ml-22" title=""> 闲置数码 </a></h3>
									<em>&gt;</em></div>
								<div class="menu-item menu-in top">
									<div class="area-in">
										<div class="area-bg">
											<div class="menu-srot">
												<div class="sort-side">
													<dl class="dl-sort">
														<dt><span title=""> 手机 相机 笔记本 </span></dt>
														<dd><a title="" href="#"><span>手机 相机 笔记本</span></a></dd>
													</dl>
												</div>
											</div>
										</div>
									</div>
								</div>
								<b class="arrow"></b>
							</li>
							<li class="appliance js_toggle relative ">
								<div class="category-info">
									<h3 class="category-name b-category-name"><a class="ml-22" title=""> 闲置母婴  </a></h3>
									<em>&gt;</em></div>
								<div class="menu-item menu-in top">
									<div class="area-in">
										<div class="area-bg">
											<div class="menu-srot">
												<div class="sort-side">
													<dl class="dl-sort">
														<dt><span title=""> 童装 宝宝用品 玩具  </span></dt>
														<dd><a title="" href="#"><span>手机 相机 笔记本</span></a></dd>
													</dl>
												</div>
											</div>
										</div>
									</div>
								</div>
								<b class="arrow"></b>
							</li>
							<li class="appliance js_toggle relative ">
								<div class="category-info">
									<h3 class="category-name b-category-name"><a class="ml-22" title=""> 闲置数码 </a></h3>
									<em>&gt;</em></div>
								<div class="menu-item menu-in top">
									<div class="area-in">
										<div class="area-bg">
											<div class="menu-srot">
												<div class="sort-side">
													<dl class="dl-sort">
														<dt><span title=""> 手机 相机 笔记本 </span></dt>
														<dd><a title="" href="#"><span>手机 相机 笔记本</span></a></dd>
													</dl>
												</div>
											</div>
										</div>
									</div>
								</div>
								<b class="arrow"></b>
							</li>
							<li class="appliance js_toggle relative ">
								<div class="category-info">
									<h3 class="category-name b-category-name"><a class="ml-22" title=""> 闲置母婴  </a></h3>
									<em>&gt;</em></div>
								<div class="menu-item menu-in top">
									<div class="area-in">
										<div class="area-bg">
											<div class="menu-srot">
												<div class="sort-side">
													<dl class="dl-sort">
														<dt><span title=""> 童装 宝宝用品 玩具  </span></dt>
														<dd><a title="" href="#"><span>手机 相机 笔记本</span></a></dd>
													</dl>
												</div>
											</div>
										</div>
									</div>
								</div>
								<b class="arrow"></b>
							</li>
							<li class="appliance js_toggle relative ">
								<div class="category-info">
									<h3 class="category-name b-category-name"><a class="ml-22" title=""> 闲置数码 </a></h3>
									<em>&gt;</em></div>
								<div class="menu-item menu-in top">
									<div class="area-in">
										<div class="area-bg">
											<div class="menu-srot">
												<div class="sort-side">
													<dl class="dl-sort">
														<dt><span title=""> 手机 相机 笔记本 </span></dt>
														<dd><a title="" href="#"><span>手机 相机 笔记本</span></a></dd>
													</dl>
												</div>
											</div>
										</div>
									</div>
								</div>
								<b class="arrow"></b>
							</li>
							<li class="appliance js_toggle relative ">
								<div class="category-info">
									<h3 class="category-name b-category-name"><a class="ml-22" title=""> 闲置母婴  </a></h3>
									<em>&gt;</em></div>
								<div class="menu-item menu-in top">
									<div class="area-in">
										<div class="area-bg">
											<div class="menu-srot">
												<div class="sort-side">
													<dl class="dl-sort">
														<dt><span title=""> 童装 宝宝用品 玩具  </span></dt>
														<dd><a title="" href="#"><span>手机 相机 笔记本</span></a></dd>
													</dl>
												</div>
											</div>
										</div>
									</div>
								</div>
								<b class="arrow"></b>
							</li>
							<li class="appliance js_toggle relative ">
								<div class="category-info">
									<h3 class="category-name b-category-name"><a class="ml-22" title=""> 闲置数码 </a></h3>
									<em>&gt;</em></div>
								<div class="menu-item menu-in top">
									<div class="area-in">
										<div class="area-bg">
											<div class="menu-srot">
												<div class="sort-side">
													<dl class="dl-sort">
														<dt><span title=""> 手机 相机 笔记本 </span></dt>
														<dd><a title="" href="#"><span>手机 相机 笔记本</span></a></dd>
													</dl>
												</div>
											</div>
										</div>
									</div>
								</div>
								<b class="arrow"></b>
							</li>
							<li class="appliance js_toggle relative last">
								<div class="category-info">
									<h3 class="category-name b-category-name"><a class="ml-22" title=""> 闲置母婴  </a></h3>
									<em>&gt;</em></div>
								<div class="menu-item menu-in top">
									<div class="area-in">
										<div class="area-bg">
											<div class="menu-srot">
												<div class="sort-side">
													<dl class="dl-sort">
														<dt><span title=""> 童装 宝宝用品 玩具  </span></dt>
														<dd><a title="" href="#"><span>手机 相机 笔记本</span></a></dd>
													</dl>
												</div>
											</div>
										</div>
									</div>
								</div>
								<b class="arrow"></b>
							</li>
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
			<div class="clock am-u-sm-3" ">
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
			<div class="am-u-sm-3 ">
				<div class="activityMain ">
					<img src="{{ url('home/img/activity4.jpg') }} "></img>
				</div>
			</div>
			<div class="am-u-sm-3 ">
				<div class="activityMain ">
					<img src="{{ url('home/img/activity4.jpg') }} ">
				</div>
			</div>
			<div class="am-u-sm-3 ">
				<div class="activityMain ">
					<img src="{{ url('home/img/activity4.jpg') }} ">
				</div>
			</div>
			<div class="am-u-sm-3 last ">
				<div class="activityMain ">
					<img src="{{ url('home/img/activity4.jpg') }} "></img>
				</div>
			</div>
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
					<a class="outer" href="#"><span class="inner"><b class="text">内存</b></span></a>
					<a class="outer" href="#"><span class="inner"><b class="text">内存</b></span></a>
					<a class="outer" href="#"><span class="inner"><b class="text">内存</b></span></a>
					<a class="outer" href="#"><span class="inner"><b class="text">内存</b></span></a>

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
				<div class="outer-con ">
					<div class="title ">
						雪之恋和风大福
					</div>
					<div class="sub-title ">
						¥13.8
					</div>
					<i class="am-icon-shopping-basket am-icon-md  seprate"></i>
				</div>
				<a href="# "><img src="{{ url('home/img/1.jpg') }}" /></a>
			</div>
			<div class="am-u-sm-7 am-u-md-4 text-two">
				<div class="outer-con ">
					<div class="title ">
						雪之恋和风大福
					</div>
					<div class="sub-title ">
						¥13.8
					</div>
					<i class="am-icon-shopping-basket am-icon-md  seprate"></i>
				</div>
				<a href="# "><img src="{{ url('home/img/1.jpg') }}" /></a>
			</div>
			<div class="am-u-sm-3 am-u-md-2 text-three big">
				<div class="outer-con ">
					<div class="title ">
						小优布丁
					</div>
					<div class="sub-title ">
						¥4.8
					</div>
					<i class="am-icon-shopping-basket am-icon-md  seprate"></i>
				</div>
				<a href="# "><img src="{{ url('home/img/1.jpg') }}" /></a>
			</div>
			<div class="am-u-sm-3 am-u-md-2 text-three sug">
				<div class="outer-con ">
					<div class="title ">
						小优布丁
					</div>
					<div class="sub-title ">
						¥4.8
					</div>
					<i class="am-icon-shopping-basket am-icon-md  seprate"></i>
				</div>
				<a href="# "><img src="{{ url('home/img/1.jpg') }}" /></a>
			</div>
			<div class="am-u-sm-3 am-u-md-2 text-three ">
				<div class="outer-con ">
					<div class="title ">
						小优布丁
					</div>
					<div class="sub-title ">
						¥4.8
					</div>
					<i class="am-icon-shopping-basket am-icon-md  seprate"></i>
				</div>
				<a href="# "><img src="{{ url('home/img/1.jpg') }}" /></a>
			</div>
			<div class="am-u-sm-3 am-u-md-2 text-three last big ">
				<div class="outer-con ">
					<div class="title ">
						小优布丁
					</div>
					<div class="sub-title ">
						¥4.8
					</div>
					<i class="am-icon-shopping-basket am-icon-md  seprate"></i>
				</div>
				<a href="# "><img src="{{ url('home/img/1.jpg') }}" /></a>
			</div>
		</div>
		<div class="clear "></div>
	</div>
</div>
@endsection
