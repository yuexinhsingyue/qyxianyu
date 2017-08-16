<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Slid extends Model
{
    //
    protected $table = 'slid';
    protected $primaryKey = 'sid';
    protected $guarded = [];
    public $timestamps = false;
}
