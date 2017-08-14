<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    //主页
    public function index()
    {
        return view('home.index');
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
    //问题
    public function news()
    {
        return 'new';
    }
    //鱼塘
    public function fish()
    {
        return 'fish';
    }


}
