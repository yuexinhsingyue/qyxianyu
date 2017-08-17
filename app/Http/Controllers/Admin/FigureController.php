<?php

namespace App\Http\Controllers\Admin;

// use DB;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Validator;
use App\Http\Model\Slid;

use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;




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
        $pic = $req -> file('simg');

        if($pic->isValid()){  //  检车是否为有效文件

            $enev = strtolower($pic->getClientOriginalExtension());   //上传文件的后缀名
            
            if(in_array($enev,['jpg','jpeg','png','gif']))
            {
                $newName = 'lb_'.date('YmdHis').mt_rand(1000,9999).'.'.$enev;    //设置文件名称 

                $pic->move(public_path('uploads/'),$newName);     // 移动文件
         
                // 生成缩略图
                $sm = Image::make(public_path('uploads/').$newName)->resize(1010,455)->save(public_path('uploads/').'sm_'.$newName);

                $data['spic'] = '/uploads/'.$newName;
                $data['simg'] = '<li class="banner2"><a href="'.$data['surl'].'"><img src=/uploads/"'.'sm_'.$newName.'" /></a></li>';

            }else{
                return redirect()->back()->withInput()->withErrors('文件上传失败');
            }
             
        }
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

        // 文件上传
        if(Input::hasFile('simg')){  //  检车是否为有效文件

            if($req->pic){
               unlink(public_path().$req->pic);      
            }

        	$pic = $req -> file('simg');
            $enev = strtolower($pic->getClientOriginalExtension());   //上传文件的后缀名
            
            if(in_array($enev,['jpg','jpeg','png','gif']))
            {
                $newName = 'lb_'.date('YmdHis').mt_rand(1000,9999).'.'.$enev;    //设置文件名称 

                $pic->move(public_path('uploads/'),$newName);     // 移动文件

                // 生成缩略图
                $sm = Image::make(public_path('uploads/').$newName)->resize(1010,455)->save(public_path('uploads/').'sm_'.$newName);

                $data['spic'] = '/uploads/'.$newName;
                $data['simg'] = '<li class="banner2"><a href="'.$data['surl'].'"><img src=/uploads/'.'sm_'.$newName.' /></a></li>';


            }else{
                return redirect()->back()->withInput()->withErrors('文件上传失败');
            }
             
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
