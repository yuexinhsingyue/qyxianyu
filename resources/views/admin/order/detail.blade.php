@extends('layouts.admin')

@section('title','交易详情')

@section('content')

    <article class="content item-editor-page" style="padding-top: 0px;padding-bottom: 0px;">
        <div class="title-block">
            <h3 class="title"> 订单详情 <span class="sparkline bar" data-type="bar"></span> </h3>
        </div>
        <form  method="get" action="{{ url('/admin/detail') }}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">

                <label class="control-label">收货地址</label>
                {{--@foreach($ad as $k => $v){{$v['name']}}   {{$v['address']}}     {{$v['phone']}}--}}
                <input type="text" value="小飞侠" class="form-control underlined" readonly="readonly">
                    {{--@endforeach--}}
            </div>
            <div class="form-group" readonly="readonly">
                <label class="control-label">订单信息</label>
                <input type="text" value="订单号：{{$num}}" class="form-control underlined" readonly="readonly">
            </div>
            <div class="card items">
                <ul class="item-list striped">
                    {{--表头--}}
                    <li class="item item-list-header hidden-sm-down">
                        <div class="item-row">
                            <div class="item-col item-col-header item-col-stats">
                                <div class="no-overflow"> <span>宝贝</span> </div>
                            </div>
                            <div class="item-col item-col-header item-col-stats">
                                <div class="no-overflow"> <span>宝贝图片</span> </div>
                            </div>
                            <div class="item-col item-col-header item-col-stats">
                                <div class="no-overflow"> <span>宝贝属性</span> </div>
                            </div>
                            <div class="item-col item-col-header item-col-stats">
                                <div class="no-overflow"> <span>单价</span> </div>
                            </div>
                          {{--  <div class="item-col item-col-header item-col-stats">
                                <div class="no-overflow"> <span>数量</span> </div>
                            </div>--}}
                            <div class="item-col item-col-header item-col-stats">
                                <div class="no-overflow"> <span>商品总价</span> </div>
                            </div>
                        </div>
                    </li>
                    {{--表内容--}}
                    <li class="item">
                        @foreach($goods as $k=>$v)
                        <div class="item-row">

                            <div class="item-col item-col-stats no-overflow">
                                <div class="no-overflow">{{$v->gname}}</div>
                            </div>
                            <div class="item-col item-col-stats no-overflow">
                                <div class="col-sm-10">
                                    <img src="{{ url($v->pic) }}" width="60px" height="60px">
                                </div>
                            </div>
                            <div class="item-col item-col-stats no-overflow">
                                <div class="no-overflow">{{$v->goodsDes}}</div>
                            </div>
                            <div class="item-col item-col-stats no-overflow">
                                <div class="no-overflow">￥{{$v->nprice}}</div>
                            </div>
                           {{-- <div class="item-col item-col-stats no-overflow">
                                <div class="no-overflow">{{$v->num}}</div>
                            </div>--}}
                            <div class="item-col item-col-stats no-overflow">
                                <div class="no-overflow">￥{{$v->nprice}}</div>
                            </div>

                        </div>
                        @endforeach
                    </li>
                </ul>
            </div>
        </form>
    </article>
@endsection


