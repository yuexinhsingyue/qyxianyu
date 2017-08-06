@extends('layouts.admin')

@section('title','后台管理系统')

@section('content')

<div class="subtitle-block">
    <h3 class="subtitle"> 修改密码 </h3>
</div>

<div class="card card-block sameheight-item" style="height: 310px;">
    <form method="" action="">
        {{ csrf_field() }}
        <div class="form-group"> <label for="exampleInputPassword1">原密码</label> <input class="form-control" type="password"> </div>
        <div class="form-group"> <label for="exampleInputPassword1">新密码</label> <input class="form-control" type="password"> </div>
        <div class="form-group"> <label for="exampleInputPassword1">确认密码</label> <input class="form-control" type="password"> </div>
        <div class="form-group"> <button type="submit" class="btn btn-primary">确认修改</button> </div>
    </form>
</div>

@endsection

