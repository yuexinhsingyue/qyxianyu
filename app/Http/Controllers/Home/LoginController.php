<?php

namespace App\Http\Controllers\Home;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Http\Model\User;
use App\Http\Model\UserDetail;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
require_once app_path().'/Lib/Ucpaas.class.php';
use App\Lib\Ucpaas;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Crypt;

class LoginController extends Controller
{
    //登录页
    public function login()
    {
        return view('home.login');
    }
    //退出
    public function loginout()
    {
        session()->flush();
        return redirect('/');
    }
    //登录成功
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
        if ( $UserDetail['status'] == 0) {
            return back()->withErrors('当前用户已被禁用，请您联系客服。') -> withInput();
        }
        session(['homeuser'=>$user]);
        //登录时间
        DB::table('loginhistory')->insert(['uid'=>$user['uid'],'loginTime'=>time(),'ip'=>$_SERVER['REMOTE_ADDR']]);

        return redirect('/');
    }
    //注册页
    public function register()
    {
        return view('home.register');
    }
    //注册邮箱成功
    public function doregister()
    {
        $res = Input::except('_token');
        $rule = [
            'email' => 'required|email|unique:user_details,emill',
            'password' => 'required|between:6,12',
            'repwd' => 'same:password',
        ];
        $msg = [
            'email.required' => '用户名必填',
            'email.email' => '用户名格式不正确',
            'email.unique' => '该用户已注册',
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
        $user -> uname = $res['email'];
        $user -> password = \Crypt::encrypt($res['password']);
        $user -> identity = 2;
        $user -> save();
        $id = $user -> uid;

        $userdetail = new UserDetail();
        $userdetail -> uid = $id;
        $userdetail -> emill = $res['email'];
        $userdetail -> status = 0;
        $userdetail -> user_token = $user -> password;
        $userdetail -> save();
        $userdetail -> uname = $user -> uname;

        Mail::send('emails.active', ['user' => $userdetail], function ($m) use ($userdetail) {
            $m->to($userdetail->emill,$userdetail -> uname)->subject('邮箱激活');
        });

        return redirect('/home/login');

    }
    //邮箱激活
    public function active(Request $request)
    {
        $userid =   $request->input('userid');
        $token = $request->input('token');

//      根据userid获取用户
        $user =   UserDetail::find($userid);
//      验证token是否有效
        if($user->user_token == $token) {
            $re = $user->update(['status' => 1]);
        }
        return redirect('/home/login');
    }
    
    //注册手机成功
    public function dotelregister()
    {
//        dd(Input::except('_token'));
        $res = Input::except('_token');
        $yzcode = $res['yzcode'];
        unset($res['yzcode']);
        //手机号验证
        $rule = [
            'tel'=>'required|regex:/^1[34578][0-9]{9}$/|unique:user_details,tel',
            'password' => 'required|between:6,12',
            'repwd' => 'same:password',
        ];
        $msg = [
            'tel.required' => '用户名必填',
            'tel.regex' => '用户名格式不正确',
            'tel.unique' => '该用户已注册',
            'password.required' => '密码必须输入',
            'password.between' => '密码格式不正确',
            'repwd.same' => '密码不一致',
        ];
        $validator = Validator::make($res,$rule,$msg);
        //如果验证失败
        if($validator->fails()){
            return back() -> withErrors($validator) -> withInput();
        }
        if(session('yzcode') != $yzcode)
        {
            return back()->withErrors('验证码错误') -> withInput();
        }

        //存放数据
        $user = new User();
        $user -> uname = $res['tel'];
        $user -> password = \Crypt::encrypt($res['password']);
        $user -> identity = 2;
        $user -> save();
        $id = $user -> uid;

        $userdetail = new UserDetail();
        $userdetail -> uid = $id;
        $userdetail -> tel = $res['tel'];
        $userdetail -> status = 1 ;
        $userdetail -> save();

        return redirect('/home/login');
    }
    //短信发送
    public function info()
    {
        //初始化必填
        $options['accountsid']=getenv('accountsid');
        $options['token']=getenv('token');

        //初始化 $options必填
        $ucpass = new Ucpaas($options);
        //输入内容不能为空号码
        if(Input::all()['phone'] == "")
        {
            return ;
        }

        $appId =getenv('appId');
        $to =Input::all()['phone'];
        $templateId = "120726";
        $param=mt_rand('11111','99999');
        //存放session
        session(['yzcode'=>$param]);
//        发送
        $ucpass->templateSMS($appId,$to,$templateId,$param);
    }
}
