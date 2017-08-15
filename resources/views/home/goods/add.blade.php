@extends('layouts.person')
@section('title','商品添加页')
@section('header')
    <link href="{{url("home/css/personal.css")}}" rel="stylesheet" type="text/css">
    <link href="{{url("home/css/addstyle.css") }}" rel="stylesheet" type="text/css">
    <script src="{{url("home/js/jquery.min.js") }}" type="text/javascript"></script>
    <script src="{{url("home/js/amazeui.js") }}"></script>
    @endsection
@section('content1')
    <div id="doc-modal-1" class="">

        <div class="add-dress">

            <!--标题 -->
            <div class="am-cf am-padding">
                <div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">新增宝贝</strong></div>
            </div>
            <hr>

            <div style="margin-top: 20px;" class="am-u-md-12 am-u-lg-8">
                <form class="am-form am-form-horizontal"  method="post" action="{{ url('/home/goods') }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="am-form-group">
                        <label class="am-form-label" for="user-name">宝贝名称&nbsp; &nbsp;</label>
                        <div class="am-form-content">
                            <input type="text" name="gname" placeholder="商品名称必填" id="user-name">
                        </div>
                    </div>
                    <div class="am-form-group">
                        <label class="am-form-label" for="user-name">宝贝现价&nbsp; &nbsp;</label>
                        <div class="am-form-content">
                            <input type="text"  name="nprice" placeholder="宝贝现价必填" id="user-name">
                        </div>
                    </div>
                    <div class="am-form-group">
                        <label class="am-form-label" for="user-name">宝贝原价&nbsp; &nbsp;</label>
                        <div class="am-form-content">
                            <input type="text"  id="user-name" name="oprice">
                        </div>
                    </div>
                    <div class="am-form-group">
                        <label class="am-form-label" for="user-name">宝贝数量&nbsp; &nbsp;</label>
                        <div class="am-form-content">
                            <input type="text" placeholder="商品名称必填" id="user-name" name="goodsNum">
                        </div>
                    </div>

                    <div class="am-form-group">
                        <label class="am-form-label" for="user-name">宝贝类别&nbsp; &nbsp;</label>

                        <div class="am-form-content">
                            <select name="tid">
                                @foreach ($type as $k=>$v)
                                <option selected value="{{$v->tid}}">{{$v['tname']}}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>
                    <div class="am-form-group">
                        <label class="am-form-label" for="user-name">所属地&nbsp; &nbsp;</label>
                        <div class="am-form-content">
                            <input type="text" placeholder="所属地" id="user-name" name="addr">
                        </div>
                    </div>

                    <div class="am-form-group">
                        <label class="am-form-label" for="user-name">宝贝图片&nbsp; &nbsp;</label>
                        <div class="col-sm-10">
                            <input type="file" name="pic">
                        </div>
                    </div>
                    <div class="am-form-group">
                        <label class="am-form-label" for="user-name" style="float:left">选择发布&nbsp; &nbsp;</label>
                        <div class="am-form-content">
                        <select name="fid">
                            <option selected value="0">大厅</option>
                            @foreach($fish as $k=>$v)
                            <option  value="{{$v->id}}">{{$v['fishpondname']}}</option>
                                @endforeach
                        </select>
                        </div>
                    </div>


                    <div class="am-form-group">
                        <label class="am-form-label" for="user-intro">宝贝描述&nbsp; &nbsp;</label>
                        <div class="am-form-content">
                            <textarea placeholder="输入详细描述" id="user-intro" rows="3" class="" name="goodsDes"></textarea>
                            <small>100字以内写出你的详细描述...</small>
                        </div>
                    </div>

                    <div class="am-form-group">
                        <div class="am-u-sm-9 am-u-sm-push-3">
                            <button type="submit"> <a class="am-btn am-btn-danger">发布</a></button>
                            <a class="am-btn am-btn-danger">返回</a>
                            {{--<a data-am-modal-close="" class="am-close am-btn am-btn-danger" href="javascript: void(0)">取消</a>--}}
                        </div>
                    </div>
                </form>
            </div>

        </div>

    </div>
    @endsection
