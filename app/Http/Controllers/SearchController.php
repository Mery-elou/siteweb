<?php

namespace App\Http\Controllers;

use App\Models\produit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
  
      
    public function searchresult(Request $request){
        $query = $request->input('query');
        $produits = produit::where('nom_produit', 'LIKE', "%$query%")->get();
        //DB::delete('delete from produits where id_produit =2');
        return view('searchresult', compact('produits'));
        
    }
}