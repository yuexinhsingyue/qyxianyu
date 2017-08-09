@extends('layouts.admin')

@section('title','添加用户页')

@section('content')

<article class="content item-editor-page" style="padding-top: 0px;padding-bottom: 0px;">
    <div class="title-block">
        <h3 class="title"> 添加用户 <span class="sparkline bar" data-type="bar"></span> </h3>
    </div>
    @if(count($errors) > 0)
        <div class="alert alert-danger" id="error">
            <ul>
                @foreach($errors -> all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form  method="post" action="{{ url('/admin/user') }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="card card-block">
            <div class="form-group row">
                <label class="col-sm-2 form-control-label text-xs-right">
                    姓名:
                </label>
                <div class="col-sm-10">
                    <input class="form-control boxed" placeholder="请输入6-12字母组合" type="text" name="uname">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 form-control-label text-xs-right">
                    密码:
                </label>
                <div class="col-sm-10">
                    <input class="form-control boxed" placeholder="请输入6-12位密码" type="password" name="password">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 form-control-label text-xs-right">
                    密码:
                </label>
                <div class="col-sm-10">
                    <input class="form-control boxed" placeholder="再次输入密码" type="password" name="repwd">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 form-control-label text-xs-right">
                    电话:
                </label>
                <div class="col-sm-10">
                    <input class="form-control boxed" placeholder="请输入电话" type="text" name="tel">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 form-control-label text-xs-right">
                    邮箱:
                </label>
                <div class="col-sm-10">
                    <input class="form-control boxed" placeholder="请输入邮箱地址" type="text" name="emill">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 form-control-label text-xs-right">
                    地址:
                </label>
                <div class="col-sm-10">
                    <input class="form-control boxed" placeholder="输入到市（省）、区" type="text" name="addr">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 form-control-label text-xs-right">
                    头像:
                </label>
                <div class="col-sm-10">
                    <input type="file" name="face">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 form-control-label text-xs-right">
                    状态:
                </label>
                <div class="col-sm-10">
                    <label>
                        <input class="radio" name="status" type="radio" checked value="1">
                        <span>启用</span>
                    </label>
                    <label>
                        <input class="radio" name="status" type="radio" value="0">
                        <span>禁用</span>
                    </label>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 form-control-label text-xs-right">
                    身份:
                </label>
                <div class="col-sm-10">
                    <select class="form-control" name="indentity">
                        <option selected value="1">管理员</option>
                    </select>
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

@section('js')
    <script>
        setTimeout(function(){
            $('#error').hide();
        },3000);
    </script>
@endsection

