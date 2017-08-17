<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Model\Links;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;


class LinksController extends Controller
{
    /**
     *  
     * 链接列表
     */
    public function index(Request $req)
    {

        $link = Links::where('lname','like','%'.$req['linkName'].'%')->paginate(2);
        $Name = $req->input('linkName');

        return view('admin.links.index',compact('link','Name'));
    }

    /**
     *
     *
     * 添加链接页面
     */
    public function create()
    {

        return view('admin.links.add');

    }

    /**
     * 
     * 添加操作
     */
    public function store(Request $req)
    {
        $data = $req->except(['_token','limg','pic']);     //过滤一下子数据

         if($req->hasFile('limg')){             //  如果有图片上传：

            $file = Input::file('limg');

            $enev = $file->getClientOriginalExtension();   //上传文件的后缀名
        
            $newName = 'link_'.date('YmdHis').mt_rand(1000,9999).'.'.$enev;    //设置文件名称 
         
            $path = $file->move(public_path().'/uploads/',$newName);     // 移动文件

            $filepath = '/uploads/'.$newName;             //拼接文件路径

            $data['limg'] = $filepath;         
        }

        $res = Links::create($data);                // 执行修改 

        if($res){
            return redirect('admin/links');
        }else{
            return blck();
        }
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
     * 
     * 修改动作
     */
    public function edit($id)
    {
        $res = Links::find($id);

        return view('admin.links/edit', compact('res'));
    }

    /**
     *
     *  修改操作
     */
    public function update(Request $req, $id)
    {
        
        $data = $req->except(['_token','_method','pic']);       // 过滤一下子数据 

        if($req->hasFile('limg')){     // 文件上传

            // 如果有文件上传的话就删除上次的图片
            if($req->pic){
               unlink(public_path().$req->pic);      
            }

            $file = Input::file('limg');

            $enev = $file->getClientOriginalExtension();   //上传文件的后缀名
        
            $newName = 'link_'.date('YmdHis').mt_rand(1000,9999).'.'.$enev;    //设置文件名称 
         
            $path = $file->move(public_path().'/uploads/',$newName);     // 移动文件

            $filepath = '/uploads/'.$newName;             //拼接文件路径

            $data['limg'] = $filepath;     
        }

        $res = Links::where('lid','=',$id)->update($data);     // 执行修改动作

        return redirect('admin/links');

    }

    /**
     *
     * 
     * 删除操作
     */
    public function destroy($id)
    {
        $res = Links::find($id);
        
        if($res->limg){   //删除是也把照片删除掉

            $img = public_path().$res->limg;
            unlink($img);
        }

        $data = $res -> delete();    //删除数据

        if($data){              //判断是否删除成功
            return redirect('admin/links');
        }else{
            return black();
        }


    }
}
