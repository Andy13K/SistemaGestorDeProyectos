@extends('layouts.app')

@section('content')
    <div class="container text-center mt-4">
        <h1 class="text-success">Reportes</h1>
        <br>
        <div class="row justify-content-center">
            <div class="col-md-2 mb-4">
                <a href="{{ route('reportes.proyectos_por_fecha') }}" class="text-decoration-none">
                    <div class="card text-white bg-primary">
                        <div class="card-body">
                            <h5 class="card-title">Proyectos por Fecha</h5>
                            <p class="card-text">Ir al Módulo</p>
                            <i class="fa fa-calendar fa-2x"></i>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-2 mb-4">
                <a href="{{ route('reportes.proyectos_en_ejecucion') }}" class="text-decoration-none">
                    <div class="card text-white bg-success">
                        <div class="card-body">
                            <h5 class="card-title">Proyectos en Ejecución</h5>
                            <p class="card-text">Ir al Módulo</p>
                            <i class="fa fa-tasks fa-2x"></i>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-2 mb-4">
                <a href="{{ route('reportes.proyectos_finalizados') }}" class="text-decoration-none">
                    <div class="card text-white bg-danger">
                        <div class="card-body">
                            <h5 class="card-title">Proyectos Finalizados</h5>
                            <p class="card-text">Ir al Módulo</p>
                            <i class="fa fa-check fa-2x"></i>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-2 mb-4">
                <a href="{{ route('reportes.proyectos_por_usuario') }}" class="text-decoration-none">
                    <div class="card text-white bg-warning">
                        <div class="card-body">
                            <h5 class="card-title">Proyectos por Líder</h5>
                            <p class="card-text">Ir al Módulo</p>
                            <i class="fa fa-user fa-2x"></i>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-2 mb-4">
                <a href="{{ route('reportes.proyectos_por_cliente') }}" class="text-decoration-none">
                    <div class="card text-white bg-info">
                        <div class="card-body">
                            <h5 class="card-title">Proyectos por Cliente</h5>
                            <p class="card-text">Ir al Módulo</p>
                            <i class="fa fa-users fa-2x"></i>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="d-flex justify-content-center mt-3">
            <a href="{{ url()->previous() }}" class="btn btn-success">Regresar</a>
        </div>
    </div>
@endsection

@section('styles')
    <style>
        .card {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border-radius: 10px;
        }
        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.3);
        }
        .card-body {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 150px;
            text-align: center;
        }
        .card-title {
            font-size: 1.2rem;
            margin-bottom: 10px;
        }
        .card-text {
            font-size: 1rem;
            margin-bottom: 15px;
        }
        .fa-2x {
            font-size: 2rem;
        }
        .btn-success {
            background-color: #006400;
            border-color: #006400;
        }
    </style>
@endsection
