<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AsignacionRecursoController extends Controller
{
    public function index()
    {
        $asignaciones = AsignacionRecurso::all();
        return view('asignacionrecursos.index', compact('asignaciones'));
    }

    public function create()
    {
        $proyectos = Proyecto::all();
        $usuarios = Usuario::all();
        return view('asignacionrecursos.create', compact('proyectos', 'usuarios'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'proyecto_id' => 'required|exists:proyectos,id',
            'usuario_id' => 'required|exists:usuarios,id',
            'num_computadoras' => 'required|integer',
            'presupuesto' => 'required|numeric',
            'fecha_limite' => 'required|date',
        ]);

        AsignacionRecurso::create($request->all());

        return redirect()->route('asignacionrecursos.index')
            ->with('success', 'Recurso asignado con éxito.');
    }

    public function show(AsignacionRecurso $asignacionRecurso)
    {
        return view('asignacionrecursos.show', compact('asignacionRecurso'));
    }

    public function edit(AsignacionRecurso $asignacionRecurso)
    {
        $proyectos = Proyecto::all();
        $usuarios = Usuario::all();
        return view('asignacionrecursos.edit', compact('asignacionRecurso', 'proyectos', 'usuarios'));
    }

    public function update(Request $request, AsignacionRecurso $asignacionRecurso)
    {
        $request->validate([
            'proyecto_id' => 'required|exists:proyectos,id',
            'usuario_id' => 'required|exists:usuarios,id',
            'num_computadoras' => 'required|integer',
            'presupuesto' => 'required|numeric',
            'fecha_limite' => 'required|date',
        ]);

        $asignacionRecurso->update($request->all());

        return redirect()->route('asignacionrecursos.index')
            ->with('success', 'Recurso actualizado con éxito.');
    }

    public function destroy(AsignacionRecurso $asignacionRecurso)
    {
        $asignacionRecurso->delete();

        return redirect()->route('asignacionrecursos.index')
            ->with('success', 'Recurso eliminado con éxito.');
    }
}
