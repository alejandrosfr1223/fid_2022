<?php

use App\Http\Controllers\admin\PermissionController;
use Illuminate\Support\Facades\Route;

Route::get('test', function () {
    return view('admin.layouts.test');
});

Route::resource('permissions', PermissionController::class)->names('permissions')
	->middleware('can:admin.crud.permissions.index');
