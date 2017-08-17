<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    public function qq() {
        return \Socialite::with('qq')->redirect();
        // return \Socialite::with('weibo')->scopes(array('email'))->redirect();
    }
    public function callback() {
        $oauthUser = \Socialite::with('qq')->user();
        //未做数据库这一块
//        var_dump($oauthUser->getId());
//        var_dump($oauthUser->getNickname());
//        var_dump($oauthUser->getName());
//        var_dump($oauthUser->getEmail());
//        var_dump($oauthUser->getAvatar());
    }
}
