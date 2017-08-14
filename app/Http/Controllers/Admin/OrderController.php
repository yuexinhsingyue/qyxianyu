<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Goods;
use DB;
use App\Http\Model\Address;
use App\Http\Model\Order;
use App\Http\Model\OrderDetail;
use App\Http\Model\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class OrderController extends Controller
{
    /**
     * 订单表显示
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //查询订单表信息
        $res = Order::leftjoin('order_detail','order.id','=','order_detail.id')-> paginate(5);
        //订单号(下单时间年月日时分秒 8位随机数)
        $num = $res[1]['oid'] = date('ymdhis').rand(00000000,99999999);
        //订单号存入数据库中
      /*  DB::table('order_detail')->insert(
            ['oid' => $num]
        );*/
      //下单用户
        $res[0]['uid'] = User::value('uname');
        return view('admin.order.list',compact('res'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * 孙小楠
     *订单查看详情
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {

    }
    public function detail()
    {
        //查询地址表的信息
        $ad= Address::get();
        //查询商品表信息
        $good = OrderDetail::leftjoin('goods','goods.id','=','order_detail.gid')->get();
        //dd($good);
        //订单号
        $num = $good[0]['oid'];
        //购买商品的总价
        $price = $good[0]['num'] * $good[0]['price'];
        return view('admin.order.detail',compact('ad','good','num','price'));
    }

    /**
     *
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
