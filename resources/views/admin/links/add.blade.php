@extends('layouts.admin')

@section('title','网站信息')

@section('content')
	<button class="btn btn-warning" onclick="history.go(-1)" style="border-radius:20px">返回</button>


	<div class="container">
		<div class="col-md-offset-1">
		 	<div class="col-md-10">
				<form action="{{url('/admin/links')}}" method="POST" enctype="multipart/form-data">
	                {{csrf_field()}}
				  <div class="form-group">
				    <label for="exampleInputEmail1">链接名称: </label>
				    <input type="text" class="form-control" name="lname" id="exampleInputEmail1" style="height=45px" value="">
				  </div>
				  <div class="form-group">
				    <label for="exampleInputEmail1">目标地址: </label>
				    <input type="text" class="form-control" name="lurl" id="exampleInputEmail1" style="height=45px" value="">
				  </div>
				   <div class="form-group">
				    <label for="exampleInputFile">链接图片 :</label>
				    <input type="file" name="limg" value="" />
				    <input type="hidden" name="pic" value="">
				    <img src="" alt="" width="100" height="100" style="margin-left:200px;margin-top:-50px">
				  </div>
				<input class="btn btn-info" type="submit" value="确认添加" style="border-radius:20px;" >
				</form>
			</div>
		</div>
	</div>

@endsection