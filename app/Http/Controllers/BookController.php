<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.crud.books.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $book = new Book();
        return view('admin.crud.books.create', compact('book'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validación
        $request->validate([
            'titulo' => 'required|max:254',
            'enlace' => 'required',
            'img_1' => ['nullable', 'mimes:jpg,jpeg,png', 'max:4096'],
            'img_2' => ['nullable', 'mimes:jpg,jpeg,png', 'max:4096'],
            'img_3' => ['nullable', 'mimes:jpg,jpeg,png', 'max:4096'],
            'img_4' => ['nullable', 'mimes:jpg,jpeg,png', 'max:4096'],
            /*
            'autor',
            'editorial',
            'edicion',
            'paginas',
            'isbn',
            'url_img_caratula',
            'notas'
            */
        ]);

        $input = $request->all();

        $preurl = "https://appfid-bucket-s3.s3.amazonaws.com/";

        $temp1 = null;
        if($request->hasFile('img_1')){
            $temp1 = Storage::disk('s3')->put('carrucellibros', $request->file('img_1'), 'public');
            $input["img_1"] = $preurl.$temp1;
        }

        $temp2 = null;
        if($request->hasFile('img_2')){
            $temp2 = Storage::disk('s3')->put('carrucellibros', $request->file('img_2'), 'public');
            $input["img_2"] = $preurl.$temp2;
        }

        $temp3 = null;
        if($request->hasFile('img_3')){
            $temp3 = Storage::disk('s3')->put('carrucellibros', $request->file('img_3'), 'public');
            $input["img_3"] = $preurl.$temp3;
        }

        $temp4 = null;
        if($request->hasFile('img_4')){
            $temp4 = Storage::disk('s3')->put('carrucellibros', $request->file('img_4'), 'public');
            $input["img_4"] = $preurl.$temp4;
        }

        $input["clasific"] = json_encode($request->clasific);
        $input["disponib"] = json_encode($request->disponib);

        if (!isset($input["disponib"])){
            $input["disponib"] = [];
        }

        if (!isset($input["clasific"])){
            $input["clasification"] = [];
        }
        
        // almacenando libro
        $book = Book::create($input);

        // Mensaje
        Alert::success('¡Éxito!', 'Se ha creado el libro: ' . $request->titulo);

        // Redireccionar a la vista index
        return redirect()->route('admin.books.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        return view('admin.crud.books.edit', compact('book'));
    }

    function showBooks(){
    	$books = Book::all();
    	return view('diffusion.editorialbv', ["books"=>$books]);
    }

    function showDigs(){
        $books = Book::all();
        return view('documentation.dig_books', ["books"=>$books]);
    }

    function showBookInfo($id){
        $book = Book::find($id);
        return view('diffusion.bookbv', ["book"=>$book]);
    }

    function showDigInfo($id){
        $book = Book::find($id);
        return view('documentation.bookdig', ["book"=>$book]);
    }

    function showInvest(){
    	$books= Book::all();
    	return view('investigation.hist_unit', ["books"=>$books]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        return view('admin.crud.books.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {

        // Validación
        $request->validate([
            'titulo' => 'required|max:254',
            'enlace' => 'required',
            'img_1' => ['nullable', 'mimes:jpg,jpeg,png', 'max:4096'],
            'img_2' => ['nullable', 'mimes:jpg,jpeg,png', 'max:4096'],
            'img_3' => ['nullable', 'mimes:jpg,jpeg,png', 'max:4096'],
            'img_4' => ['nullable', 'mimes:jpg,jpeg,png', 'max:4096'],
            /*
            'autor',
            'editorial',
            'edicion',
            'paginas',
            'isbn',
            'url_img_caratula',
            'notas'
            */
        ]);

        $input = $request->all();

        $preurl = "https://appfid-bucket-s3.s3.amazonaws.com/";

        $temp1 = null;
        if($request->hasFile('img_1')){
            $temp1 = Storage::disk('s3')->put('carrucellibros', $request->file('img_1'), 'public');
            $input["img_1"] = $preurl.$temp1;
        }

        $temp2 = null;
        if($request->hasFile('img_2')){
            $temp2 = Storage::disk('s3')->put('carrucellibros', $request->file('img_2'), 'public');
            $input["img_2"] = $preurl.$temp2;
        }

        $temp3 = null;
        if($request->hasFile('img_3')){
            $temp3 = Storage::disk('s3')->put('carrucellibros', $request->file('img_3'), 'public');
            $input["img_3"] = $preurl.$temp3;
        }

        $temp4 = null;
        if($request->hasFile('img_4')){
            $temp4 = Storage::disk('s3')->put('carrucellibros', $request->file('img_4'), 'public');
            $input["img_4"] = $preurl.$temp4;
        }

        if (!isset($input["disponib"])){
            $input["disponib"] = [];
        }

        if (!isset($input["clasific"])){
            $input["clasification"] = [];
        }

        // actualizando book
        $book->update($input);

        // Mensaje
        Alert::success('¡Éxito!', 'Se ha actualizado el libro: ' . $request->titulo);

        // Redireccionar a la vista index
        return redirect()->route('admin.books.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $titulo = $book->titulo;
        $book->delete();
        Alert::info('¡Advertencia!', 'Se ha eliminado el libro: ' . $titulo);
        return redirect()->route('admin.books.index');
    }
}
