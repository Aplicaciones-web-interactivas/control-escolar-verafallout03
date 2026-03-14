<?php

use App\Http\Controllers\gruposController;
use App\Http\Controllers\horariosController;
use App\Http\Controllers\inscripcionesController;
use App\Http\Controllers\materiasController;
use App\Http\Controllers\usuarioController;
use Illuminate\Support\Facades\Route;


Route::resource('usuarios', usuarioController::class);
Route::resource('materias', materiasController::class);
Route::resource('grupos', gruposController::class);
Route::resource('horarios', horariosController::class);
Route::resource('inscripciones', inscripcionesController::class);


Route::get('/', function () {
    return view('welcome');
});
