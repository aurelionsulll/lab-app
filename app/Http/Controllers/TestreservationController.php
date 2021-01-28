<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Testreservation;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\MailController;
use Illuminate\Support\Str;


class TestreservationController extends Controller
{

    public function __construct()
    {
        $this->middleware('rdv')->except('postappointment','index','appointmentview');
    }

    public function index(){

        return view('testreservation');
    }

    public function postappointment(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'tel' => 'required|numeric',
            'date' => 'required|date',
            'cin' => 'required',
            'adresse' => 'required',
            'date_test' => 'required|date',
            'sexe' => 'required',
            'mail' => 'required|email|unique:users,email',
        ],
        [
            'required' => 'Ce champ est obligatoire',
            'email' => 'Cette adresse email est invalide',
            'numeric' => 'Le téléphone doit être un numéro',
            'date' => 'La date doit être au format de date'

        ]);
        $app = new Testreservation();
        $appl = new User();


        ///login info
        $app->first_name = $request->first_name;
            $app->last_name = $request->last_name;
            $app->sexe = $request->sexe;
            $app->date = $request->date;
            $app->cin = $request->cin;
            $app->tel = $request->tel;
            $app->mail = $request->mail;
            $app->adresse = $request->adresse;
            $app->date_test = $request->date_test;

            $appl->name = $request->first_name;
            $appl->email = $request->mail;
            $tempPassword = Str::random(12);
            $appl->password = Hash::make($tempPassword);
            $appl->is_admin  = 2;
            $appl->save();
            MailController::sendSignupEmail($app->last_name , $app->first_name, $appl->email, $tempPassword);
            $app->save();
        return redirect('/testappointment')->with('success','Votre message a bien été envoyée. ');

    }

    public function date()
    {
        return date("Y-m-d").'T10:00';
    }

   public function appointmentview()
   {
       return view('admin.testapppage');
   }

    public function indexAppList()
    {
        return  Testreservation::where('mail',Auth::user()->email)->get();
    }

    public function updApp(Request $request,$id)
    {
        $app =Testreservation::find($id);
        $app->first_name = $request->first_name;
        $app->last_name = $request->last_name;
        $app->sexe = $request->sexe;
        $app->date = $request->date;
        $app->cin = $request->cin;
        $app->tel = $request->tel;
        $app->adresse = $request->adresse;
        $app->date_test = $request->date_test;
        $app->save();
    }

    public function deleteApp($id)
    {
        $app = Testreservation::find($id);
        $app->delete();
    }
    

   

   

}
