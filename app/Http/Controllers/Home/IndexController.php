<?php

namespace App\Http\Controllers\Home;

use App\Http\Model\Advert;
use App\Http\Model\Goods;
use App\Http\Model\Type;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class IndexController extends Controller
{
    //前台主页
    public function index()
    {
        //获取首页上所有电脑分类的信息
        $com = Goods::where('tid',30)->get();
        //获取商品分类里的所有父类
        $ptype = Type::where('pid',0)->get();
        foreach($ptype as $k => $v){

            //遍历商品表父级下的二级分类
         $a[] = Type::where('pid',$v->tid)->get();
        }

        //  广告位
        $advert = Advert::where('status',1)->groupBy('adposition')->orderBy('adposition')-> get();
        return view('home.index',compact('ptype','a','advert','com'));
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
        return view('home.persion.index');
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