<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $table = "address";
    protected $primaryKey = "id";
    protected $guarded = [];
    public $timestamps = false;
}
