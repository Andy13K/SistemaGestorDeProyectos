<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proyecto;


class ProyectoController extends Controller
{
    public function index()
    {
        $proyectos = Proyecto::all();
        return view('proyectos.index', compact('proyectos'));
    }

    public function create()
    {
        $categorias = Categoria::all();
        $clientes = Cliente::all();
        $usuarios = Usuario::all();
        return view('proyectos.create', compact('categorias', 'clientes', 'usuarios'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'categoria_id' => 'required|exists:categorias,id',
            'lider_id' => 'required|exists:usuarios,id',
            'cliente_id' => 'required|exists:clientes,id',
            'fecha' => 'required|date',
            'num_computadoras' => 'required|integer',
            'presupuesto' => 'required|numeric',
            'fecha_limite' => 'nullable|date',
        ]);

        Proyecto::create($request->all());

        return redirect()->route('proyectos.index')
            ->with('success', 'Proyecto creado con éxito.');
    }

    public function show(Proyecto $proyecto)
    {
        return view('proyectos.show', compact('proyecto'));
    }

    public function edit(Proyecto $proyecto)
    {
        $categorias = Categoria::all();
        $clientes = Cliente::all();
        $usuarios = Usuario::all();
        return view('proyectos.edit', compact('proyecto', 'categorias', 'clientes', 'usuarios'));
    }

    public function update(Request $request, Proyecto $proyecto)
    {
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'categoria_id' => 'required|exists:categorias,id',
            'lider_id' => 'required|exists:usuarios,id',
            'cliente_id' => 'required|exists:clientes,id',
            'fecha' => 'required|date',
            'num_computadoras' => 'required|integer',
            'presupuesto' => 'required|numeric',
            'fecha_limite' => 'nullable|date',
        ]);

        $proyecto->update($request->all());

        return redirect()->route('proyectos.index')
            ->with('success', 'Proyecto actualizado con éxito.');
    }

    public function destroy(Proyecto $proyecto)
    {
        $proyecto->delete();

        return redirect()->route('proyectos.index')
            ->with('success', 'Proyecto eliminado con éxito.');
    }
}
