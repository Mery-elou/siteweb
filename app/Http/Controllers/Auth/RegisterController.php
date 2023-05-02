<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\adresse;
use App\Models\produit;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' =>'required|max:255|regex:/(^[a-zA-Z]+[a-zA-Z\\" "]*$)/u',
            'email' =>['required','unique:users','email',Rule::unique('users','email')],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function update_user(Request $request){

        $validator = Validator::make($request->all(), [

            'nom' =>'required|max:255|regex:/(^[a-zA-Z]+[a-zA-Z\\" "]*$)/u',
            'email' =>['required','email'],
            'adresse' =>'required|max:255|regex:/(^[a-zA-Z]+[a-zA-Z0-9\\-\\_\\" "\\,]*$)/u',
            'banque' =>'required|regex:/(^[1-9]+[0-9]*$)/u',
            'age' =>'required',
            'image'=> 'required',


        ]);

        if ($validator->fails()) {
            return redirect()->route('espace_client')->with('fail_update','probleme de modification');
        }
        $file_extension =$request->file('image')->getClientOriginalExtension();
        $file_name = time().'.'. $file_extension;
        $pathe = 'images/profile';
        $request->file('image')->move($pathe,$file_name);

        $id= Auth::user()->id ;
        $name =$request->input('nom');
        $email = $request->input('email');
        $adressse = $request->input('adresse');
        $compteBancaire = $request->input('banque');
        $sexe = $request->input('optradio');
        $age = $request->input('age');
        $image = $file_name;

        $adresse = new adresse();
        $adresse->adresse =$request->adresse;
        $adresse->user_id=Auth::user()->id;
        $adresse->save();


        DB::update('update users set name =?,email =?,adresse =?,compteBancaire =?,sexe =?,age =?,image=? where id = ?', [ $name,$email,$adressse, $compteBancaire,$sexe,$age,$image,$id]);
        return redirect()->route('espace_client')->with('success_update','la modification a ete enregistrer');
    }
     public function delete_produit($id_produit){
       /*  $Produit->delete();
        //DB::delete('delete produits where name = ?', ['John']);

        return redirect()->route('Vos_Produit')->with('success_delet','le produit a ete supprimer');
        $produit = produit::where('id_produit', $id_produit)->firstorfail()->delete();
           return redirect()->route('Vos_Produit')->with('success_delet','le produit a ete supprimer');
    */
    DB::delete('delete from produits where id_produit = ?',[$id_produit]);
    return redirect()->route('store.Vos_Produit')->with('success_delet','le produit a ete supprimer');
    }
    public function delete_boutique($id){
        /*  $Produit->delete();
         //DB::delete('delete produits where name = ?', ['John']);

         return redirect()->route('Vos_Produit')->with('success_delet','le produit a ete supprimer');
         $produit = produit::where('id_produit', $id_produit)->firstorfail()->delete();
            return redirect()->route('Vos_Produit')->with('success_delet','le produit a ete supprimer');
     */
     DB::delete('delete from stores where id = ?',[$id]);
     return redirect()->route('admin.boutiques')->with('success_delet','le produit a ete supprimer');
     }



}
