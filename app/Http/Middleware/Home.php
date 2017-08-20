<?php

namespace App\Http\Middleware;

use Closure;
use App\Http\Model\Webs;


class Home
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        $web = Webs::find(65);
        if($web->status == '1'){
            return $next($request);
        }else{
            $public = public_path('home');
            //dd($public);
            return view('maintain',compact('public'));
        }

        
    }
}
