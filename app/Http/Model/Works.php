<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Works extends Model
{
    //
    protected $table = 'works';
    protected $primaryKey = 'wid';
    protected $guarded = [];
    public $timestamps = false;
}
