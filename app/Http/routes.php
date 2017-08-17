<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/



//后台用户登录
Route::get('admin/login','Admin\LoginController@login');
//后台登录验证
Route::post('admin/dologin','Admin\LoginController@dologin');
//验证码
Route::get('/code/captcha/{tmp}', 'Admin\LoginController@captcha');
// 百度地图
Route::get('admin/baiduapi', function(){
    return view('admin.baiduapi.baiduapi');
});

/*
 * 后台
 * 路由前缀：admin
 * 命名空间: admin
 */
Route::group(['prefix'=>'admin','middleware'=>'admin.login','namespace'=>'Admin'], function() {

    //显示首页
    Route::get('index','IndexController@index');
    //修改密码
    Route::get('pass','IndexController@pass');
    //修改密码
    Route::post('dopass','IndexController@dopass');
    //退出登录
    Route::get('quit','IndexController@quit');
    //修改用户信息页
    Route::get('info','IndexController@info');
    //保存用户修改信息
    Route::post('doinfo','IndexController@doinfo');
    //用户资源路由
    Route::resource('user', 'UserController');
    //分类管理
    Route::resource('type','TypeController');
    //订单管理
    Route::resource('order','OrderController');
    //查看订单详情页
    Route::get('detail','OrderController@detail');
    //鱼塘管理
    Route::resource('fish','FishController');
    //广告管理
    Route::resource('advert','advertController');
    //数据统计
    // Route::resource('dataSta','DataStaController');
    Route::get('dataSta','DataStaController@dataSta');
    Route::get('visit','DataStaController@visit');
    //网站管理
    Route::resource('web', 'WebsiteController');
    // 详细网站信息
    Route::post('web/show', 'WebsiteController@show_web');
    // 友情链接
    Route::resource('links', 'LinksController');
    // 相关问题
    Route::resource('problems', 'ProblemsController');
    // 问题内容
    Route::post('problems/show', 'ProblemsController@show_pro');
    // 相关文章
    Route::resource('article', 'ArticleConteoller');
    // 查看文章
    Route::post('article/show', 'ArticleConteoller@show_work');
    // 文章、问题状态修改
    Route::get('problem/{id}/{pid}', 'StatusController@problem');
    Route::get('work/{id}/{wid}', 'StatusController@work');
    // 轮播图
    Route::resource('figure', 'FigureController');

});

/*
 * 前台
 * 路由前缀：home
 * 命名空间：home
 */
Route::group(['middleware'=>'home'], function() {

    //前台用户登录
    Route::get('home/login','Home\LoginController@login');
    //前台用户退出
    Route::get('home/loginout','Home\LoginController@loginout');
    //前台用户注册
    Route::get('home/register','Home\LoginController@register');
    //前台登录验证
    Route::post('home/dologin','Home\LoginController@dologin');
    //前台注册验证
    Route::post('home/dotelregister','Home\LoginController@dotelregister');
    //手机号
    Route::get('home/info','Home\LoginController@info');
    //前台邮箱验证
    Route::post('home/doregister','Home\LoginController@doregister');
    //邮箱激活
    Route::get('active','Home\LoginController@active');
    //前台主页
    Route::get('/','Home\IndexController@index');
    //商品列表页
    Route::get('home/list','Home\IndexController@list');
    //商品详情页
    Route::get('home/detail/{id}','Home\IndexController@detail');
    //问题页
    Route::get('home/pro/{pid}484.html','Home\IndexController@problems');
    // 文章页
    Route::get('home/work/{wid}289.html','Home\IndexController@works');
    //鱼塘页
    Route::get('home/fish','Home\IndexController@fish');

    // 引导用户到qq的登录授权页面
    Route::get('auth/qq', 'Home\AuthController@qq');
    // 用户授权后qq回调的页面
    Route::get('auth/callback', 'Home\AuthController@callback');

    //鱼塘列表
    Route::get('home/fishlist','Home\FishpondController@fishlist');
    //鱼塘添加
    Route::get('home/address','Home\FishpondController@create');
    Route::post('home/store','Home\FishpondController@store');



    Route::group(['prefix' => 'home','middleware'=>'home.login', 'namespace' => 'Home'], function () {

        //商品添加页
        Route::resource('goods','GoodsController');
        //商品购物车页
        Route::get('car/{id}','IndexController@car');


        //删除商品购物车
        Route::get('delCar/{id}','IndexController@delCar');
        //商品订单页
        Route::get('order/{id}','IndexController@pay');

        //商品订单完成页
        Route::get('success','IndexController@success');
        //个人中心页
        Route::get('personnal','IndexController@person');

        // 个人信息
        Route::get('personinfo','PersonController@personInfo');
        //  修改个人信息
        Route::post('savepersoninfo','PersonController@savePersonInfo');
        //  删除地址
        Route::get('delpersonaddr','PersonController@delPersonAddr');

        //  地址管理
        //   Route::get('personaddr','PersonController@personaddr');
        //  地址管理
        Route::resource('personaddr', 'PersonAddrController');


        });


});
