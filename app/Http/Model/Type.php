<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $table = 'goodstype';

    protected $primaryKey = 'tid';
    protected $guarded = [];
    public $timestamps = false;

}


