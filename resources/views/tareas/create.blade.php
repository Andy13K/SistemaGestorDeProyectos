@extends('layouts.app')

@section('content')
    <div class="container-fluid contenido-principal">
        <h3 class="text-success text-center mb-4">Crear Tarea</h3>
        <div class="card border-success">
            <div class="card-body d-flex justify-content-between">
                <form action="{{ route('tareas.store') }}" method="POST" class="w-100">
                    @csrf
                    <div class="form-row d-flex justify-content-between mb-3">
                        <div class="form-group col-md-4">
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="estado">Estado</label>
                            <input type="text" class="form-control" id="estado" name="estado" value="Activo" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="proyecto_id">Proyecto</label>
                            <select class="form-control" id="proyecto_id" name="proyecto_id" required>
                                @foreach ($proyectos as $proyecto)
                                    <option value="{{ $proyecto->id }}">{{ $proyecto->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-row d-flex justify-content-between mb-3">
                        <div class="form-group col-md-6">
                            <label for="fecha_inicio">Fecha Inicio</label>
                            <input type="date" class="form-control" id="fecha_inicio" name="fecha_inicio" value="{{ date('Y-m-d') }}" readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="fecha_fin">Fecha Fin</label>
                            <input type="date" class="form-control" id="fecha_fin" name="fecha_fin">
                        </div>
                    </div>
                    <div class="form-row mb-3">
                        <div class="form-group col-md-12">
                            <label for="descripcion">Descripción</label>
                            <textarea class="form-control" id="descripcion" name="descripcion" required></textarea>
                        </div>
                    </div>
                    <div class="form-row d-flex justify-content-between mt-3">
                        <button type="submit" class="btn btn-success">Guardar</button>
                        <a href="{{ route('tareas.index') }}" class="btn btn-success">Regresar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Estilos personalizados -->
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
            background-color: whitesmoke;
            color: #4a5568;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            overflow: hidden;
        }
        .contenido-principal {
            padding: 16px;
            width: 100%;
            margin-top: 10px;
            opacity: 0;
            animation: fade-in 1s ease-out forwards;
        }
        .card {
            width: 100%;
            max-width: 1200px; /* Ajusta según tu necesidad */
            margin: auto;
            display: flex;
        }
        .btn-success {
            background-color: #28a745;
            border-color: #28a745;
        }
        @keyframes fade-in {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }
        .card.border-success {
            border-color: #28a745;
        }
    </style>
@endsection
