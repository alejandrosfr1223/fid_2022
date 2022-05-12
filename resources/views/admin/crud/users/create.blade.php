@extends('adminlte::page')

@section('title', 'Crear Usuario')

@section('content_header')

@stop

@section('content')
<div class="p-4">
    <div class="card card-primary">
        <div class="card-header m-4">
            <h3 class="card-title">Crear usuario</h3>
        </div>
        <form action="{{ route('admin.users.store') }}" method="POST">
            @csrf

            @include('admin.crud.users._form')

            <div class="card-footer">
                <button type="submit" class="btn btn-secondary">Crear usuario</button>
            </div>
        </form>
    </div>
</div>
@stop

@section('css')
@stop

@section('js')
@stop
