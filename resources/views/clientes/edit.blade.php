@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Editar Cliente</h1>
        <form action="{{ route('clientes.update', $cliente->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $cliente->nombre }}" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $cliente->email }}" required>
            </div>
            <div class="form-group">
                <label for="telefono">Teléfono</label>
                <input type="text" class="form-control" id="telefono" name="telefono" value="{{ $cliente->telefono }}">
            </div>
            <div class="form-group">
                <label for="direccion">Dirección</label>
                <textarea class="form-control" id="direccion" name="direccion">{{ $cliente->direccion }}</textarea>
            </div>
            <div class="mt-3 d-flex justify-content-between">
                <button type="submit" class="btn btn-primary" style="margin-right: 10px;">Guardar</button>
                <a href="{{ route('clientes.index') }}" class="btn btn-secondary" style="margin-left: 10px;">Regresar</a>
            </div>
        </form>
    </div>
@endsection
