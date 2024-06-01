@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="title-green">Crear Categoria</h1>
        <div class="form-box">
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
                    <button type="submit" class="btn btn-green">Guardar</button>
                    <a href="{{ route('categorias.index') }}" class="btn btn-dark-green ml-3">Regresar</a>
                </div>
            </form>
        </div>
    </div>
@endsection

<style>
    .form-box {
        border: 2px solid green; /* Línea verde */
        padding: 15px; /* Espacio interno */
        border-radius: 5px; /* Bordes redondeados */
        margin-top: 20px; /* Separación superior */
    }
    .title-green {
        color: green; /* Color verde para el título */
    }
    .btn-green {
        background-color: green !important; /* Color verde normal */
        color: white !important;
        border: none;
        padding: 10px 20px; /* Tamaño del botón */
        border-radius: 5px; /* Bordes redondeados */
        text-align: center;
        display: inline-block;
        font-size: 16px;
    }
    .btn-dark-green {
        background-color: darkgreen !important; /* Verde oscuro */
        color: white !important;
        border: none;
        padding: 10px 20px; /* Tamaño del botón */
        border-radius: 5px; /* Bordes redondeados */
        text-align: center;
        display: inline-block;
        font-size: 16px;
    }
    .btn-green:hover {
        background-color: darkgreen !important; /* Color verde oscuro al pasar el mouse */
    }
    .btn-dark-green:hover {
        background-color: green !important; /* Color verde normal al pasar el mouse */
    }
</style>
