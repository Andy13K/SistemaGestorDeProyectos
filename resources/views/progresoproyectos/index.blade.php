@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Progreso de Proyectos</h1>
        <a href="{{ route('progresoproyectos.create') }}" class="btn btn-primary">Registrar Progreso</a>
        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Proyecto</th>
                <th>Porcentaje</th>
                <th>Descripción</th>
                <th>Acciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($progresos as $progreso)
                <tr>
                    <td>{{ $progreso->id }}</td>
                    <td>{{ $progreso->proyecto->nombre }}</td>
                    <td>{{ $progreso->porcentaje }}%</td>
                    <td>{{ $progreso->descripcion }}</td>
                    <td>
                        <a href="{{ route('progresoproyectos.edit', $progreso->id) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('progresoproyectos.destroy', $progreso->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection

