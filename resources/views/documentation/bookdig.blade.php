@extends('/layouts/mainlayout')

@section('content')

    @php
        $array = json_decode($book);
        $disponible = json_decode($array->disponib);
        $clasific = json_decode($array->clasific);
        if (!in_array("Disponible", $disponible) || !in_array("Digitalizacion1", $clasific)) {
            header("Location: /fid/diffusion/editorialbv");
            die();
        }
    @endphp

    

@endsection