<?php
session_start();  

// Configuración de la base de datos
$host = 'localhost';
$db = 'SIVI';
$user = 'postgres';
$pass = '123';

try {
    // Conexión a la base de datos PostgreSQL
    $pdo = new PDO("pgsql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}

// Verificar si se ha enviado el formulario
if (!empty($_POST['txtusuario']) && !empty($_POST['txtclave'])) {  
    $username = strval(htmlentities(trim($_POST['txtusuario'])));  
    $password = htmlentities(trim($_POST['txtclave']));  

    // Consulta para obtener el usuario
    $sql = "SELECT * FROM usuarios WHERE user_name = :usuario";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':usuario', $username);
    $stmt->execute();

    // Verificar si se devolvieron resultados
    if ($stmt->rowCount() > 0) {  
        $fetch = $stmt->fetch(PDO::FETCH_ASSOC);  
        
        // Comparar la contraseña ingresada con la almacenada
        if ($password === $fetch['password']) {  
            $_SESSION['txtusuario'] = $fetch['user_name'];  
            header("Location: menu.php"); // Redirigir a menu.php
            exit(); // Asegurarse de que no se ejecute más código después de la redirección
        } else {  
            echo 0; // Contraseña inválida  
        }  
    } else {  
        echo 2; // No se encontró un usuario con ese nombre  
    }  
} else {  
    echo "Se requieren nombre de usuario y contraseña.";  
}  
?>