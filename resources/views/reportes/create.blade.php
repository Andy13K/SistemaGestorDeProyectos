@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Crear Reporte</h1>
        <form action="{{ route('reportes.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="tipo_reporte">Tipo de Reporte</label>
                <input type="text" class="form-control" id="tipo_reporte" name="tipo_reporte" required>
            </div>
            <div class="form-group">
                <label for="fecha">Fecha</label>
                <input type="date" class="form-control" id="fecha" name="fecha" required>
            </div>
            <div class="form-group">
                <label for="datos">Datos</label>
                <textarea class="form-control" id="datos" name="datos" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>
@endsection

