<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proyecto;
use App\Models\Categoria;
use App\Models\Cliente;
use App\Models\User;
use App\Models\Tarea; // Asegúrate de importar el modelo Tarea
use Illuminate\Support\Facades\Hash;

class ProyectoController extends Controller
{
    public function index()
    {
        $proyectos = Proyecto::with(['categoria', 'lider', 'cliente', 'tareas'])->get();

        foreach ($proyectos as $proyecto) {
            $totalTareas = $proyecto->tareas->count();
            $tareasCompletadas = $proyecto->tareas->where('estado', 'completada')->count();
            $proyecto->porcentajeCompletado = $totalTareas > 0 ? ($tareasCompletadas / $totalTareas) * 100 : 0;
        }

        // Añadir depuración
        // dd($proyectos->toArray());

        return view('proyectos.index', compact('proyectos'));
    }




    public function show(Proyecto $proyecto)
    {
        $totalTareas = $proyecto->tareas->count();
        $tareasCompletadas = $proyecto->tareas->where('estado', 'completada')->count();
        $proyecto->porcentajeCompletado = $totalTareas > 0 ? ($tareasCompletadas / $totalTareas) * 100 : 0;

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
        $data['fecha'] = now(); // Establecer la fecha actual

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

        $data = $request->except('fecha'); // Excluir la fecha del request

        $proyecto->update($data);

        return redirect()->route('proyectos.index')
            ->with('success', 'Proyecto actualizado con éxito.');
    }

    public function destroy($id)
    {
        $proyecto = Proyecto::findOrFail($id);

        // Eliminar todas las tareas asociadas al proyecto
        Tarea::where('proyecto_id', $id)->delete();

        $proyecto->delete();

        return redirect()->route('proyectos.index')
            ->with('success', 'Proyecto eliminado con éxito.');
    }
}
