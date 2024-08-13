<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f7f8fa;
        }
        .logo {
            width: 120px;
            margin-bottom: 30px;
        }
        .message {
            font-size: 22px;
            color: #d9534f;
            margin-top: 20px;
            background-color: #fff;
            padding: 15px 25px;
            border-radius: 8px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            max-width: 80%;
            text-align: center;
        }
    </style>
</head>
<body>
    <img src="{{ asset('images/logo') }}" alt="Logo" class="logo">
    <div class="message">{{ $message }}</div>
</body>
</html>
