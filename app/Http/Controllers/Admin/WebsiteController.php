<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Model\Webs;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;



class WebsiteController extends Controller
{

    /*
     *
     *   网站信息显示页
    */
    public function index(Request $req)
    {
        $webs = Webs::where('name','like','%'.$req['webName'].'%')->paginate(2);
        $Name = $req->input('webName');
        
        return view('admin.webs.index',compact('webs','Name'));
    }


    /**
     * 
     *  网站信息添加页
     */
    public function create()
    {
        return view('admin.webs.add');
    }

    /**
     * 
     *   添加操作
     */
    public function store(Request $req)
    {
        $data = $req->except(['_token','logo']);     //过滤一下子数据

        // 表单验证
         $rule = [
            'name'          =>'required',
            'describe'      =>'required|between:5,100',
            'url'           =>'required',
            'filing'        =>'required',
            'cright'        =>'required',
        ];
        $mess = [
            'name.between'          =>'网站名称必须在2-15位之间',
            'describe.required'     =>'请写入网站描述',
            'describe.between'      =>'网站描述必须在5~100之间',
            'url.required'          =>'请输入网站地址',
            'filing.required'          =>'请填写备案号信息',
            'cright.required'          =>'请填写版权信息',
        ];
        $validator = Validator::make($data,$rule,$mess);

        if($validator->fails()){       //如果验证失败：
            return back()->withErrors($validator)->withInput();
        }

        // 文件上传
        $pic = $req -> file('logo');

        if($pic->isValid()){  //  检车是否为有效文件

            $enev = strtolower($pic->getClientOriginalExtension());   //上传文件的后缀名
            
            if(in_array($enev,['jpg','jpeg','png','gif']))
            {
                $newName = 'logo_'.date('YmdHis').mt_rand(1000,9999).'.'.$enev;    //设置文件名称 

                $pic->move(public_path('uploads/'),$newName);     // 移动文件
         
                // 生成缩略图
                $sm = Image::make(public_path('uploads/').$newName)->resize(200,90)->save(public_path('uploads/').'sm_'.$newName);

                $data['logo'] = '/uploads/'.'sm_'.$newName;

            }else{
                return redirect()->back()->withInput()->withErrors('文件上传失败');
            }
             
        }

        // 如果没有图片上传就直接添加
        $res = Webs::create($data);

        if($res){               // 判断是否修改成功
            return redirect('admin/web');
        }else{
            return back()->with('msg','添加失败！');;
        }

    }


    /*
     **
     *   网站信息修改页
    */
    public function edit($id)
    {
        $webs =  Webs::find($id);

        return view('admin.webs.edit',compact('webs'));
        
    }

    public function show_web(Request $req)
    {
        // echo $id.'========详细信息！';
        $webs =  Webs::find($req->id);

        $status = '';
        if($webs->status == '1'){
            $status = '正在运作 ~~~'; 
        }else if($webs->status == '2'){
            $status = '维护中 ··· ···';
        }

        if($webs->logo){
            $logo = "<td><img src='".$webs->logo."' width='150' height='110' style='border-radius:10px'></td>";
        }else if(empty($webs->logo)){
            $logo = '<td><span style="color:#21B4C1;font-weight:bold;">文字式</span></td>';
        }

        $str="<section class='example'>
                <table class='table table-bordered'>
                    <tbody>
                    <tr strle='margin-top:20px'>
                        <th scope='row' width='15%'>ID</th>
                        <td>".$webs->id."</td>
                    </tr>
                    <tr>
                        <th scope='row'>网站名称</th>
                        <td>".$webs->name."</td>
                    </tr>
                    <tr>
                        <th scope='row'>网站描述</th>
                        <td>".$webs->describe."</td>
                    </tr>
                    <tr>
                        <th scope='row'>联系方式</th>
                        <td>".$webs->telephone."</td>
                    </tr>
                    <tr>
                        <th scope='row'>备案号</th>
                        <td>".$webs->filing."</td>
                    </tr>
                    <tr>
                        <th scope='row'>版权信息</th>
                        <td>".$webs->cright."</td>
                    </tr>
                    <tr>
                        <th scope='row'>网站地址</th>
                        <td>".$webs->url."</td>
                    </tr>
                    <tr>
                        <th scope='row'>网站Logo</th>
                        ".$logo."
                    </tr>
                    <tr>
                        <th scope='row'>网站开关</th>
                        <td>".$status."</td>
                    </tr>
                    </tbody>
                </table>
            </section>";

            return $str;

    }


    /*
     *
     *   修改操作
    */
    public function update(Request $req, $id)
    {
        $data = $req->except(['_token','logo','_method','pic']);     //过滤一下子数据

        // 表单验证
         $rule = [
            'name'          =>'required|between:2,15',
            'describe'      =>'required|between:5,100',
            'url'           =>'required',
            'filing'        =>'required',
            'cright'        =>'required',
        ];
        $mess = [
            'name.required'         =>'请输入网站名称',
            'name.between'          =>'网站名称必须在2-15位之间',
            'describe.required'     =>'请写入网站描述',
            'describe.between'      =>'网站描述必须在5~100之间',
            'url.required'          =>'请输入网站地址',
            'filing.required'          =>'请填写备案号信息',
            'cright.required'          =>'请填写版权信息',
        ];
        $validator = Validator::make($data,$rule,$mess);

        if($validator->fails()){       //如果验证失败：
            return back()->withErrors($validator)->withInput();
        }

        // 文件上传
        if(Input::hasFile('logo')){  //  检车是否为有效文件

            if($req->pic){
               unlink(public_path().$req->pic);      
            }

            $pic = $req -> file('logo');
            $enev = strtolower($pic->getClientOriginalExtension());   //上传文件的后缀名
            
            if(in_array($enev,['jpg','jpeg','png','gif']))
            {
                $newName = 'logo_'.date('YmdHis').mt_rand(1000,9999).'.'.$enev;    //设置文件名称 

                $pic->move(public_path('uploads/'),$newName);     // 移动文件

                // 生成缩略图
                $sm = Image::make(public_path('uploads/').$newName)->resize(200,90)->save(public_path('uploads/').'sm_'.$newName);

                $data['logo'] = '/uploads/'.'sm_'.$newName;    // 压入数组


            }else{
                return redirect()->back()->withInput()->withErrors('文件上传失败');
            }
             
        }

        $webs = Webs::find($id);       // 执行修改
        $res = $webs->update($data);

        if($res){                 // 判断是否修改成功
            return redirect('admin/web');
        }else{
            return back()->with('msg','网站信息修改失败');
        }


    }


    /**
     *
     *  删除操作
     */
    public function destroy($id)
    {

       $res = Webs::find($id);
        
        if($res->logo){   //删除是也把照片删除掉

            $img = public_path().$res->logo;
            unlink($img);
        }

        $data = $res -> delete();    //删除数据

        if($data){              //判断是否删除成功
            return redirect('admin/web');
        }else{
            return black()->with('msg','网站信息删除失败');
        }

    }

}