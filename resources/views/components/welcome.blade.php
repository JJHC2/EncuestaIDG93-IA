<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenida - Portal de Empleo</title>
    <!-- Agregar Bootstrap para un diseño responsivo y atractivo -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .navbar {
            background-color: #8A2036;
        }
        .navbar-brand {
            color: #ffffff;
            font-weight: bold;
        }
        .navbar-brand img {
            height: 40px;
            width: auto;
        }
        .navbar-nav .nav-link {
            color: #ffffff;
        }
        .navbar-nav .nav-link:hover {
            color: #f8f9fa;
        }
        .jumbotron {
            background-color: #ffffff;
            border-radius: .3rem;
            border: 1px solid #dee2e6;
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, .075);
        }
        .card {
            border: 1px solid #dee2e6;
            border-radius: .3rem;
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, .075);
            transition: transform 0.3s, box-shadow 0.3s;
        }
        .card:hover {
            transform: scale(1.05);
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, .2);
        }
        .card-header {
            background-color: #8A2036;
            color: #ffffff;
            border-bottom: 1px solid #dee2e6;
        }
        .card-body {
            background-color: #ffffff;
        }
        .btn-primary {
            background-color: #8A2036;
            border-color: #8A2036;
        }
        .btn-primary:hover {
            background-color: #ffffff;
            color: #8A2036;
            border-color: #8A2036;
        }
        .text-custom {
            color: #8A2036;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="#">
                <!-- Logo aquí -->
                <img src="/images/logo.jpg" alt="Logo">
                Portal de Empleo
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('dashboard') }}">Regresar al Dashboard</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="jumbotron text-center p-5">
                    <h1 class="display-4 text-custom">Bienvenido al Portal de Empleo</h1>
                    <p class="lead mt-3 text-custom">Encuentra oportunidades laborales y regístrate para recibir notificaciones sobre vacantes que coincidan con tu perfil.</p>
                    <hr class="my-4">
                    <p>Para comenzar, selecciona una de las opciones a continuación:</p>

                    <div class="card mt-4">
                        <div class="card-header">
                            <h4 class="card-title text-center">¿Cómo Funciona?</h4>
                        </div>
                        <div class="card-body">
                            <p>Este portal te permite registrar tus datos personales, académicos y profesionales para que puedas acceder a las mejores ofertas de trabajo disponibles. También puedes consultar las vacantes actuales que coinciden con tus intereses y perfil.</p>
                            <p>Accede a las opciones de registro o búsqueda de empleo a través de los siguientes botones y sigue los pasos indicados en cada formulario.</p>
                            <a class="btn btn-primary btn-lg mt-3" href="{{ route('students.create') }}" role="button">Registro de Datos Personales</a>
                        </div>
                    </div>

                    <div class="card mt-4">
                        <div class="card-header">
                            <h4 class="card-title text-center">Beneficios de Registrarte</h4>
                        </div>
                        <div class="card-body">
                            <ul>
                                <li>Acceso a ofertas de empleo personalizadas.</li>
                                <li>Notificaciones sobre vacantes que coinciden con tu perfil.</li>
                                <li>Oportunidades de mejorar tu currículum con certificaciones.</li>
                                <li>Conexión con empleadores interesados en tus habilidades.</li>
                            </ul>
                            <a class="btn btn-primary btn-lg mt-3" href="{{ route('experiencia_profesional.create') }}" role="button">Añadir Experiencia Profesional</a>
                        </div>
                    </div>

                    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
                    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>