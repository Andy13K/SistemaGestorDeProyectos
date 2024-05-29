@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Editar Categoria</h1>
        <form action="{{ route('categorias.update', $categoria->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $categoria->nombre }}" required>
            </div>
            <div class="form-group">
                <label for="descripcion">Descripción</label>
                <textarea class="form-control" id="descripcion" name="descripcion">{{ $categoria->descripcion }}</textarea>
            </div>
            <div class="mt-3">
                <button type="submit" class="btn btn-primary">Actualizar</button>
                <a href="{{ route('categorias.index') }}" class="btn btn-secondary" style="margin-left: 30px;">Regresar</a>
            </div>
        </form>
    </div>
@endsection




