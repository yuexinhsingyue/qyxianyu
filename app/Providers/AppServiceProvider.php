<?php

namespace App\Providers;

use App\Http\Model\User;
use Illuminate\Support\ServiceProvider;
use App\Http\Model\Links;
use App\Http\Model\Webs;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // 友情链接
        $links = Links::get();
        // 网站配置
        $web = Webs::find(65);

        view()->share('links', $links);
        view()->share('web', $web);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
