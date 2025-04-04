<?php
session_start();
if ($_SESSION['rol'] !== 'admin') {
    header('Location: dashboard.php');
    exit;
}

require_once 'db.php';

// Función para consultar saldo y movimientos de un beneficiario
function consultarBeneficiario($conn, $cedula) {
    $stmt = $conn->prepare("SELECT nombre, saldo FROM usuarios WHERE cedula = :cedula");
    $stmt->bindParam(':cedula', $cedula);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

// Función para agregar un nuevo beneficiario
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['accion']) && $_POST['accion'] === 'agregar_beneficiario') {
    $nombre = trim($_POST['nombre']);
    $cedula = trim($_POST['cedula']);
    $codigoacceso = trim($_POST['codigoacceso']);

    $stmt = $conn->prepare("INSERT INTO beneficiarios (nombre, cedula, codigoacceso) VALUES (:nombre, :cedula, :codigoacceso)");
    $stmt->bindParam(':nombre', $nombre);
    $stmt->bindParam(':cedula', $cedula);
    $stmt->bindParam(':codigoacceso', $codigoacceso);

    if ($stmt->execute()) {
        echo '<script>
                Swal.fire({
                    icon: "success",
                    title: "¡Beneficiario Agregado!",
                    text: "El beneficiario ha sido registrado correctamente.",
                    confirmButtonText: "Aceptar"
                });
              </script>';
    } else {
        echo '<script>
                Swal.fire({
                    icon: "error",
                    title: "Error",
                    text: "Ocurrió un problema al agregar el beneficiario.",
                    confirmButtonText: "Aceptar"
                });
              </script>';
    }
}

// Función para aceptar solicitudes de cambio de contraseña
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['accion']) && $_POST['accion'] === 'aceptar_cambio') {
    $email = trim($_POST['email']);
    // Generar un token único para el cambio de contraseña
    $token = bin2hex(random_bytes(16));
    $stmt = $conn->prepare("UPDATE usuarios SET reset_token = :token WHERE email = :email");
    $stmt->bindParam(':token', $token);
    $stmt->bindParam(':email', $email);

    if ($stmt->execute()) {
        echo '<script>
                Swal.fire({
                    icon: "success",
                    title: "¡Solicitud Aceptada!",
                    text: "El usuario puede cambiar su contraseña ahora.",
                    confirmButtonText: "Aceptar"
                });
              </script>';
    } else {
        echo '<script>
                Swal.fire({
                    icon: "error",
                    title: "Error",
                    text: "Ocurrió un problema al procesar la solicitud.",
                    confirmButtonText: "Aceptar"
                });
              </script>';
    }
}

