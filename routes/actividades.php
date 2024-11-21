<?php

use App\Http\Controllers\ReconocimientoController;
use Illuminate\Support\Facades\Route;

Route::get('actividades', [ReconocimientoController::class, 'getIndex']);

Route::get('actividades/show/{id}', [ReconocimientoController::class, 'getShow'])->where('id', '[0-9]+');

Route::get('actividades/create', [ReconocimientoController::class, 'getCreate']);

Route::get('actividades/edit/{id}', [ReconocimientoController::class, 'getEdit'])->where('id', '[0-9]+');
