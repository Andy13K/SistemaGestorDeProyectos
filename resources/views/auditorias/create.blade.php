@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Crear Auditoria</h1>
        <form action="{{ route('auditorias.store') }}" method="POST">
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
                <label for="fecha_auditoria">Fecha Auditoria</label>
                <input type="date" class="form-control" id="fecha_auditoria" name="fecha_auditoria" required>
            </div>
            <div class="form-group">
                <label for="resultado">Resultado</label>
                <input type="text" class="form-control" id="resultado" name="resultado" required>
            </div>
            <div class="form-group">
                <label for="observaciones">Observaciones</label>
                <textarea class="form-control" id="observaciones" name="observaciones"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>
@endsection

