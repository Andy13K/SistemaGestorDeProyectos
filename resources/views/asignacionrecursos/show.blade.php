@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Detalle de Asignación de Recurso</h1>
        <div>
            <strong>ID:</strong> {{ $asignacionRecurso->id }}
        </div>
        <div>
            <strong>Proyecto:</strong> {{ $asignacionRecurso->proyecto->nombre }}
        </div>
        <div>
            <strong>Usuario:</strong> {{ $asignacionRecurso->usuario->nombre }}
        </div>
        <div>
            <strong>Número de Computadoras:</strong> {{ $asignacionRecurso->num_computadoras }}
        </div>
        <div>
            <strong>Presupuesto:</strong> {{ $asignacionRecurso->presupuesto }}
        </div>
        <div>
            <strong>Fecha Límite:</strong> {{ $asignacionRecurso->fecha_limite }}
        </div>
        <a href="{{ route('asignacionrecursos.index') }}" class="btn btn-primary">Volver</a>
    </div>
@endsection

