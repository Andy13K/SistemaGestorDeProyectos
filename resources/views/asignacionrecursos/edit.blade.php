@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Editar Asignación de Recurso</h1>
        <form action="{{ route('asignacionrecursos.update', $asignacionRecurso->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="proyecto_id">Proyecto</label>
                <select class="form-control" id="proyecto_id" name="proyecto_id" required>
                    @foreach ($proyectos as $proyecto)
                        <option value="{{ $proyecto->id }}" {{ $asignacionRecurso->proyecto_id == $proyecto->id ? 'selected' : '' }}>{{ $proyecto->nombre }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="usuario_id">Usuario</label>
                <select class="form-control" id="usuario_id" name="usuario_id" required>
                    @foreach ($usuarios as $usuario)
                        <option value="{{ $usuario->id }}" {{ $asignacionRecurso->usuario_id == $usuario->id ? 'selected' : '' }}>{{ $usuario->nombre }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="num_computadoras">Número de Computadoras</label>
                <input type="number" class="form-control" id="num_computadoras" name="num_computadoras" value="{{ $asignacionRecurso->num_computadoras }}" required>
            </div>
            <div class="form-group">
                <label for="presupuesto">Presupuesto</label>
                <input type="number" step="0.01" class="form-control" id="presupuesto" name="presupuesto" value="{{ $asignacionRecurso->presupuesto }}" required>
            </div>
            <div class="form-group">
                <label for="fecha_limite">Fecha Límite</label>
                <input type="date" class="form-control" id="fecha_limite" name="fecha_limite" value="{{ $asignacionRecurso->fecha_limite }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
    </div>
@endsection

