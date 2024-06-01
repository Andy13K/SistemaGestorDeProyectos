@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 style="color: #28a745;">Crear Cliente</h1>
        <div style="border: 2px solid #28a745; padding: 20px; border-radius: 5px;">
            <form action="{{ route('clientes.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="telefono">Teléfono</label>
                            <input type="text" class="form-control" id="telefono" name="telefono">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="direccion">Dirección</label>
                            <textarea class="form-control" id="direccion" name="direccion"></textarea>
                        </div>
                    </div>
                </div>
                <div class="mt-3 d-flex justify-content-between">
                    <button type="submit" class="btn btn-success" style="margin-right: 10px;">Guardar</button>
                    <a href="{{ route('clientes.index') }}" class="btn btn-dark" style="margin-left: 10px; background-color: #155724; border-color: #155724;">Regresar</a>
                </div>
            </form>
        </div>
    </div>
@endsection
