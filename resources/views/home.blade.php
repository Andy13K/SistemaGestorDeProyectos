<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        .sidebar {
            height: 100%;
            width: 0;
            position: fixed;
            z-index: 1;
            top: 0;
            left: 0;
            background-color: #fff;
            overflow-x: hidden;
            transition: 0.5s;
            padding-top: 20px;
        }

        .sidebar a {
            padding: 10px 8px;
            text-decoration: none;
            font-size: 25px;
            color: #000000;
            display: block;
            transition: 0.3s;
            text-align: center;
            white-space: nowrap;
            overflow: hidden;
        }

        .sidebar a:hover {
            color: #f1f1f1;
        }

        .sidebar .closebtn {
            position: absolute;
            top: 0;
            right: 25px;
            font-size: 36px;
            margin-left: 50px;
        }

        .openbtn {
            font-size: 20px;
            cursor: pointer;
            background-color: #fff;
            color: Black;
            border: none;
        }

        .openbtn:hover {
            background-color: #fff;
        }

        .sidebar-logo img {
            height: 120px; /* Default height, will be adjusted in JS */
            width: auto;
            display: block;
            margin: 0 auto 20px;
        }

        .navbar-brand {
            font-size: 24px;
            font-weight: bold;
            display: flex;
            align-items: center;
        }

        .navbar-brand img {
            height: 30px;
            vertical-align: middle;
            margin-right: 10px;
        }

        .card {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            transition: 0.3s;
            width: 40%;
            margin: 0 auto;
        }

        .card:hover {
            box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.4);
        }

        .container {
            padding: 2px 16px;
        }

        .additional-nav {
            display: flex;
            align-items: center;
            margin-left: 10px;
        }

        .additional-nav a {
            color: black;
            text-decoration: none;
            margin-right: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            font-size: 16px;
            width: 80px;
        }

        .additional-nav a:hover {
            text-decoration: underline;
        }

        .additional-nav i {
            margin-bottom: 4px;
            font-size: 20px;
        }

        footer {
            width: 100%;
            background-color: #f0f0f0;
            padding: 10px 20px;
            box-shadow: 0 -2px 5px rgba(0,0,0,0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: fixed;
            bottom: 0;
            left: 0;
            z-index: 1000;
            font-family: Arial, sans-serif;
        }

        .footer-text {
            font-size: 16px;
            color: #333;
        }

        .social-icons a {
            color: #333;
            margin-left: 10px;
            font-size: 20px;
            text-decoration: none;
        }

        .social-icons a:hover {
            color: #555;
        }
    </style>
</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <button class="openbtn" onclick="openNav()">☰ Menu</button>
            <span class="navbar-brand">
               <img src="{{ asset('image/logopro.png') }}" alt="Logo" style="height: 70px; vertical-align: middle; margin-right: 10px;">

                Sistema Gestor de Proyectos
            </span>
            <div class="additional-nav">
                <a href="#"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
                <a href="#"><i class="fas fa-box"></i> Pedidos</a>
                <a href="#"><i class="fas fa-cube"></i> Productos</a>
                <a href="#"><i class="fas fa-users"></i> Clientes</a>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-link" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <div id="sidebar" class="sidebar">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <div class="sidebar-logo">
            <!-- You can add a logo inside the sidebar as well -->
        </div>
        <a href="#"><i class="fa fa-users" aria-hidden="true"></i> <span>Usuarios</span></a>
        <a href="#"><i class="fa fa-folder-open" aria-hidden="true"></i> <span>Proyectos</span></a>
        <a href="#"><i class="fa fa-tasks" aria-hidden="true"></i> <span>Tareas</span></a>
        <a href="#"><i class="fa fa-file-alt" aria-hidden="true"></i> <span>Reportes</span></a>
        <a href="#"><i class="fa fa-shield-alt" aria-hidden="true"></i> <span>Auditorias</span></a>
    </div>

    <main class="py-4">
        <div class="card">
            <div class="container">
                <h4><b>Special title treatment</b></h4>
                <p>With supporting text below as a natural lead-in to additional content.</p>
                <button class="btn btn-primary">Go somewhere</button>
            </div>
        </div>
    </main>
</div>

<script>
    function openNav() {
        document.getElementById("sidebar").style.width = "250px";
        document.querySelectorAll('.sidebar a span').forEach(function(element) {
            element.style.display = "inline"; // Muestra el texto cuando el menú está abierto
        });
        document.querySelector('.sidebar-logo img').style.height = "120px"; // Tamaño original del logo
    }

    function closeNav() {
        document.getElementById("sidebar").style.width = "50px"; // Anchura solo para íconos y logo pequeño
        document.querySelectorAll('.sidebar a span').forEach(function(element) {
            element.style.display = "none"; // Oculta el texto cuando el menú está cerrado
        });
        document.querySelector('.sidebar-logo img').style.height = "45px"; // Reduce el tamaño del logo
    }
</script>
<footer>
    <div class="footer-text">
        2024 Sistema Gestor de Proyectos
    </div>
    <div class="social-icons">
        <a href="#" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
        <a href="#" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
        <a href="#" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
    </div>
</footer>

</body>
</html>
