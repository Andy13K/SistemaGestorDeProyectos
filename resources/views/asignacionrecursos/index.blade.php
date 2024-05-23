@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Asignaciones de Recursos</h1>
        <a href="{{ route('asignacionrecursos.create') }}" class="btn btn-primary">Asignar Recurso</a>
        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Proyecto</th>
                <th>Usuario</th>
                <th>Número de Computadoras</th>
                <th>Presupuesto</th>
                <th>Fecha Límite</th>
                <th>Acciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($asignaciones as $asignacion)
                <tr>
                    <td>{{ $asignacion->id }}</td>
                    <td>{{ $asignacion->proyecto->nombre }}</td>
                    <td>{{ $asignacion->usuario->nombre }}</td>
                    <td>{{ $asignacion->num_computadoras }}</td>
                    <td>{{ $asignacion->presupuesto }}</td>
                    <td>{{ $asignacion->fecha_limite }}</td>
                    <td>
                        <a href="{{ route('asignacionrecursos.edit', $asignacion->id) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('asignacionrecursos.destroy', $asignacion->id) }}" method="POST" style="display:inline;">
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

