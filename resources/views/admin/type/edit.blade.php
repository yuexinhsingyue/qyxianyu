@extends('layouts.admin')

@section('title','分类修改页')

@section('content')
    <article class="content item-editor-page" style="padding-top: 0px;padding-bottom: 0px;">
        <div class="title-block">
            <h3 class="title"> 添加分类 <span class="sparkline bar" data-type="bar"></span> </h3>
        </div>
        <form  action="{{url('admin/type/'.$cate->tid)}}" method="post">
            {{csrf_field()}}
            <input name="_method" type="hidden" value="put" />
            <div class="card card-block">
                <div class="form-group row">
                    <label class="col-sm-2 form-control-label text-xs-right">
                        父级分类:
                    </label>
                    <div class="col-sm-10">
                        <select class="form-control" name="pid">
                            <option value="0">一级分类</option>
                            @foreach($res as $k=>$v)
                                @if($v->tid== $cate->pid)
                                    <option value="{{$v->tid}}" selected>{{$v->tname}}</option>
                                @else
                                    <option value="{{$v->tid}}">{{$v->tname}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 form-control-label text-xs-right" ">
                        分类名称:
                    </label>
                    <div class="col-sm-10">
                        <input class="form-control boxed"  type="text" name="tname" value="{{$cate->tname}}">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10 col-sm-offset-2"> <button type="submit" class="btn btn-primary" value="提交">
                            修改
                        </button> </div>
                </div>
            </div>
        </form>
    </article>

@endsection