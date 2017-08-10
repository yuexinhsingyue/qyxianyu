<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Model\Webs;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;


class WebsiteController extends Controller
{

    /*
        网站信息显示页
    */
    public function index()
    {

        $webs =  Webs::all();
        return view('admin.webs.index',compact('webs'));
    }


    /**
     * 
     *
     *  网站信息添加页
     *
     */
    public function create()
    {
        return view('admin.webs.add');
    }

    /**
     * 
     *
     *   执行添加动作
     *
     */
    public function store(Request $req)
    {
        $data = $req->except(['_token','logo']);     //过滤一下子数据

        // 表单验证
         $rule = [
            'name'          =>'required|between:2,15',
            'describe'      =>'required|between:5,50',
            'url'           =>'required',
            'filing'        =>'required',
            'cright'        =>'required',
        ];
        $mess = [
            'name.required'         =>'请输入网站名称',
            'name.between'          =>'网站名称必须在2-15位之间',
            'describe.required'     =>'请写入网站描述',
            'describe.between'      =>'网站描述必须在5~50之间',
            'url.required'          =>'请输入网站地址',
            'filing.required'          =>'请填写备案号信息',
            'cright.required'          =>'请填写版权信息',
        ];
        $validator = Validator::make($data,$rule,$mess);

        if($validator->fails()){       //如果验证失败：
            return back()->withErrors($validator)->withInput();
        }


        if($req->hasFile('logo')){             //  如果有图片上传：

            $file = Input::file('logo');

            $enev = $file->getClientOriginalExtension();   //上传文件的后缀名
        
            $newName = date('YmdHis').mt_rand(1000,9999).'.'.$enev;    //设置文件名称 
         
            $path = $file->move(public_path().'/uploads/',$newName);     // 移动文件

            $filepath = '/uploads/'.$newName;             //拼接文件路径

            $data['logo'] = $filepath; 
        }

        // 如果没有图片上传就直接添加
        $res = Webs::create($data);

        if($res){               // 判断是否修改成功
            return redirect('admin/web');
        }else{
            return back()->with('msg','添加失败！');;
        }



    }


    /*
        网站信息修改页
    */
    public function edit($id)
    {
        $webs =  Webs::find($id);

        return view('admin.webs.edit',compact('webs'));
        
    }

     public function show($id)
    {
        //
    }


    /*
        执行修改动作
    */
    public function update(Request $req, $id)
    {
        $data = $req->except(['_token','logo','_method','ppic']);     //过滤一下子数据

        // 表单验证
         $rule = [
            'name'          =>'required|between:2,15',
            'describe'      =>'required|between:5,50',
            'url'           =>'required',
            'filing'        =>'required',
            'cright'        =>'required',
        ];
        $mess = [
            'name.required'         =>'请输入网站名称',
            'name.between'          =>'网站名称必须在2-15位之间',
            'describe.required'     =>'请写入网站描述',
            'describe.between'      =>'网站描述必须在5~50之间',
            'url.required'          =>'请输入网站地址',
            'filing.required'          =>'请填写备案号信息',
            'cright.required'          =>'请填写版权信息',
        ];
        $validator = Validator::make($data,$rule,$mess);

        if($validator->fails()){       //如果验证失败：
            return back()->withErrors($validator)->withInput();
        }

        if($req->hasFile('logo')){             //  如果有图片上传：

            $file = Input::file('logo');

            $enev = $file->getClientOriginalExtension();   //上传文件的后缀名
        
            $newName = date('YmdHis').mt_rand(1000,9999).'.'.$enev;    //设置文件名称 
         
            $path = $file->move(public_path().'/uploads/',$newName);     // 移动文件

            $filepath = '/uploads/'.$newName;             //拼接文件路径

            $data['logo'] = $filepath; 

            $paths = dirname(dirname(dirname(dirname(dirname(__FILE__)))));      // 删除要修改的照片
            unlink($paths.'/public'.$req->ppic);         
        }

        $webs = Webs::find($id);                 // 执行修改
        $res = $webs->update($data);

        if($res){                 // 判断是否修改成功
            return redirect('admin/web');
        }else{
            return back()->with('msg','网站信息修改失败');;
        }


    }


    /**
     * 
     *
     *  删除动作
     * 
     */
    public function destroy($id)
    {
       $input = Webs::find($id)->first();

       unlink(public_path().$input->logo);    // 删除logo

       $res = Webs::where('id',$id)->delete();
       
       if($res){
            return redirect('admin/web');
       }else{
            return back()->with('msg','删除失败');;
       }

    }

}
