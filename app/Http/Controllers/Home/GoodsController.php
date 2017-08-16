<?php

namespace App\Http\Controllers\Home;

use App\Http\Model\Goods;
use App\Http\Model\GoodsDetail;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class GoodsController extends Controller
{
    /**
     *大厅的商品列表页
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    return view('home.goods.list');
    }

    /**
     *个人商品添加
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       /* //联合查询商品表和商品详情表的所有信息
        $goods = Goods::leftjoin('goods_detail','goods.id','=','goods_detail.gid');*/
        return view('home.goods.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        dd($input);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
