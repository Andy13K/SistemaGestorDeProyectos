@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-success" style="color: #28a745;">Crear Proyecto</h1>

        <div class="p-4 rounded" style="max-height: 600px; overflow-y: auto; border: 2px solid #28a745;">
            <form action="{{ route('proyectos.store') }}" method="POST" class="form-horizontal">
                @csrf

                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="nombre">Nombre</label>
                        <input type="text" name="nombre" id="nombre" class="form-control" required>
                    </div>

                    <div class="form-group col-md-4">
                        <label for="categoria_id">Categoría</label>
                        <select name="categoria_id" id="categoria_id" class="form-control" required>
                            @foreach($categorias as $categoria)
                                <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-md-4">
                        <label for="lider_id">Líder del Proyecto</label>
                        <select name="lider_id" id="lider_id" class="form-control" required>
                            @foreach($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="cliente_id">Cliente</label>
                        <select name="cliente_id" id="cliente_id" class="form-control">
                            <option value="">Seleccione un cliente</option>
                            @foreach($clientes as $cliente)
                                <option value="{{ $cliente->id }}">{{ $cliente->nombre }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-md-4">
                        <label for="fecha">Fecha</label>
                        <input type="date" name="fecha" id="fecha" class="form-control" required>
                    </div>

                    <div class="form-group col-md-4">
                        <label for="num_computadoras">Número de Computadoras</label>
                        <input type="number" name="num_computadoras" id="num_computadoras" class="form-control" required min="0">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="presupuesto">Presupuesto</label>
                        <input type="number" name="presupuesto" id="presupuesto" class="form-control" required min="0" step="0.01">
                    </div>

                    <div class="form-group col-md-4">
                        <label for="fecha_limite">Fecha Límite</label>
                        <input type="date" name="fecha_limite" id="fecha_limite" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <label for="descripcion">Descripción</label>
                    <textarea name="descripcion" id="descripcion" class="form-control" required></textarea>
                </div>

                <div class="mt-3 d-flex justify-content-between">
                    <button type="submit" class="btn" style="background-color: #32CD32; color: white; margin-right: 10px;">Guardar</button>
                    <a href="{{ route('proyectos.index') }}" class="btn" style="background-color: #006400; color: white; margin-left: 10px;">Regresar</a>
                </div>
            </form>
        </div>
    </div>
@endsection
