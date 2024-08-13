<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel 11 Custom User Register Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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

    <section class="py-3 py-md-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-5 col-xxl-4">
                    <div class="card rounded-3 shadow-sm mt-5">
                        <div class="card-body p-3 p-md-4 p-xl-5">
                            <div class="text-center mb-3">
                                <a href="#!">
                                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRsj4w_P9_rO5ht4hOHQPinhXuHoLuxg5twElh7SDs-gNNxwVJcxv4o0PBuzMYFdXE1pWE&usqp=CAU"
                                        alt="BootstrapBrain Logo" class="rounded-circle" width="250">
                                </a>
                            </div>
                            <h2 class="fs-6 fw-normal text-center text-white mb-4">Sign up to your account</h2>
                            <form method="POST" action="{{ route('register.post') }}">
                                @csrf

                                @if (session('error'))
                                    <div class="alert alert-danger" role="alert">
                                        {{ session('error') }}
                                    </div>
                                @endif

                                <div class="row gy-2 overflow-hidden">
                                    <div class="col-12">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control @error('nombre') is-invalid @enderror"
                                                name="nombre" id="nombre" placeholder="Nombre" required>
                                            <label for="nombre" class="form-label">{{ __('Nombre') }}</label>
                                        </div>
                                        @error('nombre')
                                            <span class="text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control @error('app') is-invalid @enderror" name="app"
                                                id="app" placeholder="Apellido Paterno" required>
                                            <label for="app" class="form-label">{{ __('Apellido Paterno') }}</label>
                                        </div>
                                        @error('app')
                                            <span class="text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control @error('apm') is-invalid @enderror" name="apm"
                                                id="apm" placeholder="Apellido Materno" required>
                                            <label for="apm" class="form-label">{{ __('Apellido Materno') }}</label>
                                        </div>
                                        @error('apm')
                                            <span class="text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control @error('matricula') is-invalid @enderror"
                                                name="matricula" id="matricula" placeholder="Matrícula" required>
                                            <label for="matricula" class="form-label">{{ __('Matrícula') }}</label>
                                        </div>
                                        @error('matricula')
                                            <span class="text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating mb-3">
                                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                                                id="email" placeholder="Email" required>
                                            <label for="email" class="form-label">{{ __('Email Address') }}</label>
                                        </div>
                                        @error('email')
                                            <span class="text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating mb-3">
                                            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" placeholder="Password" required>
                                            <label for="password" class="form-label">{{ __('Password') }}</label>
                                        </div>
                                        @error('password')
                                            <span class="text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col-12">
                                        <div class="form-floating mb-3">
                                            <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" id="password_confirmation" placeholder="Confirm Password" required>
                                            <label for="password_confirmation" class="form-label">{{ __('Confirm Password') }}</label>
                                        </div>
                                        @error('password_confirmation')
                                            <span class="text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <div class="d-grid my-3">
                                            <button class="btn btn-primary btn-lg" type="submit">
                                                {{ __('Register') }}
                                            </button>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <p class="m-0 text-center text-black">
                                            Have an account? 
                                            <a href="{{ route('login') }}" class="link-primary text-decoration-none">
                                                Sign in
                                            </a>
                                        </p>
                                    </div>
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
