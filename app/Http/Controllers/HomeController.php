<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proyecto;
use App\Models\Usuario;
use App\Models\Cliente;
use App\Models\Role;
use App\Models\Categoria;
use App\Models\Tarea;
use App\Models\User; // Añadir esta línea

class HomeController extends Controller
{
    public function index()
    {
        $proyectosCount = Proyecto::count();
        $usuariosCount = Usuario::count();
        $clientesCount = Cliente::count();
        $rolesCount = Role::count();
        $categoriasCount = Categoria::count();
        $tareasCount = Tarea::count();
        $users = User::all(); // Añadir esta línea

        return view('home', compact('proyectosCount', 'usuariosCount', 'clientesCount', 'rolesCount', 'categoriasCount', 'tareasCount', 'users')); // Añadir 'users' aquí
    }
}
