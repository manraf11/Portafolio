<?php
// Configuración de la conexión a la base de datos
$host = "localhost";
$port = "5432";
$dbname = "SIVI";
$user = "postgres";
$password = "123";

// Conectar a la base de datos
$conn = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");

if (!$conn) {
    die("Error en la conexión a la base de datos.");
}

// Consulta para obtener todos los usuarios registrados del día
$query = "
    SELECT *
    FROM visitantes
    WHERE fechareg::date = CURRENT_DATE
    ORDER BY fechareg DESC;
";

$result = pg_query($conn, $query);

if (!$result) {
    die("Error en la consulta: " . pg_last_error($conn));
}

// Obtener todos los usuarios
$usuarios = pg_fetch_all($result);
$cantidad_usuarios = $usuarios ? count($usuarios) : 0; // Contar la cantidad de usuarios

// Cerrar la conexión
pg_close($conn);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIVI (Sistema de Visitas)</title>
    <link rel="shortcut icon" href="Logos/Nvo_LogoCEL_sfond.png">
    <link href="../class/sia.css" type="text/css" rel="stylesheet">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #e0f7fa; /* Color de fondo más claro */
            margin: 0;
            padding: 0;
        }
        header {
            background-color: #004d40; /* Color de fondo del encabezado */
            color: white;
            padding: 20px;
            text-align: center;
            border-radius: 10px 10px 0 0; /* Bordes redondeados en la parte superior */
        }
        h1 {
            margin: 0;
            color: #f4f4f4;
        }
        h2 {
            color: #004d40; /* Color del subtítulo */
        }
        .container {
            width: 80%;
            margin: 20px auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #00796b; /* Color de fondo de los encabezados de la tabla */
            color: white;
        }
        input[type="text"], input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin: 5px 0 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        input[type="submit"] {
            background-color: #00796b; /* Color de fondo del botón */
            color: white;
            border: none;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #004d40; /* Color de fondo al pasar el mouse */
        }
        label {
            font-weight: bold;
        }
        .btn-regresar {
            background-color:  #00796b; /* Color de fondo del botón de regresar */
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            text-align: center;
            display: inline-block;
            margin-top: 20px;
        }
        .btn-regresar:hover {
            background-color:  #00796b; /* Color de fondo al pasar el mouse */
        }
    </style>
</head>
<body>

<header>
    <img src="Logos/Nvo_LogoCEL_fb.jpg" width="100" height="80" alt="Logo">
    <h1>INFORMACIÓN DEL VISITANTE</h <h1>INFORMACIÓN DEL VISITANTE</h1>
    <p>SIVI 2.0</p>
</header>

<div class="container">
    <h2>Usuarios Registrados Hoy</h2>
    <p><strong>Cantidad de usuarios registrados hoy:</strong> <?php echo $cantidad_usuarios; ?></p>
    <table>
        <thead>
            <tr>
                <th>Nombre del Visitante</th>
                <th>Dirección de Destino</th>
                <th>Funcionario</th>
                <th>Fecha de Registro</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($usuarios): ?>
                <?php foreach ($usuarios as $usuario): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($usuario['nombrevisit']); ?></td>
                        <td><?php echo htmlspecialchars($usuario['unidadest']); ?></td>
                        <td><?php echo htmlspecialchars($usuario['funcionariodest']); ?></td>
                        <td><?php echo htmlspecialchars($usuario['fechareg']); ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="4">No hay usuarios registrados hoy.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
    <a href="menu.php" class="btn-regresar">Regresar</a> <!-- Cambia 'pagina_anterior.php' por la URL de la función anterior -->
</div>

</body>
</html>