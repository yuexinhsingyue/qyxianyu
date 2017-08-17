<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $table = 'car';
    protected $primaryKey = 'id';
    protected $guarded = [];
    public $timestamps = false;
}
