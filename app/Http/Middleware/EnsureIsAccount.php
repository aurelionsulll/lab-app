<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;

use Closure;

class EnsureIsAccount
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
//    public function handle($request, Closure $next)
//    {
//        if (!Auth::check()) {
//            return redirect()->route('loginform');
//        }
//
//        if (Auth::user()->is_admin == 0) {
//            return redirect('/indexAddUserToCompany');
//        }

//        if (Auth::user()->is_admin == 1) {
//            return redirect('/indexAddUserToCompany');
//        }
//
//        if (Auth::user()->is_admin == 2) {
//            return redirect('/indexAddUserToCompany');
//        }

        public function handle($request, Closure $next)
        {
            if (Auth::check() &&  $request->user()->is_admin == 0) {
                return $next($request);
            }
            if (Auth::check() &&  $request->user()->is_admin == 1) {
                return redirect('/cp_admin');
            }
            if (Auth::check() &&  $request->user()->is_admin == 2) {
                return redirect('/appointmentview');
            }
        }
    }

