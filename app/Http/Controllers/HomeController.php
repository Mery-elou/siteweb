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


class HomeController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    public function index(){
        $produits = DB::select('select * from produits ');
        return view('home');
    }
    public function about(){
        return view('about');
    }
    public function contact(){
        return view('contact');
    }
    public function products(){
        $produit = DB::select('select * from produits ');
        return view('products');
        
    }
    public function client(){
        return view ('connexion');
    }


public function bijou(){
    return view('bijou');
}
public function coussin(){
    return view('coussin');
}
public function metal(){
    return view('metal');
}
public function nappe(){
    return view ('nappe');
}
public function poterie(){
    return view('poterie');
}
public function pouf(){
    return view('pouf');
}
public function sac(){
    return view('sac');  
}
public function tapi(){
    return view ('tapi');
}
}