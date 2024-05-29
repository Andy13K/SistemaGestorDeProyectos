@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Editar Tarea</h1>
        <form action="{{ route('tareas.update', $tarea->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $tarea->nombre }}" required>
            </div>
            <div class="form-group">
                <label for="descripcion">Descripción</label>
                <textarea class="form-control" id="descripcion" name="descripcion" required>{{ $tarea->descripcion }}</textarea>
            </div>
            <div class="form-group">
                <label for="estado">Estado</label>
                <input type="text" class="form-control" id="estado" name="estado" value="{{ $tarea->estado }}" required>
            </div>
            <div class="form-group">
                <label for="fecha_inicio">Fecha Inicio</label>
                <input type="date" class="form-control" id="fecha_inicio" name="fecha_inicio" value="{{ $tarea->fecha_inicio }}">
            </div>
            <div class="form-group">
                <label for="fecha_fin">Fecha Fin</label>
                <input type="date" class="form-control" id="fecha_fin" name="fecha_fin" value="{{ $tarea->fecha_fin }}">
            </div>
            <div class="form-group">
                <label for="proyecto_id">Proyecto</label>
                <select class="form-control" id="proyecto_id" name="proyecto_id" required>
                    @foreach ($proyectos as $proyecto)
                        <option value="{{ $proyecto->id }}" {{ $tarea->proyecto_id == $proyecto->id ? 'selected' : '' }}>{{ $proyecto->nombre }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mt-3 d-flex justify-content-between">
                <button type="submit" class="btn btn-primary" style="margin-right: 10px;">Guardar</button>
                <a href="{{ route('tareas.index') }}" class="btn btn-secondary" style="margin-left: 10px;">Regresar</a>
            </div>
        </form>
    </div>
@endsection


