<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

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

    // public function logout(Request $request)
    // {
    //     $this->guard()->logout();

    //     return redirect('/about');
    // }

    public function logout(Request $request) {
        Auth::logout();
        return redirect('/');
      }

}
