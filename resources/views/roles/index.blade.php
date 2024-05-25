@extends('layouts.app')

@section('content')
    <div class="container-fluid contenido-principal">
        <div class="d-flex justify-content-between align-items-center mb-2">
            <h1 class="mb-0">Roles</h1>
            <div>
                <a href="{{ route('roles.create') }}" class="btn btn-primary">Crear Rol</a>
            </div>
        </div>
        <div class="table-responsive w-90 tabla-animada">
            <table class="table table-hover table-bordered table-striped text-center">
                <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($roles as $role)
                    <tr class="tarjeta">
                        <td>{{ $role->id }}</td>
                        <td>{{ $role->nombre }}</td>
                        <td>
                            <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-warning btn-sm" title="Editar">
                                <i class="fa fa-edit"></i>
                            </a>
                            <form action="{{ route('roles.destroy', $role->id) }}" method="POST" style="display:inline;">
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
@endsection
