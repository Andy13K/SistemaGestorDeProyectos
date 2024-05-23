@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Detalle de Usuario</h1>
        <div>
            <strong>ID:</strong> {{ $usuario->id }}
        </div>
        <div>
            <strong>Nombre:</strong> {{ $usuario->nombre }}
        </div>
        <div>
            <strong>Email:</strong> {{ $usuario->email }}
        </div>
        <div>
            <strong>Rol:</strong> {{ $usuario->rol }}
        </div>
        <a href="{{ route('usuarios.index') }}" class="btn btn-primary">Volver</a>
    </div>
@endsection

