<?php

namespace App\Http\Middleware;

use Closure;
use Redirect;
<<<<<<< HEAD
use Auth;
=======
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3

class AdminMiddleware
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
<<<<<<< HEAD
        // if(Auth::user()->user_level === 'Administrator') return $next($request);
        // else Redirect::back();
=======
        if(Auth::user()->user_level === 'Administrator') return $next($request);
        else Redirect::back();
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
    }
}
