@extends('layouts.admin')

@section('title','添加分类页')

@section('content')

<article class="content item-editor-page" style="padding-top: 0px;padding-bottom: 0px;">
    <div class="title-block">
        <h3 class="title"> 添加分类 <span class="sparkline bar" data-type="bar"></span> </h3>
    </div>
    <form  method="post" action="" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="card card-block">
            <div class="form-group row">
                <label class="col-sm-2 form-control-label text-xs-right">
                    分类:
                </label>
                <div class="col-sm-10">
                    <select class="form-control">
                        <option>选择分类：</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 form-control-label text-xs-right">
                    分类名称:
                </label>
                <div class="col-sm-10">
                    <input class="form-control boxed" placeholder="" type="text">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-10 col-sm-offset-2"> <button type="submit" class="btn btn-primary">
                        添加
                    </button> </div>
            </div>
        </div>
    </form>
</article>
@endsection

