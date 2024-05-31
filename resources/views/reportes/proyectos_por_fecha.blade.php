@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Reporte de Proyectos por Fecha</h1>
        <form action="{{ route('reportes.proyectos_por_fecha') }}" method="GET">
            <div class="form-group">
                <label for="fecha_inicio">Fecha de Inicio</label>
                <input type="date" id="fecha_inicio" name="fecha_inicio" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="fecha_fin">Fecha de Fin</label>
                <input type="date" id="fecha_fin" name="fecha_fin" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Generar Reporte</button>
        </form>

        @if(isset($proyectos))
            <h2>Proyectos desde {{ $fechaInicio->toDateString() }} hasta {{ $fechaFin->toDateString() }}</h2>
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
                @foreach($proyectos as $proyecto)
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
        @endif
    </div>
@endsection
