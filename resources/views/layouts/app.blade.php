<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <!-- Styles -->
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

    <main class="py-4 contenido-principal">
        @yield('content')
    </main>
</div>
</body>
</html>
