@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-success" style="color: #28a745;">Reportes</h1>

        <div class="contenedor">
            <div class="fila">
                <div class="columna-md-3">
                    <a class="enlace-tarjeta" href="{{ route('reportes.proyectos_por_fecha') }}">
                        <div class="tarjeta text-white bg-primary mb-3">
                            <div class="encabezado-tarjeta" style="border-bottom: none; border: none;">Reporte de Proyectos por Fecha</div>
                            <div class="cuerpo-tarjeta">
                                <h5 class="card-title"><i class="fa fa-calendar" aria-hidden="true"></i></h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="columna-md-3">
                    <a class="enlace-tarjeta" href="{{ route('reportes.proyectos_en_ejecucion') }}">
                        <div class="tarjeta text-white bg-success mb-3">
                            <div class="encabezado-tarjeta" style="border-bottom: none; border: none;">Reporte de Proyectos en Ejecución</div>
                            <div class="cuerpo-tarjeta">
                                <h5 class="card-title"><i class="fa fa-tasks" aria-hidden="true"></i></h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="columna-md-3">
                    <a class="enlace-tarjeta" href="{{ route('reportes.proyectos_finalizados') }}">
                        <div class="tarjeta text-white bg-danger mb-3">
                            <div class="encabezado-tarjeta" style="border-bottom: none; border: none;">Reporte de Proyectos Finalizados</div>
                            <div class="cuerpo-tarjeta">
                                <h5 class="card-title"><i class="fa fa-check" aria-hidden="true"></i></h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="columna-md-3">
                    <a class="enlace-tarjeta" href="{{ route('reportes.proyectos_por_lider') }}">
                        <div class="tarjeta text-white bg-warning mb-3">
                            <div class="encabezado-tarjeta" style="border-bottom: none; border: none;">Reporte de Proyectos por Líder</div>
                            <div class="cuerpo-tarjeta">
                                <h5 class="card-title"><i class="fa fa-user" aria-hidden="true"></i></h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="columna-md-3">
                    <a class="enlace-tarjeta" href="{{ route('reportes.proyectos_por_cliente') }}">
                        <div class="tarjeta text-white bg-info mb-3">
                            <div class="encabezado-tarjeta" style="border-bottom: none; border: none;">Reporte de Proyectos por Cliente</div>
                            <div class="cuerpo-tarjeta">
                                <h5 class="card-title"><i class="fa fa-users" aria-hidden="true"></i></h5>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-center mt-3">
            <a href="{{ url()->previous() }}" class="btn" style="background-color: #006400; color: white;">Regresar</a>
        </div>
    </div>

    <style>
        body {
            font-family: 'Montserrat', sans-serif;
            background-color: whitesmoke;
            color: #4a5568;
            margin: 0;
            display: block;
            min-height: 100vh;
        }
        .contenido-principal {
            padding: 16px;
            width: 100%;
            margin-top: 50px;
            opacity: 0;
            animation: fade-in 1s ease-out forwards;
        }
        .tarjeta {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            transition: all 0.3s ease;
            width: 100%;
            margin-bottom: 20px;
            font-family: 'Montserrat', sans-serif;
            cursor: pointer;
            height: 150px;
            border: none;
            border-radius: 10px;
            background-color: #fff;
            opacity: 0;
            animation: slide-in-up 1s ease-out forwards, fade-in 1s ease-out forwards;
            animation-delay: 0.5s;
        }
        .tarjeta:hover {
            box-shadow: 0 12px 24px 0 rgba(0, 0, 0, 0.3);
            transform: translateY(-5px);
        }
        .encabezado-tarjeta {
            font-size: 20px;
            font-weight: bold;
            text-align: center;
            border-bottom: none;
            padding: 15px 5px;
        }
        .cuerpo-tarjeta {
            text-align: center;
            display: flex;
            flex-direction: column;
            justify-content: center;
            height: 65%;
        }
        .fila {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
        }
        .columna-md-3 {
            flex: 0 0 30%;
            max-width: 30%;
            margin: 10px;
            box-sizing: border-box;
            opacity: 0;
            animation: slide-in-up 1s ease-out forwards, fade-in 1s ease-out forwards;
            animation-delay: 0.5s;
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
