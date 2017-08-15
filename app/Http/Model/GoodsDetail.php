<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class GoodsDetail extends Model
{
    protected $table = 'goods_detail';
    protected $primaryKey = 'gid';
    protected $guarded = [];
    public $timestamps = false;
}
