<?php

namespace App\Http\Controllers;
use App\Models\produit;

use App\Models\commende;
use Darryldecode\Cart\Cart;
use GuzzleHttp\Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Srmklive\PayPal\Services\ExpressCheckout;

class PaymentController extends Controller
{
    public function _construct(){
         $this->Middleware("auth");
    }
    public function handlePayment(){
        $data = [];
        $data['items'] = [];

        foreach(\Cart::getContent() as $item){
            array_push($data['items'],[
                'name' =>$item->name,
                'price' =>round( $item->price/9, 2),

                'qty'=>$item->quantity,

            ]);
        }

        $data['invoice_id'] = Auth()->user()->id;
        $data['invoice_description'] = "Commande #{$data['invoice_id']} Invoice";
        $data['return_url'] =route('success.payment'); /* url('/payment/success'); */
        $data['cancel_url'] = route('cancel.payment');

        $total = 0;
            foreach($data['items'] as $item) {
                $total += $item['price']*$item['qty'];
        }

        $data['total'] = $total;
        $paypalModule = new ExpressCheckout;
        $res = $paypalModule->setExpressCheckout($data);
        $res = $paypalModule->setExpressCheckout($data,true);

        return redirect($res['paypal_link']);

        //give a discount of 10% of the order amount
        //$data['shipping_discount'] = round((10 / 100) * $total, 2);
    }
    public function cancelPayment(){
        return redirect()->route('panier')->with('fail','vous annuler le paiment');

    }
    public function PaymentSuccess(Request $request){
        $paypalModule = new ExpressCheckout;
        $response =$paypalModule->getExpressCheckoutDetails($request->token);
        if(in_array(strtoupper($response['ACK']),['SUCCESS','SUCCESSWITHWARNING'])){
             foreach(\Cart::getContent() as $item){
                commende::create([

                    "prix" => $item->price,
                    "nom_produit" =>$item->name,
                    "Quantite" => $item->quantity ,
                    "user_id" => Auth()->user()->id,
                    "path" => $item->associatedModel,

                ]);
            $id =$item->id;
            $old_qty= DB::select('select * from produits where id_produit = ?', [$id]);
            foreach($old_qty as $p){
            $new_qty = $p->Quantite - $item->quantity;
            DB::update('update produits set Quantite =? where  id_produit=?', [$new_qty ,$id]);}
            }
            \Cart::clear();
        }

        return redirect()->route('panier')->with('success','paiment effectue avec succes');

    }
}
