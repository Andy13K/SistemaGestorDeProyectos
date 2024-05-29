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

Route::get('/home', [HomeController::class, 'index'])->name('home');

// Rutas de recursos

Route::resource('clientes', ClienteController::class);
Route::resource('usuarios', UsuarioController::class);
Route::resource('proyectos', ProyectoController::class);
Route::resource('asignacionrecursos', AsignacionRecursoController::class);
Route::resource('auditorias', AuditoriaController::class);
Route::resource('reportes', ReporteController::class);
Route::resource('progresoproyectos', ProgresoProyectoController::class);
Route::resource('categorias', CategoriaController::class);
Route::resource('roles', RoleController::class); // Añade esta línea si aún no tienes la ruta para roles
Route::resource('tareas', TareaController::class); // Añade esta línea si aún no tienes la ruta para tareas

Route::get('/dashboard/data', [DashboardController::class, 'getData'])->name('dashboard.data');

Route::resource('users', UserController::class);


