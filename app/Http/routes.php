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

//Route::get('/', function () {
//    return view('welcome');
//});

//后台用户登录
Route::get('admin/login','Admin\LoginController@login');
//后台登录验证
Route::post('admin/dologin','Admin\LoginController@dologin');
//验证码
Route::get('/code/captcha/{tmp}', 'Admin\LoginController@captcha');
// 百度地图
Route::get('admin/baiduapi', function(){
    // echo 'dddddddd';
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

//前台用户登录
Route::get('home/login','Home\LoginController@login');
//前台用户注册
Route::get('home/register','Home\LoginController@register');
//前台登录验证
Route::post('home/dologin','Home\LoginController@dologin');
//前台主页
Route::get('/','Home\IndexController@index');
//商品列表页
Route::get('home/list','Home\IndexController@list');
//商品详情页
Route::get('home/detail','Home\IndexController@detail');
//问题页
Route::get('home/news','Home\IndexController@news');
//鱼塘页
Route::get('home/fish','Home\IndexController@fish');


/*
 * 前台
 * 路由前缀：home
 * 命名空间：home
 */
Route::group(['prefix' => 'home', 'namespace' => 'Home'], function () {
    //商品添加页
    Route::resource('goods','GoodsController');
    //商品购物车页
    Route::get('car','IndexController@car');
    //商品订单页
    Route::get('order','IndexController@pay');
    //商品订单完成页
    Route::get('success','IndexController@success');
    //个人中心页
    Route::get('person','IndexController@person');
});




