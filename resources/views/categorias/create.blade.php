@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Crear Categoria</h1>
        <form action="{{ route('categorias.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>
            <div class="form-group">
                <label for="descripcion">Descripción</label>
                <textarea class="form-control" id="descripcion" name="descripcion"></textarea>
            </div>
            <div class="d-flex mt-3">
                <button type="submit" class="btn btn-primary">Guardar</button>
                <a href="{{ route('categorias.index') }}" class="btn btn-secondary ml-3">Regresar</a>
            </div>
        </form>
    </div>
@endsection
<style>
    .d-flex .btn-secondary {
        margin-left: 30px; /* Ajusta este valor según sea necesario */
    }
</style>
