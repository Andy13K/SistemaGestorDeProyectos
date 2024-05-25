<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente; // Asegúrate de importar el modelo Cliente

class ClienteController extends Controller
{
    public function index()
    {
        $clientes = Cliente::all();
        return view('clientes.index', compact('clientes'));
    }

    public function create()
    {
        return view('clientes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'email' => 'required|email|unique:clientes,email',
            'telefono' => 'nullable',
            'direccion' => 'nullable',
        ]);

        Cliente::create($request->all());

        return redirect()->route('clientes.index')
            ->with('success', 'Cliente creado con éxito.');
    }

    public function show(Cliente $cliente)
    {
        return view('clientes.show', compact('cliente'));
    }

    public function edit(Cliente $cliente)
    {
        return view('clientes.edit', compact('cliente'));
    }

    public function update(Request $request, Cliente $cliente)
    {
        $request->validate([
            'nombre' => 'required',
            'email' => 'required|email|unique:clientes,email,' . $cliente->id,
            'telefono' => 'nullable',
            'direccion' => 'nullable',
        ]);

        $cliente->update($request->all());

        return redirect()->route('clientes.index')
            ->with('success', 'Cliente actualizado con éxito.');
    }

    public function destroy(Cliente $cliente)
    {
        $cliente->delete();

        return redirect()->route('clientes.index')
            ->with('success', 'Cliente eliminado con éxito.');
    }
}

