@extends('layouts.admin')

@section('title','修改密码页')

@section('content')

<div class="subtitle-block">
    <h3 class="subtitle"> 修改密码 </h3>
</div>

<div class="card card-block sameheight-item" style="height: 310px;">
    @if(count($errors) > 0)
        <div class="alert alert-danger" id="error">
            <ul>
                @foreach($errors -> all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="post" action="{{ url('/admin/dopass') }}">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="exampleInputPassword1">
                原密码
            </label>
            <input class="form-control" type="password" placeholder="请输入原密码" name="password">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">
                新密码
            </label>
            <input class="form-control" type="password" placeholder="请输入6-12位密码" name="newpwd">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">
                确认密码
            </label>
            <input class="form-control" type="password" placeholder="请再次输入" name="renewpwd">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">
                确认修改
            </button>
        </div>
    </form>
</div>

@endsection

@section('js')
    <script>
        setTimeout(function(){
            $('#error').hide();
        },3000);
    </script>
@endsection

