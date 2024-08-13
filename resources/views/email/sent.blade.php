<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperación de Contraseña</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #ffffff; /* Fondo blanco */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .card {
            background-color: #ffffff;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            padding: 30px;
            max-width: 400px;
            width: 100%;
            text-align: center;
        }
        .logo-container {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 20px;
        }
        .logo {
            width: 100px;
        }
        .message {
            font-size: 18px;
            color: #8A2036; /* Texto color #8A2036 */
            margin-bottom: 20px;
        }
        .btn-primary {
            background-color: #8A2036; /* Botón color #8A2036 */
            border-color: #8A2036;
            border-radius: 30px;
            padding: 10px 20px;
            font-size: 16px;
            transition: all 0.3s ease;
        }
        .btn-primary:hover {
            background-color: #6c1a2b; /* Hover color un poco más oscuro */
            border-color: #6c1a2b;
        }
        .back-link {
            display: block;
            margin-top: 20px;
            color: #8A2036; /* Enlace color #8A2036 */
            text-decoration: none;
            transition: all 0.3s ease;
        }
        .back-link:hover {
            color: #6c1a2b; /* Hover color un poco más oscuro */
        }
    </style>
</head>
<body>

    <div class="card">
        <div class="logo-container">
            <img src="/images/logo.jpg" alt="Logo" class="logo">
        </div>
        <h2 class="mb-3" style="color: #8A2036;">Recuperar Contraseña</h2>
        <p class="message">Hemos enviado un enlace a tu correo electrónico para restablecer tu contraseña.</p>
        <a href="{{ route('login') }}" class="btn btn-primary">Volver al Inicio</a>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
