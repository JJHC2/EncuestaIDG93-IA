<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inicio de Sesión - UTVT</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style type="text/css">
        body {
            background-color: #8A2036;
            color: #fff;
        }

        .card {
            border: none;
            background-color: #ffffff;
            color: #8A2036;
        }

        .form-control {
            background-color: #f8f9fa;
            border: 1px solid #ced4da;
        }

        .form-floating>.form-control:focus~label {
            color: #8A2036;
        }

        .btn-primary {
            background-color: #8A2036;
            border-color: #8A2036;
        }

        .btn-primary:hover {
            background-color: #72182b;
            border-color: #72182b;
        }

        .link-primary {
            color: #8A2036;
        }

        .link-primary:hover {
            color: #72182b;
        }

        .rounded-full {
            border-radius: 50%;
        }

        .form-check-label {
            color: #8A2036;
        }

        .text-secondary {
            color: #6c757d !important;
        }
    </style>
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <section class="py-3 py-md-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-5 col-xxl-4">
                    <div class="card border-0 rounded-3 shadow-sm mt-5">
                        <div class="card-body p-4 p-md-5">
                            <div class="text-center mb-4">
                                <a href="#!">
                                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRsj4w_P9_rO5ht4hOHQPinhXuHoLuxg5twElh7SDs-gNNxwVJcxv4o0PBuzMYFdXE1pWE&usqp=CAU"
                                        alt="Logo UTVT" class="rounded-full mx-auto" width="150">
                                </a>
                            </div>
                            <h2 class="fs-6 fw-normal text-center text-secondary mb-4">Inicia sesión en tu cuenta</h2>
                            <form method="POST" action="{{ route('login.post') }}">
                                @csrf

                                @session('error')
                                    <div class="alert alert-danger" role="alert">
                                        {{ $value }}
                                    </div>
                                @endsession

                                <div class="row gy-2 overflow-hidden">
                                    <div class="col-12">
                                        <div class="form-floating mb-3">
                                            <input type="email"
                                                class="form-control @error('email') is-invalid @enderror" name="email"
                                                id="email" placeholder="name@example.com" required>
                                            <label for="email"
                                                class="form-label">{{ __('Correo Electrónico') }}</label>
                                        </div>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating mb-3">
                                            <input type="password"
                                                class="form-control @error('password') is-invalid @enderror"
                                                name="password" id="password" placeholder="Contraseña" required>
                                            <label for="password" class="form-label">{{ __('Contraseña') }}</label>
                                        </div>
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <div class="d-flex gap-2 justify-content-between">
                                            <a href="#!" class="link-primary text-decoration-none"
                                                data-bs-toggle="modal" data-bs-target="#forgotPasswordModal">
                                                {{ __('¿Olvidaste tu contraseña?') }}
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="d-grid my-3">
                                            <button class="btn btn-primary btn-lg"
                                                type="submit">{{ __('Iniciar Sesión') }}</button>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <p class="m-0 text-secondary text-center">¿No tienes una cuenta? <a
                                                href="{{ route('register') }}"
                                                class="link-primary text-decoration-none">Regístrate</a></p>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal para Restablecimiento de Contraseña -->
    <div class="modal fade" id="forgotPasswordModal" tabindex="-1" aria-labelledby="forgotPasswordModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="forgotPasswordModalLabel">Restablecer Contraseña</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" style="display: flex; justify-content: center; align-items: center; height: 100%; padding: 20px;">
                    <form id="password-reset-form" method="POST" action="{{ route('password.email') }}" style="background-color: #f9f9f9; padding: 20px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0,0,0,0.1); width: 100%; max-width: 400px;">
                        @csrf
                        <h3 style="text-align: center; color: #333;">Restablecer Contraseña</h3>
                        <input type="email" name="email" placeholder="Introduce tu correo electrónico" required style="width: 100%; padding: 10px; margin-bottom: 20px; border: 1px solid #ddd; border-radius: 4px; box-sizing: border-box;">
                        <button type="submit" style="width: 100%; padding: 10px; background-color: #007bff; color: #fff; border: none; border-radius: 4px; cursor: pointer; font-size: 16px;">Enviar enlace de recuperación</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('forgotPasswordForm').addEventListener('submit', function(e) {
                e.preventDefault();
                let email = document.getElementById('forgotPasswordEmail').value;

                fetch('{{ route('password.email') }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                                .getAttribute('content')
                        },
                        body: JSON.stringify({
                            email: email
                        })
                    })
                    .then(response => {
                        if (!response.ok) {
                            return response.text().then(text => {
                                throw new Error(text);
                            });
                        }
                        return response.json();
                    })
                    .then(data => {
                        alert(data.message);
                        document.getElementById('forgotPasswordForm').reset();
                        let modal = bootstrap.Modal.getInstance(document.getElementById(
                            'forgotPasswordModal'));
                        modal.hide();
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert(
                            'Hubo un problema al enviar el enlace de restablecimiento. Por favor, intente de nuevo.');
                    });
            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
