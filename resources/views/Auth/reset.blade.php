<!-- resources/views/auth/reset-password.blade.php -->
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Restablecer Contraseña - UTVT</title>
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
                            <h2 class="fs-6 fw-normal text-center text-secondary mb-4">Actualizar Contraseña</h2>
                            <form method="POST" action="{{ route('password.update') }}">
                                @csrf
                                <input type="hidden" name="token" value="{{ $token }}">
                                <div class="form-floating mb-3">
                                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" 
                                        id="email" placeholder="Correo electrónico" value="{{ $email ?? old('email') }}" required>
                                    <label for="email">{{ __('Correo Electrónico') }}</label>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" 
                                        id="password" placeholder="Nueva Contraseña" required>
                                    <label for="password">{{ __('Nueva Contraseña') }}</label>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="password" name="password_confirmation" class="form-control" 
                                        id="password_confirmation" placeholder="Confirmar Contraseña" required>
                                    <label for="password_confirmation">{{ __('Confirmar Contraseña') }}</label>
                                </div>
                                <div class="d-grid my-3">
                                    <button class="btn btn-primary btn-lg" type="submit">{{ __('Actualizar Contraseña') }}</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>
