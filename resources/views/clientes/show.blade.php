@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Detalle de Cliente</h1>
        <div>
            <strong>ID:</strong> {{ $cliente->id }}
        </div>
        <div>
            <strong>Nombre:</strong> {{ $cliente->nombre }}
        </div>
        <div>
            <strong>Email:</strong> {{ $cliente->email }}
        </div>
        <div>
            <strong>Teléfono:</strong> {{ $cliente->telefono }}
        </div>
        <div>
            <strong>Dirección:</strong> {{ $cliente->direccion }}
        </div>
        <a href="{{ route('clientes.index') }}" class="btn btn-primary">Volver</a>
    </div>
@endsection

