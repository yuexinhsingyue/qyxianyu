<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Model\Slid;

class IndexController extends Controller
{
    //主页
    public function index()
    {

        // 轮播图
        $figure = Slid::where('status','=',1)->get();
        

        return view('home.index',compact('figure'));
    }
    //列表页
    public function list()
    {
        return view('home.list');
    }
    //详情页
    public function detail()
    {
        return view('home.detail');
    }


}
