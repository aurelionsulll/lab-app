<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;


class EnsureRdv
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
        if (Auth::check() &&  $request->user()->is_admin == 0) {
            return redirect('/indexAddUserToCompany');
        }
        if (Auth::check() &&  $request->user()->is_admin == 1) {
            return redirect('/cp_admin');
        }
        if (Auth::check() &&  $request->user()->is_admin == 2) {
            return $next($request);
        }
    }
}
