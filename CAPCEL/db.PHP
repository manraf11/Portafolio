<?php
$host = 'localhost'; // Cambia si es necesario
$dbname = ''; // Nombre de tu base de datos
$user = ''; // Usuario de PostgreSQL
$password = ''; // Contraseña del usuario

try {
    // Especifica el puerto en la cadena de conexión
    $conn = new PDO("pgsql:host=$host;port= ;dbname=$dbname", $user, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}
?>
