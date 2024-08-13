<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Experiencia Profesional</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .navbar {
            background-color: #8A2036;
        }

        .navbar-brand img {
            height: 40px;
            /* Ajusta el tamaño del logotipo según sea necesario */
        }

        .btn-custom {
            background-color: #8A2036;
            color: white;
        }

        .btn-custom:hover {
            background-color: #6d1b2d;
        }

        .form-container {
            background-color: white;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body>
    <!-- Barra de navegación -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <a class="navbar-brand" href="#">
            <img src="/images/logo.jpg" alt="Logotipo"> <!-- Reemplaza con la ruta a tu logotipo -->
        </a>
        <a class="btn btn-custom ml-auto" href="{{ route('welcome') }}">Regresar</a>
    </nav>

    <div class="container mt-5">
        <h1 class="mb-4 text-center">Añadir Experiencia Profesional</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Formulario para crear una nueva experiencia profesional -->
        <form action="{{ route('experiencia_profesional.store') }}" method="POST"
            class="border p-4 bg-light shadow-sm rounded">
            @csrf

            <!-- ¿Has realizado prácticas profesionales? -->
            <div class="mb-3 form-group">
                <label class="form-label">¿Has realizado prácticas profesionales?</label>
                <div class="form-check">
                    <input type="radio" name="practicas_profesionales" class="form-check-input"
                        id="practicas_profesionales_si" value="Sí" required>
                    <label class="form-check-label" for="practicas_profesionales_si">Sí</label>
                </div>
                <div class="form-check">
                    <input type="radio" name="practicas_profesionales" class="form-check-input"
                        id="practicas_profesionales_no" value="No" required>
                    <label class="form-check-label" for="practicas_profesionales_no">No</label>
                </div>
            </div>

            <!-- Empresa donde realizaste las prácticas -->
            <div class="mb-3 form-group">
                <label for="empresa_practicas" class="form-label">Empresa donde realizaste las prácticas:</label>
                <input type="text" name="empresa_practicas" class="form-control" id="empresa_practicas"
                    placeholder="Nombre de la empresa">
            </div>

            <!-- Puesto desempeñado -->
            <div class="mb-3 form-group">
                <label for="puesto_practicas" class="form-label">Puesto desempeñado:</label>
                <input type="text" name="puesto_practicas" class="form-control" id="puesto_practicas"
                    placeholder="Puesto">
            </div>

            <!-- Duración de las prácticas -->
            <div class="mb-3 form-group">
                <label for="duracion_practicas" class="form-label">Duración de las prácticas:</label>
                <input type="text" name="duracion_practicas" class="form-control" id="duracion_practicas"
                    placeholder="Duración (en meses)">
            </div>

            <!-- ¿Has realizado servicio social? -->
            <div class="mb-3 form-group">
                <label class="form-label">¿Has realizado servicio social?</label>
                <div class="form-check">
                    <input type="radio" name="servicio_social" class="form-check-input" id="servicio_social_si"
                        value="Sí" required>
                    <label class="form-check-label" for="servicio_social_si">Sí</label>
                </div>
                <div class="form-check">
                    <input type="radio" name="servicio_social" class="form-check-input" id="servicio_social_no"
                        value="No" required>
                    <label class="form-check-label" for="servicio_social_no">No</label>
                </div>
            </div>

            <!-- ¿El servicio social fue acorde a tu perfil profesional? -->
            <div class="mb-3 form-group">
                <label for="servicio_social_acorde" class="form-label">¿El servicio social fue acorde a tu perfil
                    profesional?</label>
                <select name="servicio_social_acorde" id="servicio_social_acorde" class="form-control">
                    <option value="" disabled selected>Selecciona una opción</option>
                    <option value="Sí">Sí</option>
                    <option value="No">No</option>
                    <option value="Algunas veces">Algunas veces</option>
                </select>
            </div>

            <!-- ¿El servicio social fue útil para la adquisición de conocimientos nuevos? -->
            <div class="mb-3 form-group">
                <label for="servicio_social_util" class="form-label">¿El servicio social fue útil para la adquisición de
                    conocimientos nuevos?</label>
                <select name="servicio_social_util" id="servicio_social_util" class="form-control">
                    <option value="" disabled selected>Selecciona una opción</option>
                    <option value="Sí">Sí</option>
                    <option value="No">No</option>
                    <option value="No aplica">No aplica</option>
                </select>
            </div>

            <!-- Experiencia laboral previa -->
            <div class="mb-3 form-group">
                <label for="experiencia_laboral_previa" class="form-label">Experiencia laboral previa:</label>
                <textarea name="experiencia_laboral_previa" id="experiencia_laboral_previa" class="form-control" rows="3"
                    placeholder="Describe tu experiencia laboral previa"></textarea>
            </div>

            <!-- Áreas de interés profesional -->
            <div class="mb-3 form-group">
                <label for="areas_interes" class="form-label">Áreas de interés profesional:</label>
                <input type="text" name="areas_interes" class="form-control" id="areas_interes"
                    placeholder="Áreas de interés">
            </div>

            <!-- Tipo de empleo deseado -->
            <div class="mb-3 form-group">
                <label for="tipo_empleo" class="form-label">Tipo de empleo deseado:</label>
                <select name="tipo_empleo" id="tipo_empleo" class="form-control">
                    <option value="" disabled selected>Selecciona una opción</option>
                    <option value="Tiempo completo">Tiempo completo</option>
                    <option value="Medio tiempo">Medio tiempo</option>
                    <option value="Freelance">Freelance</option>
                </select>
            </div>

            <!-- Preferencias de ubicación laboral -->
            <div class="mb-3 form-group">
                <label for="preferencia_ubicacion" class="form-label">Preferencias de ubicación laboral:</label>
                <select name="preferencia_ubicacion" id="preferencia_ubicacion" class="form-control">
                    <option value="" disabled selected>Selecciona una opción</option>
                    <option value="Local">Local</option>
                    <option value="Nacional">Nacional</option>
                    <option value="Internacional">Internacional</option>
                </select>
            </div>

            <!-- Certificaciones adicionales o cursos relevantes completados -->
            <div class="mb-3 form-group">
                <label for="certificaciones" class="form-label">Certificaciones adicionales o cursos relevantes
                    completados:</label>
                <textarea name="certificaciones" id="certificaciones" class="form-control" rows="2"
                    placeholder="Describe tus certificaciones o cursos"></textarea>
            </div>

            <!-- Conocimientos en idiomas extranjeros -->
            <div class="mb-3 form-group">
                <label for="conocimientos_idiomas" class="form-label">Conocimientos en idiomas extranjeros:</label>
                <textarea name="conocimientos_idiomas" id="conocimientos_idiomas" class="form-control" rows="2"
                    placeholder="Idiomas y nivel de competencia"></textarea>
            </div>

            <!-- Habilidades técnicas -->
            <div class="mb-3 form-group">
                <label for="habilidades_tecnicas" class="form-label">Habilidades técnicas:</label>
                <textarea name="habilidades_tecnicas" id="habilidades_tecnicas" class="form-control" rows="2"
                    placeholder="Describe tus habilidades técnicas"></textarea>
            </div>

            <!-- ¿Has considerado cursar un posgrado? -->
            <div class="mb-3 form-group">
                <label class="form-label">¿Has considerado cursar un posgrado?</label>
                <div class="form-check">
                    <input type="radio" name="considera_posgrado" class="form-check-input"
                        id="considera_posgrado_si" value="Sí" required>
                    <label class="form-check-label" for="considera_posgrado_si">Sí</label>
                </div>
                <div class="form-check">
                    <input type="radio" name="considera_posgrado" class="form-check-input"
                        id="considera_posgrado_no" value="No" required>
                    <label class="form-check-label" for="considera_posgrado_no">No</label>
                </div>
            </div>

            <!-- Área académica del posgrado -->
            <div class="mb-3 form-group">
                <label for="area_posgrado" class="form-label">Área académica del posgrado:</label>
                <input type="text" name="area_posgrado" class="form-control" id="area_posgrado"
                    placeholder="Área académica">
            </div>

            <!-- Posgrado de interés -->
            <div class="mb-3 form-group">
                <label for="posgrado_interes" class="form-label">Posgrado de interés:</label>
                <input type="text" name="posgrado_interes" class="form-control" id="posgrado_interes"
                    placeholder="Nombre del posgrado">
            </div>

            <!-- ¿Estás disponible para cambiar de residencia? -->
            <div class="mb-3 form-group">
                <label class="form-label">¿Estás disponible para cambiar de residencia?</label>
                <div class="form-check">
                    <input type="radio" name="cambio_residencia" class="form-check-input"
                        id="cambio_residencia_si" value="Sí" required>
                    <label class="form-check-label" for="cambio_residencia_si">Sí</label>
                </div>
                <div class="form-check">
                    <input type="radio" name="cambio_residencia" class="form-check-input"
                        id="cambio_residencia_no" value="No" required>
                    <label class="form-check-label" for="cambio_residencia_no">No</label>
                </div>
            </div>

            <!-- ¿Estás interesado en oportunidades internacionales? -->
            <div class="mb-3 form-group">
                <label class="form-label">¿Estás interesado en oportunidades internacionales?</label>
                <div class="form-check">
                    <input type="radio" name="interes_oportunidades_internacionales" class="form-check-input"
                        id="interes_oportunidades_internacionales_si" value="Sí" required>
                    <label class="form-check-label" for="interes_oportunidades_internacionales_si">Sí</label>
                </div>
                <div class="form-check">
                    <input type="radio" name="interes_oportunidades_internacionales" class="form-check-input"
                        id="interes_oportunidades_internacionales_no" value="No" required>
                    <label class="form-check-label" for="interes_oportunidades_internacionales_no">No</label>
                </div>
            </div>

            <!-- ¿Estás dispuesto a participar en programas de mentoría o tutoría para otros estudiantes? -->
            <div class="mb-3 form-group">
                <label class="form-label">¿Estás dispuesto a participar en programas de mentoría o tutoría para otros
                    estudiantes?</label>
                <div class="form-check">
                    <input type="radio" name="participacion_mentoria" class="form-check-input"
                        id="participacion_mentoria_si" value="Sí" required>
                    <label class="form-check-label" for="participacion_mentoria_si">Sí</label>
                </div>
                <div class="form-check">
                    <input type="radio" name="participacion_mentoria" class="form-check-input"
                        id="participacion_mentoria_no" value="No" required>
                    <label class="form-check-label" for="participacion_mentoria_no">No</label>
                </div>
            </div>

            <!-- Botón para enviar el formulario -->
            <div class="text-center">
                <button type="submit" class="btn btn-custom">Enviar</button>
            </div>
        </form>
    </div>
    </div>

    <!-- Bootstrap JS y dependencias -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
