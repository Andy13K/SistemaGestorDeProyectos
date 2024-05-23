@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Detalle de Progreso</h1>
        <div>
            <strong>ID:</strong> {{ $progresoProyecto->id }}
        </div>
        <div>
            <strong>Proyecto:</strong> {{ $progresoProyecto->proyecto->nombre }}
        </div>
        <div>
            <strong>Porcentaje:</strong> {{ $progresoProyecto->porcentaje }}%
        </div>
        <div>
            <strong>Descripción:</strong> {{ $progresoProyecto->descripcion }}
        </div>
        <a href="{{ route('progresoproyectos.index') }}" class="btn btn-primary">Volver</a>
    </div>
@endsection

