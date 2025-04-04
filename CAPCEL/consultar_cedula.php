<?php
require_once 'db.php';

// Obtener los datos enviados por AJAX
$data = json_decode(file_get_contents('php://input'), true);
$cedula = trim($data['cedula']);

try {
    // 1. Consultar la cédula en la tabla usuarios
    $stmt = $conn->prepare("SELECT * FROM usuarios WHERE cedula = :cedula");
    $stmt->bindParam(':cedula', $cedula);
    $stmt->execute();
    $usuarioExistente = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($usuarioExistente) {
        // La cédula ya está registrada en la tabla usuarios
        echo json_encode(['success' => false, 'message' => 'El número de cédula ya está registrado.']);
        exit;
    }

    // 2. Consultar la cédula en la tabla beneficiarios
    $stmt = $conn->prepare("SELECT cedula, nombre FROM beneficiarios WHERE cedula = :cedula");
    $stmt->bindParam(':cedula', $cedula);
    $stmt->execute();
    $beneficiario = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($beneficiario) {
        // Devolver los datos del beneficiario
        echo json_encode([
            'success' => true,
            'cedula' => $beneficiario['cedula'],
            'nombre' => $beneficiario['nombre']
        ]);
    } else {
        // La cédula no existe en ninguna de las dos tablas
        echo json_encode(['success' => false, 'message' => 'La cédula ingresada no pertenece a los beneficiarios de esta Caja de Ahorros.']);
    }
} catch (PDOException $e) {
    echo json_encode(['success' => false, 'message' => 'Ocurrió un error: ' . $e->getMessage()]);
}
?>