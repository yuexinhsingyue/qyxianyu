@extends('layouts.person')
@section('title','收货地址')
@section('header')

    <link href="http://hovertree.com/ziyuan/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="http://hovertree.com/texiao/bootstrap/4/css/city-picker.css" rel="stylesheet" type="text/css" />
    <script src="http://hovertree.com/ziyuan/jquery/jquery-1.12.1.min.js"></script>
    <script src="http://hovertree.com/ziyuan/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="http://hovertree.com/texiao/bootstrap/4/js/city-picker.data.js"></script>
    <script src="http://hovertree.com/texiao/bootstrap/4/js/city-picker.js"></script>
    <script src="http://hovertree.com/texiao/bootstrap/4/js/main.js"></script>

    <link href="{{url("home/css/personal.css")}}" rel="stylesheet" type="text/css">
    <link href="{{url("home/css/addstyle.css") }}" rel="stylesheet" type="text/css">
    <script src="{{url("home/js/jquery.min.js") }}" type="text/javascript"></script>
    <script src="{{url("home/js/amazeui.js") }}"></script>
    <style>
        .user-address li.user-addresslist{    border: solid 1px pink;}
        .user-address li.user-addresslist:hover{    border: solid 3px pink;}
    </style>
@endsection
@section('content1')
    <div class="user-address">
    <!--标题 -->
    <div class="am-cf am-padding">
            <div ><button id='createaddress'class="am-btn am-btn-danger">添加收货地址</button></div>

    </div>
    <hr>
    <ul class="am-avg-sm-1 am-avg-md-3 am-thumbnails" style = "margin-bottom: 15px;">

        @foreach( $addr as $res)
            @if($res['status'] == 1)
            <li class="user-addresslist  defaultAddr" >
                <span class="new-option-r"><i class="am-icon-check-circle"></i>默认地址</span>
                @else
                <li class="user-addresslist">
                <span class="new-option-r"><i class="am-icon-check-circle"></i>设为默认</span>

                @endif
            <p class="new-tit new-p-re">
                <span class="new-txt">{{$res['name']}}</span>
                <span class="new-txt-rd2">{{$res['phone']}}</span>
            </p>
            <div class="new-mu_l2a new-p-re">
                <p class="new-mu_l2cw">
                    <span class="title">地址：</span>
                    <span class="province">{{$res['address']}}</span>

            </div>
            <div class="new-addr-btn">
                <a href="javascript:void(0);" name="{!! $res['id'] !!} "   onclick ="editClick(this)"><i class="am-icon-edit"></i>编辑</a>
                <span class="new-addr-bar">|</span>

                <a href="javascript:void(0);" id="{!! $res['id'] !!}"   onclick="delClick(this)"> <i class="am-icon-trash"></i>删除</a>

            </div>
        </li>
        @endforeach

    </ul>
    <div class="clear"></div>
    <a class="new-abtn-type" data-am-modal="{target: '#doc-modal-1', closeViaDimmer: 0}">添加新地址</a>
    <!--例子-->
    <div class="" id="doc-modal-1" style="display:none">

        <div class="add-dress">

            <!--标题 -->
            <div class="am-cf am-padding">
                <div class="am-fl am-cf" id="displayname"><strong class="am-text-danger am-text-lg">编辑地址</strong></div>
            </div>
            <hr>

            <div class="am-u-md-12 am-u-lg-8" style="margin-top: 20px;">
                <form class="am-form am-form-horizontal" action="{{url('home/personaddr/')}}"  method="POST">
                    {{csrf_field()}}
                    {{--若是修改地址，传递修改的地址ID--}}
                    <input type="hidden" name="eid" value="0">
                    <div class="am-form-group">
                        <label for="user-name" class="am-form-label">收货人</label>
                        <div class="am-form-content">
                            <input id="user-name" placeholder="收货人" type="text" name="name">
                        </div>
                    </div>

                    <div class="am-form-group">
                        <label for="user-phone" class="am-form-label">手机号码</label>
                        <div class="am-form-content">
                            <input id="user-phone" placeholder="手机号必填" type="text" name="phone">
                        </div>
                    </div>
                    <div class="am-form-group">
                        <label for="user-address" class="am-form-label">所在地</label>
                        <div class="am-form-content address">
                            <div class="container">
                                <div class="docs-methods">
                                    {{--<form class="form-inline">--}}
                                        <div id="distpicker">
                                            <div class="form-group">
                                                <div style="position: relative;width: 560px; ">
                                                    <input id="city-picker3" class="form-control"  type="text" value="" name="address1" data-toggle="city-picker">
                                                </div>
                                            </div>

                                        </div>
                                    {{--</form>--}}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="am-form-group">
                        <label for="user-intro" class="am-form-label">详细地址</label>
                        <div class="am-form-content">
                            <textarea class="" rows="3" id="user-intro" placeholder="输入详细地址"  name="address2" style="width: 357px;"></textarea>
                            <small>100字以内写出你的详细地址...</small>
                        </div>
                    </div>

                    <div class="am-form-group">
                        <div class="am-u-sm-9 am-u-sm-push-3">
                            <button  type="submit" id="addbutton" class="am-btn am-btn-danger" >添加或修改</button>
                            {{--<a href="javascript: void(0)" class="am-close am-btn am-btn-danger" data-am-modal-close="">取消</a>--}}
                        </div>
                    </div>
                </form>
            </div>

        </div>

    </div>
    </div>

    <div class="clear"></div>
