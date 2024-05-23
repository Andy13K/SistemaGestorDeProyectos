@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Detalle de Categoria</h1>
        <div>
            <strong>ID:</strong> {{ $categoria->id }}
        </div>
        <div>
            <strong>Nombre:</strong> {{ $categoria->nombre }}
        </div>
        <div>
            <strong>Descripción:</strong> {{ $categoria->descripcion }}
        </div>
        <a href="{{ route('categorias.index') }}" class="btn btn-primary">Volver</a>
    </div>
@endsection
