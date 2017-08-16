@extends('layouts.admin')

@section('title','网站配置添加')

@section('content')

	<button class="btn btn-warning" onclick="history.go(-1)" style="border-radius:20px">返回</button>
		
		<div class="result_title">
            @if (count($errors) > 0)
                <div class="mark" style="background:#ED5F6F;border-radius:10px">
                    <ul>
                        @if(is_object($errors))
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        @else
                            <li>{{ session('msg') }}</li>
                        @endif
                    </ul>
                </div>
            @endif
        </div>
   
	<div class="container">
		<div class="col-md-offset-1">
		 	<div class="col-md-10">
				<form action="{{url('/admin/web')}}" method="POST" enctype="multipart/form-data">
				  <div class="form-group">
				    <label for="exampleInputEmail1">网站名称：</label>
				    <input type="text" class="form-control" name="name" id="exampleInputEmail1" value="">
				  </div>
				  <div class="form-group">
				    <label for="exampleInputPassword1">网站描述：</label>
				    <input type="text" class="form-control" name="describe" id="exampleInputPassword1" value="">
				  </div>
				  <div class="form-group">
				    <label for="exampleInputPassword1">联系方式：</label>
				    <input type="text" class="form-control" name="telephone" id="exampleInputPassword1" value="">
				  </div>
				  <div class="form-group">
				    <label for="exampleInputPassword1">备案号：</label>
				    <input type="text" class="form-control" name="filing" id="exampleInputPassword1" value="">
				  </div>
				  <div class="form-group">
				    <label for="exampleInputPassword1">版权信息：</label>
				    <input type="text" class="form-control" name="cright" id="exampleInputPassword1" value="">
				  </div>
				  <div class="form-group">
				    <label for="exampleInputPassword1">网站地址：</label>
				    <input type="text" class="form-control" name="url" id="exampleInputPassword1" value="">
				  </div>
				  <div class="form-group row">
		                <label class="col-sm-2 text-xs-right" style="margin-left:-55px">
		                    网站开关:
		                </label>
	                    <label>
	                        <input class="radio" name="status" type="radio" checked value="1">
	                        <span>开</span>
	                    </label>
	                    <label>
	                        <input class="radio" name="status" type="radio" value="2">
	                        <span>关</span>
	                    </label>
		            </div>
		            <div class="form-group">
				    <label for="exampleInputFile">网站Logo:</label>
				    <input type="file" name="logo" value="" />
				    <img src="" alt="" width="100" height="80" style="margin-left:150px;margin-top:-10px">
				  </div>
				  {{csrf_field()}}
				<input class="btn btn-success" type="submit" value="确认添加" style="border-radius:20px">

				</form>
			</div>
		</div>
	</div>

 

@endsection