<?php

namespace App\Http\Middleware;

use Closure;
use Redirect;
use Auth;

class KitchenMiddleware
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
        // if(Auth::user()->user_level === 'Kitchen') return $next($request);
        // else Redirect::back();
    }
}
