<?php

namespace App\Http\Controllers\Home;

use App\Http\Model\Advert;
use App\Http\Model\Type;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Model\Slid;
use App\Http\Model\Problem;
use App\Http\Model\Works;

class IndexController extends Controller
{
    //前台主页
    public function index()
    {

        // 轮播图
        $figure = Slid::where('status','=',1)->get();

        // 相关文章、相关问题标题
        $problem = Problem::where('status','=',1)->take(6)->get();
        $work = Works::where('status','=',1)->take(6)->get();

        //获取商品分类里的所有父类
        $ptype = Type::where('pid',0)->get();
        foreach($ptype as $k => $v){

            //遍历商品表父级下的二级分类
         $a[] = Type::where('pid',$v->tid)->get();
        }

        //  广告位
        $advert = Advert::where('status',1)->groupBy('adposition')->orderBy('adposition')-> get();

        return view('home.index',compact('ptype','a','advert','figure','problem','work'));
    }
    //前台列表页
    public function list()
    {

        return view('home.list');
    }
    //详情页
    public function detail()
    {
        return view('home.detail');
    }

    //个人中心页
    public function person()
    {
        return view('home.persion.index');
    }
    //问题
    public function problems($pid)
    {
        $pro = Problem::find($pid);

        return view('home.pro',compact('pro'));
    }
    // 文章
    public function works($wid)
    {   

        // 上一篇文章  下一篇文章
        $article['prev'] =  Works::orderBy('wid','desc')->where('wid','<',$wid)->where('status','=','1')->first();
        $article['next'] =  Works::orderBy('wid','asc')->where('wid','>',$wid)->where('status','=','1')->first();

        // 当前文章信息
        $work = Works::find($wid);
    
        // 热门文章 
        $rel = Works::where('status','=','1')->orderBy('wid','desc')->take(5)->get();

        return view('home.work',compact('work','article','rel'));

    }
    //鱼塘
    public function fish()
    {
        return 'fish';

    }
    //购物车
    public function car()
    {
        return view('home.car');
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