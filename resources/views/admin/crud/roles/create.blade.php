@extends('adminlte::page')

@section('title', 'Crear Rol')

@section('content_header')

@stop

@section('content')
<div class="p-4">
    <div class="card card-primary">
        <div class="card-header m-4">
            <h3 class="card-title">Crear rol</h3>
        </div>
        <form action="{{ route('admin.roles.store') }}" method="POST">
            @csrf

            @include('admin.crud.roles._form')

            <div class="card-footer">
                <button type="submit" class="btn btn-secondary">Crear rol</button>
            </div>
        </form>
    </div>
</div>
@stop

@section('css')
@stop

@section('js')
@stop
