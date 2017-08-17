@extends('layouts.persons')
@section('title','')

@section('header')
    <link href="{{ url('home/css/personal.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ url('home/css/systyle.css') }}" rel="stylesheet" type="text/css">
@endsection

@section('content1')
		

			<div class="user-info">
						<div class="info-main">
							<form class="am-form am-form-horizontal" method="POST" action="{{url('home/store')}}" enctype="multipart/form-data">
							 {{ csrf_field() }}
								<div class="am-form-group">
									<label for="user-name2" class="am-form-label">鱼塘名字</label>
									<div class="am-form-content">
										<input type="text" id="user-name2"  name="fishpondname">

									</div>
								</div>
								<div class="am-form-group">
									<label for="user-name2" class="am-form-label">鱼塘简介</label>
									<div class="am-form-content">
										<input type="text" id="user-name2"  name="synopsis">

									</div>
								</div>
								<div class="am-form-group">
									<label for="user-name" class="am-form-label">鱼塘封面</label>
									<div class="am-form-content">
										<input type="file" name="face" value="">

									</div>
								</div>

								<div class="am-form-group">
									<label class="am-form-label">鱼塘状态</label>
									<div class="am-form-content sex">
										<label class="am-radio-inline">
											<input type="radio" name="saatus" value="1" data-am-ucheck> 启用
										</label>
										<label class="am-radio-inline">
											<input type="radio" name="saatus" value="0" data-am-ucheck>禁用
										</label>
									</div>
								</div>
						

								<div class="info-btn">
									<div class="am-btn am-btn-danger">
									<input class="btn btn-success" type="submit" value="确认添加" style="border-radius:20px">
				                    </div>
								</div>
						

							</form>
						</div>

			</div>	
	
			
				<!--底部-->
@endsection

@section('content2')
			</div>

			
		</div>

@endsection

@section('js')
	
@endsection
