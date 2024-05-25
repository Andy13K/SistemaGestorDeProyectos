<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProyectoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
use App\Http\Controllers\HomeController;

Route::get('/home', [HomeController::class, 'index'])->name('home');

// Rutas de recursos
Route::resource('categorias', CategoriaController::class);
Route::resource('clientes', ClienteController::class);
Route::resource('usuarios', UsuarioController::class);
Route::resource('proyectos', ProyectoController::class);
Route::resource('asignacionrecursos', AsignacionRecursoController::class);
Route::resource('auditorias', AuditoriaController::class);
Route::resource('reportes', ReporteController::class);
Route::resource('progresoproyectos', ProgresoProyectoController::class);
Route::resource('categorias', CategoriaController::class);
Route::resource('clientes', ClienteController::class);
Route::resource('usuarios', UsuarioController::class);
Route::resource('proyectos', ProyectoController::class);
Route::resource('asignacionrecursos', AsignacionRecursoController::class);
Route::resource('roles', RoleController::class); // Añade esta línea si aún no tienes la ruta para roles
Route::resource('tareas', TareaController::class); // Añade esta línea si aún no tienes la ruta para tareas
//rutas recien agregadas por tony
Route::get('/proyectos', [ProyectoController::class, 'index']);
