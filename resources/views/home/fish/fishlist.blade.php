@extends('layouts.home')
@section('title','首页')

@section('header')
	<link href="{{ url('home/css/seastyle.css') }}" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="./style/js/jquery-1.7.min.js"></script>
	<script type="text/javascript" src="./style/js/script.js"></script>
	<style type="text/css">
	/*物流*/
.m-logistics{display:block;background:#fff ;}
.lg-list{ margin-bottom:5px;}
.s-content { position: relative; overflow: hidden;background: #fff;}
.lg-item { border-top: 1px solid #E8EEF2;padding: 13px 10px 13px 15px; overflow:hidden;}
.item-info, .m-logistics .lg-info { position: relative; float: left;}
.item-info img {width: 70px;height: 70px; vertical-align: top;}
.lg-info {padding-left: 30px; float:left;}
.lg-confirm {float: right;}
.lg-info p { height: 38px;line-height: 38px;}
.m-logistics time { font-size: 12px;}
.lg-detail-wrap {display: inline;position: relative;}
.hide {display: none !important;}
.i-btn-typical {display: inline-block;color: #575757;font-size: 12px; padding: 3px 6px; border: 1px solid #D1D1D1;}
	</style>
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
								鱼塘列表
							</a>
						</li>
						
					</div>
					<div class="clear">
					</div>
					    <div class="m-logistics">

        <div class="s-bar">
        </div>
        <div class="s-content">
            <ul class="lg-list">
				 @foreach($data as $k=>$v)
                <li class="lg-item">
                    <div class="item-info">
                        <a href="#">
                            <img src="{{ url($v['face']) }}" alt="">
                        </a>

                    </div>
                    <div class="lg-info">

                        <p>鱼塘名:{{$v->fishpondname}}</p>
                        <time>鱼塘简介:{{$v->synopsis}}</time>

                        <div class="lg-detail-wrap">
                            <a class="lg-detail i-tip-trigger" href="{{ url('home/fishgood') }}/{{$v->id}}">查看鱼塘商品</a>
                        </div>

                    </div>

                </li>
                @endforeach
                <div class="clear"></div>

            </ul>

        </div>

    </div>

				</div>

				<div class="clear">
				</div>
				<!--分页 -->
 {!! $data->appends(['keywords' => $keyword])->render() !!}
			</div>
		</div>
	</div>
</div>
@endsection

@section('js')

@endsection
