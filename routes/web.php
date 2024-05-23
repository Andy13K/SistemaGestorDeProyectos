<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ProyectoController;
use App\Http\Controllers\AsignacionRecursoController;
use App\Http\Controllers\AuditoriaController;
use App\Http\Controllers\ReporteController;
use App\Http\Controllers\ProgresoProyectoController;

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

// Rutas de recursos
Route::resource('categorias', CategoriaController::class);
Route::resource('clientes', ClienteController::class);
Route::resource('usuarios', UsuarioController::class);
Route::resource('proyectos', ProyectoController::class);
Route::resource('asignacionrecursos', AsignacionRecursoController::class);
Route::resource('auditorias', AuditoriaController::class);
Route::resource('reportes', ReporteController::class);
Route::resource('progresoproyectos', ProgresoProyectoController::class);

// Ruta para la página principal
Route::get('/', function () {
    return view('welcome');
});
