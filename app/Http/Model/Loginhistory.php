<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Loginhistory extends Model
{
    protected $table = 'loginhistory';
    protected $primaryKey = 'id';
    protected $guarded = [];
    public $timestamps = false;

}
