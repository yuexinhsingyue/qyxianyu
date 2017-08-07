@extends('layouts.admin')

@section('title','后台管理系统')

@section('content')

<div class="title-block">
    <h1 class="title" style="display:inline"> 网站信息 </h1>
    <h1 style="float:right;" id="time">&nbsp;</h1>
    <br>
</div>

<div class="card-block">
    <div class="card-title-block">
        <h3 class="title"> 系统配置信息 </h3>
        <hr>
    </div>
    <section class="example">
        <table class="table table-bordered" >
            <tbody>
            <tr>
                <th scope="row" width="15%">服务器IP地址</th>
                <td>{{ $_SERVER['SERVER_ADDR'] }}</td>
            </tr>
            <tr>
                <th scope="row">主机名</th>
                <td>{{ $_SERVER['SERVER_NAME'] }}</td>
            </tr>
            <tr>
                <th scope="row">服务器标识</th>
                <td>{{ $_SERVER['SERVER_SOFTWARE'] }}</td>
            </tr>
            <tr>
                <th scope="row">通信协议</th>
                <td>{{ $_SERVER['SERVER_PROTOCOL'] }}</td>
            </tr>
            <tr>
                <th scope="row">文档根目录</th>
                <td>{{ $_SERVER['DOCUMENT_ROOT'] }}</td>
            </tr>
            <tr>
                <th scope="row">客户端IP地址</th>
                <td>{{ $_SERVER['REMOTE_ADDR'] }}</td>
            </tr>
            </tbody>
        </table>
    </section>
</div>
<hr>
@endsection

@section('js')
<script>
    setInterval(function(){
        var d = new Date();
        $('#time').html(d.toLocaleString());
    },1000);
</script>
@endsection
