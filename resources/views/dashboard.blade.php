<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel 11 Custom Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .navbar {
            background-color: #8A2036;
        }

        .navbar-brand img {
            max-width: 100px; /* Ajustar tamaño del logo */
        }

        .btn-custom-logout {
            background-color: #ffffff;
            color: #8A2036;
            border: 1px solid #8A2036;
        }

        .btn-custom-logout:hover {
            background-color: #8A2036;
            color: #ffffff;
            border-color: #8A2036;
        }

        .jumbotron {
            background-color: #ffffff;
            border-radius: .3rem;
            border: 1px solid #dee2e6;
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, .075);
        }

        .text-custom {
            color: #8A2036;
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

        .card-img-top {
            height: 180px;
            object-fit: cover;
        }
    </style>
</head>

<body>
    <main>
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container">
                <a class="navbar-brand" href="/">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcToMKJ59_iKwbmO1C6kKRXAO2cv-du7l1YIkA&s" alt="Logo">
                </a>
                <div class="ml-auto">
                    <a class="btn btn-custom-logout" href="#"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>
        </nav>

        <div class="container py-4">
            <div class="jumbotron p-5 mb-4">
                <div class="container">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    <h1 class="display-5 fw-bold text-custom">Bienvenido, {{ auth()->user()->nombre }} {{ auth()->user()->app }} {{ auth()->user()->apm }}</h1>
                    <p class="text-custom">Estudiante con Matricula "{{ auth()->user()->matricula }}"</p>
                    <p>Bienvenido al sistema de encuesta para egresados de la Universidad Tecnológica del Valle de Toluca (UTVT). Esta encuesta ha sido diseñada para recabar información valiosa sobre tu experiencia laboral y tu evaluación de los diferentes aspectos de nuestra institución. Tu participación es fundamental para que podamos entender mejor cómo la formación que recibiste en la UTVT ha influido en tu desarrollo profesional y para identificar áreas de mejora en nuestra oferta educativa. Agradecemos de antemano tu tiempo y colaboración.</p>
                </div>
            </div>

            <div class="row row-cols-1 row-cols-md-3 g-4">
                <div class="col">
                    <div class="card">
                        <img src="https://utvt.edomex.gob.mx/sites/utvt.edomex.gob.mx/files/images/1%20ACERCA%20DE%20LA%20UTVT/rectoria.jpg"
                            class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title text-custom">Pagina Oficial UTVT</h5>
                            <p class="card-text">Conoce más acerca de la UTVT y toda la información respecto a nuestra oferta educativa, así como de los servicios que tenemos para ti a través de la Secretaría de Educación Pública, el Gobierno Federal y el Gobierno del Estado de México.</p>
                            <a class="btn btn-danger" target="blank" href="https://utvt.edomex.gob.mx/node/202">Más Información</a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <img src="https://www.survio.com/es/blog/wp-content/uploads/2017/03/logo-do-cta.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title text-custom">Encuesta Egresados</h5>
                            <p class="card-text">Te invitamos a participar en esta encuesta diseñada para entender mejor tu situación laboral actual y tu percepción sobre diferentes aspectos de la Universidad Tecnológica del Valle de Toluca (UTVT). Tu opinión es muy valiosa para nosotros.</p>
                            <a class="btn btn-warning">Realizar Encuesta</a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <img src="https://siie.tamaulipas.gob.mx/Portada/imgs/portada2023_2028/consulta%20de%20calificaciones_1.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title text-custom">Sistema de Calificaciones (SAIIUT)</h5>
                            <p class="card-text">El sistema de calificaciones (SAIIUT) te permite conocer tu desempeño académico a lo largo de tu estancia en la UTVT.</p>
                            <p class="card-text">Además de consultar el calendario escolar para que no te pierdas de ninguna novedad.</p>
                            <a class="btn btn-info" target="blank" href="http://saiiut.utvtol.edu.mx/">Visitar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>

</html>
