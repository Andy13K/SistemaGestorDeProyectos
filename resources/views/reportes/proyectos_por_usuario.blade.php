@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Proyectos por Usuario</h1>

        <form method="GET" action="{{ route('reportes.proyectos_por_usuario') }}">
            <div class="form-group">
                <label for="usuario_id">Usuario</label>
                <select name="usuario_id" id="usuario_id" class="form-control">
                    <option value="">Todos</option>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}" {{ request('usuario_id') == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="fecha_inicio">Fecha de Inicio:</label>
                <input type="date" name="fecha_inicio" id="fecha_inicio" class="form-control" value="{{ request('fecha_inicio') }}">
            </div>
            <div class="form-group">
                <label for="fecha_fin">Fecha de Fin:</label>
                <input type="date" name="fecha_fin" id="fecha_fin" class="form-control" value="{{ request('fecha_fin') }}">
            </div>
            <button type="submit" class="btn btn-primary">Filtrar</button>
        </form>

        <form method="GET" action="{{ route('reportes.descargar_reporte') }}" style="margin-top: 20px;">
            <input type="hidden" name="usuario_id" value="{{ request('usuario_id') }}">
            <input type="hidden" name="fecha_inicio" value="{{ request('fecha_inicio') }}">
            <input type="hidden" name="fecha_fin" value="{{ request('fecha_fin') }}">
            <button type="submit" class="btn btn-secondary">Descargar Reporte</button>
        </form>

        <div class="mt-4">
            @foreach($proyectos as $usuarioId => $proyectosUsuario)
                @php
                    $usuario = $users->find($usuarioId);
                @endphp
                @if($usuario)
                    <h2>{{ $usuario->name }}</h2>
                    <ul>
                        @foreach($proyectosUsuario as $proyecto)
                            <li>{{ $proyecto->nombre }}</li>
                        @endforeach
                    </ul>
                @else
                    <p>No hay proyectos para este usuario en el rango de fechas seleccionado.</p>
                @endif
            @endforeach
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        document.querySelector('form[action="{{ route('reportes.descargar_reporte') }}"]').addEventListener('submit', function() {
            document.querySelector('input[name="usuario_id"]').value = document.getElementById('usuario_id').value;
            document.querySelector('input[name="fecha_inicio"]').value = document.getElementById('fecha_inicio').value;
            document.querySelector('input[name="fecha_fin"]').value = document.getElementById('fecha_fin').value;
        });
    </script>
@endsection
