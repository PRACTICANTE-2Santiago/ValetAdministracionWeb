<?php
include('conexion.php');

$usuario = $_POST['Usuario'];
$contrasenia =$_POST['Contrasena'];
$token = $_POST['Token'];
$pin = $_POST['Pin'];


$query = 'SELECT choferes.id,choferes.id_valet,choferes.usuario,choferes.contrasenia,choferes.correo_electronico FROM choferes,valet WHERE valet.id_pin= "'.$pin.'" and choferes.usuario = "'.$usuario.'" and choferes.contrasenia = "'.$contrasenia.'" and choferes.estatus=1';
$result = mysqli_query($conn, $query) or die('error: ' .mysql_error());

if (mysqli_num_rows($result) == 1){
     while ($row = $result->fetch_array(MYSQLI_NUM)) {
        echo json_encode($row);
    }
	$query2 = 'UPDATE choferes SET token = "'.$token.'" WHERE usuario="'.$usuario.'" and contrasenia = "'.$contrasenia.'"';
	$result2 = mysqli_query($conn, $query2) or die('error: ' .mysql_error());
   
} else {
    echo "error";
}
?>
