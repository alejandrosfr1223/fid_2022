<?php

use App\Http\Controllers\admin\MaintenanceController;
use App\Http\Controllers\admin\PermissionController;
use App\Http\Controllers\admin\RoleController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Traits\HasRoles;

Route::get('/', function () {
    if(Auth::user()->hasRole('Administrador')){
        return view('admin.crud.users.index');
    }else{
        if(Auth::user()->hasRole('Operador')){
            return view('admin.crud.books.index');
        } else {
            return view('dashboard');
        }
    }
});

// Grupo de rutas para realizar mantenimiento a la aplicación
Route::group(['middleware' => ['auth', 'can:admin.crud.users.index'], 'as' => 'maintenance.'], function(){
    // Página principal
    Route::get('maintenance', [MaintenanceController::class, 'index']);
    // Generar llave: $ php artisan key:generate
    Route::get('key-generate', [MaintenanceController::class, 'key_generate'])->name('key-generate');
    // Enlace directo a storage: $ php artisan storage:link
    Route::get('storage-link', [MaintenanceController::class, 'storage_link'])->name('storage-link');
    // Limpiar caché: $ php artisan cache:clear
    Route::get('cache-clear', [MaintenanceController::class, 'cache_clear'])->name('cache-clear');
    // Limpiar caché de la configuración: $ php artisan config:cache
    Route::get('config-cache', [MaintenanceController::class, 'config_cache'])->name('config-cache');
    // Limpiar rutas: $ php artisan route:clear
    Route::get('route-clear', [MaintenanceController::class, 'route_clear'])->name('route-clear');
    // Limpiar configuración: $ php artisan config:clear
    Route::get('config-clear', [MaintenanceController::class, 'config_clear'])->name('config-clear');
    // Limpiar vistas: $ php artisan view:clear
    Route::get('view-clear', [MaintenanceController::class, 'view_clear'])->name('view-clear');
    // Reestablecer base de datos: $ php artisan migrate:fresh --seed
    Route::get('migrate-fresh', [MaintenanceController::class, 'migrate_fresh'])->name('migrate-fresh');
});

Route::resource('users', UserController::class)->names('users')
    ->middleware('can:admin.crud.users.index');

Route::resource('roles', RoleController::class)->names('roles')
    ->middleware('can:admin.crud.roles.index');

Route::resource('permissions', PermissionController::class)->names('permissions')
	->middleware('can:admin.crud.permissions.index');

Route::resource('books', BookController::class)->names('books')
    ->middleware('can:admin.crud.books.index');

Route::get('test', function () {
    return view('admin.layouts.test');
});


// Ruta temporal para ejecutar las migraciones con sus seeders
Route::get('migration-seeders-xyz', [MaintenanceController::class, 'prueba']);
