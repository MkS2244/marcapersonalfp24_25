<?php

use App\Http\Controllers\DocentesController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'docentes'], function(){
    Route::get('/', [DocentesController::class, 'getIndex']);

    Route::get('/show/{id}', [DocentesController::class, 'getShow'])
    ->where('id', '[0-9]+');

    Route::get('/create', [DocentesController::class, 'getCreate']);

    Route::get('/edit/{id}', [DocentesController::class, 'getEdit'])->where('id', '[0-9]+');
});
