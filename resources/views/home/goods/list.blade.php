@extends('layouts.person')
@section('title','个人商品列表页')

@section('header')
   <link href="{{url("home/css/personal.css")}}" rel="stylesheet" type="text/css">
   <link href="{{url("home/css/colstyle.css")}}" rel="stylesheet" type="text/css">
@endsection

@section('content1')
   <div class="user-collection">
      <!--标题 -->
      <div class="am-cf am-padding">
         <div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">我的商品</strong> </div>
      </div>
      <hr>

      <div class="you-like">
         <div class="s-bar">
            我的发布
            <a class="am-badge am-badge-danger am-round">已卖出</a>
            <a class="am-badge am-badge-danger am-round">在售</a>
         </div>
         <div class="s-content">
            <div class="s-item-wrap">
               <div class="s-item">

                  <div class="s-pic">
                     @
                     <a class="s-pic-link" href="#">
                        <img class="s-pic-img s-guess-item-img" title="包邮s925纯银项链女吊坠短款锁骨链颈链日韩猫咪银饰简约夏配饰" alt="包邮s925纯银项链女吊坠短款锁骨链颈链日韩猫咪银饰简约夏配饰" src="../style/img/0-item_pic.jpg_220x220.jpg">
                     </a>
                  </div>
                  <div class="s-info">
                     <div class="s-title"><a title="包邮s925纯银项链女吊坠短款锁骨链颈链日韩猫咪银饰简约夏配饰" href="#">包邮s925纯银项链女吊坠短款锁骨链颈链日韩猫咪银饰简约夏配饰</a></div>
                     <div class="s-price-box">
                        <span class="s-price"><em class="s-price-sign">¥</em><em class="s-value">42.50</em></span>
                        <span class="s-history-price"><em class="s-price-sign">¥</em><em class="s-value">68.00</em></span>
                     </div>
                     <div class="s-extra-box">
                        <span class="s-comment">好评: 98.03%</span>
                        <span class="s-sales">月销: 219</span>
                     </div>
                  </div>
                  <div class="s-tp">
                     <span class="ui-btn-loading-before">找相似</span>
                     <i class="am-icon-shopping-cart"></i>
                     <span class="ui-btn-loading-before buy">加入购物车</span>
                     <p>
                        <a class="c-nodo J_delFav_btn" href="javascript:;">取消收藏</a>
                     </p>
                  </div>
               </div>
            </div>
         </div>
      </div>

   </div>

@endsection
