<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;
//分类模板
class Type extends Model
{
    protected $table = 'goodstype';
    protected $primarykey = 'tid';
    protected  $guarded = [];
    public $timestamps = false;

    //分类
    public function  cate()
    {
        $cates = $this->OrderBy('tid','asc')->get();
        return $cates;
    }
}
