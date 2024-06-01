<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proyecto;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ProyectosExport;

class ProyectoController extends Controller
{
    public function index()
    {
        $proyectos = Proyecto::with(['categoria', 'lider', 'cliente', 'tareas'])->get();

        foreach ($proyectos as $proyecto) {
            $proyecto->porcentajeCompletado = $proyecto->calcularProgreso();
        }

        return view('proyectos.index', compact('proyectos'));
    }

    public function show(Proyecto $proyecto)
    {
        $proyecto->porcentajeCompletado = $proyecto->calcularProgreso();
        $totalTareas = $proyecto->tareas->count();
        $tareasCompletadas = $proyecto->tareas->where('estado', 'Entregado')->count();

        return view('proyectos.show', compact('proyecto', 'totalTareas', 'tareasCompletadas'));
    }

    public function create()
    {
        $categorias = Categoria::all();
        $clientes = Cliente::all();
        $users = User::all();
        return view('proyectos.create', compact('categorias', 'clientes', 'users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'categoria_id' => 'required|exists:categorias,id',
            'lider_id' => 'required|exists:users,id',
            'cliente_id' => 'required|exists:clientes,id',
            'num_computadoras' => 'required|integer',
            'presupuesto' => 'required|numeric',
            'fecha_limite' => 'nullable|date',
        ]);

        $data = $request->all();
        $data['user_id'] = $data['lider_id']; // Asignar el mismo valor de lider_id a user_id

        Proyecto::create($data);

        return redirect()->route('proyectos.index')
            ->with('success', 'Proyecto creado con éxito.');
    }

    public function edit(Proyecto $proyecto)
    {
        $categorias = Categoria::all();
        $clientes = Cliente::all();
        $users = User::all();
        return view('proyectos.edit', compact('proyecto', 'categorias', 'clientes', 'users'));
    }

    public function update(Request $request, Proyecto $proyecto)
    {
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'categoria_id' => 'required|exists:categorias,id',
            'lider_id' => 'required|exists:users,id',
            'cliente_id' => 'required|exists:clientes,id',
            'num_computadoras' => 'required|integer',
            'presupuesto' => 'required|numeric',
            'fecha_limite' => 'nullable|date',
        ]);

        $data = $request->all();
        $data['user_id'] = $data['lider_id']; // Asignar el mismo valor de lider_id a user_id

        $proyecto->update($data);

        return redirect()->route('proyectos.index')
            ->with('success', 'Proyecto actualizado con éxito.');
    }

    public function destroy($id)
    {
        $proyecto = Proyecto::findOrFail($id);

        Tarea::where('proyecto_id', $id)->delete();

        $proyecto->delete();

        return redirect()->route('proyectos.index')
            ->with('success', 'Proyecto eliminado con éxito.');
    }

    public function proyectosFinalizados()
    {
        // Obtener los proyectos y calcular el progreso
        $proyectos = Proyecto::with(['categoria', 'lider', 'cliente', 'tareas'])->get();

        foreach ($proyectos as $proyecto) {
            $porcentajeCompletado = $proyecto->calcularProgreso();

            // Si el proyecto tiene 100% de progreso, actualizar su estado a 'finalizado'
            if ($porcentajeCompletado == 100) {
                $proyecto->status = 'finalizado';
                $proyecto->save();
            }
        }

        // Filtrar los proyectos que tienen el estado 'finalizado'
        $proyectosFinalizados = Proyecto::where('status', 'finalizado')->get();

        return view('reportes.proyectos_finalizados', compact('proyectosFinalizados'));
    }




    public function exportarProyectosFinalizados()
    {
        // Obtener los proyectos con 100% de progreso
        $proyectos = Proyecto::with(['categoria', 'lider', 'cliente', 'tareas'])->get();

        // Filtrar los proyectos que tienen 100% de progreso
        $proyectos = $proyectos->filter(function ($proyecto) {
            return $proyecto->calcularProgreso() == 100;
        });

        return Excel::download(new ProyectosExport($proyectos), 'proyectos_finalizados.xlsx');
    }
}
