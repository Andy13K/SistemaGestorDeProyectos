@extends('layouts.app')

@section('content')
    <div class="container-fluid contenido-principal">
        <div class="d-flex justify-content-between align-items-center mb-2">
            <h1 class="mb-0">Asignación de Recursos</h1>
            <div>
                <a href="{{ route('home') }}" class="btn btn-info">Regresar</a>
                <a href="{{ route('reportes.index') }}" class="btn btn-secondary">Generar Reportes</a>
                <a href="{{ route('asignacionrecursos.create') }}" class="btn btn-primary">Asignar Recurso</a>
            </div>
        </div>
        <div class="d-flex justify-content-center">
            <div class="table-responsive w-90 tabla-animada">
                <table class="table table-hover table-bordered table-striped text-center">
                    <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nombre del Proyecto</th>
                        <th>Descripción</th>
                        <th>Categoría</th>
                        <th>Líder</th>
                        <th>Cliente</th>
                        <th>Fecha de Creación</th>
                        <th>No. PC</th>
                        <th>Presupuesto</th>
                        <th>Fecha Límite</th>
                        <th>Días Restantes</th>
                        <th>Progreso</th>
                        <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($proyectos as $proyecto)
                        <tr class="tarjeta">
                            <td>{{ $proyecto->id }}</td>
                            <td>{{ $proyecto->nombre }}</td>
                            <td>{{ $proyecto->descripcion }}</td>
                            <td>{{ $proyecto->categoria->nombre ?? 'No asignado' }}</td>
                            <td>{{ $proyecto->lider->name ?? 'No asignado' }}</td>
                            <td>{{ $proyecto->cliente->nombre ?? 'No asignado' }}</td>
                            <td>{{ $proyecto->created_at->format('Y-m-d') }}</td>
                            <td>{{ $proyecto->num_computadoras }}</td>
                            <td>{{ $proyecto->presupuesto }}</td>
                            <td>{{ $proyecto->fecha_limite }}</td>
                            <td>{{ abs($proyecto->dias_restantes) ?? 'N/A' }}</td>
                            <td>
                                <div class="progress" style="border: 1px solid black; position: relative; height: 30px;">
                                    @php
                                        $color = 'bg-danger';
                                        if ($proyecto->porcentajeCompletado > 25) $color = 'bg-warning';
                                        if ($proyecto->porcentajeCompletado > 50) $color = 'bg-info';
                                        if ($proyecto->porcentajeCompletado > 75) $color = 'bg-success';
                                    @endphp
                                    <div class="progress-bar {{ $color }}" role="progressbar" style="width: {{ $proyecto->porcentajeCompletado }}%;" aria-valuenow="{{ $proyecto->porcentajeCompletado }}" aria-valuemin="0" aria-valuemax="100">
                                    </div>
                                    <span style="position: absolute; width: 100%; left: 0; top: 0; text-align: center; line-height: 30px; z-index: 1; color: black;">
                                        {{ round($proyecto->porcentajeCompletado, 2) }}%
                                    </span>
                                </div>
                            </td>
                            <td class="acciones">
                                <a href="{{ route('proyectos.show', $proyecto->id) }}" class="btn btn-info btn-sm" title="Ver Progreso">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <a href="{{ route('proyectos.edit', $proyecto->id) }}" class="btn btn-warning btn-sm" title="Editar">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <form action="{{ route('proyectos.destroy', $proyecto->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" title="Eliminar">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

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
        .table-responsive {
            width: 90%;
            opacity: 0;
            transform: translateY(50px);
            animation: slide-up 1s ease-out forwards, fade-in-table 1s ease-out forwards;
        }
        .table {
            font-size: 0.875rem;
        }
        .tarjeta {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            transition: all 0.3s ease;
            width: 100%;
            font-family: 'Montserrat', sans-serif;
            cursor: pointer;
            height: auto;
            border: none;
            border-radius: 10px;
            background-color: #fff;
            opacity: 0;
            animation: slide-in-up 1s ease-out forwards, fade-in 1s ease-out forwards;
            animation-delay: 0.5s;
        }
        .tarjeta:hover {
            box-shadow: 0 12px 24px 0 rgba(0, 0, 0, 0.3);
            transform: translateY(-5px);
        }
        @keyframes slide-up {
            from {
                transform: translateY(50px);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }
        @keyframes fade-in-table {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }
        @keyframes slide-in-up {
            from {
                transform: translateY(50px);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }
        @keyframes fade-in {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }
        .table-striped > tbody > tr:nth-of-type(odd) {
            background-color: rgba(0, 0, 0, 0.05);
        }
        .thead-dark {
            background-color: #343a40;
            color: white;
        }
        .acciones {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 5px;
        }
        .acciones a, .acciones button {
            display: inline-block;
        }
        .acciones form {
            margin: 0;
        }
    </style>
@endsection
