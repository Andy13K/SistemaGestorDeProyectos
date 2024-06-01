@extends('layouts.app')

@section('content')
    <div class="container-fluid contenido-principal">
        <div class="d-flex justify-content-between align-items-center mb-2">
            <h1 class="mb-0">Tareas</h1>
            <div>
                <a href="{{ route('home') }}" class="btn btn-info">Regresar</a>
                <a href="{{ route('tareas.create') }}" class="btn btn-primary">Crear Tarea</a>
            </div>
        </div>
        <div class="accordion" id="accordionTareas">
            @foreach ($tareas as $tarea)
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center" id="heading{{ $tarea->id }}">
                        <h2 class="mb-0">
                            <a href="{{ route('tareas.show', $tarea->id) }}" class="btn btn-link btn-block text-left">
                                {{ $tarea->nombre }}
                                <span class="text-muted">- Disponible hasta {{ $tarea->fecha_fin }} | Fecha de entrega {{ $tarea->fecha_fin }}</span>
                            </a>
                        </h2>
                        <div class="d-flex align-items-center">
                            <form action="{{ route('tareas.destroy', $tarea->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que quieres eliminar esta tarea?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
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
        .accordion .card {
            margin-bottom: 1rem;
        }
        .accordion .card-header {
            background-color: #f8f9fa;
        }
        .btn-link {
            color: #007bff;
            text-decoration: none;
        }
        .text-muted {
            color: #6c757d;
        }
        @keyframes fade-in {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }
        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
            color: #fff;
        }
    </style>
@endsection
