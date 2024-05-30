@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card border-success" style="border: 2px solid #00c851;">
            <div class="card-body">
                <h1 class="card-title" style="color: #00c851;">Detalles del Proyecto</h1>
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <strong>ID:</strong> {{ $proyecto->id }}
                    </div>
                    <div class="col-md-4 mb-3">
                        <strong>Nombre:</strong> {{ $proyecto->nombre }}
                    </div>
                    <div class="col-md-4 mb-3">
                        <strong>Descripción:</strong> {{ $proyecto->descripcion }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <strong>Categoría:</strong> {{ $proyecto->categoria->nombre ?? 'No asignado' }}
                    </div>
                    <div class="col-md-4 mb-3">
                        <strong>Líder:</strong> {{ $proyecto->lider->name ?? 'No asignado' }}
                    </div>
                    <div class="col-md-4 mb-3">
                        <strong>Cliente:</strong> {{ $proyecto->cliente->nombre ?? 'No asignado' }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <strong>Fecha:</strong> {{ $proyecto->fecha }}
                    </div>
                    <div class="col-md-4 mb-3">
                        <strong>Número de Computadoras:</strong> {{ $proyecto->num_computadoras }}
                    </div>
                    <div class="col-md-4 mb-3">
                        <strong>Presupuesto:</strong> {{ $proyecto->presupuesto }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <strong>Fecha Límite:</strong> {{ $proyecto->fecha_limite }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <h3 style="color: #00c851;">Progreso</h3>
                        <p>Total de Tareas: {{ $totalTareas }}</p>
                        <p>Tareas Completadas: {{ $tareasCompletadas }}</p>
                        <p>Porcentaje Completado: {{ round($proyecto->porcentajeCompletado, 2) }}%</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 text-center">
                        <a href="{{ route('proyectos.index') }}" class="btn btn-success" style="background-color: #00c851; border-color: #00c851;">Volver</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
