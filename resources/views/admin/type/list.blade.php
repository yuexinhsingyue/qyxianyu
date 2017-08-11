@extends('layouts.admin')

@section('title','分类列表页')

@section('content')

<article class="content items-list-page" style="padding-top: 0px;">
    <div class="title-search-block">
        <div class="title-block">
            <div class="row">
                <div class="col-md-6">
                    <h3 class="title"> 分类信息表 </h3>
                </div>
            </div>
        </div>
        <div class="items-search">
            <form class="form-inline" action="{{url('/admin/type')}}" method="get">
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
            <li class="item item-list-header hidden-sm-down">
                <div class="item-row">
                    <div class="item-col fixed item-col-check">
                            <span>ID</span>
                    </div>
                    <div class="item-col item-col-header item-col-stats">
                        <div class="no-overflow"> <span>分类名称</span> </div>
                    </div>
                    <div class="item-col item-col-header item-col-stats">
                        <div class="no-overflow"> <span>父ID</span> </div>
                    </div>
                    <div class="item-col item-col-header item-col-stats">
                        <div class="no-overflow"> <span>路径</span> </div>
                    </div>
                    <div class="item-col item-col-header item-col-stats">
                        <div class="no-overflow"> <span>操作</span> </div>
                    </div>
                </div>
            </li>
            {{--表内容--}}
            <li class="item">
                @foreach($res as $k=>$v)
                    <div class="item-row">
                        <div class="item-col fixed item-col-check" name="tid">
                            <span>{{$v->tid}}</span>
                        </div>
                        <div class="item-col item-col-stats no-overflow" name="tname">
                            <div class="no-overflow">{{$v->tname}}</div>
                        </div>
                        <div class="item-col item-col-stats no-overflow" name="pid">
                            <div class="no-overflow">{{$v->pid}}</div>
                        </div>
                        <div class="item-col item-col-stats no-overflow" name="path">
                            <div class="no-overflow">{{$v->path}}</div>
                        </div>
                        <div class="item-col item-col-stats no-overflow">
                            <div class="no-overflow"><a href="{{url('admin/type/'.$v->tid.'/edit')}}">
                                <button class="btn btn-oval btn-success" type="button">修改
                                  </button></a>
                            </div>
                            <div class="no-overflow"><a href="javascript:void(0)" onclick="delCate({{$v->tid}})">
                                <button class="btn btn-oval btn-danger" type="button">删除</button></a>
                            </div>
                        </div>
                    </div>
                    @endforeach
            </li>
        </ul>
    </div>
    <nav class="text-xs-right">
        <nav class="text-xs-right">
            {!! $res ->appends(['search'=> $search])->render() !!}
        </nav>
    </nav>
    <!--搜索结果页面 列表 结束-->
    <script>

        function delCate(tid){
//            参数1 要请求的服务器路由
//            参数2 请求要携带的参数数据  _method：delete  _token
//              参数3 回调函数,回调函数的参数data表示服务器返回的数据
//            $.post(URL,data,callback);
//询问框
            layer.confirm('确认删除吗？', {
                btn: ['确定','取消'] //按钮
            }, function(){
                $.post("{{url('admin/type/')}}/"+tid,{'_method':'delete','_token':'{{csrf_token()}}'},function(data){
                    if(data.status == 0){
                        location.href = location.href;
                        layer.msg(data.msg, {icon: 5});
                    }else if(data.status == 2){
                        layer.msg(data.msg, {icon: 6});
                    }else{
                        location.href = location.href;
                        layer.msg(data.msg, {icon: 6});
                    }

                });

            }, function(){

            });

        }


    </script>
</article>

@section('js')
    <script>
        $('.text-xs-right li').addClass('page-link');
        $('.text-xs-right li').attr('style','list-style:none');
    </script>
@endsection

@endsection

