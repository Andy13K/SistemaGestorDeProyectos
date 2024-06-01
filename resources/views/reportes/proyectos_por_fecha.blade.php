@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 style="color: #28a745;">Reporte de Proyectos por Fecha</h1>
        <div class="card" style="border: 2px solid #28a745; padding: 20px;">
            <form action="{{ route('reportes.proyectos_por_fecha') }}" method="GET">
                <div class="form-group">
                    <label for="fecha_inicio">Fecha de Inicio</label>
                    <input type="date" id="fecha_inicio" name="fecha_inicio" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="fecha_fin">Fecha de Fin</label>
                    <input type="date" id="fecha_fin" name="fecha_fin" class="form-control" required>
                </div>
                <div class="form-group d-flex justify-content-between">
                    <button type="submit" class="btn" style="background-color: #28a745; color: white;">Generar Reporte</button>
                    <a href="{{ url()->previous() }}" class="btn" style="background-color: #1b5e20; color: white;">Regresar</a>
                </div>
            </form>
        </div>

        @if(isset($proyectos))
            <h2>Proyectos desde {{ $fechaInicio->toDateString() }} hasta {{ $fechaFin->toDateString() }}</h2>
            <table class="table table-bordered mt-4">
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
