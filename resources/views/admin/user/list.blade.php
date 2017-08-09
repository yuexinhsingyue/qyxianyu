@extends('layouts.admin')

@section('title','用户列表页')

@section('content')

<article class="content items-list-page" style="padding-top: 0px;">
    <div class="title-search-block">
        <div class="title-block">
            <div class="row">
                <div class="col-md-6">
                    <h3 class="title"> 用户信息表 </h3>
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
            <li class="item item-list-header hidden-sm-down">
                <div class="item-row">
                    <div class="item-col fixed item-col-check">
                            <span>ID</span>
                    </div>
                    <div class="item-col item-col-header fixed item-col-img md">
                        <div> <span>头像</span> </div>
                    </div>
                    <div class="item-col item-col-header item-col-stats">
                        <div class="no-overflow"> <span>姓名</span> </div>
                    </div>
                    <div class="item-col item-col-header item-col-stats">
                        <div class="no-overflow"> <span>电话</span> </div>
                    </div>
                    <div class="item-col item-col-header item-col-stats">
                        <div class="no-overflow"> <span>地址</span> </div>
                    </div>
                    <div class="item-col item-col-header item-col-stats">
                        <div class="no-overflow"> <span>身份</span> </div>
                    </div>
                    <div class="item-col item-col-header item-col-stats">
                        <div class="no-overflow"> <span>状态</span> </div>
                    </div>
                    <div class="item-col item-col-header item-col-stats">
                        <div class="no-overflow"> <span>操作</span> </div>
                    </div>
                </div>
            </li>
            {{--表内容--}}
            @foreach($res as $k => $v)
            <li class="item">
                <div class="item-row">
                    <div class="item-col fixed item-col-check">
                            <span>{{ $v['uid'] }}</span>
                    </div>
                    <div class="item-col fixed item-col-img md">
                            <div class="item-img rounded" style="padding-bottom: 0px; height: 60px;border-radius:4px;border:1px solid #ccc">
                                <img src="{{ url($v['face']) }}" width="100%" height="100%">
                            </div>
                    </div>
                    <div class="item-col item-col-stats no-overflow">
                        <div class="no-overflow">{{ $v['uname'] }}</div>
                    </div>
                    <div class="item-col item-col-stats no-overflow">
                        <div class="no-overflow">{{ $v['tel'] }}</div>
                    </div>
                    <div class="item-col item-col-stats no-overflow">
                        <div class="no-overflow">{{ $v['addr'] }}</div>
                    </div>
                    <div class="item-col item-col-stats no-overflow">
                        @if($v['identity'] == 1)
                        <div class="no-overflow">管理员</div>
                        @elseif($v['identity'] == 2)
                            <div class="no-overflow">鱼塘塘主</div>
                        @else
                            <div class="no-overflow">普通用户</div>
                        @endif

                    </div>
                    <div class="item-col item-col-stats no-overflow">
                        @if($v['status'] == 1)
                        <div class="no-overflow">启用</div>
                        @else
                            <div class="no-overflow">禁用</div>
                        @endif

                    </div>
                    <div class="item-col item-col-stats no-overflow">
                        <div class="no-overflow">
                            <button type="button" class="btn btn-oval btn-danger">修改</button>
                        </div>
                    </div>
                </div>
            </li>
            @endforeach
        </ul>
    </div>
    <nav class="text-xs-right">
        {!! $res->render() !!}
    </nav>
</article>

@endsection

@section('js')
    <script>
        $('.text-xs-right li').addClass('page-link');
        $('.text-xs-right li').attr('style','list-style:none');
    </script>
@endsection

