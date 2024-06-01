<?php

namespace App\Http\Controllers;

use App\Exports\ProyectosExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Proyecto;
use App\Models\Usuario;
use App\Models\Cliente;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Response;

class ReporteController extends Controller
{
    public function index()
    {
        return view('reportes.index');
    }

    public function proyectosPorFecha(Request $request)
    {
        $fechaInicio = Carbon::parse($request->fecha_inicio);
        $fechaFin = Carbon::parse($request->fecha_fin);

        $proyectos = Proyecto::whereBetween('created_at', [$fechaInicio, $fechaFin])->get();

        return view('reportes.proyectos_por_fecha', compact('proyectos', 'fechaInicio', 'fechaFin'));
    }

    public function proyectosPorCliente(Request $request)
    {
        // Obtener todos los clientes para el filtro desde la tabla `clientes`
        $clientes = Cliente::all();

        // Obtener los proyectos filtrados por cliente y rango de fechas si se proporcionan
        $proyectos = Proyecto::query();

        if ($request->filled('cliente_id')) {
            $proyectos->where('cliente_id', $request->cliente_id);
        }

        if ($request->filled('fecha_inicio') && $request->filled('fecha_fin')) {
            $fechaInicio = Carbon::parse($request->fecha_inicio)->startOfDay();
            $fechaFin = Carbon::parse($request->fecha_fin)->endOfDay();
            $proyectos->whereBetween('fecha', [$fechaInicio, $fechaFin]);
        }

        $proyectos = $proyectos->get()->groupBy('cliente_id');

        return view('reportes.proyectos_por_cliente', compact('proyectos', 'clientes'));
    }

    public function descargarReporteCliente(Request $request)
    {
        // Obtener los proyectos filtrados por cliente y rango de fechas si se proporcionan
        $proyectos = Proyecto::query();

        if ($request->filled('cliente_id')) {
            $proyectos->where('cliente_id', $request->cliente_id);
        }

        if ($request->filled('fecha_inicio') && $request->filled('fecha_fin')) {
            $fechaInicio = Carbon::parse($request->fecha_inicio)->startOfDay();
            $fechaFin = Carbon::parse($request->fecha_fin)->endOfDay();
            $proyectos->whereBetween('fecha', [$fechaInicio, $fechaFin]);
        }

        $proyectos = $proyectos->get();

        return Excel::download(new ProyectosExport($proyectos), 'reporte_proyectos_cliente.xlsx');
    }

    public function proyectosEnEjecucion()
    {
        // Obtener todos los proyectos y calcular el progreso
        $proyectos = Proyecto::with(['categoria', 'lider', 'cliente', 'tareas'])->get();

        // Filtrar los proyectos que no están al 100% completados
        $proyectosEnEjecucion = $proyectos->filter(function ($proyecto) {
            return $proyecto->calcularProgreso() < 100;
        });

        // Añadir el porcentaje completado a cada proyecto
        $proyectosEnEjecucion->each(function ($proyecto) {
            $proyecto->porcentajeCompletado = $proyecto->calcularProgreso();
        });

        return view('reportes.proyectos_en_ejecucion', compact('proyectosEnEjecucion'));
    }




    public function proyectosFinalizados()
    {
        // Obtener todos los proyectos y calcular el progreso
        $proyectos = Proyecto::with(['categoria', 'lider', 'cliente', 'tareas'])->get();

        // Filtrar los proyectos que están al 100% completados
        $proyectosFinalizados = $proyectos->filter(function ($proyecto) {
            return $proyecto->calcularProgreso() == 100;
        });

        // Añadir el porcentaje completado a cada proyecto
        $proyectosFinalizados->each(function ($proyecto) {
            $proyecto->porcentajeCompletado = $proyecto->calcularProgreso();
        });

        return view('reportes.proyectos_finalizados', compact('proyectosFinalizados'));
    }






    public function proyectosPorUsuario(Request $request)
    {
        // Obtener todos los usuarios para el filtro desde la tabla `users`
        $users = User::all();

        // Obtener los proyectos filtrados por usuario y rango de fechas si se proporcionan
        $proyectos = Proyecto::query();

        if ($request->filled('usuario_id')) {
            $proyectos->where('user_id', $request->usuario_id);
        }

        if ($request->filled('fecha_inicio') && $request->filled('fecha_fin')) {
            $fechaInicio = Carbon::parse($request->fecha_inicio)->startOfDay();
            $fechaFin = Carbon::parse($request->fecha_fin)->endOfDay();
            $proyectos->whereBetween('created_at', [$fechaInicio, $fechaFin]);
        }

        $proyectos = $proyectos->get()->groupBy('user_id');

        return view('reportes.proyectos_por_usuario', compact('proyectos', 'users'));
    }






    public function descargarReporte(Request $request)
    {
        // Obtener los proyectos filtrados por líder y rango de fechas si se proporcionan
        $proyectos = Proyecto::query();

        if ($request->filled('lider_id')) {
            $proyectos->where('lider_id', $request->lider_id);
        }

        if ($request->filled('fecha_inicio') && $request->filled('fecha_fin')) {
            $fechaInicio = Carbon::parse($request->fecha_inicio)->startOfDay();
            $fechaFin = Carbon::parse($request->fecha_fin)->endOfDay();
            $proyectos->whereBetween('created_at', [$fechaInicio, $fechaFin]);
        }

        $proyectos = $proyectos->get();

        return Excel::download(new ProyectosExport($proyectos), 'reporte_proyectos.xlsx');
    }





    public function generarReporte()
    {
        $lideres = Usuario::where('rol', 'líder de proyecto')->get();
        return view('reportes.reporte_lideres', ['lideres' => $lideres]);
    }



}

