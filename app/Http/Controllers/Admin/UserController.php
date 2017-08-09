<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\User;
use App\Http\Model\UserDetail;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;

class UserController extends Controller
{
    /**
     * 显示用户信息
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $res = User::leftjoin('user_details','users.uid','=','user_details.uid');
        $res = $res -> where('') -> paginate(1);

        Input::get('search');

        return view('admin.user.list',compact('res'));
    }

    /**
     * 显示用户添加页面
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.add');
    }

    /**
     * 显示用户添加页面
     * 文件上传  缩略图
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //判断用户输入
        $res = $request -> except('_token','face');
        $rule = [
            'uname' => 'required|between:5,10|alpha|unique:users,uname',
            'password' => 'required|between:6,12',
            'repwd' => 'same:password',
            'tel' => 'required|regex:/^1[34578][0-9]{9}$/',
            'emill' => 'required|email',
            'addr' => 'required',
        ];

        $msg = [
            'uname.required' => '用户名必须输入',
            'uname.between' => '用户名格式不正确',
            'uname.alpha' => '用户名只允许为字母',
            'uname.unique' => '用户必须唯一',
            'password.required' => '密码必须输入',
            'password.between' => '密码格式不正确',
            'repwd.same' => '密码不一致',
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
        if(!$request -> hasFile('face'))
        {
            return redirect()->back()->withInput()->withErrors('没有文件上传');
        }
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
        //存放数据
        $user = new User();
        $user -> uname = $res['uname'];
        $user -> password = bcrypt($res['password']);
        $user -> identity = $res['indentity'];
        $user -> save();
        $id = $user -> uid;

        $userdetail = new UserDetail();
        $userdetail -> uid = $id;
        $userdetail -> face = $res['face'];
        $userdetail -> tel = $res['tel'];
        $userdetail -> emill = $res['emill'];
        $userdetail -> addr = $res['addr'];
        $userdetail -> status = $res['status'];
        $userdetail -> save();

        return redirect('/admin/user');
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
