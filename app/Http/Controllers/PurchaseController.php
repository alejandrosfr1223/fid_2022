<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Config;
use Illuminate\Support\Facades\DB;
use Stripe\Stripe;
use Stripe\Charge;

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

    function stripePost(Request $request){

        Stripe::setApiKey(env('STRIPE_SECRET'));

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
        }
      
        //Session::flash('success', 'Payment successful!');
              
        //return back();
    }
}
