@extends('layouts.admin')
@section('title','百度地图')
@section('header')
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <style type="text/css">
        #allmap {width:580px;height:440px; float:left; box-shadow: 0px 0px 0px 2px #ccc ;overflow: hidden;margin:15px;font-family:"微软雅黑";}
        #r-result{width:400px;height:440px;overflow-y:scroll;float:left;}
    </style>
    <script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=lwVqvHPMsYmkvEnyEYO2p0tivOnegmLK"></script>
@endsection
@section('content')
  
  <div>
      输入目标地点<input type="text"  id="suggestId" >
      <div id="searchResultPanel" style="border:1px solid #C0C0C0;width:150px;height:auto; display:none;"></div>
  </div>
  <div >
    <div id="allmap"></div>
    <div id="r-result"></div>
  </div>


@endsection

@section('js')
<script type="text/javascript">

  // 切换城市
  var map = new BMap.Map("allmap");
  var point = new BMap.Point(116.404, 39.915);
  map.centerAndZoom(point, 14);
  map.enableScrollWheelZoom();
  map.enableInertialDragging();

  map.enableContinuousZoom();

  var size = new BMap.Size(10, 20);
  map.addControl(new BMap.CityListControl({
      anchor: BMAP_ANCHOR_TOP_LEFT,
      offset: size,
      
  }));

  // 添加带有定位的导航控件
    var navigationControl = new BMap.NavigationControl({
      // 靠左上角位置
      anchor: BMAP_ANCHOR_TOP_RIGHT,
      // LARGE类型
      type: BMAP_NAVIGATION_CONTROL_LARGE,
      // 启用显示定位
      enableGeolocation: true
    });
      console.log(navigationControl);

    map.addControl(navigationControl);

    


// 搜索
 var ac = new BMap.Autocomplete(    //建立一个自动完成的对象
    {"input" : "suggestId"
    ,"location" : map
  });

  ac.addEventListener("onhighlight", function(e) {  //鼠标放在下拉列表上的事件
  var str = "";
    var _value = e.fromitem.value;
    var value = "";
    if (e.fromitem.index > -1) {
      value = _value.province +  _value.city +  _value.district +  _value.street +  _value.business;
    }    
    str = "FromItem<br />index = " + e.fromitem.index + "<br />value = " + value;
    
    value = "";
    if (e.toitem.index > -1) {
      _value = e.toitem.value;
      value = _value.province +  _value.city +  _value.district +  _value.street +  _value.business;
    }    
    str += "<br />ToItem<br />index = " + e.toitem.index + "<br />value = " + value;
    G("searchResultPanel").innerHTML = str;
  });


//鼠标点击下拉列表后的事件
  var myValue;
  ac.addEventListener("onconfirm", function(e) {    
    // alert('dianji xiala');
  var _value = e.item.value;
    myValue = _value.province +  _value.city +  _value.district +  _value.street +  _value.business;
    G("searchResultPanel").innerHTML ="onconfirm<br />index = " + e.item.index + "<br />myValue = " + myValue;
      
    setPlace();

  });

  function G(id) {
    return document.getElementById(id);
  }

  function setPlace(){
    map.clearOverlays();    //清除地图上所有覆盖物
    function myFun(){
      var pp = local.getResults().getPoi(0).point;    //获取第一个智能搜索的结果
      map.centerAndZoom(pp, 18);
      map.addOverlay(new BMap.Marker(pp));    //添加标注
    }
    var local = new BMap.LocalSearch(map, { //智能搜索
      onSearchComplete: myFun
    });
    local.search(myValue);
  }



// 定位1
    address = '';
    var geolocation = new BMap.Geolocation();
    geolocation.getCurrentPosition(function(r){
      if(this.getStatus() == BMAP_STATUS_SUCCESS){
        var mk = new BMap.Marker(r.point);
        map.addOverlay(mk);
        map.panTo(r.point);
       
        address += r.address.province;
        address += r.address.city;
        address += r.address.district;
        address += r.address.street;
        address += r.address.street_number;
        // 公交线路
        var transit = new BMap.TransitRoute(map, {
          renderOptions: {map: map, panel: "r-result"}
        });

        transit.search(address, "王府井地铁站");
      }
      else {
        alert('failed'+this.getStatus());
      }        
    },{enableHighAccuracy: true})

</script>
@endsection