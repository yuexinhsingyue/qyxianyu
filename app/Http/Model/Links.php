<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Links extends Model
{
    //
    protected $table = 'links';
    protected $primaryKey = 'lid';
    protected $guarded = [];
    public $timestamps = false;
}
