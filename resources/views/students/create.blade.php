<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Datos Personales</title>
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
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card shadow-sm">
                    <div class="card-header text-center bg-custom text-white">
                        <h4>Registro de Datos Personales</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('students.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="nombre_completo" class="form-label">Nombre Completo</label>
                                <input type="text" class="form-control" name="nombre_completo" required>
                            </div>
                            <div class="mb-3">
                                <label for="fecha_nacimiento" class="form-label">Fecha de Nacimiento</label>
                                <input type="date" class="form-control" name="fecha_nacimiento" required>
                            </div>
                            <div class="mb-3">
                                <label for="carrera" class="form-label">Carrera</label>
                                <input type="text" class="form-control" name="carrera" required>
                            </div>
                            <div class="mb-3">
                                <label for="anio_ingreso" class="form-label">Año de Ingreso</label>
                                <input type="number" class="form-control" name="anio_ingreso" required>
                            </div>
                            <div class="mb-3">
                                <label for="anio_egreso" class="form-label">Año de Egreso</label>
                                <input type="number" class="form-control" name="anio_egreso" required>
                            </div>
                            <div class="mb-3">
                                <label for="matricula" class="form-label">Matrícula</label>
                                <input type="text" class="form-control" name="matricula" required>
                            </div>
                            <div class="mb-3">
                                <label for="correo_institucional" class="form-label">Correo Institucional</label>
                                <input type="email" class="form-control" name="correo_institucional" required>
                            </div>
                            <div class="mb-3">
                                <label for="correo_personal" class="form-label">Correo Personal</label>
                                <input type="email" class="form-control" name="correo_personal">
                            </div>
                            <div class="mb-3">
                                <label for="telefono" class="form-label">Teléfono</label>
                                <input type="text" class="form-control" name="telefono" required>
                            </div>
                            <div class="mb-3">
                                <label for="promedio" class="form-label">Promedio General</label>
                                <input type="number" step="0.01" class="form-control" name="promedio">
                            </div>
                            <div class="mb-3">
                                <label for="actividades_extracurriculares" class="form-label">Actividades Extracurriculares</label>
                                <input type="text" class="form-control" name="actividades_extracurriculares">
                            </div>
                            <div class="mb-3">
                                <label for="becas" class="form-label">Becas</label>
                                <input type="text" class="form-control" name="becas">
                            </div>
                            <div class="mb-3">
                                <label for="intercambios" class="form-label">Intercambios</label>
                                <input type="text" class="form-control" name="intercambios">
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-custom">Guardar Datos</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Agregar JavaScript de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
</body>
</html>
