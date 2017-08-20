<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $table = 'order_detail';
    protected $guarded = [];
    public $timestamps = false;
}
