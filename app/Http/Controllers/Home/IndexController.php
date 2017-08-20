<?php

namespace App\Http\Controllers\Home;

use App\Http\Model\Advert;
use App\Http\Model\Car;
use App\Http\Model\Goods;
use App\Http\Model\Order;
use App\Http\Model\OrderDetail;
use App\Http\Model\Type;
use App\Http\Model\Collect;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

use App\Http\Model\Slid;
use App\Http\Model\Problem;
use App\Http\Model\Works;

class IndexController extends Controller
{
    //前台主页
    public function index()
    {
        //获取首页上所有电脑分类的信息
        $com = Goods::where('tid',30)->get();

        // 轮播图
        $figure = Slid::where('status','=',1)->get();
        // 相关文章、相关问题标题
        $problem = Problem::where('status','=',1)->take(6)->get();
        $work = Works::where('status','=',1)->take(6)->get();


        //获取商品分类里的所有父类
        $ptype = Type::where('pid',0)->get();
        foreach($ptype as $k => $v){

            //遍历商品表父级下的二级分类
         $a[] = Type::where('pid',$v->tid)->get();
        }
        //购物车中里的信息
        $count =  count(Car::get());
        //  广告位
        $advert = Advert::where('status',1)->groupBy('adposition')->orderBy('adposition')-> get();

        return view('home.index',compact('ptype','a','advert','figure','com','count','problem','work'));

    }
    
    //前台大厅列表页
    public function list()
    {
        //获取商品分类里的所有父类
        $ptype = Type::where('pid',0)->get();
        foreach($ptype as $k => $v){

            //遍历商品表父级下的二级分类
            $a[] = Type::where('pid',$v->tid)->get();
        }
       $goods = Goods::where('fid',0)->get();
        //购物车中里的信息
        $count =  count(Car::get());
       // $goods = $goods -> where('gname','like','%'.Input::get('search').'%') -> paginate(2);
        return view('home.list',compact('ptype','a','goods','count'));
    }
    //详情页
    public function detail($id)
    {
        //获取商品表的信息
        $input = Goods::find($id);
        //购物车中里的信息
        $count =  count(Car::get());
        //$ii = Input::get();
        //获取此商品的信息
       //dd($input);
        return view('home.detail',compact('input','id','count'));
    }


    //个人中心页
    public function person()
    {
        //购物车中里的信息
        $count =  count(Car::get());
        return view('home.person.index',compact('count'));
    }

    //问题
    public function problems($pid)
    {

        // 上一篇文章  下一篇文章
        $article['prev'] =  Problem::orderBy('pid','desc')->where('pid','<',$pid)->where('status','=','1')->first();
        $article['next'] =  Problem::orderBy('pid','asc')->where('pid','>',$pid)->where('status','=','1')->first();

        $pro = Problem::find($pid);

        // 热门文章 
        $rel = Problem::where('status','=','1')->orderBy('pid','desc')->take(5)->get();

        return view('home.pro',compact('pro','article','rel'));
    }
    // 文章
    public function works($wid)
    {   

        // 上一篇文章  下一篇文章
        $article['prev'] =  Works::orderBy('wid','desc')->where('wid','<',$wid)->where('status','=','1')->first();
        $article['next'] =  Works::orderBy('wid','asc')->where('wid','>',$wid)->where('status','=','1')->first();

        // 当前文章信息
        $work = Works::find($wid);

        // 热门文章 
        $rel = Works::where('status','=','1')->orderBy('wid','desc')->take(5)->get();

        return view('home.work',compact('work','article','rel'));

    }

    // 商品收藏
    public function coll()
    {
        $uid = session('homeuser')['uid'];

        $coll = Collect::where('uid',$uid)->get();
        foreach($coll as $k=>$v){
            $gid[] = $v->gid;
        }

        if(empty($gid)){

            // 获取用户ID
            $uid = session('homeuser')['uid'];

            $data['uid'] = $uid;             // 用户ID
            $data['gid'] = $_POST['gid'];    // 商品ID
            $data['collectTime'] = date('Y-m-d H:i',time());   // 收藏时间

            $res = Collect::create($data);

            if($uid){
                if($res){
                    return '收藏成功！';
                }else{
                    return '收藏失败！';
                }
            }else{
                return false;
            }
        }else{

            if(in_array($_POST['gid'],$gid)){
                return '不可重复收藏！';
            }else{
               // 获取用户ID
                $uid = session('homeuser')['uid'];

                $data['uid'] = $uid;             // 用户ID
                $data['gid'] = $_POST['gid'];    // 商品ID
                $data['collectTime'] = date('Y-m-d H:i',time());   // 收藏时间

                $res = Collect::create($data);

                if($uid){
                    if($res){
                        return '收藏成功！';
                    }else{
                        return '收藏失败！';
                    }
                }else{
                    return false;
                }                 
            }
        }

    }

