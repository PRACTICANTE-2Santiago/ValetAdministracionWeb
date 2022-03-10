<?php
include('conexion.php');

$id = $_POST['id'];
$comentarios = $_POST['comentarios'];



    $query = 'UPDATE automovil SET comentarios_entregado = "'.$comentarios.'",  estatus = 4 WHERE id = "'.$id.'"';
    $result = mysqli_query($conn, $query) or die('error: ' .mysql_error());

    if($result == TRUE){
        
        echo "succes"; 
        
        
} else {
    echo "error";
} 
?>
