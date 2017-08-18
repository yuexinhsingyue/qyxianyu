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
        <!--物流 -->
        <div class="logistics">
            <h3>选择物流方式</h3>
            <ul class="op_express_delivery_hot">
                <li data-value="yuantong" class="OP_LOG_BTN  "><i class="c-gap-right" style="background-position:0px -468px"></i>圆通<span></span></li>
                <li data-value="shentong" class="OP_LOG_BTN  "><i class="c-gap-right" style="background-position:0px -1008px"></i>申通<span></span></li>
                <li data-value="yunda" class="OP_LOG_BTN  "><i class="c-gap-right" style="background-position:0px -576px"></i>韵达<span></span></li>
                <li data-value="zhongtong" class="OP_LOG_BTN op_express_delivery_hot_last "><i class="c-gap-right" style="background-position:0px -324px"></i>中通<span></span></li>
                <li data-value="shunfeng" class="OP_LOG_BTN  op_express_delivery_hot_bottom"><i class="c-gap-right" style="background-position:0px -180px"></i>顺丰<span></span></li>
            </ul>
        </div>
        <div class="clear"></div>
        <!--支付方式-->
        <div class="logistics">
            <h3>选择支付方式</h3>
            <ul class="pay-list">
                <li class="pay card"><img src="{{ url('home/img/wangyin.jpg') }}">银联<span></span></li>
                <li class="pay qq"><img src="{{ url('home/img/weizhifu.jpg') }}">微信<span></span></li>
                <li class="pay taobao"><img src="{{ url('home/img/zhifubao.jpg') }}">支付宝<span></span></li>
            </ul>
        </div>
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
                        <ul class="item-content clearfix">
                            <div class="pay-phone">
                                <li class="td td-item">
                                    <div class="item-pic">
                                        <a href="#" class="J_MakePoint">
                                            <img src="/{{ $input['pic'] }}" class="itempic J_ItemImg">
                                        </a>
                                    </div>
                                    <div class="item-info">
                                        <div class="item-basic-info">
                                            <a href="#" class="item-title J_MakePoint" data-point="tbcart.8.11">{{$input['gname']}}</a>
                                        </div>
                                    </div>
                                </li>
                                <li class="td td-info">
                                    <div class="item-props">
                                        <span class="sku-line">{{$input['goodsDes']}}</span>
                                    </div>
                                </li>
                                <li class="td td-price">
                                    <div class="item-price price-promo-promo">
                                        <div class="price-content">
                                            <em class="J_Price price-now">{{$input['nprice']}}</em>
                                        </div>
                                    </div>
                                </li>
                            </div>
                            <li class="td td-amount">
                                <div class="amount-wrapper ">
                                    <div class="item-amount ">
                                        <span class="phone-title">购买数量</span>
                                        <div class="sl">
                                            {{$input['goodsNum']}}
                                            {{--<input class="min am-btn" name="" type="button" value="-">
                                            <input class="text_box" name="" type="text" value="3" style="width:30px;">
                                            <input class="add am-btn" name="" type="button" value="+">--}}
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="td td-sum">
                                <div class="td-inner">
                                    <em tabindex="0" class="J_ItemSum number">{{$price}}</em>
                                </div>
                            </li>
                        </ul>
                        <div class="clear"></div>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="clear"></div>
                <div class="pay-total">
                    <!--留言-->
                    <div class="order-extra">
                        <div class="order-user-info">
                            <div id="holyshit257" class="memo">
                                <label>买家留言：</label>
                                <input type="text" title="选填,对本次交易的说明（建议填写已经和卖家达成一致的说明）" placeholder="选填,建议填写和卖家达成一致的说明" class="memo-input J_MakePoint c2c-text-default memo-close">
                                <div class="msg hidden J-msg">
                                    <p class="error">最多输入500个字符</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--优惠券 -->
                    <div class="buy-agio">
                        <li class="td td-coupon">
                            <span class="coupon-title">优惠券</span>
                            <select data-am-selected="">
                                <option value="a">￥8【消费满95元可用】</option>
                                <option value="b" selected="">￥3【无使用门槛】</option>
                            </select>
                        </li>
                        <li class="td td-bonus">
                            <span class="bonus-title">红包</span>
                            <select data-am-selected="">
                                <option value="a">¥50.00元还剩10.40元</option>
                                <option value="b" selected="">¥50.00元还剩50.00</option>
                            </select>
                        </li>
                    </div>
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
                                <a id="J_Go" href="{{ url('home/success/') }}" class="btn-go" tabindex="0" title="点击此按钮，提交订单">提交订单</a>
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
