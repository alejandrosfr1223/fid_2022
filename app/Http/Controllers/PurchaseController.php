<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        if ($id === "0"){
            $suscripcion["nombre"] = "Nivel 1";
            $suscripcion["proyecto"] = "FID";
            $suscripcion["precio"] = 50;
        } else if ($id === "1"){
            $suscripcion["nombre"] = "Nivel 2";
            $suscripcion["proyecto"] = "FID";
            $suscripcion["precio"] = 50;
        } else if ($id === "2"){
            $suscripcion["nombre"] = "Nivel 3";
            $suscripcion["proyecto"] = "FID";
            $suscripcion["precio"] = 50;
        } else if ($id === "3"){
            $suscripcion["nombre"] = "Nivel 1";
            $suscripcion["proyecto"] = "DPA";
            $suscripcion["precio"] = 50;
        } else if ($id === "4"){
            $suscripcion["nombre"] = "Nivel 2";
            $suscripcion["proyecto"] = "DPA";
            $suscripcion["precio"] = 50;
        } else if ($id === "5"){
            $suscripcion["nombre"] = "Nivel 3";
            $suscripcion["proyecto"] = "DPA";
            $suscripcion["precio"] = 50;
        } else if ($id === "6"){
            $suscripcion["nombre"] = "Nivel 1";
            $suscripcion["proyecto"] = "JDR";
            $suscripcion["precio"] = 50;
        } else if ($id === "7"){
            $suscripcion["nombre"] = "Nivel 2";
            $suscripcion["proyecto"] = "JDR";
            $suscripcion["precio"] = 50;
        } else if ($id === "8"){
            $suscripcion["nombre"] = "Nivel 3";
            $suscripcion["proyecto"] = "JDR";
            $suscripcion["precio"] = 50;
        } else {
            return view('services.services');
        }
        return view('purchase.subscriptions', ["suscripcion"=>$suscripcion]);
    }
}
