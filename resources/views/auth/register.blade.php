<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registro - Proyecto Gestión</title>
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
            overflow: hidden;
        }
        .container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 40px;
            text-align: center;
            max-width: 500px;
            width: 100%;
            margin: 10px 30px;
            border: 2px solid #b4e1d1;
            display: flex;
            flex-direction: column;
            align-items: center;
            opacity: 0;
            animation: fade-in 0.8s ease-out forwards; /* Ajusta la velocidad aquí */
        }
        .logo, .title, .register-form {
            opacity: 0;
        }
        .logo {
            margin-bottom: 20px;
            animation: slide-in-down 0.8s ease-out forwards, fade-in 0.8s ease-out forwards; /* Ajusta la velocidad aquí */
            animation-delay: 0.2s;
        }
        .logo img {
            width: 200px;
        }
        .title {
            font-size: 28px;
            font-weight: 700;
            color: #5bb78c;
            margin-bottom: 20px;
            animation: slide-in-left 0.8s ease-out forwards, fade-in 0.8s ease-out forwards; /* Ajusta la velocidad aquí */
            animation-delay: 0.4s;
        }
        .register-form {
            width: 100%;
            margin-bottom: 20px;
            animation: slide-in-up 0.8s ease-out forwards, fade-in 0.8s ease-out forwards; /* Ajusta la velocidad aquí */
            animation-delay: 0.6s;
        }
        .form-group {
            margin-bottom: 15px;
            text-align: left;
            width: 100%;
        }
        .form-group label {
            display: block;
            font-weight: 600;
            margin-bottom: 8px;
        }
        .form-control {
            width: 100%;
            padding: 10px;
            margin-bottom: 8px;
            border: 1px solid #b4e1d1;
            border-radius: 5px;
            font-size: 14px;
            font-family: 'Montserrat', sans-serif;
        }
        .btn-primary {
            font-family: 'Montserrat', sans-serif;
            background-color: #68d391;
            color: #ffffff;
            padding: 15px 30px;
            border-radius: 5px;
            text-decoration: none;
            font-weight: 650;
            transition: background-color 0.3s, transform 0.3s, cursor 0.3s;
            border: none;
            font-size: 16px;
            display: block;
            margin: 20px auto;
        }
        .btn-primary:hover {
            background-color: #48bb78;
            cursor: pointer;
        }
        .btn-primary:active {
            transform: scale(0.95);
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
    </style>
</head>
<body>
<div class="container">
    <div class="logo">
        <img src="{{ asset('image/SGPLOGO.jpeg') }}" alt="Logo">
    </div>
    <div class="title">Registro</div>

    <div class="register-form">
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="form-group">
                <label for="name">Nombre</label>
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="email">Correo Electrónico</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="password">Contraseña</label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="password-confirm">Confirmar Contraseña</label>
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">
                    Registrarse
                </button>
            </div>
        </form>
    </div>
</div>
</body>
</html>
