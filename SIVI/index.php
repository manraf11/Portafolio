<?php  
include 'DB.php';
?>  

<!DOCTYPE html>
<html lang="es">
<head>
    <link rel="shortcut icon" href="Logos/Nvo_LogoCEL_sfond.png">
    <title>SIVI</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(135deg, #e0f7fa, #b2ebf2); /* Degradado de fondo */
            margin: 0;
            padding: 30px;
            animation: backgroundAnimation 10s ease infinite; /* Animación de fondo */
        }

        @keyframes backgroundAnimation {
            0% { background-color: #e0f7fa; }
            50% { background-color: #b2ebf2; }
            100% { background-color: #e0f7fa; }
        }

        .container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #00796b; /* Color de borde verde */
            border-radius: 10px;
            background-color: #ffffff; /* Fondo blanco */
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .container:hover {
            transform: scale(1.02); /* Efecto de escala al pasar el mouse */
            box-shadow: 0 8px 40px rgba(0, 0, 0, 0.3);
        }

        .header {
            background-color: #004d40; /* Color de fondo del encabezado */
            color: white;
            text-align: center;
            padding: 0.5px; /* Ajusta el alto del borde del encabezado aquí */
            border-radius: 10px 10px 10px 10px; /* Bordes redondeados en la parte superior */
            width: 80%; /* Ancho reducido de la barra */
            margin: 0 auto; /* Centrar la barra */
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #004d40; /* Color de las etiquetas */
        }

        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #00796b; /* Color de borde verde */
            border-radius: 5px;
            font-size: 16px;
            transition: border-color 0.3s, box-shadow 0.3s;
        }

        input[type="text"]:focus, input[type="password"]:focus {
            border-color: #004d40; /* Color de borde al enfocar */
            box-shadow: 0 0 5px rgba(0, 77, 64, 0.5); /* Sombra al enfocar */
        }

        input[type="submit"] {
            background-color: #00796b; /* Color de fondo del botón */
            color: white;
            border: none;
            padding: 10px;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s, transform 0.3s;
            width: 100%;
        }

        input[type="submit"]:hover {
            background-color: #004d40; /* Color de fondo al pasar el mouse */
            transform: translateY(-2px); /* Efecto de movimiento al pasar el mouse */
        }

        .footer {
            text-align: center;
            margin-top: 20px;
            color: #777;
        }
    </style>
    <script>
        function revisar() {
            var f = document.form1;
            var usuario = f.txtusuario.value;
            var clave = f.txtclave.value;

            if (usuario === "" || clave === "") {
                alert("Los campos no pueden estar vacíos.");
                return false;
            }

            // Validación de caracteres no permitidos
            if (/['-]/.test(usuario) || /['-]/.test(clave)) {
                alert("Valores inválidos en Login o Clave.");
                return false;
            }

            f.txtclave.value = clave.toUpperCase();
 f.txtusuario.value = usuario.toUpperCase();
            return true;
        }
    </script>
</head> 

<body> 
    <div class="container">
        <div class="header">
            <h1>Sistema de Visitas</h1>
        </div>
        <form name="form1" action="validacion.php" method="post" onsubmit="return revisar()">
            <label for="txtusuario">LOGIN DE USUARIO:</label>
            <input name="txtusuario" type="text" id="txtusuario" onfocus="this.style.backgroundColor='#f0f8ff';" onblur="this.style.backgroundColor='';">

            <label for="txtclave">CONTRASEÑA:</label>
            <input name="txtclave" type="password" id="txtclave" onfocus="this.style.backgroundColor='#f0f8ff';" onblur="this.style.backgroundColor='';">

            <input type="submit" name="Submit" value="Aceptar">
        </form>
    </div>
    <div class="footer">
        <p>&copy; <?php echo date("Y"); ?> Contraloría del Estado Lara.</p>
    </div>
</body>
</html>