@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Reporte de Proyectos Finalizados</h1>
        <div class="d-flex justify-content-between mb-3">
            <a href="{{ url()->previous() }}" class="btn btn-secondary">Regresar</a>
            <a href="{{ route('reportes.exportar_proyectos_finalizados') }}" class="btn btn-success">Exportar</a>
        </div>
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
            @foreach($proyectosFinalizados as $proyecto)
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
