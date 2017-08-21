@extends('layouts.home')
@section('title','首页')

@section('header')
	<link href="{{ url('home/css/seastyle.css') }}" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="./style/js/jquery-1.7.min.js"></script>
	<script type="text/javascript" src="./style/js/script.js"></script>
@endsection

@section('content')
<b class="line"></b>
<div class="search">
	<div class="search-list">
		<div class="nav-table">
			<div class="long-title">
			<span class="all-goods">
				全部分类
			</span>
			</div>
			<div class="nav-cont">
				<ul>
					<li class="index"><a href="{{url('/')}}">首页</a></li>
					<li class="qc"><a href="{{url('home/work/17289.html')}}">文章与问题</a></li>
					<li class="qc last"><a href="{{url('home/fishlist')}}">鱼塘</a></li>
				</ul>
			</div>
		</div>
		<div class="am-g am-g-fixed">
			<div class="am-u-sm-12 am-u-md-12">
<!-- 				<div class="theme-popover">
					<div class="searchAbout">
					<span class="font-pale">
						相关搜索：
					</span>
						<a title="坚果" href="#">
							坚果
						</a>
					</div>
					<ul class="select">
						<p class="title font-normal">
						<span class="fl">
							松子
						</span>
							<span class="total fl">
							搜索到
							<strong class="num">
								997
							</strong>
							件相关商品
						</span>
						</p>
						<div class="clear">
						</div>
						<li class="select-result">
							<dl>
								<dt>
									已选
								</dt>
								<dd class="select-no">
								</dd>
								<p class="eliminateCriteria">
									清除
								</p>
							</dl>
						</li>
						<div class="clear">
						</div>
						<li class="select-list">
							<dl id="select1">
								<dt class="am-badge am-round">
									品牌
								</dt>
								<div class="dd-conent">
									<dd class="select-all selected">
										<a href="#">
											全部
										</a>
									</dd>
									<dd>
										<a href="#">
											百草味
										</a>
									</dd>
									<dd>
										<a href="#">
											良品铺子
										</a>
									</dd>
									<dd>
										<a href="#">
											新农哥
										</a>
									</dd>
									<dd>
										<a href="#">
											楼兰蜜语
										</a>
									</dd>
									<dd>
										<a href="#">
											口水娃
										</a>
									</dd>
									<dd>
										<a href="#">
											考拉兄弟
										</a>
									</dd>
								</div>
							</dl>
						</li>
					</ul>
					<div class="clear">
					</div>
				</div> -->
				<div class="search-content">
					<div class="sort">
						<li class="first">
							<a title="综合">
								综合排序
							</a>
						</li>
						<li>
							<a title="销量">
								销量排序
							</a>
						</li>
						<li>
							<a title="价格">
								价格优先
							</a>
						</li>
						<li class="big">
							<a title="评价" href="#">
								评价为主
							</a>
						</li>
					</div>
					<div class="clear">
					</div>
					
					<ul class="am-avg-sm-2 am-avg-md-3 am-avg-lg-4 boxes">
						@foreach($goods as  $k=>$v)
						<li>
							<a href="{{ url('home/detail/'.$v->id) }}"><div class="i-pic limit">
								<img src="/{{ $v->pic  }}" />
								<p class="title fl">
									{{$v->gname}}
								</p>
								<p class="price fl">
									<b>
										¥
									</b>
									<strong>
										{{$v->nprice}}
									</strong>
								</p>
								<p class="number fl">
									数量
									<span>
									{{$v->goodsNum}}
								</span>
								</p>
								</div></a>
						</li>
							@endforeach
					</ul>
				</div>

				<div class="clear">
				</div>
				<!--分页 -->

			</div>
		</div>
	</div>
</div>
@endsection

@section('js')

@endsection
