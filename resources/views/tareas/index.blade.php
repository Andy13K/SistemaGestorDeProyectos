@extends('layouts.app')

@section('content')
    <div class="container-fluid contenido-principal">
        <div class="d-flex justify-content-between align-items-center mb-2">
            <h1 class="mb-0">Tareas</h1>
            <div>
                <a href="{{ route('tareas.create') }}" class="btn btn-primary">Crear Tarea</a>
            </div>
        </div>
        <div class="table-responsive w-90 tabla-animada">
            <table class="table table-hover table-bordered table-striped text-center">
                <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Estado</th>
                    <th>Fecha Inicio</th>
                    <th>Fecha Fin</th>
                    <th>Proyecto</th>
                    <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($tareas as $tarea)
                    <tr class="tarjeta">
                        <td>{{ $tarea->id }}</td>
                        <td>{{ $tarea->nombre }}</td>
                        <td>{{ $tarea->descripcion }}</td>
                        <td>{{ $tarea->estado }}</td>
                        <td>{{ $tarea->fecha_inicio }}</td>
                        <td>{{ $tarea->fecha_fin }}</td>
                        <td>{{ $tarea->proyecto->nombre }}</td>
                        <td>
                            <a href="{{ route('tareas.edit', $tarea->id) }}" class="btn btn-warning btn-sm" title="Editar">
                                <i class="fa fa-edit"></i>
                            </a>
                            <form action="{{ route('tareas.destroy', $tarea->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" title="Eliminar">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
