<?php

// app/Http/Controllers/DashboardController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proyecto;
use App\Models\User;
use App\Models\Cliente;
use App\Models\AsignacionRecurso;
use App\Models\Categoria;
use App\Models\Tarea;

class DashboardController extends Controller
{
    public function getData()
    {
        $proyectos = Proyecto::count();
        $usuarios = User::count();
        $clientes = Cliente::count();
        $asignacionRecursos = AsignacionRecurso::count();
        $categorias = Categoria::count();
        $tareas = Tarea::count();

        return response()->json([$proyectos, $usuarios, $clientes, $asignacionRecursos, $categorias, $tareas]);
    }
}

