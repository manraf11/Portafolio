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

// Obtener el mes y el año actuales
$mes_actual = date('m');
$anio_actual = date('Y');

// Consulta para obtener todos los usuarios registrados en el mes actual
$query = "SELECT nombrevisit, unidadest, funcionariodest, TO_CHAR(fentrada, 'DD/MM/YYYY') AS fentrada_formateada 
          FROM visitantes 
          WHERE EXTRACT(MONTH FROM fentrada) = $mes_actual AND EXTRACT(YEAR FROM fentrada) = $anio_actual 
          ORDER BY fentrada DESC;";

$result = pg_query($conn, $query);

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
$pdf->SetTitle('Usuarios Registrados en el Mes');
$pdf->SetHeaderData('', 0, '', "");
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '',PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
$pdf->SetMargins(15, 27, 15);
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
$pdf->AddPage();

// Eliminar la sección de la marca de agua y el logo
/*
$watermark_image = 'Logos/Nvo_LogoCEL_fb.png'; // Cambia esto a la ruta de tu imagen
$pageWidth = $pdf->getPageWidth();
$pageHeight = $pdf->getPageHeight();
$imageWidth = 100; // Ancho de la imagen de marca de agua
$imageHeight = 100; // Alto de la imagen de marca de agua
$x = ($pageWidth - $imageWidth) / 2; // Posición X centrada
$y = ($pageHeight - $imageHeight) / 2; // Posición Y centrada
$pdf->SetAlpha(0.3); // 0.0 (transparente) a 1.0 (opaco)
$pdf->Image($watermark_image, $x, $y, $imageWidth, $imageHeight, '', '', '', false, 300, '', false, false, 0, false, false, false);
$pdf->SetAlpha(1.0);
$logo_image = ''; // Ruta del logo
$margen_izquierdo = 10; // Margen desde la izquierda
$margen_superior = 10; // Margen desde la parte superior
$pdf->Image($logo_image, $pdf->getPageWidth() - $margen_izquierdo - 30, $margen_superior, 30, 0, '', '', '', false, 300, '', false, false, 0, false, false, false);
*/

// Contenido del PDF
$html = '
<style>
    h2 { color: black; text-align: center; }
    p { font-size: 12px; text-align: center; color: black; }
    table { width: 100%; border-collapse: collapse; margin-top: 20px; background-color: white; }
    th { background-color: black; color: white; padding: 10px; text-align: left; }
    td { padding: 8px; border: 1px solid black; color: black; }
    tr:nth-child(even) { background-color: #f2f2f2; }
    tr:hover { background-color: #d1ecf1; }
</style>
<h2>Usuarios Registrados en el Mes</h2>
<p><strong>Cantidad de usuarios registrados en el mes:</strong> ' . $cantidad_usuarios . '</p>
<table>
    <thead>
        <tr>
            <th>Nombre del Visitante</th>
            <th>Dirección de Destino</th>
            <th>Funcionario</th>
            <th>Fecha de Registro</th>
        </tr>
    </thead>
    <tbody>';

if ($usuarios) {
    foreach ($usuarios as $usuario) {
        $html .= '<tr>';
        $html .= '<td>' . htmlspecialchars($usuario['nombrevisit']) . '</td>';
        $html .= '<td>' . htmlspecialchars($usuario['unidadest']) . '</td>';
        $html .= '<td>' . htmlspecialchars($usuario['funcionariodest']) . '</td>';
        $html .= '<td>' . htmlspecialchars($usuario['fentrada_formateada']) . '</td>';
        $html .= '</tr>';
    }
} else {
    $html .= '<tr><td colspan="4" style="text-align:center;">No hay usuarios registrados en el mes.</td></tr>';
}

$html .= '</tbody></table>';

// Escribir el contenido HTML en el PDF
$pdf->writeHTML($html, true, false, true, false, '');

// Cerrar y generar
$pdf->Output('usuarios_registrados.pdf', 'I');
?>