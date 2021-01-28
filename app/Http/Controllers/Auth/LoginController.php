<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */

    protected function authenticated($request, $user)
    {
        // if($user->is_admin == 1) {
        //     return redirect()->intended('/cp_admin');
        // }

        // if($user->is_admin == 2) {
        //     return redirect()->intended('/appointmentview');
        // }
        // if($user->is_admin == 0) {
        //     return redirect()->intended('/indexAddUserToCompany');
        // }

       switch(Auth::user()->is_admin){
           case 0:
               return redirect()->intended('indexAddUserToCompany');
               break;
           case 1:
            return redirect()->intended('/cp_admin');
               break;
           case 2:
            return redirect()->intended('/appointmentview');
               break;

           default:
               $this->redirectTo = '/loginform';
               return $this->redirectTo;
       }


    }

    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('guest')->except('logout');
    }


}
