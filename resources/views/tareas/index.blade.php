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
        <div class="table-responsive w-90 tabla-animada">
            <table class="table table-hover table-bordered table-striped text-center">
                <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Estado</th>
                    <th>Fecha Inicio</th>
                    <th>Fecha Fin</th>
                    <th>Proyecto</th>
                    <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($tareas as $tarea)
                    <tr class="tarjeta">
                        <td>{{ $tarea->id }}</td>
                        <td>{{ $tarea->nombre }}</td>
                        <td>{{ $tarea->descripcion }}</td>
                        <td>{{ $tarea->estado }}</td>
                        <td>{{ $tarea->fecha_inicio }}</td>
                        <td>{{ $tarea->fecha_fin }}</td>
                        <td>{{ $tarea->proyecto->nombre }}</td>
                        <td>
                            <a href="{{ route('tareas.edit', $tarea->id) }}" class="btn btn-warning btn-sm" title="Editar">
                                <i class="fa fa-edit"></i>
                            </a>
                            <form action="{{ route('tareas.destroy', $tarea->id) }}" method="POST" style="display:inline;">
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

    <!-- Estilos personalizados -->
    <style>
        /* Estilo del cuerpo de la página */
        body {
            font-family: 'Montserrat', sans-serif; /* Fuente Montserrat */
            background-color: whitesmoke; /* Fondo color blanco humo */
            color: #4a5568; /* Color de texto */
            margin: 0; /* Sin margen */
            display: flex; /* Flexbox para centrar */
            justify-content: center; /* Centrar horizontalmente */
            align-items: center; /* Centrar verticalmente */
            min-height: 100vh; /* Altura mínima de la ventana */
            overflow: hidden; /* Evita el desplazamiento durante las animaciones */
        }
        /* Contenido principal */
        .contenido-principal {
            padding: 16px;
            width: 100%;
            margin-top: 10px; /* Reduce la distancia desde el navbar */
            opacity: 0; /* Asegura que comienza oculto */
            animation: fade-in 1s ease-out forwards; /* Animación de aparición */
        }
        /* Tabla responsiva */
        .table-responsive {
            width: 90%; /* Ancho de la tabla al 90% */
            opacity: 0; /* Asegura que comienza oculto */
            transform: translateY(50px); /* Comienza 50px debajo */
            animation: slide-up 1s ease-out forwards, fade-in-table 1s ease-out forwards; /* Animaciones de deslizamiento y desvanecimiento */
        }
        /* Fuente más pequeña para la tabla */
        .table {
            font-size: 0.875rem; /* Tamaño de fuente reducido */
        }
        /* Estilos de las filas de la tabla */
        .tarjeta {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2); /* Sombra de las filas */
            transition: all 0.3s ease; /* Transición suave */
            width: 100%;
            font-family: 'Montserrat', sans-serif;
            cursor: pointer;
            height: auto; /* Altura auto para las filas */
            border: none; /* Sin borde */
            border-radius: 10px; /* Bordes redondeados */
            background-color: #fff; /* Fondo blanco */
            opacity: 0; /* Comienza oculto */
            animation: slide-in-up 1s ease-out forwards, fade-in 1s ease-out forwards; /* Animaciones */
            animation-delay: 0.5s; /* Retraso de la animación */
        }
        /* Efecto al pasar el cursor sobre las filas */
        .tarjeta:hover {
            box-shadow: 0 12px 24px 0 rgba(0, 0, 0, 0.3); /* Sombra más intensa */
            transform: translateY(-5px); /* Elevar ligeramente */
        }
        /* Animación de deslizamiento hacia arriba para la tabla */
        @keyframes slide-up {
            from {
                transform: translateY(50px); /* Comienza 50px debajo */
                opacity: 0; /* Comienza transparente */
            }
            to {
                transform: translateY(0); /* Llega a su posición original */
                opacity: 1; /* Totalmente opaco */
            }
        }
        /* Animación de desvanecimiento para la tabla */
        @keyframes fade-in-table {
            from {
                opacity: 0; /* Comienza transparente */
            }
            to {
                opacity: 1; /* Totalmente opaco */
            }
        }
        /* Animación de deslizamiento hacia arriba para las filas */
        @keyframes slide-in-up {
            from {
                transform: translateY(50px); /* Comienza 50px debajo */
                opacity: 0; /* Comienza transparente */
            }
            to {
                transform: translateY(0); /* Llega a su posición original */
                opacity: 1; /* Totalmente opaco */
            }
        }
        /* Animación de desvanecimiento */
        @keyframes fade-in {
            from {
                opacity: 0; /* Comienza transparente */
            }
            to {
                opacity: 1; /* Totalmente opaco */
            }
        }
        /* Cambia el color de la tabla a un gris más oscuro */
        .table-striped > tbody > tr:nth-of-type(odd) {
            background-color: rgba(0, 0, 0, 0.05); /* Ajusta el color de fondo de las filas impares */
        }
        .thead-dark {
            background-color: #343a40; /* Color de fondo más oscuro para el encabezado */
            color: white; /* Color del texto del encabezado */
        }
    </style>
@endsection
