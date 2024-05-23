@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Crear Proyecto</h1>
        <form action="{{ route('proyectos.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>
            <div class="form-group">
                <label for="descripcion">Descripción</label>
                <textarea class="form-control" id="descripcion" name="descripcion" required></textarea>
            </div>
            <div class="form-group">
                <label for="categoria_id">Categoría</label>
                <select class="form-control" id="categoria_id" name="categoria_id" required>
                    @foreach ($categorias as $categoria)
                        <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="lider_id">Líder</label>
                <select class="form-control" id="lider_id" name="lider_id" required>
                    @foreach ($usuarios as $usuario)
                        <option value="{{ $usuario->id }}">{{ $usuario->nombre }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="cliente_id">Cliente</label>
                <select class="form-control" id="cliente_id" name="cliente_id" required>
                    @foreach ($clientes as $cliente)
                        <option value="{{ $cliente->id }}">{{ $cliente->nombre }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="fecha">Fecha</label>
                <input type="date" class="form-control" id="fecha" name="fecha" required>
            </div>
            <div class="form-group">
                <label for="num_computadoras">Número de Computadoras</label>
                <input type="number" class="form-control" id="num_computadoras" name="num_computadoras" required>
            </div>
            <div class="form-group">
                <label for="presupuesto">Presupuesto</label>
                <input type="number" step="0.01" class="form-control" id="presupuesto" name="presupuesto" required>
            </div>
            <div class="form-group">
                <label for="fecha_limite">Fecha Límite</label>
                <input type="date" class="form-control" id="fecha_limite" name="fecha_limite">
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>
@endsection

