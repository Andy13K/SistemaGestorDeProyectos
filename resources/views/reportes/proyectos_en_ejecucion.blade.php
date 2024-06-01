@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Reporte de Proyectos en Ejecución</h1>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Categoría</th>
                <th>Líder</th>
                <th>Cliente</th>
                <th>Fecha de Creación</th>
                <th>Progreso</th>
            </tr>
            </thead>
            <tbody>
            @foreach($proyectosEnEjecucion as $proyecto)
                <tr>
                    <td>{{ $proyecto->id }}</td>
                    <td>{{ $proyecto->nombre }}</td>
                    <td>{{ $proyecto->descripcion }}</td>
                    <td>{{ $proyecto->categoria->nombre ?? 'No asignado' }}</td>
                    <td>{{ $proyecto->lider->name ?? 'No asignado' }}</td>
                    <td>{{ $proyecto->cliente->nombre ?? 'No asignado' }}</td>
                    <td>{{ $proyecto->created_at->toDateString() }}</td>
                    <td>{{ $proyecto->porcentajeCompletado }}%</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection

