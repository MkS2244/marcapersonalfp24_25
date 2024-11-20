<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReconocimientoController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'getHome']);

Route::get('login', function () {
    return view('auth.login');
});

Route::get('logout', function () {
    return 'Logout usuario';
});

Route::get('reconocimientos', [ReconocimientoController::class, 'getIndex']);

Route::get('reconocimientos/show/{id}', [ReconocimientoController::class, 'getShow'], ['id' => $id]);

Route::get('reconocimientos/create', [ReconocimientoController::class, 'getCreate']);

Route::get('reconocimientos/edit/{id}', [ReconocimientoController::class, 'getEdit'], ['id' => $id]);

Route::get('perfil/{id?}', function ($id = null) {
    return $id ? 'Visualizar el currículo de ' . $id : 'Visualizar el currículo propio';
})->where('id', '[0-9]*');

include __DIR__ . '/actividades.php';
include __DIR__ . '/curriculos.php';
include __DIR__ . '/proyectos.php';
include __DIR__ . '/reconocimientos.php';
include __DIR__ . '/users.php';
