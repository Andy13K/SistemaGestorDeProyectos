<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuditoriaController extends Controller
{
    public function index()
    {
        $auditorias = Auditoria::all();
        return view('auditorias.index', compact('auditorias'));
    }

    public function create()
    {
        $proyectos = Proyecto::all();
        return view('auditorias.create', compact('proyectos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'proyecto_id' => 'required|exists:proyectos,id',
            'fecha_auditoria' => 'required|date',
            'resultado' => 'required',
            'observaciones' => 'nullable',
        ]);

        Auditoria::create($request->all());

        return redirect()->route('auditorias.index')
            ->with('success', 'Auditoría creada con éxito.');
    }

    public function show(Auditoria $auditoria)
    {
        return view('auditorias.show', compact('auditoria'));
    }

    public function edit(Auditoria $auditoria)
    {
        $proyectos = Proyecto::all();
        return view('auditorias.edit', compact('auditoria', 'proyectos'));
    }

    public function update(Request $request, Auditoria $auditoria)
    {
        $request->validate([
            'proyecto_id' => 'required|exists:proyectos,id',
            'fecha_auditoria' => 'required|date',
            'resultado' => 'required',
            'observaciones' => 'nullable',
        ]);

        $auditoria->update($request->all());

        return redirect()->route('auditorias.index')
            ->with('success', 'Auditoría actualizada con éxito.');
    }

    public function destroy(Auditoria $auditoria)
    {
        $auditoria->delete();

        return redirect()->route('auditorias.index')
            ->with('success', 'Auditoría eliminada con éxito.');
    }
}
