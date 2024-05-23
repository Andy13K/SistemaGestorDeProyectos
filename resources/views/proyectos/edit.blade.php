@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Editar Proyecto</h1>
        <form action="{{ route('proyectos.update', $proyecto->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $proyecto->nombre }}" required>
            </div>
            <div class="form-group">
                <label for="descripcion">Descripción</label>
                <textarea class="form-control" id="descripcion" name="descripcion" required>{{ $proyecto->descripcion }}</textarea>
            </div>
            <div class="form-group">
                <label for="categoria_id">Categoría</label>
                <select class="form-control" id="categoria_id" name="categoria_id" required>
                    @foreach ($categorias as $categoria)
                        <option value="{{ $categoria->id }}" {{ $proyecto->categoria_id == $categoria->id ? 'selected' : '' }}>{{ $categoria->nombre }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="lider_id">Líder</label>
                <select class="form-control" id="lider_id" name="lider_id" required>
                    @foreach ($usuarios as $usuario)
                        <option value="{{ $usuario->id }}" {{ $proyecto->lider_id == $usuario->id ? 'selected' : '' }}>{{ $usuario->nombre }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="cliente_id">Cliente</label>
                <select class="form-control" id="cliente_id" name="cliente_id" required>
                    @foreach ($clientes as $cliente)
                        <option value="{{ $cliente->id }}" {{ $proyecto->cliente_id == $cliente->id ? 'selected' : '' }}>{{ $cliente->nombre }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="fecha">Fecha</label>
                <input type="date" class="form-control" id="fecha" name="fecha" value="{{ $proyecto->fecha }}" required>
            </div>
            <div class="form-group">
                <label for="num_computadoras">Número de Computadoras</label>
                <input type="number" class="form-control" id="num_computadoras" name="num_computadoras" value="{{ $proyecto->num_computadoras }}" required>
            </div>
            <div class="form-group">
                <label for="presupuesto">Presupuesto</label>
                <input type="number" step="0.01" class="form-control" id="presupuesto" name="presupuesto" value="{{ $proyecto->presupuesto }}" required>
            </div>
            <div class="form-group">
                <label for="fecha_limite">Fecha Límite</label>
                <input type="date" class="form-control" id="fecha_limite" name="fecha_limite" value="{{ $proyecto->fecha_limite }}">
            </div>
            <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
    </div>
@endsection

