@extends('layouts.app')

@section('content')
    <div class="container-fluid contenido-principal">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="mb-0">Usuarios</h1>
            <div class="d-flex ml-5">
                <a href="{{ route('home') }}" class="btn btn-info mr-3">Regresar</a>
                <a href="{{ route('users.create') }}" class="btn btn-primary">Crear Usuario</a>
            </div>
        </div>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="d-flex justify-content-center">
            <div class="table-responsive w-100">
                <table class="table table-hover table-bordered table-striped text-center w-100">
                    <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($users as $user)
                        <tr class="tarjeta">
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <a href="{{ route('users.show', $user->id) }}" class="btn btn-info btn-sm action-btn" title="Ver">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning btn-sm action-btn" title="Editar">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm action-btn" title="Eliminar">
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
        .contenido-principal {
            padding: 16px;
            width: 100%;
            margin-top: 50px;
            opacity: 0;
            animation: fade-in 1s ease-out forwards;
        }
        .table-responsive {
            width: 100%;
            opacity: 0;
            transform: translateY(50px);
            animation: slide-up 1s ease-out forwards, fade-in-table 1s ease-out forwards;
        }
        .table {
            font-size: 1.2rem;
            width: 100%;
        }
        .tarjeta {
            box-shadow: 0 4px 8px 0 rgb(250, 250, 250);
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
            box-shadow: 0 12px 24px 0 rgb(250, 250, 250);
            transform: translateY(-5px);
        }
        .thead-dark {
            background-color: white;
            color: white;
        }
        .mr-3 {
            margin-right: 1.5rem;
        }
        .ml-5 {
            margin-left: 4rem;
        }
        .action-btn {
            margin-right: 5px;
        }
        .action-btn i {
            margin-right: 0;
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
    </style>
@endsection
