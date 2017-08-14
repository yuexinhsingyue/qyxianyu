<?php

namespace App\Http\Controllers\Home;

use App\Http\Model\Type;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    //前台主页
    public function index()
    {
        //获取商品分类里的所有父类
        $ptype = Type::where('pid',0)->get();
        foreach($ptype as $k => $v){

            //遍历商品表父级下的二级分类
         $a[] = Type::where('pid',$v->tid)->get();
        }
        return view('home.index',compact('ptype','a'));
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
        return view('home.person');
    }


}
