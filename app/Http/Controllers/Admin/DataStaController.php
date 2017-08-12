<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use App\Http\Model\Order;
use App\Http\Model\User;
class DataStaController extends Controller
{
    /**
     *func：数据统计中交易分析页面设计，统计订单相关数据以表格的形式显示。
     *auth: hsingyue
     *date: 2017/08/10
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // 获取近30天的数据
        // $CountOrder = DB::select(" select  FROM_UNIXTIME( createTime,'%Y-%m-%d') as days,count(oprice) as count, SUM(oprice) AS amount from `order` where DATE_SUB(CURDATE(), INTERVAL 30 DAY) <= createTime group by days order by createTime");

        //从数据库订单表中统计近30天的日订单金额。
        $Order = Order::select(DB::raw("FROM_UNIXTIME( created_at,'%m/%d') as days,count(oprice) as count, SUM(oprice) AS amount"))
                            ->where('created_at','>=',' DATE_SUB(CURDATE(), INTERVAL 30 DAY)')
                            ->groupBy('days')
                            ->orderBy('created_at')
                            ->get();

        // 当月累计订单数
        $orderMonth = $Order->count('count'); 
        // 当月累计交易额
        $priceMonth = $Order->sum('amount'); 
        // 平台累计订单数
        $totelOrder = Order::count('id');
        // 平台总用户数量
        $userids = User::count('uid');
        // 累计交易商品总数量
        $totelgoods = Order::sum('onum');
         // dd($userids);
        $countOrder = [];   //存储订单统计图表数据
        // 将数据库获取的订单数据转换为键队值数组  键:日期 值:当日订单总额
        foreach ($Order as $k => $v) {
            $countOrder[$v['days']] = $v['amount'];
        }

        // 当天日期
        $countDay = date('m/d');
        //没有订单的日期补零
        for($i = 0; $i < 30; $i++)
        {   
            // 如果当前日期没有订单，则赋0
            if ( !array_key_exists($countDay, $countOrder)) {
                $countOrder[$countDay] = 0;

            } 
            // 每天的日期减一
            $countDay = date('m/d', strtotime($countDay) - (24*60*60));
        }
        // 按照键名（日期）对数据进行排序
        ksort($countOrder);
        // 将图表数组转为换js能识别的json格式。
        json_encode($countOrder);

        // dd($countOrder);
        // $chartX = implode($chartX,',');
        return view('admin.datastati.salestat',compact('totelOrder','totelgoods','orderMonth','userids','priceMonth','countOrder'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function visit()
    {

        //获取图表的X轴 近30天日期
        $days = 30;
        $nowday = date ('m/d');
        $chartX = array ();
        for($i = 0; $i < $days; $i++)
        {
            $chartX[]=date('m/d',strtotime($nowday)-$i*24*60*60);
        }
        // dd($chartX);
        $chartX = implode($chartX,',');
        return view('admin.datastati.visite',compact('chartX'));
        
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
