<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    /**
     * 与模型关联的数据表。
     *
     * @var string
     */
    protected $table = 'user_details';

    protected $primaryKey = 'id';

     /**
     * 指定是否模型应该被戳记时间。
     *
     * @var bool
     */
    public $timestamps = false;

    
}
