<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Model\Works;
use App\Http\Model\Problem;


class StatusController extends Controller
{

    // 相关问题状态
   public function problem($id, $pid)
   {

        if($id == '1'){
            echo '不显示';
            $res = Problem::where('pid', $pid)->update(['status' => 2]);

            if($res){
                return redirect('admin/problems');
            }else{
                return black();
            }

        }else if($id == '2'){
            echo '显示';
            $res = Problem::where('pid',$pid)->update(['status' => 1]);

            if($res){
                return redirect('admin/problems');
            }else{
                return black();
            }
        }
   }

   // 相关文章状态
   public function work($id, $wid)
   {

        if($id == '1'){
            echo '不显示';
            $res = Works::where('wid', $wid)->update(['status' => 2]);

            if($res){
                return redirect('admin/article');
            }else{
                return black();
            }

        }else if($id == '2'){
            echo '显示';
            $res = Works::where('wid',$wid)->update(['status' => 1]);

            if($res){
                return redirect('admin/article');
            }else{
                return black();
            }
        }
   }
}
