<?php
include('conexion.php');

$id = $_POST['id'];
$idusuario = $_POST['idusuario'];
$latitud = $_POST['latitud'];
$longitud = $_POST['longitud'];
$comentarios = $_POST['comentarios'];



    $query = 'UPDATE automovil SET  id_ubicacion = "'.$idusuario.'",latitud = "'.$latitud.'" , longitud = "'.$longitud.'" ,comentarios = "'.$comentarios.'",fecha_ubicacion = "'.date('Y-m-d H:i:s').'",  estatus = 2 WHERE id = "'.$id.'"';
    $result = mysqli_query($conn, $query) or die('error: ' .mysql_error());

    if($result == TRUE){
        
        echo "succes"; 
        
        
} else {
    echo "error";
} 
?>
