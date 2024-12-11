<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use Illuminate\Http\Request;

class EstudiantesController extends Controller
{
    public function getIndex()
    {
        return view('estudiantes.index')
            ->with('estudiantes', Estudiante::all());
    }

    public function getShow($id)
    {
            return view('estudiantes.show')
                ->with('estudiante', Estudiante::findOrFail($id))
                ->with('id', $id);
    }

    public function getCreate()
    {
        return view('estudiantes.create');
    }

    public function getEdit($id)
    {
            return view('estudiantes.edit')
                ->with('estudiante', Estudiante::findOrFail($id))
                ->with('id', $id);
    }
}
