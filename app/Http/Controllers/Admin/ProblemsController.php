<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Model\Problem;
use Illuminate\Support\Facades\Validator;

class ProblemsController extends Controller
{
    /**
     *
     *
     *  问题列表
     */
    public function index(Request $req)
    {

        $data = Problem::where('ptitle','like','%'.$req['proName'].'%')->paginate(2);
        $Name = $req->input('proName');

        return view('admin.problems.index',compact('data','Name'));
    }

    /**
     * 
     *
     * 问题添加页
     */
    public function create()
    {
        return view('admin.problems.add');
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

    }


    /**
     *
     *
     *  修改页面
     */
    public function edit($id)
    {
        $res = Problem::find($id);

        return view('admin.problems.edit',compact('res'));
    }


    // 查看文章
    public function show_pro(Request $req)
    {
        $res = Problem::find($req->pid);

        return $res->pcontent;
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

        // 修改操作
        $pro = Problem::find($id);       // 执行修改
        $res = $pro->update($data);

        if($res){               // 判断是否修改成功
            return redirect('admin/problems');
        }else{
            return blac();
        }
    }

    /**
     *
     * 删除操作
     *
     */
    public function destroy($id)
    {
        $res = Problem::find($id);
        $data = $res -> delete();    //删除问题

        if($data){        //  判断是否删除成功！
            return redirect('admin/problems');
        }else{
            return blac();
        }
    }
}