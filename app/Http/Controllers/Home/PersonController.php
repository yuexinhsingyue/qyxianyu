<?php

namespace App\Http\Controllers\Home;

use App\Http\Model\Address;
use App\Http\Model\User;
use App\Http\Model\UserDetail;
use App\Http\Model\Car;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use Validator;

class PersonController extends Controller
{
    /**
     * 打开个人中心模块中----个人信息页
     * auth:hsingyue
     * data:2017-08-16
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function personInfo()
    {
        $uname = User::where('uid',15) -> value('uname');
        $userdetail = UserDetail::where('uid',15)->get();
        $userdetail = $userdetail[0];
//        dd($userdetail);

        return view('home.person.personInfo',compact('uname','userdetail'));
    }
    /**
     * 执行个人信息页内容保存到数据库
     * auth:hsingyue
     * data:2017-08-16
     * @param  \Illuminate\Http\Request  $request
     * @param
     * @return \Illuminate\Http\Response
     */
    public function savePersonInfo(Request $request)
    {
//        dd($request);
        //判断用户输入

        $res = $request -> except('_token','face');
        $rule = [
            'tel' => 'required|regex:/^1[34578][0-9]{9}$/',
            'emill' => 'required|email',
            'addr' => 'required',
        ];

        $msg = [
            'tel.required' => '手机号码必填',
            'tel.regex' => '手机号码格式不正确',
            'emill.required' => '邮箱地址必填',
            'emill.email' => '邮箱格式不正确',
            'addr.required' => '地址必填',
        ];
        $validator = Validator::make($res,$rule,$msg);
        //如果验证失败
        if($validator->fails()){
//            dd('验证失败');
            return back() -> withErrors($validator) -> withInput();
        }
        //是否有上传文件
        if($request -> hasFile('face'))
        {

            //文件上传
            $file = $request -> file('face');
            //判断上传文件是否有效
            if($file -> isValid())
            {
                //获取文件后缀名
                $ext = $file -> getClientOriginalExtension();
                //新的名字
                $newname = date('YmdHis').mt_rand(1111,9999).'.'.$ext;

                $path = $file -> move(public_path('uploads'),$newname);
                //生成缩略图
                $img = Image::make(public_path('/uploads/').$newname) -> resize(60,60);
                $img -> save(public_path('uploads/').'sml'.$newname);
                $res['face'] = 'uploads/sml'.$newname;

            } else {
                return redirect()->back()->withInput()->withErrors('文件上传失败');
            }
        }

//        UserDetail::where('uid',session('user')['uid'])-> update($res);
        UserDetail::where('uid',15)-> update($res);

        return redirect('home/personinfo');

    }
    /**
     * 打开个人中心模块中----地址管理
     * auth:hsingyue
     * data:2017-08-16
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function personaddr ()
    {
        $addr = Address::where('uid',15)->get();
//        dd($addr);
        $count =  count(Car::get());
        return view('home.person.personAddr',compact('addr','count'));
    }

}
