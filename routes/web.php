<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarroController;
use App\Http\Controllers\CorController;
use App\Http\Controllers\MarcaController;
use App\Http\Controllers\ModeloController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\ReportController;

// Rotas de autenticação
Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('login', [AuthenticatedSessionController::class, 'store']);
Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

Route::get('register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('register', [RegisteredUserController::class, 'store']);

// Rotas do sistema de carros
Route::get('/', function () {
    return view('home'); // Ajuste a view conforme necessário
})->name('home');

Route::resource('carro', CarroController::class);
Route::resource('cor', CorController::class);
Route::resource('marca', MarcaController::class);
Route::resource('modelo', ModeloController::class);

// Rotas de Relatório
Route::get('carros/report', [CarroController::class, 'report'])->name('carro.report');
Route::get('carros/report/{id}', [CarroController::class, 'singleReport'])->name('carro.singleReport');
Route::get('reports', [ReportController::class, 'index'])->name('reports.index'); // Lista todos os relatórios
Route::get('reports/{id}', [ReportController::class, 'show'])->name('reports.show'); // Detalhes de um relatório específico

