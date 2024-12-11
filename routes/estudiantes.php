<?php

use App\Http\Controllers\EstudiantesController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'estudiantes'], function(){
    Route::get('/', [EstudiantesController::class, 'getIndex']);

    Route::get('/show/{id}', [EstudiantesController::class, 'getShow'])
    ->where('id', '[0-9]+');

    Route::get('/create', [EstudiantesController::class, 'getCreate']);

    Route::get('/edit/{id}', [EstudiantesController::class, 'getEdit'])->where('id', '[0-9]+');
});
