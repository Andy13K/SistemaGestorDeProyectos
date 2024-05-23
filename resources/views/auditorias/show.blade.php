@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Detalle de Auditoria</h1>
        <div>
            <strong>ID:</strong> {{ $auditoria->id }}
        </div>
        <div>
            <strong>Proyecto:</strong> {{ $auditoria->proyecto->nombre }}
        </div>
        <div>
            <strong>Fecha Auditoria:</strong> {{ $auditoria->fecha_auditoria }}
        </div>
        <div>
            <strong>Resultado:</strong> {{ $auditoria->resultado }}
        </div>
        <div>
            <strong>Observaciones:</strong> {{ $auditoria->observaciones }}
        </div>
        <a href="{{ route('auditorias.index') }}" class="btn btn-primary">Volver</a>
    </div>
@endsection

