@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Detalle de Tarea</h1>
        <div>
            <strong>ID:</strong> {{ $tarea->id }}
        </div>
        <div>
            <strong>Nombre:</strong> {{ $tarea->nombre }}
        </div>
        <div>
            <strong>Descripción:</strong> {{ $tarea->descripcion }}
        </div>
        <div>
            <strong>Estado:</strong> {{ $tarea->estado }}
        </div>
        <div>
            <strong>Fecha Inicio:</strong> {{ $tarea->fecha_inicio }}
        </div>
        <div>
            <strong>Fecha Fin:</strong> {{ $tarea->fecha_fin }}
        </div>
        <div>
            <strong>Proyecto:</strong> {{ $tarea->proyecto->nombre }}
        </div>
        <a href="{{ route('tareas.index') }}" class="btn btn-primary">Volver</a>
    </div>
@endsection
