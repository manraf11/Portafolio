<?php
session_start();
if (!isset($_SESSION['usuario_id'])) {
    header('Location: login.php');
    exit;
}

require_once 'db.php';

$usuario_id = $_SESSION['usuario_id'];
$stmt = $conn->prepare("SELECT saldo FROM usuarios WHERE id = :id");
$stmt->bindParam(':id', $usuario_id);
$stmt->execute();
$usuario = $stmt->fetch(PDO::FETCH_ASSOC);
$saldo = $usuario['saldo'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Caja de Ahorros CAPCEL</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome (para íconos) -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <!-- Estilos personalizados -->
    <style>
        body {
            background-color: #f8f9fa;
        }
        .dashboard-container {
            max-width: 600px;
            margin: auto;
            margin-top: 5%;
            padding: 20px;
            background: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .dashboard-container h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #0d6efd; /* Azul institucional */
        }
        .dashboard-container p {
            text-align: center;
            font-size: 18px;
            margin-bottom: 30px;
            color: #495057;
        }
        .dashboard-container ul {
            list-style: none;
            padding: 0;
        }
        .dashboard-container ul li {
            margin-bottom: 15px;
        }
        .dashboard-container ul li a {
            text-decoration: none;
            color: #0d6efd;
            font-size: 16px;
            display: flex;
            align-items: center;
        }
        .dashboard-container ul li a i {
            margin-right: 10px;
            font-size: 20px;
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
    <div class="dashboard-container">
        <h2><i class="fas fa-tachometer-alt me-2"></i>Dashboard</h2>
        <p>Tu saldo actual es: <strong><?php echo number_format($saldo, 2); ?> BsS</strong></p>
        <ul>
            <li>
                <a href="consultar_movimientos.php">
                    <i class="fas fa-list-alt"></i> Últimos Movimientos
                </a>
            </li>
            <li>
                <a href="solicitar_prestamo.php">
                    <i class="fas fa-hand-holding-usd"></i> Solicitar Préstamo
                </a>
            </li>
        </ul>
        <div class="footer">
    &copy; <?php echo date('Y'); ?> Caja de Ahorros CAPCEL. Todos los derechos reservados.
</div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>