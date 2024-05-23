@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Registrar Progreso</h1>
        <form action="{{ route('progresoproyectos.store') }}" method="POST">
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
                <label for="porcentaje">Porcentaje</label>
                <input type="number" class="form-control" id="porcentaje" name="porcentaje" required>
            </div>
            <div class="form-group">
                <label for="descripcion">Descripción</label>
                <textarea class="form-control" id="descripcion" name="descripcion"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>
@endsection

