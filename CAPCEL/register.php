<?php
require_once 'db.php';

// Verificar si se envió una solicitud POST para registrar al usuario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cedula = trim($_POST['cedula']);
    $nombre = trim($_POST['nombre']); // Este valor ya viene precargado desde la base de datos
    $email = trim($_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    try {
        // Verificar nuevamente si la cédula existe en la tabla usuarios
        $stmt = $conn->prepare("SELECT * FROM usuarios WHERE cedula = :cedula");
        $stmt->bindParam(':cedula', $cedula);
        $stmt->execute();
        $usuarioExistente = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($usuarioExistente) {
            // La cédula ya está registrada en la tabla usuarios
            echo '<script>
                    Swal.fire({
                        icon: "warning",
                        title: "Usuario Existente",
                        text: "El número de cédula ya está registrado.",
                        confirmButtonText: "Aceptar"
                    });
                  </script>';
            exit;
        }

        // Registrar el nuevo usuario en la tabla usuarios
        $stmt = $conn->prepare("INSERT INTO usuarios (cedula, nombre, email, password) VALUES (:cedula, :nombre, :email, :password)");
        $stmt->bindParam(':cedula', $cedula);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        $stmt->execute();

        // Mostrar notificación de éxito con SweetAlert2
        echo '<script>
                Swal.fire({
                    icon: "success",
                    title: "¡Registro Exitoso!",
                    text: "El usuario ha sido registrado correctamente.",
                    confirmButtonText: "Aceptar"
                }).then(() => {
                    window.location.href = "index.php"; // Redirigir al inicio
                });
              </script>';
        exit;
    } catch (PDOException $e) {
        // Mostrar notificación de error con SweetAlert2
        echo '<script>
                Swal.fire({
                    icon: "error",
                    title: "Error",
                    text: "Ocurrió un problema al registrar el usuario: ' . addslashes($e->getMessage()) . '",
                    confirmButtonText: "Aceptar"
                });
              </script>';
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro - Caja de Ahorros CAPCEL</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome (para íconos) -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <!-- Estilos personalizados -->
    <style>
        body {
            background-color: #f8f9fa;
        }
        .register-container {
            max-width: 500px;
            margin: auto;
            margin-top: 5%;
            padding: 20px;
            background: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .register-container h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #0d6efd; /* Azul institucional */
        }
        .register-container label {
            font-weight: bold;
            color: #495057;
        }
        .register-container .btn-primary {
            width: 100%;
            border-radius: 5px;
            background-color: #0d6efd;
            border: none;
        }
        .register-container .btn-secondary {
            width: 100%;
            border-radius: 5px;
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
    <div class="register-container">
        <h2><i class="fas fa-user-plus me-2"></i>Registro de Usuario</h2>

        <!-- Formulario para consultar la cédula -->
        <form id="consultaCedulaForm" method="POST">
            <div class="mb-3">
                <label for="cedula" class="form-label">Número de Cédula</label>
                <input type="text" class="form-control" id="cedula" name="cedula" placeholder="Ingresa tu número de cédula" required>
            </div>
            <button type="button" class="btn btn-primary"><i class="fas fa-search me-2"></i>Consultar Cédula</button>
        </form>

        <!-- Formulario de registro que aparece después de consultar la cédula -->
        <form id="registroForm" method="POST" style="display: none;">
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" readonly>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Ingresa tu email" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Contraseña</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Ingresa tu contraseña" required>
            </div>
            <input type="hidden" id="cedulaHidden" name="cedula">
            <button type="submit" class="btn btn-success"><i class="fas fa-save me-2"></i>Registrar</button>
        </form>
        <div class="footer">
    &copy; <?php echo date('Y'); ?> Caja de Ahorros CAPCEL. Todos los derechos reservados.
</div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Script para consultar la cédula -->
    <script>
        function consultarCedula() {
            const cedula = document.getElementById('cedula').value;

            if (!cedula) {
                Swal.fire({
                    icon: "warning",
                    title: "Campo Vacío",
                    text: "Por favor, ingresa un número de cédula.",
                    confirmButtonText: "Aceptar"
                });
                return;
            }

            // Realizar una solicitud AJAX para verificar la cédula
            fetch('consultar_cedula.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ cedula: cedula })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Mostrar el formulario de registro y cargar los datos
                    document.getElementById('nombre').value = data.nombre;
                    document.getElementById('cedulaHidden').value = data.cedula;
                    document.getElementById('registroForm').style.display = 'block';
                } else {
                    Swal.fire({
                        icon: "error",
                        title: "Error",
                        text: data.message,
                        confirmButtonText: "Aceptar"
                    });
                }
            })
            .catch(error => {
                console.error('Error:', error);
                Swal.fire({
                    icon: "error",
                    title: "Error",
                    text: "Ocurrió un error al consultar la cédula.",
                    confirmButtonText: "Aceptar"
                });
            });
        }

        // Asociar la función al botón de consulta
        document.querySelector('#consultaCedulaForm button').addEventListener('click', consultarCedula);
    </script>
</body>
</html>