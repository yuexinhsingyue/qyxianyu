@extends('layouts.admin')
@section('title','添加广告')
@section('header')
    <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no">
@endsection
@section('content')

    <article class="content item-editor-page" style="padding-top: 0px;padding-bottom: 0px;">

       <a href="#">广告管理</a> -> <a href="#"> 添加广告</a>

        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
     
        <script type="text/javascript" src="/admin/jeDate/jedate.js"></script>

        <form  method="post" action="{{ url('/admin/advert/'.$advert->id) }}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="pic" value="{{$advert->pic}}">
            <div class="card card-block">
                <div class="form-group row">
                    <label class="col-sm-2 form-control-label text-xs-right">广告名称:</label>
                    <div class="col-sm-10">
                        <input class="form-control boxed" placeholder="" type="text" name="adname" value="{{$advert->adname}}" style="width: 700px;">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 form-control-label text-xs-right">广告描述:</label>
                    <div class="col-sm-10">
                        <input class="form-control boxed" placeholder="" value="{{$advert->addescribe}}" type="text" name="addescribe"style="width: 700px;">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 form-control-label text-xs-right">广告位置:</label>
                    <div class="col-sm-4" >
                        <select class="form-control" name="adposition" style="width:232px">
                                <option value="0" @if($advert->adposition == 0) selected @endif  >--请您选择要投放的广告位--</option>
                                <option value="1" @if($advert->adposition == 1) selected @endif >中部 优选广告位1 左起1</option>
                                <option value="2" @if($advert->adposition == 2) selected @endif  >中部 优选广告位1 左起2</option>
                                <option value="3" @if($advert->adposition == 3) selected @endif  >中部 优选广告位1 左起3</option>
                                <option value="4" @if($advert->adposition == 4) selected @endif  >中部 优选广告位1 左起4</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 form-control-label text-xs-right" >开始时间:</label>
                    <div class="col-sm-5">
                        <p class="datep"><input class="form-control boxed dateinfo1" placeholder="" type="text" name="adstart" value="{{$advert->adstart}}"  style="width: 230px;"></p>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 form-control-label text-xs-right" >结束时间:</label>
                    <div class="col-sm-10">
                        <p class="datep"><input class="form-control boxed dateinfo2" placeholder="" type="text" name="adstop" value="{{$advert->adstop}}"  style="width: 230px;"></p>

                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 form-control-label text-xs-right">广告链接:</label>
                    <div class="col-sm-5">
                        <input class="form-control boxed" placeholder="" type="text" value="{{$advert->adlink}}" name="adlink"style="width: 700px;">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 form-control-label text-xs-right">上传广告图片: </label>
                    <div class="col-sm-10">
                        <input type="file" name="pic" value="{{$advert->pic}}">
                                    <div class="item-img rounded" style="padding-bottom: 0px; height: 60px; width: 60px; border-radius:4px;border:1px solid #ccc">
                                        <img id="editpic" src="{{ url($advert->pic) }}" width="100%" height="100%">
                                    </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 form-control-label text-xs-right">或图片网址:</label>
                    <div class="col-sm-10">
                        <input class="form-control boxed" placeholder="" type="text" value="{{$advert->piclink}}"  name="piclink" style="width: 700px;">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 form-control-label text-xs-right">
                        状态:
                    </label>
                    <div class="col-sm-10">

                        <label>
                            <input class="radio" name="status" type="radio" value="1" @if($advert->status == 1) checked @endif >
                            <span>启用</span>
                        </label>
                        <label>
                            <input class="radio" name="status" type="radio" value="0" @if($advert->status == 0) checked @endif >
                            <span>禁用</span>
                        </label>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-10 col-sm-offset-2"> 
                        <button type="submit" class="btn btn-primary">修改</button> 
                    </div>
                </div>
            </div>
        </form>
    </article>

@endsection
@section('js')

<script type="text/javascript">
    $("input:file").change( function() {
        alert('dddddddddddd');
        
    });

    jeDate({
        dateCell:".dateinfo1",
        format:"YYYY年MM月DD日 hh:mm:ss",
        isinitVal:true,
        isTime:true, //isClear:false,
        minDate:"1990-09-19 00:00:00",
        minDate:"1980-09-19 00:00:00",

        okfun:function(val){alert(val)}
    })
    jeDate({
        dateCell:".dateinfo2",
        format:"YYYY年MM月DD日 hh:mm:ss",
        isinitVal:true,
        isTime:true, //isClear:false,
        minDate:"1990-09-19 00:00:00",
        minDate:"1980-09-19 00:00:00",

        okfun:function(val){alert(val)}
    })


</script>
@endsection