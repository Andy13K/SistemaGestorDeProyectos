@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 style="color: #28a745;">Crear Nuevo Usuario</h1>
        <div class="bg-light-green p-3">
            <form action="{{ route('users.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Nombre:</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="email">Correo Electrónico:</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="password">Contraseña:</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <button type="submit" class="btn btn-green-normal">Enviar</button>
                <a href="{{ route('users.index') }}" class="btn btn-green-dark">Regresar</a>
            </form>
        </div>
    </div>
@endsection

@section('styles')
    <style>
        .bg-light-green {
            background-color: #d4edda; /* Verde claro */
            border-radius: 5px;
            padding: 20px; /* Ajusta el padding para que se vea mejor */
            border: 2px solid #28a745; /* Borde verde */
        }

        .btn-green-normal {
            background-color: #28a745; /* Verde normal */
            color: white;
            border: none;
            padding: 10px 20px; /* Añade padding para mejorar la apariencia */
            font-size: 16px; /* Ajusta el tamaño de fuente */
            cursor: pointer;
            margin-right: 10px; /* Espaciado entre botones */
        }

        .btn-green-normal:hover {
            background-color: #218838; /* Verde más oscuro al pasar el mouse */
        }

        .btn-green-dark {
            background-color: #155724; /* Verde oscuro */
            color: white;
            border: none;
            padding: 10px 20px; /* Añade padding para mejorar la apariencia */
            font-size: 16px; /* Ajusta el tamaño de fuente */
            cursor: pointer;
        }

        .btn-green-dark:hover {
            background-color: #0b2e13; /* Verde aún más oscuro al pasar el mouse */
        }
    </style>
@endsection
