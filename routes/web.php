<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('home');
});

Auth::routes();
Route::resource('datos',App\Http\Controllers\DatoController::class)->middleware('auth');
Route::resource('puestos',App\Http\Controllers\PuestoController::class)->middleware('auth');
Route::resource('tipo_jornadas',App\Http\Controllers\TipoJornadaController::class)->middleware('auth');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
