<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $table = 'order_detail';
    protected $primaryKey = 'id';
    protected $guarded = [];
    public $timestamps = false;
}
