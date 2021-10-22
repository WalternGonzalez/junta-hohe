<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MedidorController;
use App\Http\Controllers\TarifaController;
use App\Http\Controllers\ServicioController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;


Route::get('/', function () {
    return view('auth.login');
    
});

Route::middleware(['auth:sanctum', 'verified'])->middleware('can:dash.index')->get('/dash', function () {

    return view('dash.index');
})->name('dash');

Route::resource('medidor', 'App\Http\Controllers\MedidorController');
Route::resource('tarifa', 'App\Http\Controllers\TarifaController');
Route::resource('servicio', 'App\Http\Controllers\ServicioController');
Route::resource('users', UserController::class)->only (['index', 'edit', 'update'])->names('users');

//Roles

Route::resource('roles', RoleController::class)->names('roles');
    