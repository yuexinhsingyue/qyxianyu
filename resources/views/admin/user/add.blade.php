@extends('layouts.admin')

@section('title','后台管理系统')

@section('content')

<article class="content item-editor-page" style="padding-top: 0px;">
    <div class="title-block">
        <h3 class="title"> 添加用户 <span class="sparkline bar" data-type="bar"></span> </h3>
    </div>
    <form  method="post" action="" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="card card-block">
            <div class="form-group row">
                <label class="col-sm-2 form-control-label text-xs-right">
                    姓名:
                </label>
                <div class="col-sm-10">
                    <input class="form-control boxed" placeholder="" type="text">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 form-control-label text-xs-right">
                    密码:
                </label>
                <div class="col-sm-10">
                    <input class="form-control boxed" placeholder="请输入密码" type="password">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 form-control-label text-xs-right">
                    密码:
                </label>
                <div class="col-sm-10">
                    <input class="form-control boxed" placeholder="再次输入密码" type="password">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 form-control-label text-xs-right">
                    电话:
                </label>
                <div class="col-sm-10">
                    <input class="form-control boxed" placeholder="" type="text">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 form-control-label text-xs-right">
                    邮箱:
                </label>
                <div class="col-sm-10">
                    <input class="form-control boxed" placeholder="" type="text">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 form-control-label text-xs-right">
                    地址:
                </label>
                <div class="col-sm-10">
                    <input class="form-control boxed" placeholder="输入市（省）、区" type="text">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 form-control-label text-xs-right">
                    头像:
                </label>
                <div class="col-sm-10">
                    <input type="file" name="" id="">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 form-control-label text-xs-right">
                    状态:
                </label>
                <div class="col-sm-10">
                    <label>
                        <input class="radio" name="inline-radios" type="radio" checked>
                        <span>启用</span>
                    </label>
                    <label>
                        <input class="radio" name="inline-radios" type="radio">
                        <span>禁用</span>
                    </label>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 form-control-label text-xs-right">
                    身份:
                </label>
                <div class="col-sm-10">
                    <select class="form-control">
                        <option>管理员</option>
                        <option>鱼塘塘主</option>
                        <option selected>普通用户</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-10 col-sm-offset-2"> <button type="submit" class="btn btn-primary">
                        提交
                    </button> </div>
            </div>
        </div>
    </form>
</article>
@endsection

