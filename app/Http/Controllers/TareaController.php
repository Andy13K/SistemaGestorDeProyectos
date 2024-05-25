<?php

namespace App\Http\Controllers;

use App\Models\Tarea;
use App\Models\Proyecto;
use Illuminate\Http\Request;

class TareaController extends Controller
{
    public function index()
    {
        $tareas = Tarea::with('proyecto')->get();
        return view('tareas.index', compact('tareas'));
    }

    public function create()
    {
        $proyectos = Proyecto::all();
        return view('tareas.create', compact('proyectos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'estado' => 'required',
            'fecha_inicio' => 'nullable|date',
            'fecha_fin' => 'nullable|date',
            'proyecto_id' => 'required|exists:proyectos,id',
        ]);

        Tarea::create($request->all());

        return redirect()->route('tareas.index')
            ->with('success', 'Tarea creada con éxito.');
    }

    public function show(Tarea $tarea)
    {
        return view('tareas.show', compact('tarea'));
    }

    public function edit(Tarea $tarea)
    {
        $proyectos = Proyecto::all();
        return view('tareas.edit', compact('tarea', 'proyectos'));
    }

    public function update(Request $request, Tarea $tarea)
    {
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'estado' => 'required',
            'fecha_inicio' => 'nullable|date',
            'fecha_fin' => 'nullable|date',
            'proyecto_id' => 'required|exists:proyectos,id',
        ]);

        $tarea->update($request->all());

        return redirect()->route('tareas.index')
            ->with('success', 'Tarea actualizada con éxito.');
    }

    public function destroy(Tarea $tarea)
    {
        $tarea->delete();

        return redirect()->route('tareas.index')
            ->with('success', 'Tarea eliminada con éxito.');
    }
}
