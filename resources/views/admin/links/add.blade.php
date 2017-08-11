@extends('layouts.admin')

@section('title','网站信息')

@section('content')

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
				<a href="{{url('/admin/links')}}" class="btn btn-primary btn-lg active" role="button" style="position:relative;left:700px;float:left">链接列表</a>
				<input class="btn btn-default" type="submit" value="确认添加">


				</form>
			</div>
		</div>
	</div>
@endsection