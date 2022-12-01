<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function showProducts()
    {
        $productos = Product::all();
        return view('services.services', ["productos"=>$productos]);
    }
}
