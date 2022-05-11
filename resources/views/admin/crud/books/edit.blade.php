@extends('adminlte::page')

@section('title', 'Editar libro')

@section('content_header')

@stop

@section('content')
<div class="p-4">
    <div class="card card-primary m-2">
        <div class="card-header m-4">
            <h3 class="card-title">Editar libro</h3>
        </div>
        <form action="{{ route('admin.books.update', $book) }}" method="POST">
            @csrf
            @method('put')

            @include('admin.crud.books._form')

            <div class="card-footer">
                <button type="submit" class="btn btn-secondary">Actualizar libro</button>
            </div>
        </form>
    </div>
</div>
@stop

@section('css')
@stop

@section('js')
@stop
