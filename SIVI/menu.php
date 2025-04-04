<?php  
session_start(); // Iniciar la sesión

// Conexión a la base de datos
$conexion = pg_connect("host=localhost dbname=SIVI user=postgres password=123")  
    or die('No se ha podido conectar: ' . pg_last_error());

date_default_timezone_set('America/Caracas'); // Establecer la zona horaria a Venezuela

// Contar registros del día
$fecha_actual = date('Y-m-d'); // Obtener la fecha actual en formato YYYY-MM-DD
$query = "SELECT COUNT(*) FROM visitantes WHERE DATE(fechareg) = '$fecha_actual'";
$result = pg_query($conexion, $query);
$numero_registros = pg_fetch_result($result, 0); // Número de registros del día

if ($_SERVER["REQUEST_METHOD"] == "POST") {  
    // Obtener y sanitizar los datos del formulario
    $funcionario = pg_escape_string($_POST['funcionario']);
    $unidadest = pg_escape_string($_POST['direccion']);
    $nombre = pg_escape_string($_POST['nombre']);
    $cedula = pg_escape_string($_POST['cedu']);
    $nrocarnet = pg_escape_string($_POST['nrocarnet']);
    $nrovisita = pg_escape_string($_POST['0']);
    $fecharegistro = date('Y-m-d H:i:s'); // Fecha de registro actual
    $fechentra = pg_escape_string($_POST['fechentra']);
    $fehsalid = pg_escape_string($_POST['fechsali']);
    $genero = pg_escape_string($_POST['genero']); // Obtener el género
    $observaciones = pg_escape_string($_POST['observaciones']); // Obtener las observaciones

    // Convertir las fechas al formato correcto
    $fechentra_formateada = date('Y-m-d H:i:s', strtotime($fechentra));
    $fehsalid_formateada = date('Y-m-d H:i:s', strtotime($fehsalid));

    // Preparar la consulta SQL
    $query = "INSERT INTO visitantes (funcionariodest, unidadest, nombrevisit, cedulavisit, nrocarnet, fechareg, nrovisita, fentrada, fsalida, genero, observaciones) 
              VALUES ('$funcionario', '$unidadest', '$nombre', '$cedula', '$nrocarnet', '$fecharegistro', '$nrovisita', '$fechentra_formateada', '$fehsalid_formateada', '$genero', '$observaciones')";  

    // Ejecutar la consulta
    if (pg_query($conexion, $query)) {  
        $_SESSION['mensaje'] = 'Datos insertados correctamente.'; // Guardar mensaje en sesión
        header("Location: " . $_SERVER['PHP_SELF']); // Redirigir a la misma página
        exit;  
    } else {  
        $_SESSION['mensaje'] = 'Error al insertar los datos: ' . pg_last_error($conexion); // Guardar mensaje de error en sesión
        header("Location: " . $_SERVER['PHP_SELF']); // Redirigir a la misma página
        exit;  
    }  
}  

