@extends('layouts.master')

@section('content')


    <div class="row m-4">

        <div class="col-sm-4">

            <img src="/images/mp-logo.png" style="height:200px"/>

        </div>
        <div class="col-sm-8">

            <h3><strong>Estudiante: </strong>{{ $actividad['estudiante_id'] }}</h3>
            <h3><strong>Actividad:  </strong>{{ $actividad['atividad_id'] }}</h3>
            <h4><strong>Dominio: </strong>
                <a href="https://drive.google.com/document/d//{{ $actividad['documento'] }}">
                    https://drive.google.com/document/d/{{ $actividad['documento'] }}
                </a>
            </h4>
            <h4><strong>Fecha: </strong>{{ $actividad['fecha'] }}</h4>
            <p><strong>Docente Validador: </strong>{{ $actividad['docente_validador'] }}</p>

            @if($proyecto['metadatos']['calificacion'] >= 5)
                <a class="btn btn-danger" href="#">Suspender proyecto</a>
            @else
                <a class="btn btn-primary" href="#">Aprobar proyecto</a>
            @endif
            <a class="btn btn-warning" href="{{ action([App\Http\Controllers\ReconocimientoController::class, 'getEdit'], ['id' => $id]) }}">
                <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                Editar proyecto
            </a>
            <a class="btn btn-outline-info" href="{{ action([App\Http\Controllers\ReconocimientoController::class, 'getIndex']) }}">
                Volver al listado
            </a>


        </div>
    </div>

@endsection

