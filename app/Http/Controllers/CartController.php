<?php

namespace App\Http\Controllers;

use App\Models\produit;
use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{

    //return cart items

    public function index(){
        //"items" => \Cart::getContent();
         $Vosadresse = DB::select('select * from adresses where user_id = ?', [Auth::user()->id]);
        return view("Cart.panier",compact('Vosadresse'))->with([
            "items" => \Cart::getContent()
        ]);
    }


    //add item to cart
    public function AddProduitToCart (Request $request){
        \Cart::add(array(
            'id' =>  $request->id,
            'name' => $request->name,
            'price' =>$request->price,
            'quantity' => $request->quantity,
            'attributes' => array(),
            'associatedModel' => $request->image
        ));

        return redirect()->back()->with('success','le produit a été bien ajouter au panier');

    }
    //update item to cart
    public function updateProduitFromCart(Request $request,produit $produit){
         
        \Cart::update($request->id, array(
            'quantity' => array(
                'relative' => false,
                'value' => $request->quantity,
            ),
          ));
          return redirect()->back()->with('success','le produit a été bien modifier');

    }
    //remove item from cart
    public function removeProduitFromCart(Request $request){
        \Cart::remove($request->id);
          return redirect()->back()->with('success','le produit a été bien supprimer');

    }

}
