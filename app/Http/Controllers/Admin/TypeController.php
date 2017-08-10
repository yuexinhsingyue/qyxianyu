<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Type;
use Illuminate\Http\Request;

use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class TypeController extends Controller
{
    /**
     * 商品分类列表页
     *
     * 孙小楠
     */
    public function index(Request $request)
    {
        $res = DB::table('goodstype')->
        select(DB::raw("*,concat(path,',',tid) as paths"))->
        orderBy('paths')->
        where('tname','like','%'.$request->input('search').'%')->
        paginate($request->input('num',5));

        foreach($res as $k => $v){

            //拆分path
            $data = explode(',',$v->path);

            $count = count($data)-1;

            $v->tname = str_repeat('|--', $count).$v->tname;
        }

        //return view('admins.cate.index',['res'=>$res,'request'=>$request]);
        return view('admin.type.list',compact('res','request'));
    }

    /**
     * 商品分类添加方法
     *
     * 孙小楠
     */
    public function create()
    {
       //找出数据库中的一级分类
        //$pid_o= Type::where('pid',0)->get();
        $res = DB::table('goodstype')->
        select(DB::raw("*,concat(path,',',tid) as paths"))->
        orderBy('paths')->
        get();
        foreach($res as $k=>$v){
            $data = explode(',',$v->path);
            $count = count($data)-1;
            $v->tname = str_repeat('|--',$count).$v->tname;
        }
        return view('admin/type/add',compact('res'));
    }

    /**
     * 添加分类  拼接路径.
     *孙小楠
     * 08 09
     */
    public function store(Request $request)
    {
        $input = $request->except('_token');
        if($input['pid'] == '0'){
            $input['path'] = '0';
        } else{
            $info = Type::where('tid',$input['pid'])->first();
            $input['path'] = $info['pid'].','.$info['tid'];
        }
        $res = Type::create($input);
        if($res){
            return redirect('admin/type');
        }else{
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
        //获取要修改的类
        $cate = Type::find($id);
        $res = DB::table('goodstype')->
        select(DB::raw("*,concat(path,',',tid) as paths"))->
        orderBy('paths')->
        get();
        return view('admin.type.edit',compact('cate','res'));
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
      $input = $request->except('tid','pid','path');
      dd($input);
      $id = Type::find($id);
      $data = Type::update($input);
      if($data){
          return redirect('admin.type.list');
      } else{
          return back()->with('error','添加失败！');
      }
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
