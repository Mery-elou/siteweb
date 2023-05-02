<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\client;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\Console\Input\Input;


class clientController extends Controller

{
    public function index(){
        return view('auth.register');
    }

    /*public function getInscrire(){
        $validator=request()->validate([
            'nom' =>['required','alpha'],
            'prenom' =>['required','alph'],
            'email' =>['required','email','unique:users'],
            'password' =>['required','min:8',],
        ]);

        $client = new client();
        $client->c_nom = request('nom');
        $client->c_prenom = request('prenom');
        $client->c_email = request('email');
        $client->c_password =Hash::make( request('password'));
        $client->save();

        return redirect('/');
    }*/

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nom' =>'required|max:255|regex:/(^[a-zA-Z]+[a-zA-Z\\" "]*$)/u',
            'prenom' =>'required|max:255|regex:/(^[a-zA-Z]+[a-zA-Z]*$)/u',
            'email' =>['required','unique:users','email',Rule::unique('clients','c_email')],
            'password' =>['required','min:8'],
        ]);


        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator->errors());
        }

       else { $client = new client();
        $client->c_nom = request('nom');
        $client->c_prenom = request('prenom');
        $client->c_email = request('email');
        $client->c_password =Hash::make( request('password'));
        $client->save();

        return redirect('/');
       }
    }

    public function VosCommendes(){
        $commendes = DB::select('select * from commendes where user_id = ?', [Auth::user()->id]);
        //dd($produits);
        return view('espace.cliennt.vosCommendes',compact('commendes'));
    }
    public function delete_commendee($id_commende){
        /*  $Produit->delete();
         //DB::delete('delete produits where name = ?', ['John']);

         return redirect()->route('Vos_Produit')->with('success_delet','le produit a ete supprimer');
         $produit = produit::where('id_produit', $id_produit)->firstorfail()->delete();
            return redirect()->route('Vos_Produit')->with('success_delet','le produit a ete supprimer');
     */
     DB::delete('delete from commendes where id_commende = ?',[$id_commende]);
     return redirect()->route('Vos_Commendes')->with('success_delet','la commande a été supprimer');
     }
    public function delete_boutique($id){
        /*  $Produit->delete();
         //DB::delete('delete produits where name = ?', ['John']);

         return redirect()->route('Vos_Produit')->with('success_delet','le produit a ete supprimer');
         $produit = produit::where('id_produit', $id_produit)->firstorfail()->delete();
            return redirect()->route('Vos_Produit')->with('success_delet','le produit a ete supprimer');
     */
     DB::delete('delete from stores where id = ?',[$id]);
     return redirect()->route('admin.boutiques')->with('success_delet','la boutique a été supprimer');
     }

}
