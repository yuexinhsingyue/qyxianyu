@extends('layouts.home')
@section('title','结算页')

@section('header')
    <link href="{{ url('home/css/cartstyle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('home/css/jsstyle.css') }}" rel="stylesheet" type="text/css" />

    <script type="text/javascript" src="{{ url('home/js/address.js/') }}"></script>
@endsection

@section('content')
<div class="concent">
    <!--地址 -->
    <div class="paycont">
        <div class="clear"></div>
        <!--订单 -->
        <div class="concent">
            <div id="payTable">

                <h3>确认订单信息</h3>
                <div class="cart-table-th">
                    <div class="wp">
                        <div class="th th-item">
                            <div class="td-inner">商品信息</div>
                        </div>
                        <div class="th th-price">
                            <div class="td-inner">单价</div>
                        </div>
                        <div class="th th-amount">
                            <div class="td-inner">数量</div>
                        </div>
                        <div class="th th-sum">
                            <div class="td-inner">金额</div>
                        </div>

                    </div>
                </div>
                <div class="clear"></div>
                <div class="bundle  bundle-last">
                    <div class="bundle-main">
                        @foreach($cars as $m=>$n)
                            @foreach($goods as $k=>$v)
                                @if($n == $v->id)
                        <ul class="item-content clearfix">
                            <div class="pay-phone">
                                <li class="td td-item">
                                    <div class="item-pic">
                                        <a href="#" class="J_MakePoint">
                                            <img src="/{{$v->pic}}" class="itempic J_ItemImg" width="80" height="80">
                                        </a>
                                    </div>
                                    <div class="item-info">
                                        <div class="item-basic-info">
                                            <a href="#" class="item-title J_MakePoint" data-point="tbcart.8.11">{{$v->gname}}</a>
                                        </div>
                                    </div>
                                </li>
                                <li class="td td-info">
                                    <div class="item-props">
                                        <span class="sku-line">{{$v->goodsDes}}</span>
                                    </div>
                                </li>
                                <li class="td td-price">
                                    <div class="item-price price-promo-promo">
                                        <div class="price-content">
                                            <em class="J_Price price-now">{{$v->nprice}}</em>
                                        </div>
                                    </div>
                                </li>
                            </div>
                            <li class="td td-amount">
                                <div class="amount-wrapper ">
                                    <div class="item-amount ">
                                        <span class="phone-title">购买数量</span>
                                        <div class="sl">
                                            {{$v->goodsNum}}
                                            {{--<input class="min am-btn" name="" type="button" value="-">
                                            <input class="text_box" name="" type="text" value="3" style="width:30px;">
                                            <input class="add am-btn" name="" type="button" value="+">--}}
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="td td-sum">
                                <div class="td-inner">
                                    <em tabindex="0" class="J_ItemSum number">{{$v->nprice}}</em>
                                </div>
                            </li>
                        </ul>
                        <div class="clear"></div>
                                @endif
                            @endforeach

                        @endforeach
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="clear"></div>
                <div class="pay-total">
                    <div class="clear"></div>
                </div>
                <!--含运费小计 -->
                <div class="buy-point-discharge ">
                    <p class="price g_price ">
                        合计（含运费） <span>¥</span><em class="pay-sum">{{$sum}}</em>
                    </p>
                </div>
                <!--信息 -->
                <div class="order-go clearfix">
                    <div class="pay-confirm clearfix">
                        <div class="box">
                            <div tabindex="0" id="holyshit267" class="realPay"><em class="t">实付款：</em>
                                <span class="price g_price ">
                                <span>¥</span> <em class="style-large-bold-red " id="J_ActualFee">{{$sum}}</em>
                                        </span>
                            </div>
                            <div id="holyshit268" class="pay-address">
                                <p class="buy-footer-address">
                                    <span class="buy-line-title buy-line-title-type">寄送至：</span>
                                    <span class="buy--address-detail">
                                     <span class="province">湖北</span>省
                                    <span class="city">武汉</span>市
                                    <span class="dist">洪山</span>区
                                    <span class="street">雄楚大道666号(中南财经政法大学)</span>
                                    </span>
                                </p>
                                <p class="buy-footer-address">
                                    <span class="buy-line-title">收货人：</span>
                                    <span class="buy-address-detail">
                                     <span class="buy-user">艾迪 </span>
                                    <span class="buy-phone">15871145629</span>
                                    </span>
                                </p>
                            </div>
                        </div>
                        <div id="holyshit269" class="submitOrder">
                            <div class="go-btn-wrap">
                                <a id="J_Go" href="{{ url('home/success/'.$did)}}?sum={{$sum}}" class="btn-go" tabindex="0" title="点击此按钮，提交订单">提交订单</a>
                            </div>
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>

            </div>
            <div class="clear"></div>
        </div>
    </div>
</div>
@endsection

@section('js')

@endsection
