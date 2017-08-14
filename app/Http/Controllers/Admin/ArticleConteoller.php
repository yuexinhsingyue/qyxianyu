<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Model\Works;
use Illuminate\Support\Facades\Validator;

class ArticleConteoller extends Controller
{
    /**
     *
     *
     *  问题列表
     */
    public function index()
    {
        $data = Works::all();
        return view('admin.articles.index',compact('data'));
    }

    /**
     * 
     *
     * 问题添加页
     */
    public function create()
    {
       return view('admin.articles.add');
    }

    /**
     *  
     *
     *  添加操作
     * 
     */
    public function store(Request $req)
    {
       $data = $req->except(['_token']);     //过滤一下子数据

        // 表单验证
        $rule = [
            'wtitle' => 'required|between:1,25',
            'wdesc' => 'required|between:1,50',
            'wcontent' => 'required',
        ];
        $msg = [
            'wtitle.required' => '标题必须输入',
            'wtitle.between' => '文章标题太长！',
            'wdescript.required' => '描述必须输入',
            'wdesc.between' => '文章描述太长！',
            'wcontent.required' => '内容必须输入',
        ];
        $validator = Validator::make($data,$rule,$msg);
        //如果验证失败
        if($validator->fails()){
            return back() -> withErrors($validator) -> withInput();
        }
        
        $res = Works::create($data);      // 开始添加

        if($res){               //判读是否添加成功
            return redirect('admin/article');
        }else{
            return black();
        }

    }


    /**
     *
     *
     *  修改页面
     */
    public function edit($id)
    {
        $res = Works::find($id);
        return view('admin.articles.edit',compact('res'));
    }


    public function show_work(Request $req)
    {
        $res = Works::find($req->wid);

        return $res->wcontent;
    }

    /**
     *
     *
     *  修改操作
     * 
     */
    public function update(Request $req, $id)
    {
        $data = $req->except(['_token','_method']);     //过滤一下子数据

        // 表单验证
        $rule = [
            'wtitle' => 'required|between:1,25',
            'wdesc' => 'required|between:1,50',
            'wcontent' => 'required',
        ];
        $msg = [
            'wtitle.required' => '标题必须输入',
            'wtitle.between' => '文章标题太长！',
            'wdesc.required' => '描述必须输入',
            'wdesc.between' => '文章描述太长！',
            'wcontent.required' => '内容必须输入',
        ];
        $validator = Validator::make($data,$rule,$msg);
        //如果验证失败
        if($validator->fails()){
            return back() -> withErrors($validator) -> withInput();
        }
        
        $pro = Works::find($id);       // 执行修改
        $res = $pro->update($data);

        if($res){               //判读是否添加成功
            return redirect('admin/article');
        }else{
            return black();
        }
    }

    /**
     *
     * 删除操作
     *
     */
    public function destroy($id)
    {
        
        $res = Works::find($id);
        $data = $res -> delete();    //删除问题

        if($data){        //  判断是否删除成功！
            return redirect('admin/article');
        }else{
            return blac();
        }
    }
}