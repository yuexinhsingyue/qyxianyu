@extends('layouts.person')
@section('title','商品添加页')

@section('content1')
    <div id="doc-modal-1" class="">

        <div class="add-dress">

            <!--标题 -->
            <div class="am-cf am-padding">
                <div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">新增宝贝</strong></div>
            </div>
            <hr>

            <div style="margin-top: 20px;" class="am-u-md-12 am-u-lg-8">
                <form class="am-form am-form-horizontal"  method="get" action="{{ url('/home/goods') }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="am-form-group">
                        <label class="am-form-label" for="user-name">宝贝名称&nbsp; &nbsp;</label>
                        <div class="am-form-content">
                            <input type="text" placeholder="商品名称必填" id="user-name">
                        </div>
                    </div>
                    <div class="am-form-group">
                        <label class="am-form-label" for="user-name">宝贝现价&nbsp; &nbsp;</label>
                        <div class="am-form-content">
                            <input type="text" placeholder="宝贝现价必填" id="user-name">
                        </div>
                    </div>
                    <div class="am-form-group">
                        <label class="am-form-label" for="user-name">宝贝原价&nbsp; &nbsp;</label>
                        <div class="am-form-content">
                            <input type="text"  id="user-name">
                        </div>
                    </div>
                    <div class="am-form-group">
                        <label class="am-form-label" for="user-name">宝贝数量&nbsp; &nbsp;</label>
                        <div class="am-form-content">
                            <input type="text" placeholder="商品名称必填" id="user-name">
                        </div>
                    </div>

                    <div class="am-form-group">
                        <label class="am-form-label" for="user-name">宝贝类别&nbsp; &nbsp;</label>
                        <div class="am-form-content">
                            <select>
                                <option selected value="1">数码</option>
                            </select>
                        </div>
                    </div>
                    <div class="am-form-group">
                        <label class="am-form-label" for="user-name">所属地&nbsp; &nbsp;</label>
                        <div class="am-form-content">
                            <input type="text" placeholder="所属地" id="user-name">
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
                        <select>
                            <option selected value="1">大厅</option>
                            <option selected value="1">鱼塘</option>
                        </select>
                        </div>
                    </div>


                    <div class="am-form-group">
                        <label class="am-form-label" for="user-intro">宝贝描述&nbsp; &nbsp;</label>
                        <div class="am-form-content">
                            <textarea placeholder="输入详细描述" id="user-intro" rows="3" class=""></textarea>
                            <small>100字以内写出你的详细描述...</small>
                        </div>
                    </div>

                    <div class="am-form-group">
                        <div class="am-u-sm-9 am-u-sm-push-3">
                            <button type="submit">发布</button>
                            <a class="am-btn am-btn-danger">返回</a>
                            {{--<a data-am-modal-close="" class="am-close am-btn am-btn-danger" href="javascript: void(0)">取消</a>--}}
                        </div>
                    </div>
                </form>
            </div>

        </div>

    </div>
    @endsection
