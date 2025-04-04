<?php
$host = 'localhost'; // Cambia si es necesario
$dbname = 'CAPCEL'; // Nombre de tu base de datos
$user = 'postgres'; // Usuario de PostgreSQL
$password = '123'; // Contraseña del usuario

try {
    // Especifica el puerto en la cadena de conexión
    $conn = new PDO("pgsql:host=$host;port=5433;dbname=$dbname", $user, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}
?>