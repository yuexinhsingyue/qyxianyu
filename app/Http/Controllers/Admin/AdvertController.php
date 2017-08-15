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
use Illuminate\Pagination\Paginator;
use Storage;


class AdvertController extends Controller
{
    /**
     * 打开广告列表页面
     * auth:hsingyue
     * data:2017-08-14
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $advert = advert::paginate(3);
        // dd($advert->render());

        // dd($advert);
         return view('admin.advert.list',compact('advert'));
    }

    /**
     * Show the form for creating a new resource.
     * 打开添加广告页面
     * auth:hsingyue
     * data:2017-08-14
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.advert.add');
    }

    /**
     * 执行添加广告并保存到数据库中
     * auth:hsingyue
     * data:2017-08-14
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
                $pic -> move(public_path('uploads/'),$newName);
                $mypic = 'uploads/'.$newName;

                //生成缩略图
                $img = Image::make(public_path('uploads/').$newName) -> resize(60,60);
                $img -> save(public_path('uploads/').'sm'.$newName);
               
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
        $advert -> pic = $mypic;
        $advert -> piclink = $input['piclink'];
        $advert -> status = $input['status'];
        $advert -> save();
        // dd($advert);
        return redirect('admin/advert ');
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
     * 打开修改广告页面
     * auth:hsingyue
     * data:2017-08-14
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $advert = Advert::find($id);
        $advert['adstart'] = date('Y-m-d H:i:s',$advert['adstart']);
        $advert['adstop'] = date('Y-m-d H:i:s',$advert['adstop']);
        // dd($advert);

        return view('admin.advert.edit',compact('advert'));
    }

    /**
     * 执行修改广告详情
     * auth:hsingyue
     * data:2017-08-14
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request);
        // 获取上传的广告图片
        $mypic = $request -> file('pic');
        $data = $request -> except(['_token','_method']);
        // 判断是否有图片上传
        if($request -> hasFile('pic')) {
            // 检查文件是否合法
            if($mypic->isValid()) {
                // 获取文件后缀
                $ext = strtolower($mypic -> getClientOriginalExtension());
                // 判断文件类型是否图片
                if(in_array($ext,['jpeg','jpg','gif','png'])) {
                    // 给文件创建新名字
                    $newName = 'ad'.time().mt_rand(100000,999999).'.'.$ext;
                    // 移动文件  文件路径+文件名
                    $mypic -> move(public_path('uploads'),$newName);
                    $data['pic'] = ('uploads/'.$newName);
                    //生成缩略图
                    $img = Image::make(public_path('uploads/').$newName) -> resize(60,60);
                    $img -> save(public_path('uploads/').'sm_'.$newName);
                  
                    // 删除旧图片
                    // echo public_path().$request->input('pic');
                    //  if($request->input('pic')) {
                        
                    //     unlink(public_path().$request->input('pic'));
                    //  }
                }
                else {
                 return redirect()->back()->withInput()->withErrors('文件上传失败');
                }
            }
        }
         // 更新数据库
        $res = Advert::find($id) -> update($data);
        
        // 跳转到列表页
        return redirect('admin/advert');
    }

    /**
     * 删除广告
     * auth:hsingyue
     * data:2017-08-14
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //查询要删除的类
         $res = Advert::find($id) -> delete();
          if($res){
              $data = [
                  'status'=>1,
                  'msg'=>'删除成功！'
              ];
          } else {
              $data = [
                  'status'=>2,
                  'msg'=>'删除失败!'
              ];
          }
              return $data;
        }


}
