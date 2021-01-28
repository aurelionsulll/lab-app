<?php

namespace App\Http\Controllers;

use App\Account;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{

   public function __construct()
   {
       $this->middleware('account');
   }

    public function indexAddUserToCompany()
    {
        return view("adminacc.addUserToCompany");
    }

    public function indexAccountList()
    {
        if(Auth::user()->is_admin)
        {
            return Account::latest()->get();
        }
        return Account::where('user_id',Auth::id())->latest()->get();
    }

    public function indexAllAccount()
    {
        return Account::latest()->with('user')->get();
    }

    public function indexAllAccountList()
    {
        return view('adminacc.listAccounts');
    }

    public function createAccount(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required|',
            'tel' => 'required|numeric',
            'date' => 'required|date',
            'cin' => 'required|',
            'adresse' => 'required',
            'date_test' => 'required|date',
            'sexe' => 'required|',
            'pos' => 'required',
            'patient_type' => 'required',
            'resultat' => 'required',
            'mail' => 'required|email',
            'voyageur' => 'required'
        ],
        [
            'required' => 'Ce champ est obligatoire',
            'email' => 'Cette adresse email est invalide',
            'numeric' => 'Le téléphone doit être un numéro',
            'date' => 'La date doit être au format de date'

        ]);

        $account = new Account();
        $account->user_id = Auth::id();
        $account->first_name = $request->first_name;
        $account->last_name = $request->last_name;
        $account->tel = $request->tel;
        $account->date = $request->date;
        $account->cin = $request->cin;
        $account->adresse = $request->adresse;
        $account->date_test = $request->date_test;
        $account->sexe = $request->sexe;
        $account->status = 0;
        $account->pos = $request->pos;
        $account->patient_type = $request->patient_type;
        $account->mail = $request->mail;
        if($request->voyageur == 'oui')
        {
            $account->date_voyage = $request->date_voyage;
        }
        elseif($request->voyageur == 'non')
        {
            $account->date_voyage = null;
        }
        $account->voyageur = $request->voyageur;
        $account->resultat = $request->resultat;
        $account->save();
    }

    public function updateAccount(Request $request, $id)
    {
        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required|',
            'tel' => 'required|numeric',
            'date' => 'required|date',
            'cin' => 'required|',
            'adresse' => 'required',
            'date_test' => 'required|date',
            'sexe' => 'required|',
            'pos' => 'required',
            'patient_type' => 'required',
            'resultat' => 'required',
            'mail' => 'required|email',
            'voyageur' => 'required'
        ],
        [
            'required' => 'Ce champ est obligatoire',
            'email' => 'Cette adresse email est invalide',
            'numeric' => 'Le téléphone doit être un numéro',
            'date' => 'La date doit être au format de date'

        ]);
        $account = Account::find($id);
        $account->first_name = $request->first_name;
        $account->last_name = $request->last_name;
        $account->tel = $request->tel;
        $account->date = $request->date;
        $account->cin = $request->cin;
        $account->adresse = $request->adresse;
        $account->date_test = $request->date_test;
        $account->sexe = $request->sexe;
        $account->pos = $request->pos;
        $account->patient_type = $request->patient_type;
        $account->mail = $request->mail;
        $account->voyageur = $request->voyageur;
        $account->resultat = $request->resultat;
        if($request->voyageur == 'oui')
        {
            $account->date_voyage = $request->date_voyage;
        }
        elseif($request->voyageur == 'non')
        {
            $account->date_voyage = null;
        }
        $account->save();
    }

    public function deleteAccount($id)
    {
        $account = Account::find($id);
        $account->delete();
    }


}

