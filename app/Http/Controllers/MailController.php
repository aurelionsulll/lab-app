<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SignupEmail;

class MailController extends Controller
{
    public static function sendSignupEmail($lname,$name,$email,$password)
    {
        $data = [
            'lname' => $lname,
            'name' => $name,
            'email' => $email,
            'password' => $password
        ];
        Mail::to($email)->send(new SignupEmail($data));
    }
}
