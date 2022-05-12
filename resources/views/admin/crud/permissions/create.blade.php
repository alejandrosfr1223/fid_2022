@extends('adminlte::page')

@section('title', 'Crear Permiso')

@section('content_header')

@stop

@section('content')
<div class="p-4">
    <div class="card card-primary">
        <div class="card-header m-4">
            <h3 class="card-title">Crear permiso</h3>
        </div>
        <form action="{{ route('admin.permissions.store') }}" method="POST">
            @csrf

            @include('admin.crud.permissions._form')

            <div class="card-footer">
                <button type="submit" class="btn btn-secondary">Crear permiso</button>
            </div>
        </form>
    </div>
</div>
@stop

@section('css')
@stop

@section('js')
@stop
