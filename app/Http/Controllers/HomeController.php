<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proyecto;
use App\Models\Usuario;
use App\Models\Cliente;
use App\Models\Role;

// Actualizar esta línea
use App\Models\Categoria;
use App\Models\Tarea;

class HomeController extends Controller
{
    public function index()
    {
        $proyectosCount = Proyecto::count();
        $usuariosCount = Usuario::count();
        $clientesCount = Cliente::count();
        $rolesCount = Role::count(); // Actualizar esta línea
        $categoriasCount = Categoria::count();
        $tareasCount = Tarea::count();

        return view('home', compact('proyectosCount', 'usuariosCount', 'clientesCount', 'rolesCount', 'categoriasCount', 'tareasCount'));
    }
}
