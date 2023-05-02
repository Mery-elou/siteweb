<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\store;

use App\Models\produit;
use App\Models\boutique;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class adminController extends Controller
{
    function clients(){
        $clients =user::all();
        return view('espace.admin.tousClient',compact('clients'));

    }

    function boutiques(){
        $boutiques =store::all();
        return view('espace.admin.tousBoutique',compact('boutiques'));
    }

    function produits(){
        //$produits = DB::table('produits')->join('users','users.id','=','produits.id_produit')->select('produits.*','users.name')->get();
        $produits = DB::table('produits')->get();
        return view('espace.admin.tousProduit',compact('produits'));
    }


    function check(Request $request){
        $request ->validate([
            'email' =>['required','email'/* ,'exists:admins,email' */],
            'password' =>['required','min:8'],
        ]);

        $creds = $request->only('email','password');
        if( Auth::guard('admin')->attempt($creds) ){
            return redirect()->route('admin.homeAdmin');
        }else{
            return redirect()->back()->with('fail','aucun utilisateur existe');
        }
    }
    public function delete_boutique($id){
        /*  $Produit->delete();
         //DB::delete('delete produits where name = ?', ['John']);

         return redirect()->route('Vos_Produit')->with('success_delet','le produit a ete supprimer');
         $produit = produit::where('id_produit', $id_produit)->firstorfail()->delete();
            return redirect()->route('Vos_Produit')->with('success_delet','le produit a ete supprimer');
     */
     DB::delete('delete from stores where id = ?',[$id]);
     return redirect()->back()->with('success_delet','la boutique a ete supprimer');
     }
}
