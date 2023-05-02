<?php

namespace App\Http\Controllers;

use App\Models\boutique;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class boutiqueController extends Controller
{
    public function index(){
        return view('Logins.cree_c_boutique');
    }

   /* public function getInscrire(){
        request()->validate([
            'nome' =>'required',
            'prenome' =>'required',
            'email' =>['required','email','unique:users'],
            'passworde' =>['required','min:8',],
            'nom_boutique' =>'required',
            'banque' =>['required'],
        ]);

        $boutique = new boutique();
        $boutique->b_nom = request('nome');
        $boutique->b_prenom = request('prenome');
        $boutique->b_email = request('email');
        $boutique->b_password =Hash::make( request('passworde'));
        $boutique->nom_boutique = request('nom_boutique');
        $boutique->banque = request('banque');
        $boutique->save();


    }*/
}