<?php

namespace App\Http\Controllers;

use App\Models\adresse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class adresseController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [

            'adresse' =>'required|max:255|regex:/(^[a-zA-Z]+[a-zA-Z\\" "\\,\\/]*$)/u',
        ]);

        $adresse = new adresse();
        $adresse->adresse =$request->adresse;
        $adresse->user_id=Auth::user()->id;
        $adresse->save();

        if( $adresse->save()) {
            return redirect()->back()->with('success','adresse a ete ajouter');
        }else{
            return redirect()->back()->with('fail','probleme d\'ajoute adresse');
        }
    }
    public function VosAdresse(){
        $adresses = DB::select('select * from adresses where user_id = ?', [Auth::user()->id]);
        //dd($produits);
        return view('espace.cliennt.ajouteradresse',compact('adresses'));
    }
    public function delete_adresse($id_adresse){
     DB::delete('delete from adresses where id_adresse = ?',[$id_adresse]);
     return redirect()->back()->with('success_delet','l\'adresse a ete supprimer');
     }
}
