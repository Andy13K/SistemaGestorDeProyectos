<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Fuentes -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <!-- Estilos -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
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
        .marca-navbar {
            font-size: 21px;
            color: black;
            font-weight: bold;
            display: flex;
            align-items: center;
            padding: 10px 15px;
            opacity: 0;
            animation: slide-in-down 1s ease-out forwards, fade-in 1s ease-out forwards;
            animation-delay: 0.1s;
        }
        .marca-navbar img {
            height: 60px;
            vertical-align: middle;
            margin-right: 10px;
        }
        .titulo-sistema {
            font-size: 24px;
            font-weight: 700;
            color: #000;
            margin: 7px 0 0 10px;
            white-space: nowrap;
            overflow: hidden;
            animation: typing 2s steps(40, end), fade-in 2s forwards;
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
        .contenedor {
            padding: 2px 16px;
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
        .pie-pagina {
            width: 100%;
            background-color: #151414;
            padding: 10px 20px;
            box-shadow: 0 -2px 5px rgba(0,0,0,0.1);
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Montserrat', sans-serif;
            color: #fff;
            opacity: 0;
            animation: fade-in 1s ease-out forwards;
            animation-delay: 1s;
        }
        .texto-pie-pagina {
            font-size: 14px;
            color: #fff;
            text-align: center;
        }
        .iconos-sociales a {
            color: #fff;
            margin-left: 10px;
            font-size: 20px;
            text-decoration: none;
        }
        .iconos-sociales a:hover {
            color: #ddd;
        }
        .insignia {
            font-family: 'Montserrat', sans-serif;
        }
        .enlace-logout {
            background-color: #68d391;
            color: #ffffff !important;
            border-radius: 5px;
            padding: 8px 15px;
            text-decoration: none;
            margin-left: 15px;
            opacity: 0;
            animation: slide-in-left 1s ease-out forwards, fade-in 1s ease-out forwards;
            animation-delay: 0.6s;
        }
        .enlace-logout:hover {
            background-color: #48bb78;
        }
        .elemento-usuario {
            display: flex;
            align-items: center;
            opacity: 0;
            animation: slide-in-left 1s ease-out forwards, fade-in 1s ease-out forwards;
            animation-delay: 0.5s;
        }
        .elemento-usuario .fa-user {
            margin-right: 5px;
        }
        .navbar-nav {
            margin-left: auto;
            display: flex;
            align-items: center;
        }
        a.enlace-tarjeta {
            text-decoration: none;
            color: inherit;
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
        @keyframes slide-in-down {
            from {
                transform: translateY(-50px);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }
        @keyframes slide-in-left {
            from {
                transform: translateX(-50px);
                opacity: 0;
            }
            to {
                transform: translateX(0);
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
        @keyframes typing {
            from {
                width: 0;
            }
            to {
                width: 100%;
            }
        }
        .contenedor-grafica {
            width: 80%;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            opacity: 0;
            animation: fade-in 1s ease-out forwards;
            animation-delay: 1s;
        }
        .chartjs-title {
            font-family: 'Montserrat', sans-serif;
        }
        .tabla-usuarios {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        .tabla-usuarios th, .tabla-usuarios td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }
        .tabla-usuarios th {
            background-color: #f2f2f2;
            color: black;
        }
        .tabla-usuarios tr:nth-child(even) {
            background-color: #f9f9f9;
        }
    </style>
</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm fixed-top" style="height: 60px;">
        <div class="container">
            <span class="marca-navbar">
                <img src="{{ asset('image/SGPLOGO.jpeg') }}" alt="Logo">
                <span class="titulo-sistema">Sistema Gestor de Proyectos</span>
            </span>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    @auth
                        <li class="nav-item elemento-usuario">
                            <i class="fa fa-user"></i>
                            <span class="nav-link">{{ Auth::user()->name }}</span>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link enlace-logout" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                                {{ __('Cerrar Sesión') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <div class="contenido-principal">
        <main class="py-4">
            <div class="contenedor">
                <div class="fila">
                    <div class="columna-md-3">
                        <a class="enlace-tarjeta" href="{{ route('proyectos.index') }}">
                            <div class="tarjeta text-white bg-primary mb-3">
                                <div class="encabezado-tarjeta" style="border-bottom: none; border: none;">Proyectos</div>
                                <div class="cuerpo-tarjeta">
                                    <h5 class="card-title"><i class="fa fa-folder-open" aria-hidden="true"></i></h5>
                                    <p class="card-text">Ir al Módulo</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="columna-md-3">
                        <a class="enlace-tarjeta" href="{{ route('clientes.index') }}">
                            <div class="tarjeta text-white bg-secondary mb-3">
                                <div class="encabezado-tarjeta" style="border-bottom: none; border: none;">Clientes</div>
                                <div class="cuerpo-tarjeta">
                                    <h5 class="card-title"><i class="fa fa-user-friends" aria-hidden="true"></i></h5>
                                    <p class="card-text">Ir al Módulo</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="columna-md-3">
                        <a class="enlace-tarjeta" href="{{ route('asignacionrecursos.index') }}">
                            <div class="tarjeta text-white bg-success mb-3">
                                <div class="encabezado-tarjeta" style="border-bottom: none; border: none;">Asignación de Recursos</div>
                                <div class="cuerpo-tarjeta">
                                    <h5 class="card-title"><i class="fa fa-cogs" aria-hidden="true"></i></h5>
                                    <p class="card-text">Ir al Módulo</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="columna-md-3">
                        <a class="enlace-tarjeta" href="{{ route('categorias.index') }}">
                            <div class="tarjeta text-white bg-primary mb-3">
                                <div class="encabezado-tarjeta" style="border-bottom: none; border: none;">Categorías de Proyectos</div>
                                <div class="cuerpo-tarjeta">
                                    <h5 class="card-title"><i class="fa fa-tags" aria-hidden="true"></i></h5>
                                    <p class="card-text">Ir al Módulo</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="columna-md-3">
                        <a class="enlace-tarjeta" href="{{ route('tareas.index') }}">
                            <div class="tarjeta text-white bg-danger mb-3">
                                <div class="encabezado-tarjeta" style="border-bottom: none; border: none;">Tareas</div>
                                <div class="cuerpo-tarjeta">
                                    <h5 class="card-title"><i class="fa fa-tasks" aria-hidden="true"></i></h5>
                                    <p class="card-text">Ir al Módulo</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="columna-md-3">
                        <a class="enlace-tarjeta" href="{{ route('users.index') }}">
                            <div class="tarjeta text-white bg-info mb-3">
                                <div class="encabezado-tarjeta" style="border-bottom: none; border: none;">Usuarios</div>
                                <div class="cuerpo-tarjeta">
                                    <h5 class="card-title"><i class="fa fa-users" aria-hidden="true"></i></h5>
                                    <p class="card-text">Ir al Módulo</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="contenedor-grafica">
                    <canvas id="myChart"></canvas>
                </div>
                <div class="tabla-usuarios">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Fecha de Creación</th>
                            <th>Fecha de Actualización</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->created_at }}</td>
                                <td>{{ $user->updated_at }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>
</div>

<footer class="pie-pagina">
    <div class="texto-pie-pagina">
        © 2024 Sistema Gestor de Proyectos. Todos los derechos reservados.
    </div>
</footer>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        $.ajax({
            url: '{{ route("dashboard.data") }}',
            method: 'GET',
            success: function(data) {
                var ctx = document.getElementById('myChart').getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: ['Proyectos', 'Usuarios', 'Clientes', 'Asignación de Recursos', 'Categorías de Proyectos', 'Tareas'],
                        datasets: [{
                            label: 'Cantidad',
                            data: data,
                            backgroundColor: [
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)',
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(201, 203, 207, 0.2)'
                            ],
                            borderColor: [
                                'rgba(54, 162, 235, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(255, 159, 64, 1)',
                                'rgba(255, 99, 132, 1)',
                                'rgba(201, 203, 207, 1)'
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        },
                        plugins: {
                            title: {
                                display: true,
                                text: 'Resumen de Datos',
                                font: {
                                    family: 'Montserrat',
                                    size: 20
                                }
                            }
                        }
                    }
                });
            },
            error: function() {
                console.error('No se pudieron obtener los datos');
            }
        });
    });
</script>

</body>
</html>
