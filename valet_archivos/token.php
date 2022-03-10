<?php
include('conexion.php');

$token = $_POST['token'];
$id_usuario = $_POST['id_usuario'];

if(isset($token) && isset($id_usuario)){
  
    //$query = 'UPDATE automovil SET token = "'.$token.'"  WHERE id = "'.$id_usuario.'" and id_residencial=1';
    $query = 'UPDATE automovil SET token = "'.$token.'"  WHERE id = "'.$id_usuario.'" ';
 $result = mysqli_query($conn,$query) or die('error: ' .mysql_error());

if($result == TRUE){
    echo "success"; 
} else {
    echo "error";
} 
    
}else{
    echo "error";
}

?>
