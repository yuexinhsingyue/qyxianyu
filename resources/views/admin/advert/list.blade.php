@extends('layouts.admin')
@section('title','广告列表')
@section('content')
	<article class="content items-list-page" style="padding-top: 0px;">
    <div class="title-search-block">
        <div class="title-block">
            <div class="row">
                <div class="col-md-6">
                    <h3 class="title"> 广告列表 </h3>
                </div>
            </div>
        </div>
        <div class="items-search">
            <form class="form-inline" method="get" action="{{ url('/admin/user') }}">
                {{ csrf_field() }}
                <div class="input-group">
                    <input class="form-control boxed rounded-s" placeholder="搜索..." type="text" name="search">
                    <span class="input-group-btn">
                        <button class="btn btn-secondary rounded-s" type="button">
                            <i class="fa fa-search"></i>
                        </button>
                    </span>
                </div>
            </form>
        </div>
    </div>
    <div class="card items">
        <ul class="item-list striped">
            {{--表头--}}
            <li class="item item-list-header hidden-sm-down ">
                <div class="item-row">
                    <div class="item-col fixed item-col-check">
                            <span>ID</span>
                    </div>

                    <div class="item-col item-col-header item-col-stats">
                        <div class="no-overflow"> <span>广告名称</span> </div>
                    </div>
                    <div class="item-col item-col-header item-col-stats">
                        <div class="no-overflow"> <span>广告描述</span> </div>
                    </div>
                    <div class="item-col item-col-header item-col-stats">
                        <div class="no-overflow"> <span>广告位置</span> </div>
                    </div>
                    <div class="item-col item-col-header item-col-stats">
                        <div class="no-overflow"> <span>投放起始时间</span> </div>
                    </div>
                    <div class="item-col item-col-header item-col-stats">
                        <div class="no-overflow"> <span>投放终止时间</span> </div>
                    </div>
                    <div class="item-col item-col-header item-col-stats">
                        <div class="no-overflow"> <span>广告链接</span> </div>
                    </div>
                    <div class="item-col item-col-header item-col-stats">
                        <div class="no-overflow"> <span>图片</span> </div>
                    </div>
					<div class="item-col item-col-header item-col-stats">
                        <div class="no-overflow"> <span>状态</span> </div>
                    </div>
                    <div class="item-col item-col-header item-col-stats">
                        <div class="no-overflow"> <span>操作</span> </div>
                    </div>
                    <div class="form-group row">

              		@foreach ($advert as $res)
						<li class="item">
		                <div class="item-row ">
		                    <div class="item-col fixed item-col-check ">
		                            <span>{{ $res -> id }}</span>
		                    </div>

		                    <div class="item-col item-col-stats no-overflow">
		                        <div class="no-overflow">{{$res -> adname }}</div>
		                    </div>
		                    <div class="item-col item-col-stats no-overflow">
		                        <div class="no-overflow">{{$res -> addescribe }}</div>
		                    </div>
		                    
		                    
		                    <div class="item-col item-col-stats no-overflow">
		                        @if($res -> adposition == 1)
		                        <div class="no-overflow">中部 优选广告位1 左起1</div>
		                        @elseif($res -> id == 2)
		                            <div class="no-overflow">中部 优选广告位1 左起2</div>
		                        @elseif($res -> id == 3)
		                            <div class="no-overflow">中部 优选广告位1 左起3</div>
		                        @else
		                            <div class="no-overflow">中部 优选广告位1 左起4</div>
		                        @endif

		                    </div>
		                   
		                    <div class="item-col item-col-stats no-overflow">
		                        <div class="no-overflow">{{date('Y年m月d日 H:i:s',$res -> adstart) }}</div>
		                    </div>
		                    <div class="item-col item-col-stats no-overflow">
		                        <div class="no-overflow">{{date('Y年m月d日 H:i:s',$res -> adstop) }}</div>
		                    </div>
		                     <div class="item-col item-col-stats no-overflow">
		                        <div class="no-overflow" style="height:45px"><a href="{{$res -> adlink }}">{{$res -> adlink }}</a></div>
		                    </div>
		                    <div class="item-col fixed item-col-img md">
		                            <div class="item-img rounded" style="padding-bottom: 0px; height: 60px;border-radius:4px;border:1px solid #ccc">
		                                <img src="{{ url($res->pic) }}" width="100%" height="100%">
		                            </div>
		                    </div>
		                     <div class="item-col item-col-stats no-overflow">
		                        @if($res -> status == 1)
		                        <div class="no-overflow">启用</div>
		                        @else
		                            <div class="no-overflow">禁用</div>
		                        @endif

		                    </div>
		                    <div class="item-col item-col-stats no-overflow">
		                        <div class="no-overflow">
		                            <a href="{{ url('admin/advert/'.$res->id.'/edit') }}" class="btn btn-sm btn-info">修改</a>
		                            <a href="{{ url('admin/advert/'.$res->id.'/edit') }}" class="btn btn-sm btn-danger">删除</a>
		                        </div>
		                    </div>
		                </div>
		            </li>
					@endforeach

                </div>
            </li>
      
    <nav class="text-xs-right">
        {!! $advert->render() !!}
    </nav>
</article>

@endsection
@section('js')
    <script>
        $('.text-xs-right li').addClass('page-item');
        $('.text-xs-right li').attr('style','list-style:none');
        $('.text-xs-right span').addClass('page-link');
        $('.text-xs-right a').addClass('page-link');
    </script>
@endsection
