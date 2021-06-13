<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Admins
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {

        if (auth()->user()->type != 'adminCreator') {
            return redirect()->back()->with('accessMsg','You do not have permission to access this route.');

        }

        return $next($request);
    }
}
