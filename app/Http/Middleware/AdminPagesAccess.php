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
        if (auth()->user()->type != 'rateController' && auth()->user()->type != 'adminCreator' ) {
            return redirect()->back()->with('accessMsg','<b>Sorry</b> You do not have permission to access this route :( ');
                }

        return $next($request);
    }
}
