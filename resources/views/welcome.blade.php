<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Proyecto Gestión</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
            background-color: whitesmoke;
            color: #4a5568;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            overflow: hidden; /* Prevents scrolling during animations */
        }
        .container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 40px;
            text-align: center;
            max-width: 700px;
            width: 100%;
            margin: 10px 30px;
            border: 2px solid #b4e1d1; /* Border in pastel green */
            display: flex;
            flex-direction: column;
            align-items: center;
            opacity: 0; /* Ensure it starts off hidden */
            animation: fade-in 1.5s ease-out forwards;
        }
        .logo, .title, .login-form, .buttons {
            opacity: 0; /* Ensure elements start off hidden */
        }
        .logo {
            margin-bottom: 30px;
            animation: slide-in-down 1.5s ease-out forwards, fade-in 1.5s ease-out forwards;
            animation-delay: 0.2s;
        }
        .title {
            font-size: 32px;
            font-weight: 700;
            color: #5bb78c; /* Pastel green */
            margin-bottom: 30px;
            animation: slide-in-left 1.5s ease-out forwards, fade-in 1.5s ease-out forwards;
            animation-delay: 0.4s;
        }
        .description-container {
            display: flex;
            align-items: center;
            margin-bottom: 30px;
        }
        .description {
            font-size: 18px;
            color: #000000;
            white-space: nowrap;
            overflow: hidden;
            border-right: 3px solid #000; /* Cursor effect */
            width: 100%; /* Ensure it has width */
            visibility: visible; /* Ensure it starts off visible */
            animation: typing 3s steps(40, end), blink-caret 0.75s step-end infinite;
        }
        .login-form {
            display: flex;
            flex-direction: column;
            align-items: center;
            animation: slide-in-up 1.5s ease-out forwards, fade-in 1.5s ease-out forwards;
            animation-delay: 1s;
            width: 100%; /* Ensure it matches the width of other elements */
            margin-bottom: 20px; /* Separate from buttons */
        }
        .login-form input {
            width: 40%; /* Smaller width */
            padding: 12px; /* Smaller padding */
            margin: 10px 0;
            border: 1px solid #b4e1d1;
            border-radius: 5px;
            font-size: 16px;
            font-family: 'Montserrat', sans-serif; /* Ensure the same font family */
        }
        .buttons {
            animation: slide-in-up 1.5s ease-out forwards, fade-in 1.5s ease-out forwards;
            animation-delay: 1.2s;
            margin-top: 20px; /* Separate from login-form */
        }
        .buttons a {
            background-color: #68d391; /* Pastel green */
            color: #ffffff;
            padding: 15px 30px;
            border-radius: 5px;
            text-decoration: none;
            font-weight: 650;
            transition: background-color 0.3s, transform 0.3s;
            margin: 0 10px;
        }
        .buttons a:hover {
            background-color: #48bb78; /* Darker green */
        }
        .buttons a:active {
            transform: scale(0.95);
        }
        .footer {
            background-color: #000000;
            color: #ffffff;
            padding: 10px 0;
            position: fixed;
            width: 100%;
            bottom: 10px; /* Adds a small margin below the footer */
            left: 0;
            text-align: center;
            font-size: 14px;
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
        @keyframes blink-caret {
            from, to {
                border-color: transparent;
            }
            50% {
                border-color: black;
            }
        }
    </style>
</head>
<body>
<div class="container">
    <div class="logo">
        <img src="{{ asset('image/SGPLOGO.jpeg') }}" alt="Logo" width="300">
    </div>
    <div class="title">Bienvenido a Sistema Gestor de Proyectos</div>
    <div class="description-container">
        <div class="description">Gestione sus proyectos de manera eficiente con nuestra herramienta.</div>
    </div>

    <div class="buttons">
        @if (Route::has('login'))
            @auth
                <a href="{{ url('/home') }}">Ir a Inicio</a>
            @else
                <a href="{{ route('login') }}" class="login-button">Iniciar Sesión</a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="register-button">Registrarse</a>
                @endif
            @endauth
        @endif
    </div>
</div>
<div class="footer">
    &copy; 2024 SGP-502. Todos los derechos reservados.
</div>

</body>
</html>
