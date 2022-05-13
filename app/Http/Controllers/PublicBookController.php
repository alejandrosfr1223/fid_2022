<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class PublicBookController extends Controller
{
    function show(){
    	$books= Book::all();
    	return view('diffusion.editorialbv', ["books"=>$books]);
    }
}
