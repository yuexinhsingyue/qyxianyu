@extends('layouts.admin')

@section('title','后台管理系统')

@section('content')
<article class="content items-list-page" style="padding-top: 0px;">
    <div class="title-search-block">
        <div class="title-block">
            <div class="row">
                <div class="col-md-6">
                    <h3 class="title"> 鱼塘信息表 </h3>
                </div>
            </div>
        </div>
        <div class="items-search">
            <form action="{{url('admin/fish')}}" class="form-inline" method="get">
                <div class="input-group">
                    <input class="form-control boxed rounded-s" name="keywords" placeholder="搜索..." type="text">
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
                        <div class="no-overflow"> <span>鱼塘名</span> </div>
                    </div>
                    <div class="item-col item-col-header item-col-stats">
                        <div class="no-overflow"> <span>鱼塘简介</span> </div>
                    </div>
                    <div class="item-col item-col-header item-col-stats">
                        <div class="no-overflow"> <span>鱼塘申请用户</span> </div>
                    </div>
                    <div class="item-col item-col-header item-col-stats">
                        <div class="no-overflow"> <span>鱼塘等级</span> </div>
                    </div>
                    <div class="item-col item-col-header item-col-stats">
                        <div class="no-overflow"> <span>鱼塘状态</span> </div>
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
                            <span>{{$v->id}}</span>
                    </div>

                    <div class="item-col item-col-stats no-overflow">
                        <div class="no-overflow">{{$v->fishpondname}}</div>
                    </div>
                    <div class="item-col item-col-stats no-overflow">
                        <div class="no-overflow">{{$v->synopsis}}</div>
                    </div>
                    <div class="item-col item-col-stats no-overflow">
                        <div class="no-overflow">{{$v->flevel}}</div>
                    </div>
                    <div class="item-col item-col-stats no-overflow">
                        <div class="no-overflow">{{$v->uid}}</div>
                    </div>
                    <div class="item-col item-col-stats no-overflow">
                        <div class="no-overflow">{{$v->saatus}}</div>
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
        
          
          {!! $data->appends(['keywords' => $keyword])->render() !!}
          
        
    </nav>
</article>

@endsection
@section('js')
    <script>
        $('.text-xs-right li').addClass('page-link');
        $('.text-xs-right li').attr('style','list-style:none');
    </script>
@endsection

