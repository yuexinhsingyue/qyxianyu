@extends('layouts.admin')

@section('title','订单列表页')

@section('content')

<article class="content items-list-page" style="padding-top: 0px;">
    <div class="title-search-block">
        <div class="title-block">
            <div class="row">
                <div class="col-md-6">
                    <h3 class="title"> 订单信息表 </h3>
                </div>
            </div>
        </div>
        <div class="items-search">
            <form class="form-inline" action="{{url('/admin/order')}}" method="get">
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
        @foreach($res as $k=>$v)

        <ul class="item-list striped">
            {{--表头--}}
            <li class="item item-list-header hidden-sm-down">
                <div class="item-row">
                    <div class="item-col fixed item-col-check">
                            <span>ID</span>
                    </div>
                    <div class="item-col item-col-header item-col-title" style="text-align:center">
                        <div> <span>订单号</span> </div>
                    </div>
                    <div class="item-col item-col-header item-col-stats">
                        <div class="no-overflow"> <span>下单时间</span> </div>
                    </div>
                    <div class="item-col item-col-header item-col-stats">
                        <div class="no-overflow"> <span>订单总价</span> </div>
                    </div>
                   {{-- <div class="item-col item-col-header item-col-stats">
                        <div class="no-overflow"> <span>商品数量</span> </div>
                    </div>--}}
                    <div class="item-col item-col-header item-col-stats">
                        <div class="no-overflow"> <span>下单用户</span> </div>
                    </div>
                   {{-- <div class="item-col item-col-header item-col-stats">
                        <div class="no-overflow"> <span>状态</span> </div>
                    </div>--}}
                    <div class="item-col item-col-header item-col-stats">
                        <div class="no-overflow"> <span>操作</span> </div>
                    </div>
                </div>
            </li>
            {{--表内容--}}
            <li class="item">
                <div class="item-row">
                    <div class="item-col fixed item-col-check">
                            <span>{{$v->id}}</span>
                    </div>
                    <div class="item-col item-col-header item-col-title" style="text-align:center">
                        <div> <span>{{$v->oid}}</span> </div>
                    </div>
                    <div class="item-col item-col-stats no-overflow">
                        <div class="no-overflow">{{$v->created_at}}</div>
                    </div>
                    <div class="item-col item-col-stats no-overflow">
                        <div class="no-overflow">{{$v->oprice}}</div>
                    </div>
                   {{-- <div class="item-col item-col-stats no-overflow">
                        <div class="no-overflow">{{$res[0]['onum']}}</div>
                    </div>--}}
                    @foreach($user as $m=>$n)
                    @if($v->uid == $n->uid)
                    <div class="item-col item-col-stats no-overflow">
                        <div class="no-overflow">{{$n->uname}}</div>
                    </div>
                    @endif
                    @endforeach
                    {{--<div class="item-col item-col-stats no-overflow">
                        @if($res[0]['status'] == 0)
                        <div class="no-overflow">未发货</div>
                           @endif
                        @if($res[0]['status'] == 1)
                        <div class="no-overflow">已发货</div>
                            @endif
                        @if($res[0]['status'] == 2)
                        <div class="no-overflow">确认收货</div>
                            @endif
                        @if($res[0]['status'] == 3)
                        <div class="no-overflow">取消订单</div>
                            @endif

                    </div>--}}
                    <div class="item-col item-col-stats no-overflow">
                        <div class="no-overflow"><a href="{{url('admin/detail/'.$v->id)}}">
                                <button type="button" class="btn btn-info btn-success">查看详情</button></a>
                        </div>
                    </div>
                </div>
            </li>
        </ul>

        @endforeach
    </div>
    <nav class="text-xs-right">
        {!! $res ->appends(['search'=> $search])->render() !!}
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

