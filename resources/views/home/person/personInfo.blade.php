@extends('layouts.person')
@section('title','个人信息')
@section('header')
    <link href="{{url("home/css/personal.css")}}" rel="stylesheet" type="text/css">
    <link href="{{url("home/css/addstyle.css") }}" rel="stylesheet" type="text/css">
    <script src="{{url("home/js/jquery.min.js") }}" type="text/javascript"></script>
    <script src="{{url("home/js/amazeui.js") }}"></script>
    <style>
        #face{background: #f9f9f9 none repeat scroll 0 0;border: 1px solid #ccc;color: #666;height: 104px; line-height: 20px;margin-bottom: 10px;verflow: hidden;padding: 10px;width: 320px;float:left}
        .mask {
            background: rgba(0, 0, 0, 0) url("{{'/'.$userdetail['face']}}") no-repeat scroll 0 0;
            height: 104px;left: 0; position: relative;top: 0;width: 104px;  z-index: 2;float:left
        }
        .info-m {
            float: left;width: 177px;
        }
    </style>
@endsection
@section('content1')
    <div id="doc-modal-1" class="">

        <div class="add-dress">

            <div class="am-cf am-padding" style="float: left">
                <div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">个人信息</strong></div>
            </div>
            <br><hr>
            <div style="margin-top: 20px; width: 584px;" class="am-u-md-12 am-u-lg-8">
                @if(count($errors) > 0)
                    <div class="alert alert-danger" id="error">
                        <ul>
                            @foreach($errors -> all() as $error)
                                <li style="color:red;">{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form class="am-form am-form-horizontal"  method="post" action="{{ url('/home/savepersoninfo') }}"
                      enctype="multipart/form-data"   >
                    <input type="hidden" name="uid" value="{{$userdetail['uid']}}">
                    {{csrf_field()}}
                    <div class="am-form-group">
                        <div style="padding-left: 28px;"><strong>用户名称：   {{$uname}}</strong></div>
                    </div>
                    <div class="am-form-group">
                        <div style="padding-left: 28px;"><strong>积&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;分：  {{$userdetail['number']}}</strong></div>
                    </div>
                    <div class="am-form-group"  style="width: 456px;">
                        <label class="am-form-label" for="user-name">邮&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;箱：</label>
                        <div class="am-form-content">
                            <input type="text" name="emill" placeholder="" id="user-name" value="{{$userdetail['emill']}}">
                        </div>
                    </div>
                    <div class="am-form-group"   style="width: 456px;">
                        <label class="am-form-label" for="user-name">电&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;话：</label>
                        <div class="am-form-content" >
                            <input type="text"  name="tel" placeholder="" id="user-name" value="{{$userdetail['tel']}}">
                        </div>
                    </div>
                    <div class="am-form-group"   style="width: 456px;">
                        <label class="am-form-label" for="user-name">地&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;址：</label>
                        <div class="am-form-content">
                            <input type="text"  id="addr" name="addr"  value="{{$userdetail['addr']}}">
                        </div>
                    </div>

                    <div class="am-form-group">
                        <label class="am-form-label" for="user-name">用户头像&nbsp; &nbsp;</label>
                        <div class="col-sm-10">
                            <input type="file" name="face">
                        </div>
                    </div>

                    <div class="am-form-group">
                        <div class="am-u-sm-9 am-u-sm-push-3">
                            <button type="submit" ><a class="am-btn am-btn-danger">修改</a></button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
        <div style =" " id="face">
            <div class="mask"></div>
            <div class="info-m" >
                <div><b>用户名：{{$uname}}</b></div>
                <div class="u-level">
									<span class="rank r4">
										<s></s><a clstag="homepage|keycount|home2013|infoMember" href="https://usergrade.jd.com/user/grade" target="_blank">金牌会员</a>
									</span>
                </div>
                <!--<div class="shop-level">购物行为评级：<span><a target="_blank" href="//vip.jd.com/help_behaviorRating.html">
                    <s id="userCredit" class="rank-sh rank-sh01"></s></a></span></div> -->
                <div clstag="pageclick|keycount|201602251|4">小白信用：<a href="#" target="_self">开通后可查看</a></div>
                <div>会员类型：个人用户</div>
            </div>
        </div>
        <div style="clear:both"></div>
    </div>

@endsection
