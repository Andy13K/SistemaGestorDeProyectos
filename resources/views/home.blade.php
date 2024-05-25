<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fuentes -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <!-- Estilos -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        /* Estilo del cuerpo de la página */
        body {
            font-family: 'Montserrat', sans-serif;
            background-color: whitesmoke;
            color: #4a5568;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            overflow: hidden; /* Evita el desplazamiento durante las animaciones */
        }
        /* Contenido principal */
        .contenido-principal {
            padding: 16px;
            width: 100%;
            margin-top: 50px; /* Margen para ajustar por el navbar fijo */
            opacity: 0; /* Asegura que comienza oculto */
            animation: fade-in 1s ease-out forwards;
        }
        /* Marca del navbar */
        .marca-navbar {
            font-size: 21px; /* Tamaño de fuente reducido */
            color: black;
            font-weight: bold;
            display: flex;
            align-items: center;
            padding: 10px 15px;
            opacity: 0; /* Asegura que comienza oculto */
            animation: slide-in-down 1s ease-out forwards, fade-in 1s ease-out forwards;
            animation-delay: 0.1s;
        }
        .marca-navbar img {
            height: 60px; /* Tamaño del logo reducido */
            vertical-align: middle;
            margin-right: 10px;
        }
        .titulo-sistema {
            font-size: 24px;
            font-weight: 700;
            color: #000; /* Negro */
            margin: 7px 0 0 10px; /* Ajusta la posición hacia abajo */
            white-space: nowrap;
            overflow: hidden;
            animation: typing 2s steps(40, end), fade-in 2s forwards;
        }
        /* Estilos de las tarjetas */
        .tarjeta {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            transition: all 0.3s ease;
            width: 100%;
            margin-bottom: 20px;
            font-family: 'Montserrat', sans-serif;
            cursor: pointer;
            height: 150px; /* Altura fija para todas las tarjetas */
            border: none; /* Asegura que no haya borde aplicado */
            border-radius: 10px; /* Bordes redondeados */
            background-color: #fff; /* Fondo blanco para un aspecto más limpio */
            opacity: 0; /* Asegura que comienza oculto */
            animation: slide-in-up 1s ease-out forwards, fade-in 1s ease-out forwards;
            animation-delay: 0.5s;
        }
        .tarjeta:hover {
            box-shadow: 0 12px 24px 0 rgba(0, 0, 0, 0.3);
            transform: translateY(-5px); /* Elevar ligeramente al pasar el cursor */
        }
        .encabezado-tarjeta {
            font-size: 20px;
            font-weight: bold;
            text-align: center;
            border-bottom: none; /* Elimina borde azul */
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
            opacity: 0; /* Asegura que comienza oculto */
            animation: slide-in-up 1s ease-out forwards, fade-in 1s ease-out forwards;
            animation-delay: 0.5s;
        }
        /* Estilos del pie de página */
        .pie-pagina {
            width: 100%;
            background-color: #151414;
            padding: 10px 20px;
            box-shadow: 0 -2px 5px rgba(0,0,0,0.1);
            display: flex;
            justify-content: center;
            align-items: center;
            position: fixed;
            bottom: 0;
            left: 0;
            z-index: 1000;
            font-family: 'Montserrat', sans-serif;
            color: #fff;
            opacity: 0; /* Asegura que comienza oculto */
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
        /* Estilos para el enlace de cierre de sesión */
        .enlace-logout {
            background-color: #68d391; /* Verde pastel */
            color: #ffffff !important;
            border-radius: 5px;
            padding: 8px 15px;
            text-decoration: none;
            margin-left: 15px;
            opacity: 0; /* Asegura que comienza oculto */
            animation: slide-in-left 1s ease-out forwards, fade-in 1s ease-out forwards; /* Animaciones añadidas */
            animation-delay: 0.6s;
        }
        .enlace-logout:hover {
            background-color: #48bb78; /* Verde más oscuro */
        }
        /* Estilos del elemento del usuario en el navbar */
        .elemento-usuario {
            display: flex;
            align-items: center;
            opacity: 0; /* Asegura que comienza oculto */
            animation: slide-in-left 1s ease-out forwards, fade-in 1s ease-out forwards; /* Animaciones añadidas */
            animation-delay: 0.5s;
        }
        .elemento-usuario .fa-user {
            margin-right: 5px;
        }
        /* Nuevos estilos para alinear elementos del navbar a la derecha */
        .navbar-nav {
            margin-left: auto;
            display: flex;
            align-items: center;
        }
        /* Eliminar subrayado azul de los enlaces de las tarjetas */
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
    </style>
</head>
<body>
<div id="app">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm fixed-top" style="height: 60px;"> <!-- Altura del navbar reducida -->
        <div class="container">
            <span class="marca-navbar">
                <img src="{{ asset('image/SGPLOGO.jpeg') }}" alt="Logo">
                <!-- Ajustar la posición del título -->
                <span class="titulo-sistema">Sistema Gestor de Proyectos</span>
            </span>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Lado derecho del navbar -->
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

    <!-- Contenido principal -->
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
                        <a class="enlace-tarjeta" href="{{ route('usuarios.index') }}">
                            <div class="tarjeta text-white bg-info mb-3">
                                <div class="encabezado-tarjeta" style="border-bottom: none; border: none;">Usuarios</div>
                                <div class="cuerpo-tarjeta">
                                    <h5 class="card-title"><i class="fa fa-users" aria-hidden="true"></i></h5>
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
                </div>
            </div>
        </main>
    </div>
</div>

<!-- Pie de página -->
<footer class="pie-pagina">
    <div class="texto-pie-pagina">
        © 2024 Sistema Gestor de Proyectos. Todos los derechos reservados.
    </div>
</footer>

</body>
</html>
