<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Model\Address;
use App\Http\Model\Car;

class PersonAddrController extends Controller
{
    /**
     * 打开个人中心模块中----地址管理
     * auth:hsingyue
     * data:2017-08-16
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function index ()
    {
        $addr = Address::where('uid',session('homeuser')["uid"])->get();
//        dd($addr);
        $count =  count(Car::get());
        return view('home.person.personAddr',compact('addr','count'));
    }

    /**
     * 借助create方法，修改前台触发的默认地址
     * auth:hsingyue
     * data:2017-08-17
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //    获取默认地址的电话
        $tel =  $request->input('tel');
        if($tel) {
            $addr = Address::where('uid',session('homeuser')['uid'] );
            //    移除用户的默认地址
            $addr -> update(['status' => 0]);
            //    重新给用户赋值默认地址
            $addr -> where('phone',$tel)
                  ->update(['status' => 1]);
            return 1;
        } else {
            return 0;
        }

    }

    /**
     * 借助执行添加或者修改用户地址，根据ID号判断是修改还是添加  0添加 其余ID号为修改
     * auth:hsingyue
     * data:2017-08-17
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        dd($request -> all());
//        获取地址表单
        $newAddr = $request -> except('_token');

//        拼接用户区域地址+具体地址
        $addr = $request -> input('address1').'/'.$request->input('address2');
        $newAddr['address'] = $addr;

//      获取用户ID
        $newAddr['uid'] = session('homeuser')["uid"];
//        dd($newAddr);

        $eid = $newAddr['eid'];

        //      判断是编辑用户还是添加用户  添加用户ID为 0
        if ( $eid )
        {
//            dd($newAddr);
//           dd($newAddr);
//           如果未修改区域信息则取以前的
            if ( empty($newAddr['address1'])  ) {
                $arr = Address::where('id',$eid)
                    ->get();
                $arr = explode('/',$arr[0]['address']);
                unset($arr[3]);
                $str = implode ('/',$arr).'/'.$newAddr['address2'];
//                dd($str);
                $newAddr['address'] = $str;
            }
            unset($newAddr['address1']);
            unset($newAddr['address2']);

            unset($newAddr['eid']);
            Address::where('id',$eid)
                ->update($newAddr);
        } else {
//            添加
            unset($newAddr['address1']);
            unset($newAddr['address2']);

            unset($newAddr['eid']);
            Address::create($newAddr);

        }

        return back();
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
