<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Webs extends Model
{
    //
    protected $table = 'webs';
    protected $primaryKey = 'id';
    protected $guarded = [];
    public $timestamps = false;
}
