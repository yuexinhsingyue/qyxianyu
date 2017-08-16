@extends('layouts.admin')

@section('title','网站信息')

@section('content')
 	<div class="title-block">
        <h3 class="title"> 链接修改 <span class="sparkline bar" data-type="bar"></span> </h3>
    </div>
	<div class="container">
		<div class="col-md-offset-1">
		 	<div class="col-md-10">
				<form action="{{url('/admin/links/'.$res->lid)}}" method="POST" enctype="multipart/form-data">
	                {{csrf_field()}}
					<input type="hidden" name="_method" value="put">
				  <div class="form-group">
				    <label for="exampleInputEmail1">链接名称: </label>
				    <input type="text" class="form-control" name="lname" id="exampleInputEmail1" style="height=45px" value="{{$res->lname}}">
				  </div>
				  <div class="form-group">
				    <label for="exampleInputEmail1">目标地址: </label>
				    <input type="text" class="form-control" name="lurl" id="exampleInputEmail1" style="height=45px" value="{{$res->lurl}}">
				  </div>
				   <div class="form-group">
				    <label for="exampleInputFile">链接图片 :</label>
				    <input type="file" name="limg" value="" />
				    <input type="hidden" name="pic" value="{{$res->limg}}">
				    <img src="{{$res->limg}}" alt="" width="100" height="100" style="margin-left:100px;border-radius:20px">
				  </div>
				<input class="btn btn-info" type="submit" value="确认修改" style="border-radius:20px">
				</form>
				<button class="btn btn-warning" onclick="history.go(-1)" style="border-radius:20px;margin-left:400px;margin-top:-70px">返回</button>
			</div>
		</div>
	</div>
	
@endsection