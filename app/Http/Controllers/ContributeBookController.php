<?php

namespace App\Http\Controllers;

use App\Models\ContributeBook;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Storage;

class ContributeBookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.crud.bookscontribute.index');
    }

    public function rejected()
    {
        return view('admin.crud.bookscontribute.rejected');
    }

    public function accepted()
    {
        return view('admin.crud.bookscontribute.accepted');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $contributeBook = new ContributeBook();
        return view('admin.crud.bookscontribute.create', compact('book'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreContributeBookRequest  $request
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

        $temp1 = null;
        if($request->hasFile('img_1')){
            $temp1 = $request->file('img_1')->store('carrucellibros', 's3');
            $input["img_1"] = Storage::disk('s3')->url($temp1);
        }

        $temp2 = null;
        if($request->hasFile('img_2')){
            $temp2 = $request->file('img_2')->store('carrucellibros', 's3');
            $input["img_2"] = Storage::disk('s3')->url($temp2);
        }

        $temp3 = null;
        if($request->hasFile('img_3')){
            $temp3 = $request->file('img_3')->store('carrucellibros', 's3');
            $input["img_3"] = Storage::disk('s3')->url($temp3);
        }

        $temp4 = null;
        if($request->hasFile('img_4')){
            $temp4 = $request->file('img_4')->store('carrucellibros', 's3');
            $input["img_4"] = Storage::disk('s3')->url($temp4);
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
        $contributeBook = ContributeBook::create($input);

        // Mensaje
        Alert::success('¡Éxito!', 'Se ha creado el libro: ' . $request->titulo);

        // Redireccionar a la vista index
        return redirect()->route('admin.bookscontribute.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ContributeBook  $contributeBook
     * @return \Illuminate\Http\Response
     */
    public function show(ContributeBook $contributeBook)
    {
        return view('admin.crud.bookscontribute.edit', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ContributeBook  $contributeBook
     * @return \Illuminate\Http\Response
     */
    public function edit(ContributeBook $contributeBook)
    {
        return view('admin.crud.bookscontribute.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateContributeBookRequest  $request
     * @param  \App\Models\ContributeBook  $contributeBook
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ContributeBook $contributeBook)
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
        $contributeBook->update($input);

        // Mensaje
        Alert::success('¡Éxito!', 'Se ha actualizado el libro: ' . $request->titulo);

        // Redireccionar a la vista index
        return redirect()->route('admin.bookscontribute.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ContributeBook  $contributeBook
     * @return \Illuminate\Http\Response
     */
    public function destroy(ContributeBook $contributeBook)
    {
        $titulo = $contributeBook->titulo;
        $contributeBook->delete();
        Alert::info('¡Advertencia!', 'Se ha eliminado el libro: ' . $titulo);
        return redirect()->route('admin.bookscontribute.index');
    }

    public function storeContrib(Request $request, ContributeBook $contributeBook)
    {
        $userID = auth()->user()->id;

        // Validación
        $request->validate([
            'titulo' => 'required|max:254',
            'img_1' => ['nullable', 'mimes:jpg,jpeg,png', 'max:4096'],
            'img_2' => ['nullable', 'mimes:jpg,jpeg,png', 'max:4096'],
            'img_3' => ['nullable', 'mimes:jpg,jpeg,png', 'max:4096'],
            'img_4' => ['nullable', 'mimes:jpg,jpeg,png', 'max:4096'],
            'clasific' => 'required',
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
            $temp1 = Storage::disk('s3')->put('aportes/imgs', $request->file('img_1'), 'public');
            $input["img_1"] = $preurl.$temp1;
        }

        $temp2 = null;
        if($request->hasFile('img_2')){
            $temp2 = Storage::disk('s3')->put('aportes/imgs', $request->file('img_2'), 'public');
            $input["img_2"] = $preurl.$temp2;
        }

        $temp3 = null;
        if($request->hasFile('img_3')){
            $temp3 = Storage::disk('s3')->put('aportes/imgs', $request->file('img_3'), 'public');
            $input["img_3"] = $preurl.$temp3;
        }

        $temp4 = null;
        if($request->hasFile('img_4')){
            $temp4 = Storage::disk('s3')->put('aportes/imgs', $request->file('img_4'), 'public');
            $input["img_4"] = $preurl.$temp4;
        }

        $temp5 = null;
        if($request->hasFile('l_file')){
            $temp5 = Storage::disk('s3')->put('aportes/materiales', $request->file('l_file'), 'public');
            $input["l_file"] = $preurl.$temp5;
        }

        $input["user_id"] = $userID;
        $input["status"] = 0;
        $input["clasific"] = json_encode($input["clasific"]);

        $contributeBook = ContributeBook::create($input);

        return redirect('contribute')->with("gracias", 'Se ha cargado el material ' . $request->titulo . '. Tu aporte será revisado por nuestro equipo.');
    }
}
