<?php

namespace App\Http\Controllers\Admin;

// use DB;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Validator;
use App\Http\Model\Slid;

use Illuminate\Support\Facades\Input;



class FigureController extends Controller
{
    /**
     * 
     *
     * 轮播图列表
     */
    public function index(Request $req)
    {
        $slids = Slid::where('stitle','like','%'.$req['figName'].'%')->paginate(2);
        $Name = $req->input('figName');

        return view('admin.figure.index',compact('slids','Name'));
    }

    /**
     *   
     * 轮播图添加页
     *   
     */
    public function create()
    {
        return view('admin.figure.add');
    }

    /**
     *
     *  轮播图添加
     *  
     */
    public function store(Request $req)
    {

        $data = $req->except(['_token']);     //过滤一下子数据

        // 表单验证
         $rule = [
            'stitle'          =>'required|between:2,25',
            'surl'            =>'required',
            'simg'            =>'required',
        ];
        $mess = [
            'stitle.between'          =>'名称格式输入不正确',
            'stitle.required'         =>'请填写名称！',
            'surl.required'           =>'请填写目标地址！',
            'simg.required'            =>'请选择图片！',
        ];
        $validator = Validator::make($data,$rule,$mess);

        if($validator->fails()){       //如果验证失败：
            return back()->withErrors($validator)->withInput();
        }

        // 文件上传
        $file = Input::file('simg');

        $enev = $file->getClientOriginalExtension();   //上传文件的后缀名
    
        $newName = 'lb_'.date('YmdHis').mt_rand(1000,9999).'.'.$enev;    //设置文件名称 
     
        $path = $file->move(public_path().'/uploads/',$newName);     // 移动文件

        $filepath = '/uploads/'.$newName;             //拼接文件路径

        $data['simg'] = '<li class="banner2"><a href="'.$data['surl'].'"><img src="'.$filepath.'" /></a></li>';
        $data['spic'] = $filepath;

        // 执行添加
        $res = Slid::create($data);     

        if($res){
            return redirect('admin/figure');
        }else{
            return back()->with('msg','添加失败！');
        }
    }


    /**
     *  
     *
     *  轮播图修改页
     * 
     */
    public function edit($id)
    {
        
        $data = Slid::find($id);

        return view('admin.figure.edit',compact('data'));
    }

    /**
     *
     *  
     *  修改操作
     *  
     */
    public function update(Request $req, $id)
    {
        $data = $req->except(['_token','_method','pic']);     //过滤一下子数

        // 表单验证
        $rule = [
            'stitle'          =>'required|between:2,25',
            'surl'            =>'required',
        ];
        $mess = [
            'stitle.between'          =>'名称格式输入不正确',
            'stitle.required'         =>'请填写名称！',
            'surl.required'           =>'请填写目标地址！',
        ];
        $validator = Validator::make($data,$rule,$mess);

        if($validator->fails()){       //如果验证失败：
            return back()->withErrors($validator)->withInput();
        }

        // 判断是否有图片有的话就修改
        if($req->hasFile('simg')){     // 文件上传

            unlink(public_path().$req->pic);      // 如果有文件上传的话就删除上次的图片

            $file = Input::file('simg');

            $enev = $file->getClientOriginalExtension();   //上传文件的后缀名
        
            $newName = 'lb_'.date('YmdHis').mt_rand(1000,9999).'.'.$enev;    //设置文件名称 
         
            $path = $file->move(public_path().'/uploads/',$newName);     // 移动文件

            $filepath = '/uploads/'.$newName;             //拼接文件路径

            $data['spic'] = $filepath;     
            $data['simg'] = '<li class="banner2"><a href="'.$req->surl.'"><img src="'.$filepath.'" /></a></li>';

        }

        // 执行修改并判断是否修改成功
        $res = Slid::where('sid','=',$id)->update($data);     // 执行修改动作
        if($res){
            return redirect('admin/figure');
        }else{
            return back()->with('msg','添加失败！');
        }

    }

    /**
     *
     *  删除操作
     *  
     */
    public function destroy($id)
    {
        $res = Slid::find($id);     //  获取制定数据

        $data = $res -> delete();    //删除数据

        if($data){                 //  判断是否删除成功
            return redirect('admin/figure');
        }else{
            return back()->with('msg','添加失败！');
        }
        
    }
}
