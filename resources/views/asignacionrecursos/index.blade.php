@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Proyectos</h1>
        <a href="{{ route('proyectos.create') }}" class="btn btn-primary">Crear Proyecto</a>
        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Categoría</th>
                <th>Líder</th>
                <th>Cliente</th>
                <th>Fecha de Creación</th>
                <th>Número de Computadoras</th>
                <th>Presupuesto</th>
                <th>Fecha Límite</th>
                <th>Acciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($proyectos as $proyecto)
                <tr>
                    <td>{{ $proyecto->id }}</td>
                    <td>{{ $proyecto->nombre }}</td>
                    <td>{{ $proyecto->descripcion }}</td>
                    <td>{{ $proyecto->categoria->nombre ?? 'No asignado' }}</td>
                    <td>{{ $proyecto->lider->nombre ?? 'No asignado' }}</td>
                    <td>{{ $proyecto->cliente->nombre ?? 'No asignado' }}</td>
                    <td>{{ $proyecto->fecha }}</td>
                    <td>{{ $proyecto->num_computadoras }}</td>
                    <td>{{ $proyecto->presupuesto }}</td>
                    <td>{{ $proyecto->fecha_limite }}</td>
                    <td>
                        <a href="{{ route('proyectos.edit', $proyecto->id) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('proyectos.destroy', $proyecto->id) }}" method="POST" style="display:inline;">
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
