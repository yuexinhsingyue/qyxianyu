<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\User;
use App\Http\Model\UserDetail;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;

class IndexController extends Controller
{
    //显示首页
    public function index()
    {
        return view('admin.index');
    }

    //修改密码页面
    public function pass()
    {
        return view('admin.user.repwd');
    }
    //修改密码
    public function dopass()
    {
        $res = Input::except('_token');
        //获取密码
        $user = User::where('uid',session('user')['uid'])->value('password');
        if(Crypt::decrypt($user) != $res['password'])
        {
            return back() -> withErrors('密码输入不正确') -> withInput();
        }
        //新密码
        $rule = [
            'newpwd' => 'required|between:6,12',
            'renewpwd' => 'same:newpwd',
        ];
        $msg = [
            'newpwd.required' => '密码必须输入',
            'newpwd.between' => '密码格式不正确',
            'renewpwd.same' => '密码不一致',
        ];
        unset($res['password']);
        $validator = Validator::make($res,$rule,$msg);
        if($validator -> fails())
        {
            return back() -> withErrors($validator) -> withInput();
        }
        //修改密码
        User::where('uid',session('user')['uid']) ->update(['password'=>\Crypt::encrypt($res['newpwd'])]);

        return redirect('admin/quit');
    }

    //退出登录
    public function quit()
    {
        session(['code'=> null]);
        session(['user'=> null]);

        return redirect('/admin/login');
    }

    //修改个人信息页面
    public function info()
    {
        //获取信息
        $face = UserDetail::where('uid',session('user')['uid'])->first();

        return view('admin.user.info',compact('face'));
    }

    //修改信息
    public function doinfo(Request $request)
    {
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

        UserDetail::where('uid',session('user')['uid'])-> update($res);

        return redirect('admin/index');
    }



}
