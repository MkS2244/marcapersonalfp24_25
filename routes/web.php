<?php

use App\Http\Controllers\HomeController;
use App\Models\Estudiante;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'getHome']);

Route::get('login', function () {
    return view('auth.login');
});

Route::get('logout', function () {
    return 'Logout usuario';
});

Route::get('perfil/{id?}', function ($id = null) {
    return $id ? 'Visualizar el currículo de ' . $id : 'Visualizar el currículo propio';
})->where('id', '[0-9]*');

Route::get('pruebaDB/{id}', function ($id = null) {
    // $estudiantes = Estudiante::all();
    // foreach ($estudiantes as $estudiante) {
    //     echo $estudiante->nombre . ' - ' .  $estudiante->ciclo . '<br />';
    // }
    // $estudiante = Estudiante::findOrFail($id);
    // echo $estudiante->nombre . ' - '. $estudiante->ciclo . '<br>';
    // $estudiante = Estudiante::where('ciclo', 'C_'.$id)->firstOrFail();
    // echo $estudiante->nombre;
    // $estudiante = Estudiante::where('ciclo', 'C_'.$id)->get();
    // foreach($estudiante as $est){
    //     echo $est->nombre . '<br />';
    // }
    // $estudiantes = Estudiante::where('ciclo', 'like', 'C_1%')->get();
    // foreach ($estudiantes as $est) {
    //     echo $est->nombre .'<br />';
    // }

    $salida = getEstadisticas();

// PARA BORRAR
    $estudiantes = Estudiante::where('nombre', 'Juan ')
            ->where('apellidos', 'Martínez')
            ->delete();
    $salida .= getEstadisticas();

    return 'Estudiantes borrados: '. $estudiantes;


// PARA GUARDAR NUEVOS ESTUDIANTES
    // $estudiante = Estudiante::where('votos', '>', 100)->take(10)->get();
    // foreach ($estudiante as $est) {
    //     $salida .= '<li>' . $est->nombre . ' - ' . $est->votos . '</li>';
    // }
    // $count = Estudiante::where('votos', '>', 100)->count();
    // echo 'Antes: ' . $count . '<br />';

    // $estudiante = new Estudiante;
    //  $id = $votos ? $votos : 1;
    // $estudiante = Estudiante::findOrFail($id);
    // $estudiante->nombre = 'Juan';
    // $estudiante->apellidos = 'Martínez';
    // $estudiante->direccion = 'Dirección de Juan';
    // $estudiante->votos = 130;
    // $estudiante->confirmado = true;
    // $estudiante->ciclo = 'DAW';
    // $estudiante->save();

    // $count = Estudiante::where('votos', '>', 100)->count();
    // echo 'Después: ' . $count . '<br />';

    // return $salida . '</ul>';
});

function getEstadisticas (){
    $count = Estudiante::where('votos', '>', 100)->count();
    $maxVotos = Estudiante::max('votos');
    $minVotos = Estudiante::min('votos');
    $mediaVotos = Estudiante::avg('votos');
    $total = Estudiante::sum('votos');

    $salida = '<ul>';
    $salida .= '<li>Estudiantes con más de 100 votos: ' . $count . '</li>';
    $salida .= '<li>Mayor número de votos: ' . $maxVotos . '</li>';
    $salida .= '<li>Menor número de votos: ' . $minVotos . '</li>';
    $salida .= '<li>Media de los votos: ' . $mediaVotos . '</li>';
    $salida .= '<li>Total de votos: ' . $total . '</li>';

    return $salida . '</ul>';
}

include __DIR__ . '/actividades.php';
include __DIR__ . '/curriculos.php';
include __DIR__ . '/proyectos.php';
include __DIR__ . '/reconocimientos.php';
include __DIR__ . '/users.php';
