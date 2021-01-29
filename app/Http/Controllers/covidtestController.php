<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Usersociete;

use App\User;

use App\Account;

use App\Testreservation;

use Illuminate\Support\Facades\Hash;

class covidtestController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin')->except('indexUser');
    }

    public function companyUsers($id ,Request $request)
    {
        $request->session()->put('id',$id);
        return view("adminacc.listCompany");
    }

    public function indexUser()
    {
        return view("loginsociete");
    }



    // ======================= Ciprotec accounts managment ======================= //
    public function indexCreateLogin()
    {
        return view("admin.createlogin");
    }

    public function indexUserSocieteList()
    {
        return User::where('is_admin', 0)->latest()->get();
    }

    public function createUserSociete(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'password_confirmation' => 'required|same:password'
        ],
        ['required' => 'Ce champ est obligatoire',
          'email' => 'Cette adresse email est invalide',
          'password_confirmation.same' => 'La confirmation du mot de passe doit correspondre au mot de passe',

        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
    }

    public function updateUserSociete(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            // 'password' => 'required',
        ],
        ['required' => 'Ce champ est obligatoire']);

        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();
    }

    public function deleteUserSociete($id)
    {
        for($i = 0 ; $i< Account::count() ; $i++ ){
            Account::where('user_id',$id )->delete();
        }

        $user = User::find($id);
        $user->delete();
    }

    // ======================= Gestion Account ======================= //

    public function indexAllAccountList()
    {
        return view('adminacc.listAccounts');
    }

    public function indexAllAccount()
    {
        return Account::latest()->with('user')->get();
    }

    public function updateStauts(Request $request,$id)
    {
        $status = Account::find($id);
        $status->status = $request->status;

        if($status->status)
            $status->date_v = date('d-m-y H:i:s', strtotime('1 hour'));
        else
            $status->date_v = "";

        $status->save();
    }
    // ======================= Gestion Rendez-vous ======================= //

    public function appointmentview()
    {
        return view('admin.testapppage');
    }

    public  function latestrdv()
    {
        return Testreservation::latest()->paginate(3);
    }

    public function appointmentAdminview()
    {
        return view('admin.testadminpage');
    }

    public function indexAllAppList()
    {
        return  Testreservation::latest()->get();
    }

    public function updateStautsApp(Request $request,$id)
    {
        $status = Testreservation::find($id);
        $status->status = $request->status;

        if($status->status)
            $status->date_v = date('d-m-y H:i:s', strtotime('1 hour'));
        else
            $status->date_v = "";

        $status->save();
    }

    public function companyUsersList()
    {
        $id = session()->get('id');
        return Account::where('user_id', $id)->get();
    }
    public function getDSession()
    {
        $id = session()->get('id');
        return $id;
    }


}
