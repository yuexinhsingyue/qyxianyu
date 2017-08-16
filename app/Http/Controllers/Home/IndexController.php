<?php

namespace App\Http\Controllers\Home;

use App\Http\Model\Advert;
use App\Http\Model\Goods;
use App\Http\Model\Type;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

use App\Http\Model\Slid;

class IndexController extends Controller
{
    //前台主页
    public function index()
    {

        //获取首页上所有电脑分类的信息
<<<<<<< HEAD
        $com = Goods::where('tid',30)->get();
=======

//        $com = Type::where('tid',38)->get();

        $com = Goods::where('tid',30)->get();

>>>>>>> 250b8d83d6d1284c6abbb6353d5e69378f28747c
        //获取商品分类里的所有父类
        $ptype = Type::where('pid',0)->get();
        foreach($ptype as $k => $v){

            //遍历商品表父级下的二级分类
         $a[] = Type::where('pid',$v->tid)->get();
        }

        //  广告位
        $advert = Advert::where('status',1)->groupBy('adposition')->orderBy('adposition')-> get();
<<<<<<< HEAD
        // 轮播图
        $figure = Slid::where('status','=',1)->get();
        return view('home.index',compact('ptype','a','advert','figure','com'));
=======


        // 轮播图
        $figure = Slid::where('status','=',1)->get();

        return view('home.index',compact('ptype','a','advert','com','figure'));
>>>>>>> 250b8d83d6d1284c6abbb6353d5e69378f28747c
    }
    //前台大厅列表页
    public function list()
    {
        //获取商品分类里的所有父类
        $ptype = Type::where('pid',0)->get();
        foreach($ptype as $k => $v){

            //遍历商品表父级下的二级分类
            $a[] = Type::where('pid',$v->tid)->get();
        }
        $goods = Goods::all();
       // $goods = $goods -> where('gname','like','%'.Input::get('search').'%') -> paginate(2);
        return view('home.list',compact('ptype','a','goods'));
    }
    //详情页
    public function detail($id)
    {
        //获取商品表的信息
        $input = Goods::find($id);
        //获取此商品的信息
//        dd($input);
        return view('home.detail',compact('input','id'));
    }

    //个人中心页
    public function person()
    {
        return view('home.person.index');
    }

    //问题
    public function news()
    {
        return view('home.news');
    }
    //鱼塘
    public function fish()
    {
        return 'fish';

    }
    //购物车
    public function car($id)
    {
        //获取商品表的信息
        $input = Goods::find($id);
        //获取购买东西的总价格
        $price = $input['nprice']*$input['goodsNum'];
        return view('home.car',compact('input','id','price'));
    }
    //订单页
    public function pay()
    {
        return view('home.pay');
    }
    //订单完成页
    public function success()
    {
        return view('home.success');
    }




}