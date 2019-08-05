<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
<<<<<<< HEAD
        // if (Auth::check()) {

        //     return redirect('/dashboard');
        // }
=======
        if (Auth::check()) {
            return redirect('/dashboard');
        }
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3

        if (Auth::check()) {
            
            return redirect('/dashboard');
        }
        return $next($request);
    }
}
