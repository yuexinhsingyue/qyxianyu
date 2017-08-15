<?php

namespace App\Http\Controllers\Home;

use App\Http\Model\Fish;
use App\Http\Model\Goods;
use App\Http\Model\GoodsDetail;
use App\Http\Model\Type;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class GoodsController extends Controller
{
    /**
     *个人的商品列表页
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //获取发布商品的用户id

        //根据uid获取此用户发布的所有商品

     return view('home.goods.list');
    }

    /**
     *个人商品添加
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       /* //联合查询商品表和商品详情表的所有信息
        $goods = Goods::leftjoin('goods_detail','goods.id','=','goods_detail.gid');*/
        $type = Type::get();
        //查询所有的鱼塘信息
        $fish = Fish::get();
//        dd($fish);
        return view('home.goods.add',compact('type','fish'));
    }

    /**
     * Store a newly created resource in storage.
     *执行个人闲置添加方法
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->except('_token','addr');
        $rule = [
            'gname' => 'required|alpha|unique:users,uname',
            'nprice' => 'required',
            'goodsNum' => 'required',
        ];

        $msg = [
            'gname.required' => '宝贝名称必须输入',
            'nprice.required' => '宝贝价格必须输入',
            'goodsNum.required' => '宝贝数量必须输入',
        ];
        $validator = Validator::make($input,$rule,$msg);
        //如果验证失败
        if($validator->fails()){
            return back() -> withErrors($validator) -> withInput();
        }
        //是否有上传文件(上传商品图片)
        if(!$request -> hasFile('pic'))
        {
            return redirect()->back()->withInput()->withErrors('没有文件上传');
        }
        //文件上传
        $file = $request -> file('pic');
        //判断上传文件是否有效
        if($file -> isValid())
        {
            //获取文件后缀名
            $ext = $file -> getClientOriginalExtension();
            //新的名字
            $newname = date('YmdHis').mt_rand(1111,9999).'.'.$ext;
            //上传图片到文件夹
            $path = $file -> move(public_path('uploads'),$newname);
            //生成缩略图
            $img = Image::make(public_path('/uploads/').$newname) -> resize(60,60);
            //保存图片上传的缩略图名字
            $img -> save(public_path('uploads/').'sml'.$newname);
            $res['pic'] = 'uploads/sml'.$newname;
        } else {
            return redirect()->back()->withInput()->withErrors('文件上传失败');
        }
        //上传图片
        $input['pic'] = $res['pic'];

        $data = Goods::create($input);
        if($data){
            return redirect('/home/goods');
        }else {
            return back()->with('error','添加失败！');
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
