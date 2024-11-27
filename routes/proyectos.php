<?php

use App\Http\Controllers\ProyectosController;
use App\Http\Middleware\MyMiddleware;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'users', 'middleware' => 'auth'], function () {
    
    Route::get('/', [ProyectosController::class, 'getIndex']);

    Route::get('/show/{id}', [ProyectosController::class, 'getShow'])
        ->middleware('id_mayor_10' . ':9')
        ->where('id', '[0-9]+');

    Route::get('/create', [ProyectosController::class, 'getCreate']);

    Route::get('/edit/{id}', [ProyectosController::class, 'getEdit'])->where('id', '[0-9]+');
});
