<?php

namespace App\Http\Controllers\Admin;

// use DB;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class FigureController extends Controller
{
    /**
     * 
     *
     * 轮播图列表
     */
    public function index(Request $request)
    {
        echo '轮播图列表';
    }

    /**
     *   
     * 轮播图添加页
     *   
     */
    public function create()
    {
        return view('admin.figure.add');
    }

    /**
     *
     *  
     *  
     */
    public function store(Request $request)
    {
        //
    }

    /**
     *
     *  
     *  
     */
    public function show($id)
    {
        //
    }

    /**
     *  
     *
     *  
     * 
     */
    public function edit($id)
    {
        //
    }

    /**
     *
     *  
     *  
     *  
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     *
     *  
     *  
     */
    public function destroy($id)
    {
        //
    }
}
