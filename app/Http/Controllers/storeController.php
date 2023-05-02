<?php

namespace App\Http\Controllers;

use App\Models\offre;
use App\Models\produit;
use app\Models\store;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class storeController extends Controller
{
    /* function check(Request $request){
        $request ->validate([
            'email' =>['required','email'],
            'password' =>['required','min:8'],
        ]);

        $creds = $request->only('email','password');
        if( Auth::guard('admin')->attempt($creds) ){
            return redirect()->route('store.homeStore');
        }else{
            return redirect()->back()->with('fail','aucun utilisateur existe');
        }
    } */
    public function offre(){
        return view('espace.store.offre');
    }
    function check(Request $request){
        $request ->validate([
            'email' =>['required','email'/* ,'exists:admins,email' */],
            'password' =>['required','min:8'],
        ]);

        $creds = $request->only('email','password');
        if( Auth::guard('store')->attempt($creds) ){
            return redirect()->route('store.homeStore');
        }else{
            return redirect()->back()->with('fail','aucun utilisateur existe');
        }
    }
    public function update_boutique(Request $request){

        $validator = Validator::make($request->all(), [

            'nom' =>'required|max:255|regex:/(^[a-zA-Z]+[a-zA-Z\\" "]*$)/u',
            'nom_boutique' =>'required|max:255|regex:/(^[a-zA-Z]+[a-zA-Z\\" "]*$)/u',
            'email' =>['required','email'],
            'adresse' =>'required|max:255|regex:/(^[a-zA-Z]+[a-zA-Z0-9\\-\\_\\" "\\,]*$)/u',
            'banque' =>'required|regex:/(^[1-9]+[0-9]*$)/u',
            'phone' =>'required|regex:/(^[0][5-6]+[0-9]*8)/u',
            'image'=> 'required',


        ]);

        if ($validator->fails()) {
            return redirect()->route('store.homeStore')->with('fail_update','probleme de modification');
        }
        $file_extension =$request->file('image')->getClientOriginalExtension();
        $file_name = time().'.'. $file_extension;
        $pathe = 'images/profile';
        $request->file('image')->move($pathe,$file_name);

        $id= Auth::user()->id ;
        $name =$request->input('nom');
        $name_boutique =$request->input('nom_boutique');
        $email = $request->input('email');
        $adresse = $request->input('adresse');
        $compteBancaire = $request->input('banque');
        $phone = $request->input('phone');
        $image = $file_name;



        DB::update('update stores set f_nam =?,email =?,adresse =?,banque =?,phone =?,image=? where id = ?', [ $name,$email,$adresse, $compteBancaire,$phone,$image,$id]);
        return redirect()->route('store.homeStore')->with('success_update','la modification a ete enregistrer');
    }
    public function ajouter_offre(Request $request){

        $validator = Validator::make($request->all(), [

            'code' =>['required',Rule::unique('offres','code')],
            'Type' =>'required',
            'image_offre'=> 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',


        ]);

        if ($validator->fails()) {
            return redirect()->route('store.offre')->with('fail_offre','probleme de saisie des donnes');
        }
        $file_extension =$request->file('image_offre')->getClientOriginalExtension();
        $file_name = time().'.'. $file_extension;
        $pathe = 'images/offres';
        $request->file('image_offre')->move($pathe,$file_name);

        $offre = new offre();
        $offre->code =$request->code;
        $offre->type = $request->Type;
        $offre->image = $file_name;
        $offre->boutique =Auth::user()->id;
        $offre->save();
        /* if( $offre->save()) {
            return redirect()->back()->with('success','Offre a ete bien Ajouter');
        }else{
            return redirect()->back()->with('fail','probleme d\'ajoute offre');
        } */
        if( $offre->type=='-10%') {
             $id=Auth::user()->id;
            $old_prix = DB::select('select * from produits where user_id = ?', [Auth::user()->id]);
            foreach($old_prix as $p){
            $id_p=$p->id_produit;
            $prix = $p->prix;
            $new_prix=$prix*0.9;
            DB::update('update produits set prix =?,old_prix=? where user_id = ? and id_produit=?', [$new_prix ,$prix,$id,$id_p]);}
           return redirect()->back()->with('success','Offre a ete bien Ajouter');

        }else if( $offre->type=='-20%') {
            $id=Auth::user()->id;
           $old_prix = DB::select('select * from produits where user_id = ?', [Auth::user()->id]);
           foreach($old_prix as $p){
           $id_p=$p->id_produit;
           $prix = $p->prix;
           $new_prix=$prix*0.8;
           DB::update('update produits set prix =?,old_prix=? where user_id = ? and id_produit=?', [$new_prix ,$prix,$id,$id_p]);}
          return redirect()->back()->with('success','Offre a ete bien Ajouter');

        }else if( $offre->type=='-30%') {
                $id=Auth::user()->id;
            $old_prix = DB::select('select * from produits where user_id = ?', [Auth::user()->id]);
            foreach($old_prix as $p){
            $id_p=$p->id_produit;
            $prix = $p->prix;
            $new_prix=$prix*0.7;
            DB::update('update produits set prix =?,old_prix=? where user_id = ? and id_produit=?', [$new_prix ,$prix,$id,$id_p]);}
            return redirect()->back()->with('success','Offre a ete bien Ajouter');

        }else if( $offre->type=='-50%') {
                $id=Auth::user()->id;
            $old_prix = DB::select('select * from produits where user_id = ?', [Auth::user()->id]);
            foreach($old_prix as $p){
            $id_p=$p->id_produit;
            $prix = $p->prix;
            $new_prix=$prix*0.5;
            DB::update('update produits set prix =?,old_prix=? where user_id = ? and id_produit=?', [$new_prix ,$prix,$id,$id_p]);}
            return redirect()->back()->with('success','Offre a ete bien Ajouter');

        }else if( $offre->type=='-5%') {
                $id=Auth::user()->id;
            $old_prix = DB::select('select * from produits where user_id = ?', [Auth::user()->id]);
            foreach($old_prix as $p){
            $id_p=$p->id_produit;
            $prix = $p->prix;
            $new_prix=$prix*0.95;
            DB::update('update produits set prix =?,old_prix=? where user_id = ? and id_produit=?', [$new_prix ,$prix,$id,$id_p]);}
            return redirect()->back()->with('success','Offre a ete bien Ajouter');

    }else{
            return redirect()->back()->with('fail','probleme d\'ajoute offre');
        }

    }


}
