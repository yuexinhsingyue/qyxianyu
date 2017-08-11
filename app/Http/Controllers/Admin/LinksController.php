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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $link = Links::get();
        return view('admin.links.index',compact('link'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.links.add',compact('link'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        $data = $req->except(['_token','limg','pic']);     //过滤一下子数据

         if($req->hasFile('limg')){             //  如果有图片上传：

            $file = Input::file('limg');

            $enev = $file->getClientOriginalExtension();   //上传文件的后缀名
        
            $newName = date('YmdHis').mt_rand(1000,9999).'.'.$enev;    //设置文件名称 
         
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        echo $id;
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
        echo  '我是修改页面';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        echo '我是删除页面';
    }
}
