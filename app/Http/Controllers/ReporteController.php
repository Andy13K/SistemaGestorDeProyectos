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
        $proyectos = Proyecto::where('status', 'en ejecucion')->get();

        return view('reportes.proyectos_en_ejecucion', compact('proyectos'));
    }

    public function proyectosFinalizados()
    {
        $proyectos = Proyecto::where('status', 'finalizado')->get();

        return view('reportes.proyectos_finalizados', compact('proyectos'));
    }

    public function proyectosPorLider(Request $request)
    {
        // Obtener todos los líderes para el filtro desde la tabla `users`
        $users = User::where('role', 'líder de proyecto')->get();

        // Obtener los proyectos filtrados por líder y rango de fechas si se proporcionan
        $proyectos = Proyecto::query();

        if ($request->filled('lider_id')) {
            $proyectos->where('lider_id', $request->lider_id);
        }

        if ($request->filled('fecha_inicio') && $request->filled('fecha_fin')) {
            $fechaInicio = Carbon::parse($request->fecha_inicio)->startOfDay();
            $fechaFin = Carbon::parse($request->fecha_fin)->endOfDay();
            $proyectos->whereBetween('fecha', [$fechaInicio, $fechaFin]);
        }

        $proyectos = $proyectos->get()->groupBy('lider_id');

        return view('reportes.proyectos_por_lider', compact('proyectos', 'users'));
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
            $proyectos->whereBetween('fecha', [$fechaInicio, $fechaFin]);
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

