<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminPagesAccess
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
        if (auth()->user()->type != 'admin') {
            return redirect('/');
        }

        return $next($request);
    }
}
