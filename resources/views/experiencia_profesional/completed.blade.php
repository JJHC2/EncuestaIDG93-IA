<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Encuesta Completada</title>
    <!-- Agregar Bootstrap para un diseño atractivo -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .bg-custom {
            background-color: #8A2036;
        }
        .text-custom {
            color: #8A2036;
        }
        .btn-custom {
            background-color: #8A2036;
            color: white;
        }
        .btn-custom:hover {
            background-color: #6b172c;
            color: white;
        }
        .navbar-brand img {
            height: 40px;
            width: auto;
        }
        .card {
            border-radius: 15px;
            border: none;
        }
        .center-content {
            text-align: center;
            margin-top: 100px;
        }
    </style>
</head>

<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-light bg-custom mb-4">
        <div class="container">
            <a class="navbar-brand text-white" href="#">
                <img src="/images/logo.jpg" alt="Logo">
            </a>
            <div class="d-flex ms-auto">
                <a class="btn btn-custom" href="{{ route('welcome') }}">Regresar</a>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="center-content">
            <img src="/images/logo.jpg" alt="Logo" style="width: 100px; height: 100px;">
            <h2 class="mt-4">¡Ya has contestado esta encuesta!</h2>
            <p>Gracias por completar el formulario. Si necesitas realizar alguna otra acción, por favor regresa al menú principal.</p>
        </div>
    </div>

    <!-- Agregar JavaScript de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
</body>
</html>
