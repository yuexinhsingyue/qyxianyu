@extends('layouts.admin')

@section('title','网站信息')

@section('content')
	 <div class="title-block">
        <h3> 轮播图修改 <span class="sparkline bar" data-type="bar"></span> </h3>
    </div>
	
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
				<form action="{{url('/admin/figure/'.$data->sid)}}" method="POST" enctype="multipart/form-data">
	                {{csrf_field()}}
					<input type="hidden" name="_method" value="put">
				  <div class="form-group">
				    <label for="exampleInputEmail1">名称: </label>
				    <input type="text" class="form-control" name="stitle" id="exampleInputEmail1" style="height=45px" value="{{ $data->stitle }}">
				  </div>
				  <div class="form-group">
				    <label for="exampleInputEmail1">目标地址: </label>
				    <input type="text" class="form-control" name="surl" id="exampleInputEmail1" style="height=45px" value="{{ $data->surl }}">
				  </div>
				  <div class="form-group" style="margin-top:30px">
				    <label for="exampleInputFile">图片 :</label>
				    <input type="file" name="simg" value="" />
				    <input type="hidden" name="pic" value="{{$data->spic}}">
				    <div class="item-col fixed item-col-img md">
                        <img src="{{ url($data->spic) }}" width="300" height="100%" style="border-radius:20px;margin-top:20px">
                    </div>
				  </div>
				  <div class="form-group row" style="margin-left:-27px;margin-top:20px">
		                <label class="col-sm-1 form-control-label text-xs-right">
		                    状态:
		                </label>
	                    <label>
	                        <input class="radio" name="status" type="radio" @if($data->status == '1') checked  @elseif($data->status == '2')  @endif value="1">
	                        <span>显示</span>
	                    </label>
	                    <label>
	                        <input class="radio" name="status" type="radio" @if($data->status == '2') checked  @elseif($data->status == '1')  @endif value="2">
	                        <span>不显示</span>
	                    </label>
		            </div>{{csrf_field()}}
				  
				  		
				<input class="btn btn-primary" type="submit" value="确认修改" style="border-radius:20px">
				</form>
				<button class="btn btn-warning" onclick="history.go(-1)" style="border-radius:20px;margin-left:400px;margin-top:-70px">返回</button>
				
			</div>
		</div>
	</div>
	

@endsection