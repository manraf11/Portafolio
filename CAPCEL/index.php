<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Caja de Ahorros CAPCEL</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome (para íconos) -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <!-- Estilos personalizados -->
    <style>
        body {
            background-color: #f8f9fa;
        }
        .welcome-container {
            max-width: 600px;
            margin: auto;
            margin-top: 10%;
            padding: 20px;
            background: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .welcome-container h3 {
            text-align: center;
            margin-bottom: 20px;
            color: #0d6efd; /* Azul institucional */
        }
        .welcome-container p {
            text-align: center;
            font-size: 18px;
            margin-bottom: 30px;
            color: #495057;
        }
        .welcome-container .btn {
            width: 48%;
            border-radius: 5px;
            font-size: 16px;
        }
        .welcome-container .btn-primary {
            background-color: #0d6efd;
            border: none;
        }
        .welcome-container .btn-secondary {
            background-color: #6c757d;
            border: none;
        }
        .footer {
            text-align: center;
            margin-top: 20px;
            font-size: 14px;
            color: #6c757d;
        }
    </style>
</head>
<body>
    <div class="welcome-container">
        <h3><i class="fas fa-piggy-bank me-2"></i>Bienvenido a CAPCEL</h3>
        <p>¿Qué deseas hacer?</p>
        <div class="d-flex justify-content-center gap-3">
            <a href="login.php" class="btn btn-primary"><i class="fas fa-sign-in-alt me-2"></i>Iniciar Sesión</a>
            <a href="register.php" class="btn btn-secondary"><i class="fas fa-user-plus me-2"></i>Registrarse</a>
        </div>
        <div class="footer">
    &copy; <?php echo date('Y'); ?> Caja de Ahorros CAPCEL. Todos los derechos reservados.
</div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>