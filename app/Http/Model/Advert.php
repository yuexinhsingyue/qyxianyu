<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Advert extends Model
{
    protected $table = 'advert';
    protected $primaryKey = 'id';
    protected $guarded = [];
    public $timestamps = false;
}
