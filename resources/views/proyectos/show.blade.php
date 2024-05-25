@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Detalle de Proyecto</h1>
        <div>
            <strong>ID:</strong> {{ $proyecto->id }}
        </div>
        <div>
            <strong>Nombre:</strong> {{ $proyecto->nombre }}
        </div>
        <div>
            <strong>Descripción:</strong> {{ $proyecto->descripcion }}
        </div>
        <div>
            <strong>Categoría:</strong> {{ $proyecto->categoria->nombre ?? 'No asignado' }}
        </div>
        <div>
            <strong>Líder:</strong> {{ $proyecto->lider->nombre ?? 'No asignado' }}
        </div>
        <div>
            <strong>Cliente:</strong> {{ $proyecto->cliente->nombre ?? 'No asignado' }}
        </div>
        <div>
            <strong>Fecha:</strong> {{ $proyecto->fecha }}
        </div>
        <div>
            <strong>Número de Computadoras:</strong> {{ $proyecto->num_computadoras }}
        </div>
        <div>
            <strong>Presupuesto:</strong> {{ $proyecto->presupuesto }}
        </div>
        <div>
            <strong>Fecha Límite:</strong> {{ $proyecto->fecha_limite }}
        </div>
        <a href="{{ route('proyectos.index') }}" class="btn btn-primary">Volver</a>
    </div>
@endsection
