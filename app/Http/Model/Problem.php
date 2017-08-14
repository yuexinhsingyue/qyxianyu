<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Problem extends Model
{
    //
    protected $table = 'problem';
    protected $primaryKey = 'pid';
    protected $guarded = [];
    public $timestamps = false;
}