@endsection
@section('js')
<script type="text/javascript">

    $(document).ready(function() {
        /**
         *func：  修改默认地址
         *auth: hsingyue
         *date: 2017/08/17
         */
        $(".new-option-r").click(function() {

            $(this).parent('.user-addresslist').addClass("defaultAddr").siblings().removeClass("defaultAddr");
            telephone = $('.defaultAddr p .new-txt-rd2').html();
//                发送数据库更改状态
                $.get('{{url("home/personaddr/create")}}',{tel:telephone},function(data){
                   if(data) {
//                           成功返回1
                   }  else {
//                           失败返回0
                   }
                })
        });
        var $ww = $(window).width();
        if($ww>640) {
            $("#doc-modal-1").removeClass("am-modal am-modal-no-btn");
        }
        });
    /**
     *func： 添加收货地址时显示表单
     *auth: hsingyue
     *date: 2017/08/19
     */
   $('#createaddress').click( function () {
       $('#doc-modal-1').attr('style','display:block');
       $('#displayname').html('添加地址');
       $('#addbutton').html('添加');

   });

    /**
     *func： 保存地址后隐藏表单
     *auth: hsingyue
     *date: 2017/08/19
     */
   $('#addbutton').click(function () {
       $('#doc-modal-1').attr('style','display:none');
   })

    /**
     *func：  编辑用户地址与添加用户共用form表单，将由一个控制器方法处理。
     *auth: hsingyue
     *date: 2017/08/19
     */
     function editClick ( data )
    {
        $('#doc-modal-1').attr('style','display:block');
        $('#displayname').html('编辑地址');
        $('#addbutton').html('保存');
//            获取要编辑的地址ID号
        var did = data.name;
        console.log(did);
//        将ID号赋给form表单中隐藏域的修改ID值
        $("input[name='eid']").val(did);
//        $("input[name='eid']").val(did);
//            获取地址列表
        var addr = {!! $addr !!};
//            根据点击的地址列表ID，将值赋给编辑用户地址input输入框
         for ( i in addr )
        {
            if (addr[i]['id'] == did) {
//                    显示收货人名字
                $('input[name=name]').val(addr[i]['name']);
//                    显示收货人电话
                $('input[name=phone]').val(addr[i]['phone']);
//                  获取用户地址 根据区域 拆分成数组
                var addrArr = addr[i]['address'].split('/');
//                  显示区以下详细地址
                $('#user-intro').val(addrArr[3]);
//                    移除原来的包裹省市区代码<span class="title" style="display:inline">
                $('.city-picker-span span:nth-child(2)').remove();
//                    添加当前地址的省市区地址HTML代码
                $('.city-picker-span span:nth-child(1)').after (
                    '<span class="title" style="display:inline">'+
                     '<span class="select-item" data-count="province" data-code="340000">' + addrArr[0] + '</span>/<span class="select-item" data-count="city" data-code="340100">' + addrArr[1] +'</span>/<span class="select-item" data-count="district" data-code="340102">'+ addrArr[2] +'</span></span>'
                );
//                    显示当前地址的省市区地址
                $('.city-picker-span span:nth-child(2)').attr('style','display:inline');
//                    隐藏提示信息（“请选择省/市/区”）
                $('.city-picker-span .placeholder').attr('style','display:none');
            }
        }
    }

    /**
     *func：  删除用户地址
     *auth: hsingyue
     *date: 2017/08/18
     */
    function delClick( date )
    {
//            移除页面要删除的地址
//            date.parentNode.parentNode.remove();
//            发送数据库更改状态
        $.get('{{url("home/delpersonaddr")}}', {aid:date.id}, function(data) {
            if(data) {
                console.log(data);
//                    删除成功后移除本地地址列表
                var ids = '#' + date.id;
                aa = $(ids).parent().parent().remove();
            } else {
//                    删除失败
            }
        });
    }
</script>
@endsection