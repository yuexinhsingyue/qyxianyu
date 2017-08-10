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
            <form class="form-inline" >
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

@endsection

