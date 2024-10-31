<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MarcaController;
use App\Http\Controllers\ProductoController;

Route::resource('marcas', MarcaController::class);
Route::resource('productos', ProductoController::class);
Route::get('/', function () {
    return view('welcome');
});
