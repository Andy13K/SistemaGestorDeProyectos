@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Detalle de Reporte</h1>
        <div>
            <strong>ID:</strong> {{ $reporte->id }}
        </div>
        <div>
            <strong>Tipo de Reporte:</strong> {{ $reporte->tipo_reporte }}
        </div>
        <div>
            <strong>Fecha:</strong> {{ $reporte->fecha }}
        </div>
        <div>
            <strong>Datos:</strong> {{ $reporte->datos }}
        </div>
        <a href="{{ route('reportes.index') }}" class="btn btn-primary">Volver</a>
    </div>
@endsection

