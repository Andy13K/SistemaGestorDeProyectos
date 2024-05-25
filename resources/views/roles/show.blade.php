@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Detalle de Rol</h1>
        <div>
            <strong>ID:</strong> {{ $role->id }}
        </div>
        <div>
            <strong>Nombre:</strong> {{ $role->nombre }}
        </div>
        <a href="{{ route('roles.index') }}" class="btn btn-primary">Volver</a>
    </div>
@endsection
