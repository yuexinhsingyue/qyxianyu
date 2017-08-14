<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Advert;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class AdvertController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $advert = advert::paginate(2);
        // dd($advert);
         return view('admin.advert.list',compact('advert'));
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
        
        $input = $request -> except('_token','pic');
        $this->validate($request, [

        ]);
        $rules = [
            'adname' => 'required|max:30',
            'addescribe' => 'required',
            'adlink' => 'required',
        ];
        $msg = [
            'adname.required' => '广告名称不能为空',
            'adname.max' => '广告名称长度超限',
            'addescribe.required' => '广告描述不能为空',
            'adlink.required' => '广告链接不能为空',
        ];
        $validator = Validator::make($input, $rules, $msg);
        if ($validator->fails()) {
            return back() -> withErrors($validator) -> withInput();
        }

        //判断是否上传图片
        if( !$request -> hasFile('pic') )
        {
            return redirect() -> back() -> withInput() -> withErrors('没有文件上传');
        } 
        //获取文件
        $pic = $request -> file('pic');
        //检查文件是否合法
        if($pic->isValid())
        {
            // 获取文件后缀
            $ext = strtolower($pic -> getClientOriginalExtension());
            if(in_array($ext,['jpeg','jpg','gif','png']))
            {
                // 给文件创建新名字
                $newName = 'ad'.time().mt_rand(100000,999999).'.'.$ext;
                // 移动文件  文件路径+文件名
                $pic -> move(public_path('uploads'),$newName);
                $input['pic'] = ('uploads/ad'.$newName);
                //生成缩略图
                $img = Image::make(public_path('uploads/').$newName) -> resize(60,60);
                $img -> save(public_path('uploads/').'sm_ad'.$newName);
               
            }
            else {
             return redirect()->back()->withInput()->withErrors('文件上传失败');
            }
        }
        // 保存到数据库
        $adstart =  strtotime(preg_replace(['/年/','/月/','/日/'], ['-','-',''], $input['adstart']));   //时间转时间戳
        $adstop =  strtotime(preg_replace(['/年/','/月/','/日/'], ['-','-',''], $input['adstop']));   //时间转时间戳

        $advert = new Advert;
        $advert -> adname = $input['adname'];
        $advert -> addescribe = $input['addescribe'];
        $advert -> adposition = $input['adposition'];

        $advert -> adstart = $adstart;
        $advert -> adstop = $adstop;
        $advert -> adlink = $input['adlink'];
        $advert -> pic = $input['pic'];
        $advert -> piclink = $input['piclink'];
        $advert -> status = $input['status'];
        $advert -> save();

        return redirect('admin/advert');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
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
