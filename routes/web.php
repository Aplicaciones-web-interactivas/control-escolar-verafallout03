<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\usuariosController;
use App\Http\Controllers\tareasController;
use App\Http\Controllers\entregasController;
use App\Http\Controllers\gruposController;
use App\Http\Controllers\materiasController;
use App\Http\Controllers\horariosController;
use App\Http\Controllers\inscripcionesController;


Route::get('/login', [AuthController::class, 'showLoginForm'])->middleware('guest')->name('login');
Route::post('/login', [AuthController::class, 'login'])->middleware('guest');
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth')->name('dashboard');


Route::middleware(['auth','role:maestro'])->group(function () {
    Route::resource('tareas', tareasController::class);
    Route::get('/tareas/{id}/entregas', [entregasController::class, 'index'])->name('tareas.entregas');
    Route::resource('grupos', gruposController::class);
    Route::resource('materias', materiasController::class);
    Route::resource('horarios', horariosController::class);
});


Route::middleware(['auth','role:alumno'])->group(function () {
    Route::resource('entregas', entregasController::class);
    Route::get('/grupos/{id}/tareas', [tareasController::class, 'index'])->name('grupos.tareas');
    Route::resource('inscripciones', inscripcionesController::class);
});


Route::middleware(['auth','role:admin'])->group(function () {
    Route::resource('usuarios', usuariosController::class);
});
