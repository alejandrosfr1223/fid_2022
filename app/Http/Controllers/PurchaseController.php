<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Config;
use Illuminate\Support\Facades\DB;
use Stripe;

class PurchaseController extends Controller
{
    function buyservice($id){
        $servicio = [];
        if ($id === "0"){
            $servicio["nombre"] = "Arbol Genealógico";
            $servicio["precio"] = 50;
        } else if ($id === "1"){
            $servicio["nombre"] = "Libro de Familia";
            $servicio["precio"] = 50;
        } else {
            return view('services.services');
        }
        return view('purchase.services', ["servicio"=>$servicio]);
    }

    function buysubscription($id){
        $suscripcion = [];    

        $data = Product::find($id);    

        $suscripcion = json_decode(json_encode($data),true);

        return view('purchase.subscriptions', ["suscripcion"=>$suscripcion]);
    }

    function stripePostProductos(Request $request){

        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        $infoproyect = json_decode(json_encode($request->all()),true);

        $data = json_decode(json_encode(DB::table('products')->where('id', $infoproyect['idproducto'])->get()),true);

        if ($data[0]["id_proyectsub"] == 0){
            $name = "FID";
            $tablename = "level_fidsub";
        }

        if ($data[0]["id_proyectsub"] == 1){
            $name = "Proyecto Divina Pastora de las Almas";
            $tablename = "level_dpasub";
        }

        if ($data[0]["id_proyectsub"] == 2){
            $name = "Proyecto Juan del Rincon";
            $tablename = "level_jdrsub";
        }

        $charged = Charge::create ([
                "amount" => $data[0]["price"]*100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Suscripcion: " . $name . ". Nivel " . $data[0]["levelsub"] . "."
        ]);

        if ($charged->status == "succeeded"){
            $affected = DB::table('users')->where('id', auth()->user()->id)->update([$tablename => $data[0]["levelsub"]]);
            return redirect()->route('services.home')->with("payment", 'Su pago ha sido procesado correctamente.')->with("paymenturl", $charged["receipt_url"]);
        }
      
        //Session::flash('success', 'Payment successful!');
              
    }

    function stripePost(Request $request){

        $user = auth()->user();
        $input = $request->all();
        $token =  $request->stripeToken;
        $paymentMethod = $request->paymentMethod;

        $infoproyect = json_decode(json_encode($request->all()),true);

        $data = json_decode(json_encode(DB::table('products')->where('id', $infoproyect['idproducto'])->get()),true);

        $name = $data[0]["nameproject"];
        $tablename = $data[0]["idtableaffected"];
        $pid = $data[0]["priceidstripe"];

        $dataci = json_decode(json_encode(DB::table('products')->where('idtableaffected', $data[0]["idtableaffected"])->get()),true);

        $checkif = array();

        foreach ($dataci as $i){
            $checkif[] = $i["priceidstripe"];
        }

        try {

            Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
            
            if (is_null($user->stripe_id)) {
                $stripeCustomer = $user->createAsStripeCustomer();
            } else {
                $stripe = new \Stripe\StripeClient((env('STRIPE_SECRET')));
            
                $subsuser = $stripe->subscriptions->all(['customer' => $user->stripe_id]);

                $a = 0;

                foreach ($subsuser["data"] as $i) {
                    if (in_array($i["plan"]["id"], $checkif) && in_array($pid, $checkif)) {
                        
                        $subscription = $stripe->subscriptions->retrieve($i["id"]);
                        $stripe->subscriptions->update( $subscription->id, [
                            'cancel_at_period_end' => false,
                            'proration_behavior' => 'create_prorations',
                            'items' => [
                                [
                                    'id' => $subscription->items->data[0]->id,
                                    'price' => $pid,
                                ],
                            ],
                        ]);

                        $a = $a + 1;

                        break;
                    }
                }

                if ($a > 0){
                    $affected = DB::table('users')->where('id', auth()->user()->id)->update([$tablename => $data[0]["levelsub"]]);
                    return redirect()->route('services.home')->with("payment", 'Su suscripción ha sido actualizada correctamente.');
                }
            }

            \Stripe\Customer::createSource(
                $user->stripe_id,
                ['source' => $token]
            );

            $user->newSubscription("default",$pid)
                ->create($paymentMethod, [
                'email' => $user->email,
            ]);

            $affected = DB::table('users')->where('id', auth()->user()->id)->update([$tablename => $data[0]["levelsub"]]);
            return redirect()->route('services.home')->with("payment", 'Su suscripción ha sido procesada correctamente.');
        } catch (Exception $e) {
            return back()->with('success',$e->getMessage());
        }
        
      
        //Session::flash('success', 'Payment successful!');
              
    }
}
