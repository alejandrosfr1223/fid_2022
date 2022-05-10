<?php

use App\Http\Controllers\admin\PermissionController;
use App\Http\Controllers\admin\RoleController;
use Illuminate\Support\Facades\Route;

Route::get('test', function () {
    return view('admin.layouts.test');
});

Route::resource('roles', RoleController::class)->names('roles')
        ->middleware('can:admin.crud.roles.index');

Route::resource('permissions', PermissionController::class)->names('permissions')
	->middleware('can:admin.crud.permissions.index');
