@extends('layouts.master')

@section('content')
<div class="row">

    @foreach ($actividades as $key => $actividad)

    <div classUcol- col-6-medium col-12-small">
        <section class="box">
            <a href="#" class="image featured" title="Sakatsp, CC BY-SA 4.0 &lt;https://creativecommons.org/licenses/by-sa/4.0&gt;, via Wikimedia Commons"><img width="256" alt="Award icon" src="https://upload.wikimedia.org/wikipedia/commons/c/c1/Award_icon.png"></a>
            <header>
                <h3>Estudiante {{ $actividad['estudiante_id'] }}</h3>
            </header>
            <p>
            <!--
                El siguiente código debe ser adaptado.
                Una vez adaptado, elimina este comentario.
            -->
                <a href="http://github.com/2DAW-CarlosIII/{{ $actividad['documento'] }}">
                    http://github.com/2DAW-CarlosIII/{{ $actividad['documento'] }}
                </a>
            </p>
            <footer>
                <ul class="actions">
                    <li><a href="{{ action([App\Http\Controllers\ReconocimientoController::class, 'getShow'], ['id' => $key] ) }}" class="button alt">Más info</a></li>
                </ul>
            </footer>
        </section>
    </div>

    @endforeach

</div>
@endsection
