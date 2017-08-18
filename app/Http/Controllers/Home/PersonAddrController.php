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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newAddr = $request -> except('_token');
        $addr = $request -> input('address1').$request->input('address2');

        $newAddr['uid'] = session('homeuser')["uid"];
        $newAddr['address'] = $addr;

        unset($newAddr['address1']);
        unset($newAddr['address2']);

        Address::create($newAddr);
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
