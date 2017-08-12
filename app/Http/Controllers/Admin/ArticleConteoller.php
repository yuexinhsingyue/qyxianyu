<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
// use App\Http\Model\Problem;
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
            'ptitle' => 'required|between:1,25',
            'pdescript' => 'required',
            'pcontent' => 'required',
        ];
        $msg = [
            'ptitle.required' => '标题必须输入',
            'ptitle.between' => '标题太长！',
            'pdescript.required' => '描述必须输入',
            'pcontent.required' => '内容必须输入',
        ];
        $validator = Validator::make($data,$rule,$msg);
        //如果验证失败
        if($validator->fails()){
            return back() -> withErrors($validator) -> withInput();
        }
        
        $res = Problem::create($data);      // 开始添加

        if($res){               //判读是否添加成功
            return redirect('admin/problems');
        }else{
            return black();
        }

        dd($data);
    }

    /**
     *
     * 
     * 单条页
     */
    public function show($id)
    {
        echo '查看单条';
    }

    /**
     *
     *
     *  修改页面
     */
    public function edit($id)
    {
       
    }

    /**
     *
     *
     *  修改操作
     * 
     */
    public function update(Request $req, $id)
    {
        
    }

    /**
     *
     * 删除操作
     *
     */
    public function destroy($id)
    {
        
        
    }
}