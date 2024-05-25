<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario; // Asegúrate de importar el modelo Usuario

class UsuarioController extends Controller
{
    public function index()
    {
        $usuarios = Usuario::all();
        return view('usuarios.index', compact('usuarios'));
    }

    public function create()
    {
        return view('usuarios.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'email' => 'required|email|unique:usuarios,email',
            'password' => 'required',
            'rol' => 'required',
        ]);

        // Encriptar la contraseña antes de almacenarla
        $data = $request->all();
        $data['password'] = bcrypt($data['password']);

        Usuario::create($data);

        return redirect()->route('usuarios.index')
            ->with('success', 'Usuario creado con éxito.');
    }

    public function show(Usuario $usuario)
    {
        return view('usuarios.show', compact('usuario'));
    }

    public function edit(Usuario $usuario)
    {
        return view('usuarios.edit', compact('usuario'));
    }

    public function update(Request $request, Usuario $usuario)
    {
        $request->validate([
            'nombre' => 'required',
            'email' => 'required|email|unique:usuarios,email,' . $usuario->id,
            'password' => 'nullable',
            'rol' => 'required',
        ]);

        $data = $request->all();
        if($data['password']) {
            // Encriptar la contraseña solo si se proporciona una nueva
            $data['password'] = bcrypt($data['password']);
        } else {
            // No actualizar la contraseña si no se proporciona una nueva
            unset($data['password']);
        }

        $usuario->update($data);

        return redirect()->route('usuarios.index')
            ->with('success', 'Usuario actualizado con éxito.');
    }

    public function destroy(Usuario $usuario)
    {
        $usuario->delete();

        return redirect()->route('usuarios.index')
            ->with('success', 'Usuario eliminado con éxito.');
    }
}
