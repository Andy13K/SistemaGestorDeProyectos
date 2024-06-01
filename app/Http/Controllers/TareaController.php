<?php
// App\Http\Controllers\TareaController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tarea;
use App\Models\Proyecto;

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
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'estado' => 'required|string',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date',
            'proyecto_id' => 'required|exists:proyectos,id',
        ]);

        Tarea::create($request->all());

        return redirect()->route('tareas.index')->with('success', 'Tarea creada correctamente.');
    }

    public function show($id)
    {
        $tarea = Tarea::with('proyecto')->findOrFail($id);
        return view('tareas.show', compact('tarea'));
    }

    public function edit($id)
    {
        $tarea = Tarea::findOrFail($id);
        $proyectos = Proyecto::all();
        return view('tareas.edit', compact('tarea', 'proyectos'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'estado' => 'required|string',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date',
            'proyecto_id' => 'required|exists:proyectos,id',
        ]);

        $tarea = Tarea::findOrFail($id);
        $tarea->update($request->all());

        return redirect()->route('tareas.index')->with('success', 'Tarea actualizada correctamente.');
    }

    public function destroy($id)
    {
        $tarea = Tarea::findOrFail($id);
        $tarea->delete();

        return redirect()->route('tareas.index')->with('success', 'Tarea eliminada correctamente.');
    }

    public function upload(Request $request, $id)
    {
        $request->validate([
            'archivo' => 'required|file',
        ]);

        // Aquí puedes manejar la carga del archivo
        // $archivo = $request->file('archivo')->store('archivos');

        // Actualizar el estado de la tarea
        $tarea = Tarea::findOrFail($id);
        $tarea->estado = 'Entregado';
        $tarea->save();

        // Verificar si el estado se actualizó correctamente
        if ($tarea->estado === 'Entregado') {
            return redirect()->route('tareas.index')->with('success', 'Tarea entregada con éxito.');
        } else {
            return redirect()->route('tareas.index')->with('error', 'No se pudo actualizar el estado de la tarea.');
        }
    }
}
