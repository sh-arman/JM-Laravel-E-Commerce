<?php

namespace App\Http\Middleware;
use User;
use Category;
use Auth;
use Closure;

class AdminMiddleware
{

    public function handle($request, Closure $next)
    {
        if(Auth::check() &&  Auth::user()->is_admin == 1) {
          return $next($request);
        }else {
          return back();
        }
    }
}
