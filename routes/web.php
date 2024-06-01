<?php

use App\Http\Controllers\AsignacionRecursoController;
use App\Http\Controllers\AuditoriaController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProgresoProyectoController;
use App\Http\Controllers\ReporteController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TareaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProyectoController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Rutas de recursos

Route::resource('clientes', ClienteController::class);
Route::resource('usuarios', UsuarioController::class);
Route::resource('proyectos', ProyectoController::class);
Route::resource('asignacionrecursos', AsignacionRecursoController::class);
Route::resource('auditorias', AuditoriaController::class);
Route::resource('progresoproyectos', ProgresoProyectoController::class);
Route::resource('categorias', CategoriaController::class);
Route::resource('roles', RoleController::class);
Route::resource('tareas', TareaController::class);

Route::get('/dashboard/data', [DashboardController::class, 'getData'])->name('dashboard.data');

Route::resource('users', UserController::class);

// Rutas para reportes
Route::get('/reportes', [ReporteController::class, 'index'])->name('reportes.index');
Route::get('/reportes/proyectos_por_fecha', [ReporteController::class, 'proyectosPorFecha'])->name('reportes.proyectos_por_fecha');
Route::get('/reportes/proyectos_en_ejecucion', [ReporteController::class, 'proyectosEnEjecucion'])->name('reportes.proyectos_en_ejecucion');
Route::get('/reportes/proyectos_finalizados', [ReporteController::class, 'proyectosFinalizados'])->name('reportes.proyectos_finalizados');
Route::get('/reportes/proyectos_por_lider', [ReporteController::class, 'proyectosPorLider'])->name('reportes.proyectos_por_lider');
Route::get('/reportes/proyectos_por_cliente', [ReporteController::class, 'proyectosPorCliente'])->name('reportes.proyectos_por_cliente');
Route::get('/reportes/descargar_reporte_cliente', [ReporteController::class, 'descargarReporteCliente'])->name('reportes.descargar_reporte_cliente');
Route::get('/reportes/generar', [ReporteController::class, 'generarReporte'])->name('reportes.generarReporte');
Route::get('/reportes/descargar_reporte', [ReporteController::class, 'descargarReporte'])->name('reportes.descargar_reporte');
