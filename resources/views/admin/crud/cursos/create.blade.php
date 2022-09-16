@extends('adminlte::page')

@section('title', 'Añadir curso')

@section('content_header')

@stop

@section('content')
<div class="p-4">
    <div class="card card-primary">
        <div class="card-header m-4">
            <h3 class="card-title">Añadir curso</h3>
        </div>
        <form action="{{ route('admin.cursos.store') }}" method="POST">
            @csrf

            @include('admin.crud.cursos._form')

            <div class="card-footer">
                <button type="submit" class="btn btn-secondary">Añadir curso</button>
            </div>
        </form>
    </div>
</div>
@stop

@section('css')
@stop

@section('js')
@stop
