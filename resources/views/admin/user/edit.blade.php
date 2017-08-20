@extends('layouts.admin')

@section('title','审核用户页')

@section('content')

<article class="content item-editor-page" style="padding-top: 0px;padding-bottom: 0px;">
    <div class="title-block">
        <h3 class="title"> 审核用户身份 <span class="sparkline bar" data-type="bar"></span> </h3>
    </div>
    <form  method="post" action="{{ url('/admin/user/'.$id) }}">
        {{ csrf_field() }}
        <input name="_method" type="hidden" value="put" />
        <div class="card card-block">
            <div class="form-group row">
                <label class="col-sm-2 form-control-label text-xs-right">
                    用户状态:
                </label>
                <div class="col-sm-10">
                    <div> <label>
                        <input class="radio squared" name="status" @if($ud == 1) checked @endif type="radio" value="1">
                        <span>启用&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    </label> <label>
                        <input class="radio squared" name="status" @if($ud == 0) checked @endif type="radio" value="0">
                        <span>禁用</span>
                    </label> </div>
                </div>
            </div>
            @if($user ==1 || $user ==2)
            <div class="form-group row">
                <label class="col-sm-2 form-control-label text-xs-right">
                    身份:
                </label>
                <div class="col-sm-10">
                    <select class="form-control" name="indentity">
                        <option @if($user == 1) selected @endif value="1">管理员</option>
                        <option @if($user == 2) selected @endif value="2">普通用户</option>
                    </select>
                </div>
            </div>
            @endif
            @if($user == 3 || $user == 4)
            <div class="form-group row">
                <label class="col-sm-2 form-control-label text-xs-right">
                    塘主身份:
                </label>
                <div class="col-sm-10">
                        <div> <label>
                                <input class="radio squared" name="indentity" @if($user == 3) checked @endif type="radio" value="3">
                                <span>未审核</span>
                            </label> <label>
                                <input class="radio squared" name="indentity" @if($user == 4) checked @endif type="radio" value="4">
                                <span>审核通过</span>
                            </label>
                        </div>
                </div>
            </div>
            @endif
            <div class="form-group row">
                <div class="col-sm-10 col-sm-offset-2"> <button type="submit" class="btn btn-primary">
                        提交
                    </button> </div>
            </div>
        </div>
    </form>
</article>
@endsection


