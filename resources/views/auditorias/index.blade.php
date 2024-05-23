@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Auditorias</h1>
        <a href="{{ route('auditorias.create') }}" class="btn btn-primary">Crear Auditoria</a>
        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Proyecto</th>
                <th>Fecha Auditoria</th>
                <th>Resultado</th>
                <th>Acciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($auditorias as $auditoria)
                <tr>
                    <td>{{ $auditoria->id }}</td>
                    <td>{{ $auditoria->proyecto->nombre }}</td>
                    <td>{{ $auditoria->fecha_auditoria }}</td>
                    <td>{{ $auditoria->resultado }}</td>
                    <td>
                        <a href="{{ route('auditorias.edit', $auditoria->id) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('auditorias.destroy', $auditoria->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection

