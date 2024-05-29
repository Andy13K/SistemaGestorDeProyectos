@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Editar Proyecto</h1>

        <form action="{{ route('proyectos.update', $proyecto->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" id="nombre" class="form-control" value="{{ $proyecto->nombre }}" required>
            </div>

            <div class="form-group">
                <label for="descripcion">Descripción</label>
                <textarea name="descripcion" id="descripcion" class="form-control" required>{{ $proyecto->descripcion }}</textarea>
            </div>

            <div class="form-group">
                <label for="categoria_id">Categoría</label>
                <select name="categoria_id" id="categoria_id" class="form-control" required>
                    @foreach($categorias as $categoria)
                        <option value="{{ $categoria->id }}" {{ $proyecto->categoria_id == $categoria->id ? 'selected' : '' }}>
                            {{ $categoria->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="lider_id">Líder del Proyecto</label>
                <select name="lider_id" id="lider_id" class="form-control" required>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}" {{ $proyecto->lider_id == $user->id ? 'selected' : '' }}>
                            {{ $user->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="cliente_id">Cliente</label>
                <select name="cliente_id" id="cliente_id" class="form-control">
                    @foreach($clientes as $cliente)
                        <option value="{{ $cliente->id }}" {{ $proyecto->cliente_id == $cliente->id ? 'selected' : '' }}>
                            {{ $cliente->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="num_computadoras">Número de Computadoras</label>
                <input type="number" name="num_computadoras" id="num_computadoras" class="form-control" value="{{ $proyecto->num_computadoras }}" required min="0">
            </div>

            <div class="form-group">
                <label for="presupuesto">Presupuesto</label>
                <input type="number" name="presupuesto" id="presupuesto" class="form-control" value="{{ $proyecto->presupuesto }}" required min="0" step="0.01">
            </div>

            <div class="form-group">
                <label for="fecha_limite">Fecha Límite</label>
                <input type="date" name="fecha_limite" id="fecha_limite" class="form-control" value="{{ $proyecto->fecha_limite }}">
            </div>

            <button type="submit" class="btn btn-primary">Actualizar Proyecto</button>
        </form>
    </div>
@endsection

