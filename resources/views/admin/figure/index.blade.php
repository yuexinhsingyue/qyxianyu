@extends('layouts.admin')

@section('title','网站信息')

@section('content')
       
		<div class="result_title">
		 @if(session('msg'))
            <div class="mark" style="background:#ED5F6F;border-radius:10px">
                <ul>
                   <li>{{ session('msg') }}</li>
                </ul>
            </div>
        @endif
        </div>
        
	<article class="content items-list-page" style="padding-top: 0px;">
    <div class="title-search-block">
        <div class="title-block">
            <div class="row">
                <div class="col-md-6">
                    <h3 class="title"> 轮播图列表 </h3>
                </div>
            </div>
        </div>
        <div class="items-search">
            <form class="form-inline" action="{{url('admin/figure')}}" method="get">
                <div class="input-group">
                    <input class="form-control boxed rounded-s" value="{{isset($Name)?$Name:''}}" name="figName" placeholder="搜索..." type="text">
                    <span class="input-group-btn">
                        <button class="btn btn-secondary rounded-s" type="submit">
                            <i class="fa fa-search"></i>
                        </button>
                    </span>
                </div>
            </form>
        </div>
    </div>

    <form action="{{ url('amdin/figure') }}" method='post' name='myform'>
      <input type='hidden' name='_token' value='{{ csrf_token() }}'>
      <input type='hidden' name='_method' value='DELETE'>
    </form>

    <div class="card items">
        <ul class="item-list striped">
            {{--表头--}}
            <li class="item item-list-header hidden-sm-down">
                <div class="item-row">
                    <div class="item-col fixed item-col-check">
                            <span>ID</span>
                    </div>
                    <div class="item-col item-col-header item-col-stats">
                        <div class="no-overflow"> <span style='margin-left:-66px'>名称</span> </div>
                    </div>
                    <div class="item-col item-col-header item-col-stats">
                        <div class="no-overflow"> <span style='margin-left:-200px'>目标地址</span> </div>
                    </div>
                    <div class="item-col item-col-header fixed item-col-img md">
                        <div> <span style='margin-left:-240px'>图片</span> </div>
                    </div>
                    <div class="item-col item-col-header fixed item-col-img md">
                        <div> <span>状态</span> </div>
                    </div>
                    <div class="item-col item-col-header item-col-stats">
                        <div class="no-overflow"> <span>操作</span> </div>
                    </div>
                </div>
            </li>
            {{--表内容--}}

            @foreach($slids as $k=>$v)
            <li class="item">
                <div class="item-row">
                    <div class="item-col fixed item-col-check">
                            <span>{{$v->sid}}</span>
                    </div>
                    <div class="item-col item-col-stats no-overflow">
                        <div class="no-overflow">{{$v->stitle}}</div>
                    </div>
                    <div class="item-col item-col-stats no-overflow">
                        <div class="no-overflow">{{$v->surl}}</div>
                    </div>
                    <div class="item-col fixed item-col-img md">
                        <div class="item-img rounded" style="padding-bottom: 0px; height: 60px;border-radius:4px;border:1px solid #ccc">
                            <img src="{{ url($v->spic) }}" width="100" height="100%">
                        </div>
                    </div>
                    <div class="item-col item-col-stats no-overflow" style="margin-left:65px">
                        <div class="no-overflow"> @if($v->status == '1') 显示  @elseif($v->status == '2') 不显示 @endif </div>
                    </div>
                    <div class="item-col item-col-stats no-overflow">
                        <div class="no-overflow">
                            <a href="{{url('admin/figure/'.$v->sid.'/edit')}}" class="btn btn-primary" style="border-radius:20px">修改</a>
                            <a href="javascript:doDel({{ $v->sid }})" class="btn btn-danger" style="border-radius:20px">删除</a>
                        </div>
                    </div>
                </div>
            </li>
			@endforeach

        </ul>
    </div>

    <a href="{{url('admin/figure/create')}}" class="btn btn-success" style="border-radius:20px">轮播图添加</a>
    <nav class="text-xs-right">
          {!! $slids->appends(['figName' => $Name])->render() !!}
    </nav>
    <script type="text/javascript">

        // 分页样式
        $('.text-xs-right li').addClass('page-item');
        $('.text-xs-right li').attr('style','list-style:none');
        $('.text-xs-right span').addClass('page-link');
        $('.text-xs-right a').addClass('page-link');
    
        function doDel(id)
        {
          if(confirm('确定要删除吗？')){
            var form = document.myform;
            form.action = '/admin/figure/'+id;
            form.submit();
          }
        }

    </script>
</article>

@endsection