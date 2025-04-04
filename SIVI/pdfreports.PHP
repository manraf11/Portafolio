<?php
// Incluir la biblioteca TCPDF
require_once('tcpdf/tcpdf.php');

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

// Establecer el idioma a español
pg_query($conn, "SET lc_time = 'es_ES'");

// Obtener los datos del formulario
$mes = intval($_POST['mes']);
$dia_inicio = intval($_POST['dia_inicio']);
$dia_fin = intval($_POST['dia_fin']);

// Crear las fechas de inicio y fin
$fecha_inicio = sprintf('%04d-%02d-%02d', date('Y'), $mes, $dia_inicio);
$fecha_fin = sprintf('%04d-%02d-%02d', date('Y'), $mes, $dia_fin);

// Consulta para obtener los usuarios registrados en el rango de fechas
$query = "
    SELECT 
        nombrevisit, 
        unidadest, 
        funcionariodest, 
        TO_CHAR(fentrada, 'DD/MM/YYYY') AS fentrada_formateada,
        genero, 
        observaciones 
    FROM 
        visitantes
    WHERE 
        fentrada::date BETWEEN TO_DATE($1, 'YYYY-MM-DD') AND TO_DATE($2, 'YYYY-MM-DD')
    ORDER BY 
        fentrada DESC;
";

$result = pg_query_params($conn, $query, array($fecha_inicio, $fecha_fin));

if (!$result) {
    die("Error en la consulta: " . pg_last_error($conn));
}

// Obtener todos los usuarios
$usuarios = pg_fetch_all($result);
$cantidad_usuarios = $usuarios ? count($usuarios) : 0; // Contar la cantidad de usuarios

// Cerrar la conexión
pg_close($conn);

// Crear un nuevo PDF
$pdf = new TCPDF();
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('SIVI');
$pdf->SetTitle('Usuarios Registrados');
$pdf->SetHeaderData('', 0, '', "");
$pdf->setHeaderFont([PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN]);
$pdf->setFooterFont([PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA]);
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
$pdf->SetMargins(15, 15, 15);
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
$pdf->AddPage();

// Contenido del PDF
$html = '
<style>
    body {
        font-family: Arial, sans-serif;
        color: #333;
    }
    h2 {
        color: #004d40; /* Color del título */
        text-align: center;
    }
    p {
        font-size: 12px;
        text-align: center;
        color: #555; /* Color del texto */
    }
    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
        background-color: #fff; /* Fondo blanco para la tabla */
    }
    th {
        background-color: #00796b; /* Fondo verde para los encabezados */
        color: white; /* Texto blanco para los encabezados */
        padding: 10px;
        text-align: left;
    }
    td {
        padding: 8px;
        border: 1px solid #ddd; /* Bordes grises */
        color: #333; /* Texto negro para las celdas */
    }
    tr:nth-child(even) {
        background-color: #f9f9f9; /* Color de fondo gris claro para filas pares */
    }
    tr:hover {
        background-color: #e0f2f1; /* Color de fondo al pasar el mouse */
    }
</style>
<h2>Usuarios Registrados del ' . date('d/m/Y', strtotime($fecha_inicio)) . ' al ' . date('d/m/Y', strtotime($fecha_fin)) . '</h2>
<p><strong>Cantidad de usuarios registrados:</strong> ' . $cantidad_usuarios . '</p>
<table>
    <thead>
        <tr>
            <th>Nombre del Visitante</th>
            <th>Género</th>
            <th>Dirección de Destino</th>
            <th>Funcionario</th>
            <th>Fecha de Registro</th>
            <th> Observación</th>
        </tr>
    </thead>
    <tbody>';

if ($usuarios) {
    foreach ($usuarios as $usuario) {
        $html .= '<tr>';
        $html .= '<td>' . htmlspecialchars($usuario['nombrevisit']) . '</td>';
        $html .= '<td>' . htmlspecialchars($usuario['genero']) . '</td>';
        $html .= '<td>' . htmlspecialchars($usuario['unidadest']) . '</td>';
        $html .= '<td>' . htmlspecialchars($usuario['funcionariodest']) . '</td>';
        $html .= '<td>' . htmlspecialchars($usuario['fentrada_formateada']) . '</td>';
        $html .= '<td>' . htmlspecialchars($usuario['observaciones']) . '</td>';
        $html .= '</tr>';
    }
} else {
    $html .= '<tr><td colspan="6" style="text-align:center;">No hay usuarios registrados en este rango de fechas.</td></tr>';
}

$html .= '</tbody></table>';

// Escribir el contenido HTML en el PDF
$pdf->writeHTML($html, true, false, true, false, '');

// Cerrar y generar
$pdf->Output('usuarios_registrados.pdf', 'I');
?>