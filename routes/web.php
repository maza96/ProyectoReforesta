<?php

use App\Http\Controllers\EventoController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\EspecieController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\EventoController as EventoApiController;

Route::resource('usuarios', UsuarioController::class);

Route::resource('eventos', EventoController::class);

Route::resource('especies', EspecieController::class);

Route::middleware('api')->prefix('api')->group(function () {
    Route::get('eventos', [EventoApiController::class, 'index']);
    Route::get('eventos/{id}', [EventoApiController::class, 'show']);
    Route::post('eventos', [EventoApiController::class, 'store']);
    Route::put('eventos/{id}', [EventoApiController::class, 'update']);
    Route::delete('eventos/{id}', [EventoApiController::class, 'destroy']);
});

Route::middleware('auth')->get('/perfil', [UsuarioController::class, 'perfil'])->name('perfil');
Route::get('/login', [UsuarioController::class, 'showLoginForm'])->name('login')->middleware('guest');
Route::post('/login', [UsuarioController::class, 'login']);
Route::post('/logout', [UsuarioController::class, 'logout'])->name('logout');
