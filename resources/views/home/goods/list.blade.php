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
            @foreach($goods as $k=>$v)
            <div class="s-item-wrap">

               <div class="s-item">

                  <div class="s-pic">
                     <a class="s-pic-link" href="#">
                        <img class="s-pic-img s-guess-item-img" title="{{$v->gname}}"  src="/{{ $v->pic  }}">
                     </a>
                  </div>
                  <div class="s-info">
                     <div class="s-title"><a title="{{$v->gname}}" href="#">{{$v->gname}}</a></div>
                     <div class="s-price-box">
                        <span class="s-price"><em class="s-price-sign">¥</em><em class="s-value">{{$v->nprice}}</em></span>
                        <span class="s-history-price"><em class="s-price-sign">¥</em><em class="s-value">{{$v->oprice}}</em></span>
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
            @endforeach
         </div>
      </div>

   </div>

@endsection
