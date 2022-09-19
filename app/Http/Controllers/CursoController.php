<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class CursoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.crud.cursos.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $curso = new Curso();
        return view('admin.crud.cursos.create', compact('curso'));
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
            'enlace' => 'required'
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

        $input["clasific"] = json_encode($request->clasific);
        $input["disponib"] = json_encode($request->disponib);

        if (!isset($input["disponib"])){
            $input["disponib"] = [];
        }

        if (!isset($input["clasific"])){
            $input["clasification"] = [];
        }
        
        // almacenando curso
        $curso = curso::create($input);

        // Mensaje
        Alert::success('¡Éxito!', 'Se ha creado el curso: ' . $request->titulo);

        // Redireccionar a la vista index
        return redirect()->route('admin.cursos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Curso $curso)
    {
        return view('admin.crud.cursos.edit', compact('curso'));
    }

    function showcongresos(){
        $cursos = Curso::all();
        return view('formation.congress', ["cursos"=>$cursos]);
    }

    function showcongreso($id){
        $curso = Curso::find($id);
        return view('formation.showcongress', ["curso"=>$curso]);
    }

    function showcursos(){
        $cursos = Curso::all();
        return view('formation.course', ["cursos"=>$cursos]);
    }

    function showcurso($id){
        $curso = Curso::find($id);
        return view('formation.showcourse', ["curso"=>$curso]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Curso $curso)
    {
        return view('admin.crud.cursos.edit', compact('curso'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Curso $curso)
    {

        // Validación
        $request->validate([
            'titulo' => 'required|max:254',
            'enlace' => 'required'
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

        if (!isset($input["disponib"])){
            $input["disponib"] = [];
        }

        if (!isset($input["clasific"])){
            $input["clasification"] = [];
        }

        // actualizando curso
        $curso->update($input);

        // Mensaje
        Alert::success('¡Éxito!', 'Se ha actualizado el curso: ' . $request->titulo);

        // Redireccionar a la vista index
        return redirect()->route('admin.cursos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Curso $curso)
    {
        $titulo = $curso->titulo;
        $curso->delete();
        Alert::info('¡Advertencia!', 'Se ha eliminado el curso: ' . $titulo);
        return redirect()->route('admin.cursos.index');
    }
}
