<?php

use App\Http\Controllers\admin\PermissionController;
use App\Http\Controllers\admin\RoleController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;

Route::get('test', function () {
    return view('admin.layouts.test');
});

Route::resource('users', UserController::class)->names('users')
    ->middleware('can:admin.crud.users.index');

Route::resource('roles', RoleController::class)->names('roles')
    ->middleware('can:admin.crud.roles.index');

Route::resource('permissions', PermissionController::class)->names('permissions')
	->middleware('can:admin.crud.permissions.index');

Route::resource('books', BookController::class)->names('books')
    ->middleware('can:admin.crud.books.index');
