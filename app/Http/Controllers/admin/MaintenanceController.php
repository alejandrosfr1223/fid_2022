<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use RealRashid\SweetAlert\Facades\Alert;

class MaintenanceController extends Controller
{
    public function index(){
        return view('admin.pages.maintenance');
    }

    public function key_generate(){
        Artisan::call('key:generate');
        Alert::success('!Una nueva llave para la aplicación se generó exitosamente!');
        return view('admin.pages.maintenance');
    }

    public function storage_link(){
        Artisan::call('storage:link');
        Alert::success('!El enlace directo a storage se generó exitosamente!');
        return view('admin.pages.maintenance');
    }

    public function cache_clear(){
        Artisan::call('cache:clear');
        Alert::success('!El caché de la aplicación se limpió exitosamente!');
        return view('admin.pages.maintenance');
    }

    public function config_cache(){
        Artisan::call('config:cache');
        Alert::success('!La caché de la configuración de la aplicación se limpió exitosamente!');
        return view('admin.pages.maintenance');
    }

    public function route_clear(){
        Artisan::call('route:clear');
        Alert::success('!Las rutas de la aplicación se limpiaron exitosamente!');
        return view('admin.pages.maintenance');
    }

    public function config_clear(){
        Artisan::call('config:clear');
        Alert::success('!La configuración de la aplicación se limpió exitosamente!');
        return view('admin.pages.maintenance');
    }

    public function view_clear(){
        Artisan::call('view:clear');
        Alert::success('!Las vistas de la aplicación se limpiaron exitosamente!');
        return view('admin.pages.maintenance');
    }

    public function migrate_fresh(){
        Artisan::call('migrate:fresh');
        Artisan::call('db:seed');
        Alert::success('!La base de datos se reestableció exitosamente!');
        return view('admin.pages.maintenance');
    }

    public function prueba(){
        /* Solicitar una clave para poder continuar */
        Artisan::call('migrate:fresh');
        Artisan::call('db:seed');
        Alert::success('!La base de datos MySQL fid_2022 se generó exitosamente!');
        return view('welcome');
    }
}
