<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\User;
use App\Models\Cliente;
use Illuminate\Http\Request;

class ProyectoController extends Controller
{
    public function create()
    {
        $categorias = Categoria::all();
        $usuarios = User::all(); // Antes era Usuario::all()
        $clientes = Cliente::all();

        return view('proyectos.create', compact('categorias', 'usuarios', 'clientes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'categoria_id' => 'required|exists:categorias,id',
            'lider_id' => 'required|exists:users,id', // Antes era exists:usuarios,id
            'cliente_id' => 'required|exists:clientes,id',
            'num_computadoras' => 'required|integer',
            'presupuesto' => 'required|numeric',
            'fecha_limite' => 'nullable|date',
        ]);

        Proyecto::create($request->all());

        return redirect()->route('proyectos.index')->with('success', 'Proyecto creado con éxito');
    }
}
