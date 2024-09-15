<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CarroController;
//use App\Http\Controllers\CorController;
use App\Http\Controllers\MarcaController;
use App\Http\Controllers\ModeloController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('home');
})->name('home');

Route::resource('carro', CarroController::class);
Route::resource('cor', CorController::class);
Route::resource('marca', MarcaController::class);
Route::resource('modelo', ModeloController::class);
