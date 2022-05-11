@extends('adminlte::page')

@section('title', 'Mantenimiento de la aplicación')

@section('content_header')

@stop

@section('content')
<div class="p-4">
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Mantenimiento de la aplicación</h3>
        </div>
        <div class="card-body m-2">
            <div class="row p-0 m-0">
                <p style="color:red">
                    <strong>Nota: </strong>
                    El uso indebido de estos comandos puede causar fallas en la aplicación.
                </p>
            </div>

            <div class="row">
                <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3 my-2">
                    <form action="{{ route('admin.maintenance.key-generate') }}" method="GET">
                        @csrf
                        <button type="submit" class="btn btn-warning w-60">Key generate</button>
                    </form>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3 my-2">
                    <form action="{{ route('admin.maintenance.storage-link') }}" method="GET">
                        @csrf
                        <button type="submit" class="btn btn-warning w-60">Storage Link</button>
                    </form>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3 my-2">
                    <form action="{{ route('admin.maintenance.cache-clear') }}" method="GET">
                        @csrf
                        <button type="submit" class="btn btn-warning w-60">Cache clear</button>
                    </form>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3 my-2">
                    <form action="{{ route('admin.maintenance.config-cache') }}" method="GET">
                        @csrf
                        <button type="submit" class="btn btn-warning w-60">Config cache</button>
                    </form>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3 my-2">
                    <form action="{{ route('admin.maintenance.route-clear') }}" method="GET">
                        @csrf
                        <button type="submit" class="btn btn-warning w-60">Route clear</button>
                    </form>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3 my-2">
                    <form action="{{ route('admin.maintenance.config-clear') }}" method="GET">
                        @csrf
                        <button type="submit" class="btn btn-warning w-60">Config clear</button>
                    </form>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3 my-2">
                    <form action="{{ route('admin.maintenance.view-clear') }}" method="GET">
                        @csrf
                        <button type="submit" class="btn btn-warning w-60">View clear</button>
                    </form>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3 my-2">
                    <form action="{{ route('admin.maintenance.migrate-fresh') }}" method="GET">
                        @csrf
                        <button type="submit" class="btn btn-warning w-60">Migrate fresh seed</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

@section('css')
@stop

@section('js')
@stop
