<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProgresoProyectoController extends Controller
{
    public function index()
    {
        $progresos = ProgresoProyecto::all();
        return view('progresoproyectos.index', compact('progresos'));
    }

    public function create()
    {
        $proyectos = Proyecto::all();
        return view('progresoproyectos.create', compact('proyectos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'proyecto_id' => 'required|exists:proyectos,id',
            'porcentaje' => 'required|numeric|min:0|max:100',
            'descripcion' => 'nullable',
        ]);

        ProgresoProyecto::create($request->all());

        return redirect()->route('progresoproyectos.index')
            ->with('success', 'Progreso del proyecto registrado con éxito.');
    }

    public function show(ProgresoProyecto $progresoProyecto)
    {
        return view('progresoproyectos.show', compact('progresoProyecto'));
    }

    public function edit(ProgresoProyecto $progresoProyecto)
    {
        $proyectos = Proyecto::all();
        return view('progresoproyectos.edit', compact('progresoProyecto', 'proyectos'));
    }

    public function update(Request $request, ProgresoProyecto $progresoProyecto)
    {
        $request->validate([
            'proyecto_id' => 'required|exists:proyectos,id',
            'porcentaje' => 'required|numeric|min:0|max:100',
            'descripcion' => 'nullable',
        ]);

        $progresoProyecto->update($request->all());

        return redirect()->route('progresoproyectos.index')
            ->with('success', 'Progreso del proyecto actualizado con éxito.');
    }

    public function destroy(ProgresoProyecto $progresoProyecto)
    {
        $progresoProyecto->delete();

        return redirect()->route('progresoproyectos.index')
            ->with('success', 'Progreso del proyecto eliminado con éxito.');
    }
}
