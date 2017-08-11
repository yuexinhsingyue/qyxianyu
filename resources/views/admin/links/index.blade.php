@extends('layouts.admin')

@section('title','网站信息')

@section('content')
	<div class="container">
		<table class="table table-hover">
			<thead>
		  		<tr>
		  			<th>ID</th>
		  			<th>名称</th>
		  			<th>链接</th>
		  			<th>图片</th>
		  			<th>操作</th>
		  		</tr>
	  		</thead>
            @foreach($link as $k=>$v)
	  		<tr>
	  			<td>{{$v->lid}}</td>
	  			<td>{{$v->lname}}</td>
	  			<td>{{$v->lurl}}</td>
	  			<td><img src="{{$v->limg}}" alt="" width="100" height="50"></td>
	  			<td>
	  				<a href="{{url('admin/links/'.$v->lid.'/edit')}}" class="btn btn-primary" style="margin-left:-40px">修改</a>
	  				<form action="{{url('admin/links/'.$v->lid)}}" method="POST" >
	  					{{ csrf_field() }}
	  					<input type="hidden" name="_method" value="delete">
						<button type="button" class="btn btn-danger" style="margin-left:20px;margin-top:-57px">删除</button>
	  				</form>
	  			</td>
	  		</tr>
			@endforeach
		</table>
	</div>
@endsection