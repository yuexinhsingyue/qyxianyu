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
//        $res = Order::leftjoin('order_detail','order.id','=','order_detail.id');
        $res = Order::leftjoin('order_detail','order.id','=','order_detail.id');
        //订单页的分页和搜索
        $res = $res->where('oid','like','%'.Input::get('search').'%')->paginate(5);
        $user = User::get();
        $search = Input::get('search');
      //下单用户
       //$uname = User::where('uid',)->value('uname');
      // dd($res);
        return view('admin.order.list',compact('res','search','user'));
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



    public function show($id)
    {

    }
    /**
     * 孙小楠
     *订单查看详情
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function detail($id)
    {
        $input = Order::find($id);
        //查询出订单表里商品ID
        $gid = OrderDetail::where('id',$id)->value('gid');
        //根据此iD查询出所购买商品的具体信息
        $goods = Goods::where('id',$gid)->get();
        //先获取下单用户的ID
        //获取下订单用户的ID  $uid
        //根据uid获取到地址表的地址信息
       /* //查询地址表的信息
        $ad= Address::get();*/
        //订单号
        $num = OrderDetail::where('id',$id)->value('oid');
        //购买商品的总价
       // $price = $good[0]['num'] * $good[0]['price'];
        return view('admin.order.detail',compact('ad','goods','num','price','id'));
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
