@extends('layouts.admin')

@section('title','网站信息')

@section('content')

	<article class="content items-list-page" style="padding-top: 0px;">
    <div class="title-search-block">
        <div class="title-block">
            <div class="row">
                <div class="col-md-6">
                    <h2> 网站信息列表 </h2>
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
                        <div class="no-overflow"> <span>网站名称</span> </div>
                    </div>
                    <div class="item-col item-col-header fixed item-col-img md">
                        <div> <span>Logo</span> </div>
                    </div>
                    <div class="item-col item-col-header item-col-stats">
                        <div class="no-overflow"> <span>网站地址</span> </div>
                    </div>
                    <div class="item-col item-col-header item-col-stats">
                        <div class="no-overflow"> <span>操作</span> </div>
                    </div>
                </div>
            </li>
            {{--表内容--}}

            @foreach($webs as $k=>$v)
            <li class="item">
                <div class="item-row">
                    <div class="item-col fixed item-col-check">
                            <span>{{$v->id}}</span>
                    </div>
                    <div class="item-col item-col-stats no-overflow">
                        <div class="no-overflow">{{$v->name}}</div>
                    </div>
                    <div class="item-col fixed item-col-img md">
                        <img src="{{$v->logo}}" width="100" height="100%" style="border-radius:10px">
                    </div>
                    
                    <div class="item-col item-col-stats no-overflow">
                        <div class="no-overflow">{{$v->url}}</div>
                    </div>
                    <div class="item-col item-col-stats no-overflow">
                        <div class="no-overflow">
                        	<a href="#" onclick="show({{$v->id}})" class="btn btn-info btn-sm" style="border-radius:20px">查看详情</a>
			  				<a href="{{url('/admin/web/'.$v->id.'/edit')}}" class="btn btn-primary btn-sm" style="border-radius:20px">修改</a>
                            <a href="javascript:doDel({{ $v->id }})" class="btn btn-danger btn-sm" style="border-radius:20px;margin-left:180px;margin-top:-55px">删除</a>
                        </div>
                    </div>
                </div>
            </li>
			@endforeach

        </ul>
    </div>
 	<a href="{{url('admin/web/create')}}" class="btn btn-success" style="border-radius:20px">网站信息添加</a>


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
        form.action = '/admin/web/'+id;
        form.submit();
      }
    }

    function show(id){
        $.get("{{url('admin/web/')}}/"+id,{'id':id},function(data){
            $('#asd').html(data);
               // alert(data);
        });
        
    }

</script>

@endsection