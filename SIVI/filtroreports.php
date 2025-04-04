<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filtrar Registros por Rango de Días</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 30px;
            background-color: #e0f7fa; /* Color de fondo más claro */
        }
        h1 {
            text-align: center;
            color: #004d40; /* Color del título */
        }
        form {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #00796b; /* Color de borde */
            border-radius: 10px;
            background-color: #ffffff; /* Fondo blanco */
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
        }
        form:hover {
            transform: scale(1.02); /* Efecto de escala al pasar el mouse */
        }
        fieldset {
            border: none; /* Sin borde para el fieldset */
            margin-bottom: 20px;
        }
        legend {
            font-weight: bold;
            color: #004d40; /* Color del legend */
            padding: 0 10px; /* Espaciado alrededor del texto */
        }
        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
            color: #004d40; /* Color de las etiquetas */
        }
        select, input[type="submit"], button {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #00796b; /* Color de borde */
            border-radius: 5px;
            font-size: 16px;
            transition: border-color 0.3s;
        }
        select:focus, input[type="submit"]:hover, button:hover {
            border-color: #004d40; /* Cambio de color al enfocar o pasar el mouse */
        }
        input[type="submit"] {
            background-color: #00796b; /* Color de fondo del botón */
            color: white;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        input[type="submit"]:hover {
            background-color: #004d40; /* Color de fondo al pasar el mouse */
        }
        button {
            background-color: #ffffff; /* Color de fondo del botón de regresar */
            color: #00796b; /* Color del texto */
            border: 1px solid #00796b; /* Borde del botón */
            cursor: pointer;
        }
        .footer {
            text-align: center;
            margin-top: 20px;
            color: #777;
        }
    </style>
</head>
<body>

<h1>Filtrar Registros por Rango de Días</h1>
<form method="POST" action="pdfreports.php" target="_blank">
    <fieldset>
        <legend>Selecciona el Rango</legend>
        
        <label for="mes">Mes:</label>
        <select name="mes" id="mes" required>
            <?php for ($i = 1; $i <= 12; $i++): ?>
                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
            <?php endfor; ?>
        </select>

        <label for="dia_inicio">Día de Inicio:</label>
        <select name="dia_inicio" id="dia_inicio" required>
            <?php for ($i = 1; $i <= 31; $i++): ?>
                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
            <?php endfor; ?>
        </select>

        <label for="dia_fin">Día de Fin:</label>
        <select name="dia_fin" id="dia_fin" required>
            <?php for ($i = 1; $i <= 31; $i++): ?>
                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
            <?php endfor; ?>
        </select>
    </fieldset>

    <input type="submit" value="Filtrar Registros">
    <button type="button" onclick="window.history.back();">Regresar</button>
</form>

<div class="footer">
    <p>&copy; <?php echo date("Y"); ?> Contraloria del Estado Lara</p>
</div>
</body>
</html>