// Función para actualizar saldos masivamente desde un archivo .txt
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['archivo'])) {
    $archivo = $_FILES['archivo']['tmp_name'];
    $lineas = file($archivo);
    $mensajes = [];

    foreach ($lineas as $linea) {
        list($cedula, $nuevo_saldo) = explode(',', trim($linea));

        // Verificar si el beneficiario existe
        $stmt = $conn->prepare("SELECT id FROM usuarios WHERE cedula = :cedula");
        $stmt->bindParam(':cedula', $cedula);
        $stmt->execute();
        $usuarioExistente = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($usuarioExistente) {
            // Actualizar el saldo del beneficiario
            $stmt = $conn->prepare("UPDATE usuarios SET saldo = saldo + :nuevo_saldo WHERE cedula = :cedula");
            $stmt->bindParam(':nuevo_saldo', $nuevo_saldo);
            $stmt->bindParam(':cedula', $cedula);

            if ($stmt->execute()) {
                $mensajes[] = [
                    'tipo' => 'success',
                    'mensaje' => "El saldo del beneficiario con cédula $cedula fue actualizado correctamente a " . number_format($nuevo_saldo, 2) . " BsS."
                ];
            } else {
                $mensajes[] = [
                    'tipo' => 'error',
                    'mensaje' => "No se pudo actualizar el saldo del beneficiario con cédula $cedula."
                ];
            }
        } else {
            $mensajes[] = [
                'tipo' => 'error',
                'mensaje' => "No se encontró ningún beneficiario con la cédula $cedula."
            ];
        }
    }

    // Mostrar todos los mensajes
    echo '<script>';
    foreach ($mensajes as $mensaje) {
        echo 'Swal.fire({
                icon: "' . $mensaje['tipo'] . '",
                title: "' . ($mensaje['tipo'] === 'success' ? '¡Proceso Exitoso!' : 'Error') . '",
                text: "' . addslashes($mensaje['mensaje']) . '",
                confirmButtonText: "Aceptar"
              });';
    }
    echo '</script>';
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administrador - Caja de Ahorros CAPCEL</title>
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
        .admin-container {
            max-width: 800px;
            margin: auto;
            margin-top: 5%;
            padding: 20px;
            background: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .admin-container h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #0d6efd; /* Azul institucional */
        }
        .nav-tabs .nav-link {
            color: #495057;
        }
        .nav-tabs .nav-link.active {
            color: #0d6efd;
            border-color: #0d6efd;
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
    <div class="admin-container">
        <h2><i class="fas fa-user-cog me-2"></i>Panel de Administrador</h2>

        <!-- Pestañas del Panel de Administrador -->
        <ul class="nav nav-tabs" id="adminTabs" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="consulta-tab" data-bs-toggle="tab" data-bs-target="#consulta" type="button" role="tab">Consultar Beneficiario</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="agregar-tab" data-bs-toggle="tab" data-bs-target="#agregar" type="button" role="tab">Agregar Beneficiario</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="cambios-tab" data-bs-toggle="tab" data-bs-target="#cambios" type="button" role="tab">Cambios de Contraseña</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="actualizar-saldos-tab" data-bs-toggle="tab" data-bs-target="#actualizar-saldos" type="button" role="tab">Actualizar Saldos Masivos</button>
            </li>
        </ul>

        <!-- Contenido de las Pestañas -->
        <div class="tab-content" id="adminTabsContent">
            <!-- Pestaña: Consultar Beneficiario -->
            <div class="tab-pane fade show active" id="consulta" role="tabpanel">
                <form method="POST" class="mt-3">
                    <div class="mb-3">
                        <label for="cedula" class="form-label">Número de Cédula</label>
                        <input type="text" class="form-control" id="cedula" name="cedula" required>
                    </div>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-search me-2"></i>Consultar</button>
                </form>
                <?php
                if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['cedula'])) {
                    $cedula = trim($_POST['cedula']);
                    $beneficiario = consultarBeneficiario($conn, $cedula);
                    if ($beneficiario) {
                        echo '<div class="mt-3">';
                        echo '<p><strong>Nombre:</strong> ' . htmlspecialchars($beneficiario['nombre']) . '</p>';
                        echo '<p><strong>Saldo:</strong> ' . number_format($beneficiario['saldo'], 2) . ' BsS</p>';
                        echo '</div>';
                    } else {
                        echo '<p class="mt-3 text-danger">No se encontró ningún beneficiario con esa cédula.</p>';
                    }
                }
                ?>
            </div>

            <!-- Pestaña: Agregar Beneficiario -->
            <div class="tab-pane fade" id="agregar" role="tabpanel">
                <form method="POST" class="mt-3">
                    <input type="hidden" name="accion" value="agregar_beneficiario">
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" required>
                    </div>
                    <div class="mb-3">
                        <label for="cedula" class="form-label">Número de Cédula</label>
                        <input type="text" class="form-control" id="cedula" name="cedula" required>
                    </div>
                    <div class="mb-3">
                        <label for="codigoacceso" class="form-label">Código de Acceso</label>
                        <input type="text" class="form-control" id="codigoacceso" name="codigoacceso" required>
                    </div>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-save me-2"></i>Agregar Beneficiario</button>
                </form>
            </div>

            <!-- Pestaña: Cambios de Contraseña -->
            <div class="tab-pane fade" id="cambios" role="tabpanel">
                <form method="POST" class="mt-3">
                    <input type="hidden" name="accion" value="aceptar_cambio">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email del Usuario</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-check me-2"></i>Aceptar Cambio</button>
                </form>
            </div>

            <!-- Nueva Pestaña: Actualizar Saldos Masivos -->
            <div class="tab-pane fade" id="actualizar-saldos" role="tabpanel">
                <form method="POST" enctype="multipart/form-data" class="mt-3">
                    <div class="mb-3">
                        <label for="archivo" class="form-label">Subir archivo de saldos (.txt)</label>
                        <input type="file" class="form-control" id="archivo" name="archivo" accept=".txt" required>
                        <small class="form-text text-muted">
                            Formato del archivo: Una línea por beneficiario, separando la cédula y el monto con una coma (ejemplo: 123456789,1000).
                        </small>
                    </div>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-upload me-2"></i>Actualizar Saldos</button>
                </form>
            </div>
        </div>

        <div class="footer">
            &copy; <?php echo date('Y'); ?> Caja de Ahorros CAPCEL. Todos los derechos reservados.
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>