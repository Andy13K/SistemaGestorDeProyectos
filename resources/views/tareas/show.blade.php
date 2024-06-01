@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="card border-success">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <h1 class="card-title">Sistema Mineduc</h1>
                        <p class="card-text text-muted">Fecha de entrega: {{ $tarea->fecha_fin }}</p>
                        <div class="d-flex align-items-center mb-3">
                            <span class="badge {{ $tarea->estado == 'Entregado' ? 'bg-success' : 'bg-danger' }} me-2">{{ $tarea->estado }}</span>
                            <h2 class="mb-0">{{ $tarea->nombre }}</h2>
                        </div>
                        <h5>Detalles</h5>
                        <p class="card-text">{{ $tarea->descripcion }}</p>
                        <p class="card-text"><strong>Fecha Inicio:</strong> {{ $tarea->fecha_inicio }}</p>
                        <p class="card-text"><strong>Fecha Fin:</strong> {{ $tarea->fecha_fin }}</p>
                        <p class="card-text"><strong>Proyecto:</strong> {{ $tarea->proyecto->nombre }}</p>
                    </div>
                    @if($tarea->estado !== 'Entregado')
                        <div class="upload-section text-center">
                            <form action="{{ route('tareas.upload', $tarea->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="upload-container text-center">
                                    <label for="archivo" class="upload-label">
                                        <img src="{{ asset('image/repres.png') }}" alt="Upload icon" class="upload-icon mb-2">
                                        <div>Arrastrar un archivo hasta aquí, o</div>
                                        <div><span>Elija un archivo para cargar</span></div>
                                    </label>
                                    <input type="file" class="form-control-file" id="archivo" name="archivo" required>
                                </div>
                                <div class="d-flex justify-content-center mt-3">
                                    <button type="submit" class="btn btn-dark">Presentar tarea</button>
                                </div>
                            </form>
                        </div>
                    @endif
                </div>
                <div class="text-center mt-3">
                    <a href="{{ route('tareas.index') }}" class="btn btn-success">Regresar</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Estilos personalizados -->
    <style>
        .card {
            background-color: #fff;
            border: 1px solid #e3e6f0;
            border-radius: .35rem;
        }
        .card.border-success {
            border-color: #28a745;
        }
        .upload-container {
            border: 2px dashed #ccc;
            padding: 20px;
            background-color: #f9f9f9;
            cursor: pointer;
            max-width: 250px;
            height: 250px;  /* Mantiene la altura anterior */
            margin: 0 auto;
        }
        .upload-label {
            cursor: pointer;
            font-weight: bold;
            color: #007bff;
            display: flex;
            flex-direction: column;
            align-items: center;
            height: 100%;
            justify-content: center;
        }
        .upload-icon {
            max-width: 100%;  /* Ajusta el tamaño de la imagen */
            max-height: 100px;  /* Limita la altura de la imagen */
        }
        .form-control-file {
            display: none;
        }
        .badge.bg-danger {
            background-color: #dc3545;
        }
        .badge.bg-success {
            background-color: #28a745;
        }
        .btn-success {
            background-color: #28a745;
            border-color: #28a745;
        }
        .btn-dark {
            background-color: #37f357; /* Verde oscuro */
            border-color: #7ff81b;
        }
        .d-flex.justify-content-center {
            justify-content: center;
        }
        .d-flex.justify-content-center .btn {
            margin-right: 10px;
        }
        .d-flex.justify-content-center .btn:last-child {
            margin-right: 0;
        }
    </style>
@endsection
