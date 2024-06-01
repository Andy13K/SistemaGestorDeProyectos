@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 style="color: #28a745;">Proyectos por Cliente</h1>

        <div class="card" style="border: 2px solid #28a745; padding: 20px;">
            <form method="GET" action="{{ route('reportes.proyectos_por_cliente') }}">
                <div class="form-group">
                    <label for="cliente_id">Cliente</label>
                    <select name="cliente_id" id="cliente_id" class="form-control">
                        <option value="">Todos</option>
                        @foreach($clientes as $cliente)
                            <option value="{{ $cliente->id }}" {{ request('cliente_id') == $cliente->id ? 'selected' : '' }}>{{ $cliente->nombre }}</option>
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
                <div class="form-group d-flex justify-content-between">
                    <button type="submit" class="btn" style="background-color: #28a745; color: white;">Filtrar</button>
                    <button type="submit" formaction="{{ route('reportes.descargar_reporte_cliente') }}" class="btn" style="background-color: #1b5e20; color: white;">Descargar Reporte</button>
                    <a href="{{ url()->previous() }}" class="btn" style="background-color: #006400; color: white;">Regresar</a>
                </div>
            </form>
        </div>

        <div class="mt-4">
            @foreach($proyectos as $clienteId => $proyectosCliente)
                @php
                    $cliente = $clientes->find($clienteId);
                @endphp
                @if($cliente)
                    <h2>{{ $cliente->nombre }}</h2>
                    <ul>
                        @foreach($proyectosCliente as $proyecto)
                            <li>{{ $proyecto->nombre }}</li>
                        @endforeach
                    </ul>
                @else
                    <p>No hay proyectos para este cliente en el rango de fechas seleccionado.</p>
                @endif
            @endforeach
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        document.querySelector('form[action="{{ route('reportes.descargar_reporte_cliente') }}"]').addEventListener('submit', function() {
            document.querySelector('input[name="cliente_id"]').value = document.getElementById('cliente_id').value;
            document.querySelector('input[name="fecha_inicio"]').value = document.getElementById('fecha_inicio').value;
            document.querySelector('input[name="fecha_fin"]').value = document.getElementById('fecha_fin').value;
        });
    </script>
@endsection


