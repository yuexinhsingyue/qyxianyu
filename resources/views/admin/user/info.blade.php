@extends('layouts.admin')

@section('title','用户信息页')

@section('content')

<article class="content item-editor-page" style="padding-top: 0px;padding-bottom: 0px;">
    <div class="title-block">
        <h3 class="title"> 用户信息修改 <span class="sparkline bar" data-type="bar"></span> </h3>
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
    <form  method="post" action="{{ url('/admin/doinfo') }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="card card-block">
            <div class="form-group row">
                <label class="col-sm-2 form-control-label text-xs-right">
                    电话:
                </label>
                <div class="col-sm-10">
                    <input class="form-control boxed" placeholder="请输入电话" type="text" name="tel"  value="{{ $face['tel'] }}">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 form-control-label text-xs-right">
                    邮箱:
                </label>
                <div class="col-sm-10">
                    <input class="form-control boxed" placeholder="请输入邮箱地址" type="text" name="emill" value="{{ $face['emill'] }}">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 form-control-label text-xs-right">
                    地址:
                </label>
                <div class="col-sm-10">
                    <input class="form-control boxed" placeholder="输入到市（省）、区" type="text" name="addr" value="{{ $face['addr'] }}">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 form-control-label text-xs-right">
                    头像:
                </label>
                <div class="col-sm-10">
                    <img src="{{ url($face['face']) }}" width="60px" height="60px">
                    <input type="file" name="face">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-10 col-sm-offset-2"> <button type="submit" class="btn btn-primary">
                        修改
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