pg_close($conexion);  
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
            line-height: 1.6;
        }
        header {
            background-color: #004d40; /* Color de fondo más oscuro */
            color: white;
            padding: 20 px;
            text-align: center;
        }
        header img {
            width: 72px;
            height: 42px;
        }
        nav {
            background-color: #00796b; /* Color de fondo del menú */
            display: flex;
            justify-content: space-around;
            padding: 10px 0;
        }
        nav a {
            color: white; /* Color del texto del menú */
            text-decoration: none;
            padding: 10px 15px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        nav a:hover {
            background-color: #004d40; /* Color de fondo al pasar el mouse */
        }
        main {
            max-width: 1200px;
            margin: 20px auto;
            background-color: #ffffff; /* Color de fondo del contenido */
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border: 1px solid #00796b; /* Color de borde */
        }
        th {
            background-color: #004d40; /* Color de fondo de las cabeceras */
            color: white;
        }
        input[type="text"], select {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #00796b; /* Color de borde */
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #00796b; /* Color de fondo del botón */
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 4px;
            transition: background-color 0.3s;
        }
        input[type="submit"]:hover {
            background-color: #004d40; /* Color de fondo al pasar el mouse */
        }
        @media (max-width: 600px) {
            nav {
                flex-direction: column;
            }
            nav a {
                padding: 15px;
                text-align: center;
            }
        }
    </style>
</head>
<body>

<header>
    <img src="Logos/Nvo_LogoCEL_fb.jpg" alt="Logo">
    <h1>INFORMACIÓN DEL VISITANTE</h1>
    <strong>VER 1.0</strong>
</header>

<nav>
    <a href="ultimoregis.php">Último</a>
    <a href="filtroreports.php">Imprimir Reporte</a>
    <a href="pdfreportmens.php" target="_blank">Imprimir Reporte Mensual</a>
</nav>

<main>
    <?php
    if (isset($_SESSION['mensaje'])) {
        echo "<script>alert('" . $_SESSION['mensaje'] . "');</script>";
        unset($_SESSION['mensaje']); // Limpiar el mensaje después de mostrarlo
    }
    ?>
    <form name="form1" method="post" action="">
        <table>
            <tr>
                <td>Numero de Visita:</td>
                <td><input name="0" type="text" id="0" size="5" maxlength="5" value="<?php echo $numero_registros + 1; ?>" readonly></td>
                <td>Fecha de Entrada:</td>
                <td><input name="fechentra" type="date" id="fechentra" size="12" maxlength="10" required oninput="syncExitDate()"></td>
                <td>Fecha de Registro:</td>
                <td><input name="fechregis" type="text" id="fechregis" size="15" maxlength="15" value="<?php echo date('d/m/Y h:i:s A'); ?>" readonly></td>
            </tr>
            <tr>
                <td>Dirección:</td>
                <td colspan="5">
                    <select name="direccion" id="opcion1" onchange="actualizarSelect()" required>
                        <option value="">--Selecciona--</option>
                        <option value="Despacho del Contralor">Despacho</option>
                        <option value="Dirección General">Dirección General</option>
                        <option value="Dirección de Administracion">Administración</option>
                        <option value="Coordinacion de Bienes ">Bienes</option>
                        <option value="Dirección de Comunicaciones y Relaciones Publicas">Comunicaciones</option>
                        <option value="Coordinacion de Prensa y Relaciones Institucionales">Prensa y Relaciones Institucionales</option>
                        <option value="Consultoria Juridica">Consultoría Jurídica</option>
                        <option value="Unidad de Auditoria Interna">Auditoría Interna</option>
                        <option value="Dirección Tecnica">Dirección Técnica</option>
                        <option value="Coordinacion de Computacion">Computación</option>
                        <option value="Coordinacion de Planificacion y Gestion Fiscal">Planificación y Gestión Fiscal</option>
                        <option value="Dirección de Determinacion de Responsabilidades">Determinación de Responsabilidad</option>
                        <option value="Coordinacion de Compras">Compras</option>
                        <option value="Coordinacion de Contabilidad y Presupuesto">Contabilidad y Presupuesto</option>
                        <option value="Dirección de Talento Humano">Talento Humano</option>
                        <option value="Coordinacion de Seguridad e Higiene Laboral">Seguridad e Higiene Laboral</option>
                        <option value="FUNDASCEL">FUNDASCEL</option>
                        <option value="Dirección de Control de la Administracion Central y Otro Poder">Dirección de Control de la Administración Central y Otro Poder</option>
                        <option value="Potestad Investigativa de la Dirección de Control de la Administración Central y Otro Poder">Potestad Investigativa de la Dirección de Control de la Administración Central y Otro Poder</option>
                        <option value="Dirección Central de la Administración Descentralizada">Dirección Central de la Administración Descentralizada</option>
                        <option value="Potestad Investigativa de la Dirección Central de la Administración Descentralizada">Potestad Investigativa de la Dirección Central de la Administración Descentralizada</option>
                        <option value="Dirección de Atencion al Ciudadano">Oficina de Atención al Ciudadano</option>
                        <option value="Jefatura de Promocion y Participacion Ciudadana">Promoción y Participación Ciudadana</option>
                        <option value="Coordinacion de Archivo Central">Archivo Central</option>
                        <option value="Dirección de Servicios Generales">Servicios Generales</option>
                        <option value="Coordinacion de Transporte Y Mensajeria">Transporte y Mensajería</option>
                        <option value="Coordinacion de Mantenimiento y Suministros">Mantenimiento y Suministros</option>
                        <option value="IDECEL">IDECEL</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Funcionario:</td>
                <td colspan="5">
                    <select name="funcionario" id="opcion2" required>
                        <option value="">--Selecciona primero--</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Nombre del Visitante:</td>
                <td colspan="5"><input size="40" type="text" id="nombre" name="nombre" required></td>
            </tr>
            <tr>
                <td>Carnet N°:</td>
                <td><input name="nrocarnet" type="text" id="nrocarnet" size="3" maxlength="2" value="01"></td>
                <td>Cédula:</td>
                <td colspan="2"><input name="cedu" type="text" id="cedu" size="18" maxlength="16" required></td>
                <td>Fecha de Salida:</td>
                <td><input name="fechsali" type="text" id="fechsali" size="12" maxlength="12" required></td>
            </tr>
            <tr>
                <td>Género:</td>
                <td>
                    <select name="genero" required>
                        <option value="">--Selecciona--</option>
                        <option value="Femenino">Femenino</option>
                        <option value="Masculino">Masculino</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Observaciones:</td>
                <td colspan="5">
                    <input name="observaciones" type="text" id="observaciones" size="40" maxlength="255" placeholder="Escribe tus observaciones aquí (opcional)">
                </td>
            </tr>
            <tr>
                <td colspan="6" style="text-align: center;">
                    <input type="submit" value="REG ISTRAR">
                </td>
            </tr>
        </table>
    </form>
</main>

<script>
    function actualizarSelect() {
        const opcion1 = document.getElementById("opcion1").value;
        const select2 = document.getElementById("opcion2");
        select2.innerHTML = '';

        const opciones = {
            'Despacho del Contralor': ['Ana Luisa Gomez Zambrano', 'Arianny Santeliz', 'Alicia Vargas'],
            'Dirección General': ['Maria Inmaculada Medina'],
            'Dirección de Administracion': ['Ana Barrios', 'Bradley Orellana', 'Francelys Villacinda'],
            'Coordinacion de Bienes': ['Sandibel Teran'],
            'Dirección de Comunicaciones y Relaciones Publicas': ['Gustavo Roman', 'Luis Garrido'],
            'Coordinacion de Prensa y Relaciones Institucionales': ['Jorge Silva'],
            'Consultoria Juridica': ['Gustavo Rodriguez', 'Maribel Torres'],
            'Unidad de Auditoria Interna': ['Juan Carlos Rivero', 'Sabas Perez', 'Keiber Querales'],
            'Dirección Tecnica': ['Beatriz Campos', 'Leidymar Arias'],
            'Coordinacion de Computacion': ['Diego Leon', 'Arturo Hurtado', 'Manuel Flores', 'Cristian Viloria', 'Dayana Rodriguez'],
            'Coordinacion de Planificacion y Gestion Fiscal': ['Lisette Vargas'],
            'Dirección de Determinacion de Responsabilidades': ['Yelitza Duran', 'Gabriel Mavare', 'Juan Pablo Vasquez', 'Andrea Oropeza', 'Egny Garcia', 'Luissanys Jimenez'],
            'Coordinacion de Compras': ['Jose Velasquez', 'Julian Oropeza', 'Sthefany Castillo'],
            'Coordinacion de Contabilidad y Presupuesto': ['Anilda Mendoza', 'Ana Linares'],
            'Dirección de Talento Humano': ['Eglebren Nataly Reverand', 'Dailin Mendoza', 'Ezequiel Barrios', 'Ana Parada', 'Greisy Mendoza'],
            'Coordinacion de Seguridad e Higiene Laboral': ['Carmen Uranga', 'Valery Castro', 'Luis David Fuentes'],
            'FUNDASCEL': ['Yelitza Mora', 'Rubi Vargas', 'Josefina Camacaro', 'Ernesto Carrizo', 'Aimar Ba ez'],
            'Dirección de Control de la Administracion Central y Otro Poder': ['Jhonny Chirinos', 'Katiusca Travieso', 'Yuglis Gomez', 'Marianelly Pirela', 'Mari Carmen Segovia', 'Rosimar Alvarado', 'Mery Palencia', 'Leonardo Navarro'],
            'Potestad Investigativa de la Dirección de Control de la Administración Central y Otro Poder': ['Roberto Alvarez', 'Dixon Rojas', 'Daniel Alvarado'],
            'Dirección Central de la Administración Descentralizada': ['Daniel Villegas', 'Alexandra Torres', 'Enis Soto', 'Geraldin Monsalve', 'Maybel Alvarez', 'Oliday Carolina Espinoza', 'Alejandra Mendoza', 'Leslie Morales', 'Ylsen Silva', 'Nelly Orellana', 'Wileida Galindez', 'Milexa Roman'],
            'Potestad Investigativa de la Dirección Central de la Administración Descentralizada': ['Simon Paradas', 'Juan Contreras', 'Jose Gimenez', 'Karina Rodriguez'],
            'Dirección de Atencion al Ciudadano': ['Jose Alberto Fernandez', 'Ambar Suarez', 'David Mendoza', 'Maria Jose Ruiz'],
            'Jefatura de Promocion y Participacion Ciudadana': ['Carmen Gomez', 'Daniel Soteldo', 'Marinez Cañizales', 'Freddy Peña', 'Norlyana Benitez', 'Jorge Jose Silva'],
            'Coordinacion de Archivo Central': ['Janeth Torres', 'Ceylin Freitez', 'Yoselin Sanchez', 'Andres Ladera'],
            'Dirección de Servicios Generales': ['Jean Carlos Piñero', 'Luis Alvarado', 'Jose Romero'],
            'Coordinacion de Transporte Y Mensajeria': ['Rudy Gomez', 'Jose Rodriguez', 'Juan Jose Avila', 'Ever Pereira', 'John Mora', 'Andres Hernandez'],
            'Coordinacion de Mantenimiento y Suministros': ['Euclides Depool', 'Maria Falcon', 'Rafael Escalona', 'Carmen Vargas', 'Carlos Ramirez', 'Ana Franco', 'Maria Edelmira Parra', 'Carmen Castillo', 'Milton Lara ', 'Yelitza Guedez', 'Zoraida Martinez', 'Jose Hernandez', 'Daryerling Cantor', 'Rafel Santeliz', 'Rudy Abraham Gomez', 'Norma Orellana', 'Dixon Figueroa', 'Julio Piñango', 'Yradis Josefina', 'Bruce Torres', 'Toni Flores'],
            'IDECEL': ['Shellys Sosa de Garcia', 'Silvy De Abreu', 'Carmen Vargas', 'Amelia Vizcaya', 'Armando Jimenez']
        };

        const selectedOptions = opciones[opcion1] || [];
        selectedOptions.forEach(opcion => {
            const optionElement = document.createElement("option");
            optionElement.value = opcion;
            optionElement.textContent = opcion;
            select2.appendChild(optionElement);
        });
    }

    function syncExitDate() {
        const entryDate = document.getElementById("fechentra").value;
        document.getElementById("fechsali").value = entryDate;
    }
</script>
</body>
</html>