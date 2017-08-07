<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    //显示首页
    public function index()
    {
        return view('admin.index');
    }

    //修改密码
    public function pass()
    {
        return view('admin.user.repwd');
    }

    //退出登录
    public function quit()
    {
        return redirect('/admin/login');
    }



}
