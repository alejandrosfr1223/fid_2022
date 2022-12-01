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

        if ($data[0]["id_proyectsub"] == 0){
            $name = "FID";
            $tablename = "level_fidsub";
            if ($data[0]["levelsub"] == 1){
                $pid = "price_1MAD8UIevP8MvOlWFH5GpEi3";
            }
            if ($data[0]["levelsub"] == 2){
                $pid = "price_1MAD8UIevP8MvOlWKA1JbeCf";
            }
            if ($data[0]["levelsub"] == 3){
                $pid = "price_1MAD8UIevP8MvOlWsZFJ4wg1";
            }
        }

        if ($data[0]["id_proyectsub"] == 1){
            $name = "Proyecto Divina Pastora de las Almas";
            $tablename = "level_dpasub";
        }

        if ($data[0]["id_proyectsub"] == 2){
            $name = "Proyecto Juan del Rincon";
            $tablename = "level_jdrsub";
        }

        try {

            Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
            
            if (is_null($user->stripe_id)) {
                $stripeCustomer = $user->createAsStripeCustomer();
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
