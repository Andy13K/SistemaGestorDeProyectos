@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Editar Progreso</h1>
        <form action="{{ route('progresoproyectos.update', $progresoProyecto->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="proyecto_id">Proyecto</label>
                <select class="form-control" id="proyecto_id" name="proyecto_id" required>
                    @foreach ($proyectos as $proyecto)
                        <option value="{{ $proyecto->id }}" {{ $progresoProyecto->proyecto_id == $proyecto->id ? 'selected' : '' }}>{{ $proyecto->nombre }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="porcentaje">Porcentaje</label>
                <input type="number" class="form-control" id="porcentaje" name="porcentaje" value="{{ $progresoProyecto->porcentaje }}" required>
            </div>
            <div class="form-group">
                <label for="descripcion">Descripción</label>
                <textarea class="form-control" id="descripcion" name="descripcion">{{ $progresoProyecto->descripcion }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
    </div>
@endsection

