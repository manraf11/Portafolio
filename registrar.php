  
<?php  
$conexion = pg_connect("host=localhost dbname=SIVI user=postgres password=123");  

if ($_SERVER["REQUEST_METHOD"] == "POST") {  
$funcionario = pg_escape_string($_POST['funcionario']);
$unidadest = pg_escape_string($_POST['direccion']);
$nombre = pg_escape_string($_POST['nombre']);
$cedula = pg_escape_string($_POST['cedu']);
$nrocarnet = pg_escape_string($_POST['nrocarnet']);
$nrovisita = pg_escape_string($_POST['0']);
$fecharegistro = pg_escape_string($_POST['fechregis']);
$fechentra = pg_escape_string($_POST['fechentra']);
$fehsalid = pg_escape_string($_POST['fechsalid']);


    $query = "INSERT INTO visitantes (funcionariodest,unidadest,nombrevisit,cedulavisit,nrocarnet,fechareg,nrovisita,fentrada,fsalida) VALUES ('$funcionario', '$unidadest','$nombre','$cedula','$nrocarnet','$fecharegistro','$nrovisita','$fechentra','$fehsalid')";  
    $result = pg_query($conexion, $query);  
    
    if ($result) {  
        echo "Datos insertados correctamente.";  
    } else {  
        echo "Error al insertar los datos: " . pg_last_error($conexion);  
    }  
}  

pg_close($conexion);  
?>