<?php

namespace App\Http\Controllers;

use App\Models\Proyecto; // Asegúrate de importar el modelo Proyecto
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Obtén los proyectos de la base de datos
        $proyectos = Proyecto::all();

        // Pasa los proyectos a la vista
        return view('home', compact('proyectos'));
    }
}
