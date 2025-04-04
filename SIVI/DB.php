<?php   
// DB.php   
$db_conn = pg_connect("host=localhost dbname=SIVI user=postgres password=123");   
if (!$db_conn) {   
    die("Error en la conexión a la base de datos.");   
}   
?>