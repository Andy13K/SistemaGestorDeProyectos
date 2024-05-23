@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Asignar Recurso</h1>
        <form action="{{ route('asignacionrecursos.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="proyecto_id">Proyecto</label>
                <select class="form-control" id="proyecto_id" name="proyecto_id" required>
                    @foreach ($proyectos as $proyecto)
                        <option value="{{ $proyecto->id }}">{{ $proyecto->nombre }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="usuario_id">Usuario</label>
                <select class="form-control" id="usuario_id" name="usuario_id" required>
                    @foreach ($usuarios as $usuario)
                        <option value="{{ $usuario->id }}">{{ $usuario->nombre }}</option>
                    @endforeach
                </select>
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
                <input type="date" class="form-control" id="fecha_limite" name="fecha_limite" required>
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>
@endsection

