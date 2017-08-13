<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
class AdvertController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return 'ssssssssssssss';
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.advert.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $input = $request -> except('_token','pic');
        $this->validate($request, [

        ]);
        $rules = [
            'adname' => 'required|max:30',
            'addescribe' => 'required',
            'adposition' => 'required',
            'adlink' => 'required',
        ];
        $msg = [
            'adname.required' => '广告名称不能为空',
            'adname.max' => '广告名称长度超限',
            'addescribe.required' => '广告描述不能为空',
            'adposition.required' => '广告位置不能为空',
            'adlink.required' => '广告链接不能为空',
        ];
        $validator = Validator::make($input, $rules, $msg);
        if ($validator->fails()) {
            return back() -> withErrors($validator) -> withInput();
        }

        //判断是否上传图片
        if( $request -> hasFile('pic') )
        {
            dd('有');
        } else{
            dd('没有');
        }
        //获取文件
        $pic = $request -> file('pic');
//        检查文件是否合法
        if($request->file('pic')->isValid())
        {
//         将后缀转换成小写再判断
            
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
