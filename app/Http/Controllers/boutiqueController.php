<?php

namespace App\Http\Controllers;

use App\Models\admin;
use App\Models\store;
use App\Models\produit;
use App\Models\boutique;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class boutiqueController extends Controller
{
    public function index(){
        return view('Logins.cree_c_boutique');
    }
    public function indexajouter(){
        return view('espace.boutique.ajouer_Produit');
    }

    public function VosProduit(){
        $produits = DB::select('select * from produits where user_id = ?', [Auth::user()->id]);
        //dd($produits);
        return view('espace.cliennt.vos_produit',compact('produits'));
    }
    public function tout_produit(){
        $ProduitsOffres = DB::select('select * from produits where Quantite >? and old_prix <>? ',[0,0]);
        $toutProduits = DB::select('select * from produits where Quantite >? and old_prix = ?',[0,0]);
        $offres = DB::select('select * from Offres ');
        //dd($produits);
        return view('welcome',compact('toutProduits','offres','ProduitsOffres'));
    }
    public function produit_dates(){
        $produit_dates = DB::select('select * from produits where categorie = ?', ['tapi']);
        //dd($produits);
        return view('categories.Dates',compact('produit_dates'));
    }
    public function produit_Fruits_sec(){
        $produit_Fruits_sec = DB::select('select * from produits where categorie = ?', ['Fruits sec']);
        //dd($produits);
        return view('categories.Fruits_sec',compact('produit_Fruits_sec'));
    }
    public function produit_Huiles_Amlou(){
        $produit_Huiles_Amlou =DB::select('select * from produits where categorie = ?', ['Huiles & Amlou']);
        //dd($produits);
        return view('categories.Huiles_Amlou',compact('produit_Huiles_Amlou'));
    }
    public function produit_safran(){
        $produit_safran =DB::select('select * from produits where categorie = ?', ['safran']);
        //dd($produits);
        return view('categories.safran',compact('produit_safran'));
    }
    public function produit_Miels(){
        $produit_Miels =DB::select('select * from produits where categorie = ?', ['Miels']);
        //dd($produits);
        return view('categories.Miels',compact('produit_Miels'));
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
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [

            'name' =>'required|max:255|regex:/(^[a-zA-Z]+[a-zA-Z\\" "]*$)/u',
            'email' =>['required','email','unique:users',Rule::unique('boutiques','email')],
            'password' =>['required','min:8',],
            'password_confirmation' =>['required','min:8','same:password'],
            'Nom_Boutique' =>'required|max:255|regex:/(^[a-zA-Z]+[a-zA-Z0-9\\-\\_\\" "]*$)/u',
            'banque' =>'required|regex:/(^[1-9]+[0-9]*$)/u',
        ]);


        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator->errors());
        }
        $boutique = new store();
        $boutique->f_nam =$request->name;
        $boutique->email = $request->email;
        $boutique->password =Hash::make( $request->password );
        $boutique->nom_store = $request->Nom_Boutique ;
        $boutique->banque = $request->banque;
        $boutique->save();

        if( $boutique->save()) {
            $creds = $request->only('email','password');
          if( Auth::guard('store')->attempt($creds) ){
           return redirect()->route('store.homeStore');
           //return redirect()->back()->with('fail','aucun utilisateur existe');
        }
        }else{
            return redirect()->back()->with('fail','Error de creation de boutique');
        }
    }

    function check(Request $request){
        $request ->validate([
            'email' =>['required','email'],
            'password' =>['required','min:8'],
        ]);

        $creds = $request->only('email','password');

          if( Auth::guard('boutique')->attempt($creds) ){
           return redirect()->route('boutique.espaceBoutique');
           //return redirect()->back()->with('fail','aucun utilisateur existe');
        }else{
            return redirect()->back()->with('fail','aucun utilisateur existe');
        }

        /* $creds = $request->only('email','password');
        if( Auth::guard('admin')->attempt($creds) ){
            return redirect()->route('admin.homeAdmin');
        }else{
            return redirect()->back()->with('fail','aucun utilisateur existe');
        } */
        /* if (auth()->attempt(['email'=>$request->email,'password'=>$request->password])) {
             boutique::where('email','=',$request->email)->first();
            return redirect()->route('boutique.espaceBoutique')->with('boutiquesignin');
          } */

    }
    public function Ajout_Produit (Request $request)
    {
        /* $file_extension =$request ->image_produit ->getClientOriginalExtension();
        $file_name = time().'.'. $file_extension;
        $pathe = 'images/categories';
        $request ->image_produit ->move($pathe,$file_name);
         */
        $validator = Validator::make($request->all(), [


            'Nom_Produit' =>'required|max:255|regex:/(^[a-zA-Z]+[a-zA-Z\\-\\_\\" "]*$)/u',
            'categorie'   =>'required',
            'prix' =>'required|regex:/(^[1-9]+[0-9]*$)/u',
            'Quantite' =>'required|regex:/(^[1-9]+[0-9]*$)/u',
            //'image_produit' =>'required',
            'image_produit' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',

        ]);


        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator->errors());
        }
        $file_extension =$request ->image_produit ->getClientOriginalExtension();
        $file_name = time().'.'. $file_extension;
        $pathe = 'images/categories';
        $request ->image_produit ->move($pathe,$file_name);


        $Produit = new produit();
        $Produit->nom_Produit =$request->Nom_Produit;
        $Produit->prix = $request->prix;
        $Produit->Quantite = $request->Quantite ;
        $Produit->categorie = $request->categorie;
        $Produit->Description=$request->Description;
        $Produit->path = $file_name;
        $Produit->user_id=Auth::user()->id;
        $Produit->save();

        if( $Produit->save() ){
            return redirect()->back()->with('success','le produit a ete ajouter');
        }else{
            return redirect()->back()->with('fail','probleme d\'ajoute produit');
        }





    }
}