    // 收藏列表
    public function colllist()
    {

        $uid = session('homeuser')['uid'];

        $coll = Collect::where('uid',$uid)->get();

        foreach($coll as $k => $v){

            $gid[] = $v->gid;
        }
        if(empty($gid)){
            return back();
        }
        $goods = Goods::whereIn('id',$gid)->get();
        return view('home.coll_list',compact('goods'));
    }
    // 删除收藏
    public function colldel(Request $req)
    {
        
        $res = Collect::where('gid',$req->input('cid'))->delete();
        if($res){
            return '删除成功！';
        }else{
            return '';
        }

    }

    //鱼塘
    public function fish()
    {
        return 'fish';

    }
    //购物车
    public function car($id)
    {
        //获取gid加入到购物车中
        $car = new Car();
        $car->gid = $id;
        //获取session中的uid
        $uid = $car->uid = session('homeuser')['uid'];
        //将数据存入到数据库中
        $car->save();
        //将购物车中的gid，id号放进lists数组中
        $cars = Car::where('uid',$uid)->lists('gid','id');
        $sum = 0;
        foreach($cars as $k=>$v){
            //遍历出所有的商品价格
            $price = Goods::where('id',$v)->lists('nprice')[0];
            $sum = $sum+$price;
        }
        //获取商品表的信息
        $goods = Goods::get();
        return view('home.car',compact('input','id','car','goods','uid','cars','sum'));
    }
    //删除购物车的商品
    public function delCar($id)
    {
        echo Car::where('id',$id)->delete();

    }
    //订单页
    public function pay($id)
    {


        //获取session中的uid
        $uid =  session('homeuser')['uid'];
        //将购物车中的gid，id号放进lists数组中
        $cars = Car::where('uid',$uid)->lists('gid','id');
        //dd($cars);
        $sum = 0;
        foreach($cars as $k=>$v){
            //遍历出购物车所有的商品价格
            $price1 = Goods::where('id',$v)->lists('nprice')[0];
            $sum = $sum+$price1;
            $a[] = $k;
        }
       /* $input = Goods::find($id);
        //获取gid加入到购物车中
        $car = new Car();
        $car->gid = $id;
        $car->save();*/
       /* //获取商品表的信息
        $goods = Goods::get();
        foreach($goods as $k=>$v){
            if($v['id']== $car['gid']){
                $a = [];
            }
            $a = $goods;
        }*/
       /* //购物车中里的信息
        $count =  count(Car::get());*/
        //获取购买东西的总价格
        //$price = $input['nprice']*$input['goodsNum'];
        //获取订单的信息
        $order = new Order();
        //获取下订单用户的ID
        $order->uid = session('homeuser')['uid'];
        //订单表的总价
        $order->oprice = $sum;
        //获取订单数量
        $count = count($cars);
        $order->onum = $count;
         //获取地址表信息的ID
        //存储订单信息
        $order->save();
        //获取订单详情信息
        $orderdetail = new OrderDetail();
        $gid =Goods::where('uid',$uid)->lists('id');
        //获取订单详情表中商品的id
        $orderdetail->gid = $gid;
        //订单id的获取
        $orderdetail->id = $order->id;
        //订单号
        $orderdetail->oid =  date('ymdhis').rand(00000000,99999999);
        $orderdetail->save();
      /*  $cars = Car::where('uid',$uid)->lists('gid','id');
        $sum = 0;
        foreach($cars as $k=>$v){
            //遍历出所有的商品价格
            $price = Goods::where('id',$v)->lists('nprice')[0];
            $sum = $sum+$price;
        }*/
        //获取商品表的信息
        $goods = Goods::get();
//        return view('home.pay',compact('input','id','price','car','a','count','order','orderdetail','sum'));
        return view('home.pay',compact('order','orderdetail','goods','cars','sum'));
    }
    //订单完成页
    public function success($id)
    {
        $input = Goods::find($id);
        //获取购买东西的总价格
        $price = $input['nprice']*$input['goodsNum'];
        //地址信息获取
        return view('home.success',compact('price','id'));
    }




}