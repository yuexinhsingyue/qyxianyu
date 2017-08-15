<?php

namespace App\Http\Middleware;

use Closure;

class AdminLogin
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
        if(!session('user'))
        {
<<<<<<< HEAD
           return redirect('admin/login');
=======
            return redirect('admin/login');
>>>>>>> origin/qin
        }
        return $next($request);
    }
}
