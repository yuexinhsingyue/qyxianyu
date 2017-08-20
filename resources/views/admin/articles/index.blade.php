@extends('layouts.admin')

@section('title','网站信息')

@section('content')

	<article class="content items-list-page" style="padding-top: 0px;">
    <div class="title-search-block">
        <div class="title-block">
            <div class="row">
                <div class="col-md-6">
                    <h2> 相关文章列表 </h2>
                </div>
            </div>
        </div>
        <div class="items-search">
            <form class="form-inline" action="{{url('admin/article')}}" method="get">
                <div class="input-group">
                    <input class="form-control boxed rounded-s" value="{{isset($Name)?$Name:''}}" name="artName" placeholder="搜索..." type="text">
                    <span class="input-group-btn">
                        <button class="btn btn-secondary rounded-s" type="submit">
                            <i class="fa fa-search"></i>
                        </button>
                    </span>
                </div>
            </form>
        </div>
    </div>

    <form action="{{ url('amdin/article') }}" method='post' name='myform'>
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
                        <div class="no-overflow"> <span>文章标题</span> </div>
                    </div>
                    <div class="item-col item-col-header fixed item-col-img md" style="margin-left:90px">
                        <div > <span>文章描述</span> </div>
                    </div>
                    <div class="item-col item-col-header item-col-stats">
                        <div class="no-overflow"> <span style="margin-left:150px">状态</span> </div>
                    </div>
                    <div class="item-col item-col-header item-col-stats">
                        <div class="no-overflow"> <span>操作</span> </div>
                    </div>
                </div>
            </li>
            {{--表内容--}}
            
            @foreach($data as $k=>$v)
            <li class="item">
                <div class="item-row">
                    <div class="item-col fixed item-col-check">
                            <span>{{$v->wid}}</span>
                    </div>
                    <div class="item-col item-col-stats no-overflow" style="margin-left:30px">
                        <div class="no-overflow">{{$v->wtitle}}</div>
                    </div>
                    <div class="item-col item-col-stats no-overflow" style="margin-left:40px">
                        <div class="no-overflow">{{$v->wdesc}}</div>
                    </div>
                    <div class="item-col item-col-stats no-overflow">
                        <div class="no-overflow"> @if($v->status == '1') 显示  @elseif($v->status == '2') 不显示 @endif </div>
                    </div>
                    <div class="item-col item-col-stats no-overflow">
                        <div class="no-overflow" style="margin-left:-40px">
                        	<a href="javascript:void(0)" onclick="show_art({{$v->wid}})" class="btn btn-info btn-sm" style="border-radius:20px">查看文章</a>
			  				<a href="{{url('admin/article/'.$v->wid.'/edit')}}" class="btn btn-primary btn-sm" style="border-radius:20px">修改</a>
			  				<form action="{{url('admin/article/'.$v->wid)}}" method="POST">	

                            <a href="javascript:doDel({{ $v->wid }})" class="btn btn-danger btn-sm" style="border-radius:20px;margin-left:180px;margin-top:-57px">删除</a>
					  		
                            <a href="{{url('admin/work/'.$v->status.'/'.$v->wid)}}" class="btn btn-warning btn-sm" style="border-radius:20px;margin-left:50px;margin-top:-30px">@if($v->status == '1') 点我不显示  @elseif($v->status == '2') 点我显示 @endif</a>
                        </div>
                    </div>
                </div>
            </li>
            @endforeach
        </ul>
    </div>
 	<a href="{{url('admin/article/create')}}" class="btn btn-success" style="border-radius:20px">网站信息添加</a>

    <nav class="text-xs-right">
          {!! $data->appends(['artName' => $Name])->render() !!}
    </nav>
    

</article>


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
        form.action = '/admin/article/'+id;
        form.submit();
      }
    }

    function show_art(wid)
    {
        $.post('/admin/article/show',{'_token':'{{csrf_token()}}','wid':wid},function(data){
            layer.open({
              type: 1,
              skin: 'layui-layer-rim', //加上边框
              area: ['800px', '600px'], //宽高
              content: data
            });
        })
    }

</script>

@endsection