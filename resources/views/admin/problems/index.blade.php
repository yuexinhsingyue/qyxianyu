@extends('layouts.admin')

@section('title','网站信息')

@section('content')

	<article class="content items-list-page" style="padding-top: 0px;">
    <div class="title-search-block">
        <div class="title-block">
            <div class="row">
                <div class="col-md-6">
                    <h2> 相关问题列表 </h2>
                </div>
            </div>
        </div>
        <div class="items-search">
            <form class="form-inline">
                <div class="input-group">
                    <input class="form-control boxed rounded-s" placeholder="搜索..." type="text">
                    <span class="input-group-btn">
                        <button class="btn btn-secondary rounded-s" type="button">
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
                        <div class="no-overflow"> <span>问题标题</span> </div>
                    </div>
                    <div class="item-col item-col-header fixed item-col-img md" style="margin-left:90px">
                        <div > <span>描述</span> </div>
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
                            <span>{{$v->pid}}</span>
                    </div>
                    <div class="item-col item-col-stats no-overflow" style="margin-left:30px">
                        <div class="no-overflow">{{$v->ptitle}}</div>
                    </div>
                    <div class="item-col item-col-stats no-overflow" style="margin-left:40px">
                        <div class="no-overflow">{{$v->pdescript}}</div>
                    </div>
                    <div class="item-col item-col-stats no-overflow">
                        <div class="no-overflow"> @if($v->status == '1') 显示  @elseif($v->status == '2') 不显示 @endif </div>
                    </div>
                    <div class="item-col item-col-stats no-overflow">
                        <div class="no-overflow" style="margin-left:-40px">
                        	<a href="javascript:void(0)" onclick="show_pro({{ $v->pid }})" class="btn btn-info btn-sm" style="border-radius:20px">查看内容</a>
			  				<a href="{{url('admin/problems/'.$v->pid.'/edit')}}" class="btn btn-primary btn-sm" style="border-radius:20px">修改</a>
                            <a href="javascript:doDel({{ $v->pid }})" class="btn btn-danger btn-sm" style="border-radius:20px;margin-left:180px;margin-top:-57px">删除</a>
                            <a href="{{url('admin/problem/'.$v->status.'/'.$v->pid)}}" class="btn btn-warning btn-sm" style="border-radius:20px;margin-left:50px;margin-top:-30px">@if($v->status == '1') 点我不显示  @elseif($v->status == '2') 点我显示 @endif</a>
                        </div>
                    </div>
                </div>
            </li>
            @endforeach
        </ul>
    </div>
 	<a href="{{url('admin/problems/create')}}" class="btn btn-success" style="border-radius:20px">网站信息添加</a>


    <nav class="text-xs-right">
        <ul class="pagination">
            <li class="page-item"> <a class="page-link" href="">
                    Prev
                </a> </li>
            <li class="page-item active"> <a class="page-link" href="">
                    1
                </a> </li>
            <li class="page-item"> <a class="page-link" href="">
                    2
                </a> </li>
            <li class="page-item"> <a class="page-link" href="">
                    Next
                </a> </li>
        </ul>
    </nav>
</article>

<!-- 单条详情 -->




<script type="text/javascript">
        
    function doDel(id)
    {
      if(confirm('确定要删除吗？')){
        var form = document.myform;
        form.action = '/admin/problems/'+id;
        form.submit();
      }
    }

    // 内容详情
    function show_pro(pid)
    {
        $.post('/admin/problems/show',{'_token':'{{csrf_token()}}','pid':pid},function(data){
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