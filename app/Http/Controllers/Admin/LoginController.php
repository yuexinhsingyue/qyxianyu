<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\User;
use App\Http\Model\UserDetail;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Gregwar\Captcha\CaptchaBuilder;
use Gregwar\Captcha\PhraseBuilder;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    //登录页面显示
    public function login()
    {
        return view('admin.login');
    }

    // 验证码生成
    public function captcha($tmp)
    {

        $phrase = new PhraseBuilder;
        // 设置验证码位数
        $code = $phrase->build(4);
        // 生成验证码图片的Builder对象，配置相应属性
        $builder = new CaptchaBuilder($code, $phrase);
        // 设置背景颜色
        $builder->setBackgroundColor(220, 210, 230);
        $builder->setMaxAngle(25);
        $builder->setMaxBehindLines(0);
        $builder->setMaxFrontLines(0);
        // 可以设置图片宽高及字体
        $builder->build($width = 114, $height = 45, $font = null);
        // 获取验证码的内容
        $phrase = $builder->getPhrase();
        // 把内容存入session
        \Session::flash('code', $phrase);

        // 生成图片
        header("Cache-Control: no-cache, must-revalidate");
        header("Content-Type:image/jpeg");
        $builder->output();
    }

    //登录验证
    public function dologin()
    {
        $res = Input::except('_token');
        $user = User::where('uname',$res['uname'])->first();
        $UserDetail = UserDetail::where('uid',$user['uid'])->first();
        //如果数据库中没有此用户，返回登录页面
        if(!$user)
        {
            return back()->withErrors('没有这个用户') -> withInput();
        }
        //验证密码
        if(Crypt::decrypt($user['password']) != trim($res['password']))
        {
            return back()->withErrors('密码错误') -> withInput();
        }
        //验证码
        if(session('code') != $res['captcha'])
        {
            return back()->withErrors('验证码错误') -> withInput();
        }
        //验证身份
        if($user['identity'] != 1)
        {
            return back()->withErrors('您没有管理员权限') -> withInput();
        }
        if ( $UserDetail['status'] == 0) {
            return back()->withErrors('当前用户已被禁用，请您联系客服。') -> withInput();
        }
        session(['user'=>$user]);
        return redirect('/admin/index');

    }

    //用户注册
    public function register()
    {
        return view('admin.register');
    }

    //用户注册成功
    public function doregister(Request $request)
    {
        //判断用户输入
        $res = $request -> except('_token','face');
        $rule = [
            'uname' => 'required|between:5,10|alpha|unique:users,uname',
            'password' => 'required|between:6,12',
            'repwd' => 'same:password',
        ];

        $msg = [
            'uname.required' => '用户名必须输入',
            'uname.between' => '用户名格式不正确',
            'uname.alpha' => '用户名只允许为字母',
            'uname.unique' => '用户必须唯一',
            'password.required' => '密码必须输入',
            'password.between' => '密码格式不正确',
            'repwd.same' => '密码不一致',
        ];

        $validator = Validator::make($res,$rule,$msg);
        //如果验证失败
        if($validator->fails()){
            return back() -> withErrors($validator) -> withInput();
        }
        //存放数据
        $user = new User();
        $user -> uname = $res['uname'];
        $user -> password = \Crypt::encrypt($res['password']);
        $user -> identity = 2;
        $user -> save();
        $id = $user -> uid;

        $userdetail = new UserDetail();
        $userdetail -> uid = $id;
        $userdetail -> status = 1;
        $userdetail -> save();

        return redirect('/admin/login');
    }
}
