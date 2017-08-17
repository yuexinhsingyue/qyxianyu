@extends('layouts.home')
@section('title','商品列表页')

@section('header')
	<link href="{{ url('home/css/seastyle.css') }}" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="{{ url('home/js/jquery-1.7.min.js') }}"></script>
	<script type="text/javascript" src="{{ url('home/js/script.js') }}"></script>
@endsection

@section('content')
<b class="line"></b>
<div class="search" style="margin-right: 0px;">
	<div class="search-list">
		<div class="nav-table">
			<div class="long-title">
			<span class="all-goods">
				全部分类
			</span>
			</div>
			<div class="nav-cont">
				<ul>
					<li class="index"><a href="{{ url('/') }}">首页</a></li>
					<li class="qc"><a href="{{ url('home/news') }}">文章与问题</a></li>
					<li class="qc last"><a href="{{ url('home/fish') }}">鱼塘</a></li>
				</ul>
			</div>
		</div>
		<div class="am-g am-g-fixed">
			<div class="am-u-sm-12 am-u-md-12">
				<div class="theme-popover">
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
								@foreach($ptype as $k=>$v)
								<div class="dd-conent">
									<dd class="select-all selected">
										<a href="#">
											{{$v->tname}}
										</a>
									</dd>
									@foreach($a as $m=>$n)
										@if($k == $m)
											@foreach($n as $j=>$h)
									<dd>
										<a href="#">
											{{$h->tname}}
										</a>
									</dd>
											@endforeach
										@endif
									@endforeach
								</div>
								@endforeach
							</dl>
						</li>
					</ul>
					<div class="clear">
					</div>
				</div>
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
									<p class="title fl">
										{{$v->goodsDes}}
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
				<div class="search-side">
					<div class="side-title">
						经典搭配
					</div>
					<li>
						<div class="i-pic check">
							<img src="{{ url('home/img/cp.jpg') }}" />
							<p class="check-title">
								萨拉米 1+1小鸡腿
							</p>
							<p class="price fl">
								<b>
									¥
								</b>
								<strong>
									29.90
								</strong>
							</p>
							<p class="number fl">
								销量
								<span>
								1110
							</span>
							</p>
						</div>
					</li>
				</div>
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
							2
						</a>
					</li>
					<li>
						<a href="#">
							3
						</a>
					</li>
					<li>
						<a href="#">
							&raquo;
						</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
</div>
@endsection

@section('js')
	<script>
        window.jQuery || document.write('<script src="{{ url('home/js/jquery-1.9.min.js') }}"><\/script>');
	</script>
	<script type="text/javascript" src="{{ url('home/js/quick_links.js') }}"></script>
	<script>
		$('.footer').attr('style','margin-right: 112px;margin-left: 112px;');
	</script>
@endsection
