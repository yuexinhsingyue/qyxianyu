<?php

		
use App\Http\Model\Links;
use App\Http\Model\Webs;

 class CommonController extends Controller
{
	public function __construct(){

		// 友情链接
        $links = Links::get();
        echo $links->lurl;
        // 网站信息
        // $webs = Webs::

 		view()->share('links', $links);

 	}
}
