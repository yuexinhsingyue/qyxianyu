@extends('layouts.admin')

@section('title','网站信息')

@section('content')
	 <div class="title-block">
        <h3> 文章修改 <span class="sparkline bar" data-type="bar"></span> </h3>
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
	<div class="container">
		<div class="col-md-offset-1">
		 	<div class="col-md-10">
				<form action="{{url('/admin/article/'.$res->wid)}}" method="POST" enctype="multipart/form-data">
	                {{csrf_field()}}
					<input type="hidden" name="_method" value="put">
				  <div class="form-group">
				    <label for="exampleInputEmail1">文章标题： </label>
				    <input type="text" class="form-control" name="wtitle" id="exampleInputEmail1" style="height=45px" value="{{$res->wtitle}}">
				  </div>
				  <div class="form-group">
				    <label for="exampleInputEmail1">文章描述： </label>
				    <input type="text" class="form-control" name="wdesc" id="exampleInputEmail1" style="height=45px" value="{{$res->wdesc}}">
				  </div>
				   <div class="form-group">
				    <label for="exampleInputFile">内容：</label>
				    	<script type="text/javascript" charset="utf-8" src="{{asset('ueditor/ueditor.config.js')}}"></script>
                        <script type="text/javascript" charset="utf-8" src="{{asset('ueditor/ueditor.all.min.js')}}"> </script>
                        <script type="text/javascript" charset="utf-8" src="{{asset('ueditor/lang/zh-cn/zh-cn.js')}}"></script>

                        <script id="editor" name="wcontent" type="text/plain" style="width:850px;height:300px;">
							{!! $res->wcontent !!}
                        </script>
                        
                        <script type="text/javascript">

                            //实例化编辑器
                            //建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接调用UE.getEditor('editor')就能拿到相关的实例
                            var ue = UE.getEditor('editor');

                        </script>
                        <style>
                            .edui-default{line-height: 28px;}
                            div.edui-combox-body,div.edui-button-body,div.edui-splitbutton-body
                            {overflow: hidden; height:20px;}
                            div.edui-box{overflow: hidden; height:22px;}
                        </style>
				    </div>
						<input class="btn btn-primary" type="submit" value="确认修改">
						<button class="btn btn-warning" onclick="history.go(-1)" style="border-radius:20px;margin-left:200px">返回</button>
				</form>
			</div>
		</div>
	</div>

@endsection