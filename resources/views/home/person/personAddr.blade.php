@extends('layouts.person')
@section('title','收货地址')
@section('header')
    <link href="{{url("home/css/personal.css")}}" rel="stylesheet" type="text/css">
    <link href="{{url("home/css/addstyle.css") }}" rel="stylesheet" type="text/css">
    <script src="{{url("home/js/jquery.min.js") }}" type="text/javascript"></script>
    <script src="{{url("home/js/amazeui.js") }}"></script>
    <style>
        #face{background: #f9f9f9 none repeat scroll 0 0;border: 1px solid #ccc;color: #666;height: 104px; line-height: 20px;margin-bottom: 10px;verflow: hidden;padding: 10px;width: 320px;float:left}
        .mask {
            background: rgba(0, 0, 0, 0)  no-repeat scroll 0 0;
            height: 104px;left: 0; position: relative;top: 0;width: 104px;  z-index: 2;float:left
        }
        .info-m {
            float: left;width: 177px;
        }
    </style>
@endsection
@section('content1')
    <div class="user-address">
    <!--标题 -->
    <div class="am-cf am-padding">
        <div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">地址管理</strong> / <small>Address&nbsp;list</small></div>
    </div>
    <hr>
    <ul class="am-avg-sm-1 am-avg-md-3 am-thumbnails">

        @foreach( $addr as $res)
        <li class="user-addresslist defaultAddr">
            <span class="new-option-r"><i class="am-icon-check-circle"></i>默认地址</span>
            <p class="new-tit new-p-re">
                <span class="new-txt">{{$res['name']}}</span>
                <span class="new-txt-rd2">{{$res['phone']}}</span>
            </p>
            <div class="new-mu_l2a new-p-re">
                <p class="new-mu_l2cw">
                    <span class="title">地址：</span>
                    <span class="province">湖北</span>省
                    <span class="city">武汉</span>市
                    <span class="dist">洪山</span>区
                    <span class="street">雄楚大道666号(中南财经政法大学)</span></p>
            </div>
            <div class="new-addr-btn">
                <a href="#"><i class="am-icon-edit"></i>编辑</a>
                <span class="new-addr-bar">|</span>
                <a href="javascript:void(0);" onclick="delClick(this);"><i class="am-icon-trash"></i>删除</a>
            </div>
        </li>
        @endforeach

        {{--<li class="user-addresslist">--}}
            {{--<span class="new-option-r"><i class="am-icon-check-circle"></i>设为默认</span>--}}
            {{--<p class="new-tit new-p-re">--}}
                {{--<span class="new-txt">小叮当</span>--}}
                {{--<span class="new-txt-rd2">159****1622</span>--}}
            {{--</p>--}}
            {{--<div class="new-mu_l2a new-p-re">--}}
                {{--<p class="new-mu_l2cw">--}}
                    {{--<span class="title">地址：</span>--}}
                    {{--<span class="province">湖北</span>省--}}
                    {{--<span class="city">武汉</span>市--}}
                    {{--<span class="dist">洪山</span>区--}}
                    {{--<span class="street">雄楚大道666号(中南财经政法大学)</span></p>--}}
            {{--</div>--}}
            {{--<div class="new-addr-btn">--}}
                {{--<a href="#"><i class="am-icon-edit"></i>编辑</a>--}}
                {{--<span class="new-addr-bar">|</span>--}}
                {{--<a href="javascript:void(0);" onclick="delClick(this);"><i class="am-icon-trash"></i>删除</a>--}}
            {{--</div>--}}
        {{--</li>--}}
        {{--<li class="user-addresslist">--}}
            {{--<span class="new-option-r"><i class="am-icon-check-circle"></i>设为默认</span>--}}
            {{--<p class="new-tit new-p-re">--}}
                {{--<span class="new-txt">小叮当</span>--}}
                {{--<span class="new-txt-rd2">159****1622</span>--}}
            {{--</p>--}}
            {{--<div class="new-mu_l2a new-p-re">--}}
                {{--<p class="new-mu_l2cw">--}}
                    {{--<span class="title">地址：</span>--}}
                    {{--<span class="province">湖北</span>省--}}
                    {{--<span class="city">武汉</span>市--}}
                    {{--<span class="dist">洪山</span>区--}}
                    {{--<span class="street">雄楚大道666号(中南财经政法大学)</span></p>--}}
            {{--</div>--}}
            {{--<div class="new-addr-btn">--}}
                {{--<a href="#"><i class="am-icon-edit"></i>编辑</a>--}}
                {{--<span class="new-addr-bar">|</span>--}}
                {{--<a href="javascript:void(0);" onclick="delClick(this);"><i class="am-icon-trash"></i>删除</a>--}}
            {{--</div>--}}
        {{--</li>--}}

    </ul>
    <div class="clear"></div>
    <a class="new-abtn-type" data-am-modal="{target: '#doc-modal-1', closeViaDimmer: 0}">添加新地址</a>
    <!--例子-->
    <div class="" id="doc-modal-1">

        <div class="add-dress">

            <!--标题 -->
            <div class="am-cf am-padding">
                <div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">新增地址</strong> / <small>Add&nbsp;address</small></div>
            </div>
            <hr>

            <div class="am-u-md-12 am-u-lg-8" style="margin-top: 20px;">
                <form class="am-form am-form-horizontal">

                    <div class="am-form-group">
                        <label for="user-name" class="am-form-label">收货人</label>
                        <div class="am-form-content">
                            <input id="user-name" placeholder="收货人" type="text">
                        </div>
                    </div>

                    <div class="am-form-group">
                        <label for="user-phone" class="am-form-label">手机号码</label>
                        <div class="am-form-content">
                            <input id="user-phone" placeholder="手机号必填" type="email">
                        </div>
                    </div>
                    <div class="am-form-group">
                        <label for="user-address" class="am-form-label">所在地</label>
                        <div class="am-form-content address">
                            <select data-am-selected="" style="display: none;">
                                <option value="a">浙江省</option>
                                <option value="b" selected="">湖北省</option>
                            </select><div class="am-selected am-dropdown " id="am-selected-wj4h2" data-am-dropdown="">  <button type="button" class="am-selected-btn am-btn am-dropdown-toggle am-btn-default">    <span class="am-selected-status am-fl">浙江省</span>    <i class="am-selected-icon am-icon-caret-down"></i>  </button>  <div class="am-selected-content am-dropdown-content">    <h2 class="am-selected-header"><span class="am-icon-chevron-left">返回</span></h2>       <ul class="am-selected-list">                     <li class="am-checked" data-index="0" data-group="0" data-value="a">         <span class="am-selected-text">浙江省</span>         <i class="am-icon-check"></i></li>                                 <li class="" data-index="1" data-group="0" data-value="b">         <span class="am-selected-text">湖北省</span>         <i class="am-icon-check"></i></li>            </ul>    <div class="am-selected-hint"></div>  </div></div>
                            <select data-am-selected="" style="display: none;">
                                <option value="a">温州市</option>
                                <option value="b" selected="">武汉市</option>
                            </select><div class="am-selected am-dropdown " id="am-selected-wvpyb" data-am-dropdown="">  <button type="button" class="am-selected-btn am-btn am-dropdown-toggle am-btn-default">    <span class="am-selected-status am-fl">温州市</span>    <i class="am-selected-icon am-icon-caret-down"></i>  </button>  <div class="am-selected-content am-dropdown-content">    <h2 class="am-selected-header"><span class="am-icon-chevron-left">返回</span></h2>       <ul class="am-selected-list">                     <li class="am-checked" data-index="0" data-group="0" data-value="a">         <span class="am-selected-text">温州市</span>         <i class="am-icon-check"></i></li>                                 <li class="" data-index="1" data-group="0" data-value="b">         <span class="am-selected-text">武汉市</span>         <i class="am-icon-check"></i></li>            </ul>    <div class="am-selected-hint"></div>  </div></div>
                            <select data-am-selected="" style="display: none;">
                                <option value="a">瑞安区</option>
                                <option value="b" selected="">洪山区</option>
                            </select><div class="am-selected am-dropdown " id="am-selected-s2jsk" data-am-dropdown="">  <button type="button" class="am-selected-btn am-btn am-dropdown-toggle am-btn-default">    <span class="am-selected-status am-fl">洪山区</span>    <i class="am-selected-icon am-icon-caret-down"></i>  </button>  <div class="am-selected-content am-dropdown-content">    <h2 class="am-selected-header"><span class="am-icon-chevron-left">返回</span></h2>       <ul class="am-selected-list">                     <li class="" data-index="0" data-group="0" data-value="a">         <span class="am-selected-text">瑞安区</span>         <i class="am-icon-check"></i></li>                                 <li class="am-checked" data-index="1" data-group="0" data-value="b">         <span class="am-selected-text">洪山区</span>         <i class="am-icon-check"></i></li>            </ul>    <div class="am-selected-hint"></div>  </div></div>
                        </div>
                    </div>

                    <div class="am-form-group">
                        <label for="user-intro" class="am-form-label">详细地址</label>
                        <div class="am-form-content">
                            <textarea class="" rows="3" id="user-intro" placeholder="输入详细地址"></textarea>
                            <small>100字以内写出你的详细地址...</small>
                        </div>
                    </div>

                    <div class="am-form-group">
                        <div class="am-u-sm-9 am-u-sm-push-3">
                            <a class="am-btn am-btn-danger">保存</a>
                            <a href="javascript: void(0)" class="am-close am-btn am-btn-danger" data-am-modal-close="">取消</a>
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
            $(".new-option-r").click(function() {

                $(this).parent('.user-addresslist').addClass("defaultAddr").siblings().removeClass("defaultAddr");
            });

            var $ww = $(window).width();
            if($ww>640) {
                $("#doc-modal-1").removeClass("am-modal am-modal-no-btn");
            }
            })
    </script>

    @endsection