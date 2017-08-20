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
        $res = $res -> where('uname','like','%'.Input::get('search').'%') -> paginate(2);
        //条件
        $search = Input::get('search');
        return view('admin.user.list',compact('res','search'));
    }

    /**
     * 显示修改页面
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $user = $user['identity'];
        $ud = UserDetail::where('uid','=',$id)->first();
        $ud = $ud['status'];

        return view('admin.user.edit',compact('user','ud','id'));
    }

    /**
     * 修改页面
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $res = $request -> except('_token','_method');
        //保存用户身份信息
        $user = User::find($id);
        $user -> identity = $res['indentity'];
        $user -> save();
        //用户是否会禁用
        UserDetail::where('uid','=',$id) -> update(['status'=> $res['status']]);

        return redirect('admin/user');
    }


}
