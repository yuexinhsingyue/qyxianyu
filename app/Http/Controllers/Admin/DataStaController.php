<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use App\Http\Model\Order;
use App\Http\Model\User;
use App\Http\Model\Goods;
use App\Http\Model\Loginhistory;
class DataStaController extends Controller
{
    /**
     *func：数据统计中交易分析页面设计，统计订单相关数据以表格的形式显示。
     *auth: hsingyue
     *date: 2017/08/10
     * @return \Illuminate\Http\Response
     */
    public function dataSta()
    {

        // 获取近30天的数据
        // $CountOrder = DB::select("select FROM_UNIXTIME( unix_timestamp(created_at),'%m/%d') as days,count(id) as count, SUM(oprice) AS amount from `order` where  `created_at` >= DATE_SUB(CURDATE(), INTERVAL 30 DAY) group by `days` order by `created_at` asc");

        //从数据库订单表中统计近30天的日订单金额。
        $Order = Order::select(DB::raw("FROM_UNIXTIME( unix_timestamp(created_at),'%m/%d') as days,count(id) as count, SUM(oprice) AS amount"))
            ->whereRaw('unix_timestamp (created_at) >= unix_timestamp(DATE_SUB(CURDATE(), INTERVAL 30 DAY))')
            ->groupBy('days')
            ->orderBy('created_at')
            ->get();
        // dd($Order);

        // 平台闲置商品数量
        $totelgoods = Goods::count('id');
        // 当月累计订单数
        $orderMonth = $Order->sum('count');
        // 当月累计交易额
        $priceMonth = $Order->sum('amount'); 
        // 平台累计订单数
        $totelOrder = Order::count('id');
        // 平台总用户数量
        $userids = User::count('uid');
        // 累计交易商品总数量
        $totelsalagoods = Order::sum('onum');
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
        return view('admin.datastati.salestat',compact('totelgoods','totelOrder','totelsalagoods','orderMonth','userids','priceMonth','countOrder'));
    }

    /**
     * 网站访问量数据统计 折线图按月双线显示
     *auth:hsingyue
     *data:2017/08/12
     * @return \Illuminate\Http\Response
     */

    public function visit()
    {
        //获取一年前的时间戳
        $LastYear = mktime(0, 0, 0, date('m'), date('d'), date('Y')-1);
        //获取二年前的时间戳
        $beforeLastYear = mktime(0, 0, 0, date('m'), date('d'), date('Y')-2);

         //从数据库订单表中统计近1年的数据。
        $Loginhistory1 = Loginhistory::select(DB::raw("FROM_UNIXTIME( loginTime,'%Y/%m') as months,count(id) as count"))
                            ->where('loginTime','>=',$LastYear)
                            ->groupBy('months')
                            ->orderBy('loginTime')
                            ->get();

        //从数据库订单表中统计1年到2年的数据。
        $Loginhistory2 = Loginhistory::select(DB::raw("FROM_UNIXTIME( loginTime,'%Y/%m') as months,count(id) as count"))
            ->whereBetween('loginTime',[$beforeLastYear,$LastYear])
            ->groupBy('months')
            ->orderBy('loginTime')
            ->get();

        $chart1 = [];   //存储图表1数据
        $chart2 = [];   //存储图表2数据
        // 将数据库获取的访问量数据转换为键队值数组  键:日期 值:当月访问量
        foreach ($Loginhistory1 as $k => $v) {
            $chart1[$v['months']] = $v['count'];
        }
        foreach ($Loginhistory2 as $k => $v) {
            $chart2[$v['months']] = $v['count'];
        }
        // 当前年月
        $countMonth = date('Y/m');
        //没有访问量的月份补零
        for($i = 0; $i < 12; $i++)
        {
            // 如果当前月份没有数据，则赋0
            if ( !array_key_exists($countMonth, $chart1  )) {
                $chart1[$countMonth] = 0;
            }
            //前2年至前1年无数据 赋0
            $temp=date("Y/m",strtotime("-1 years",strtotime($countMonth.'/01')));   //指定日期前一年
            if ( !array_key_exists($temp, $chart2  )) {
                $chart2[$temp] = 0;
            }

            // 月份减一
            $timestamp=strtotime($countMonth.'/01');
            $countMonth=date('Y/m',strtotime(date('Y',$timestamp).'-'.(date('m',$timestamp)-1)));
        }
        //  按照键名（日期）对数据进行排序
        ksort($chart1);
        ksort($chart2);

        // 将图表数组转为换js能识别的json格式。
        json_encode($chart1);
        json_encode($chart2);

        // 网站累计访问量
        $orderMonth = Loginhistory::count('id');
        return view('admin.datastati.visite',compact('orderMonth','chart1','chart2'));
    }


}
