<?php
include('conexion.php');

//$estatus = $_POST['estatus'];
//$idvalet = $_POST['idvalet'];
$estatus = $_POST['estatus'];
$idvalet = $_POST['idvalet'];

$query = 'SELECT * FROM automovil WHERE   id_valet="'.$idvalet.'" and estatus= "'.$estatus.'" and date(fecha_registro)="'.date('Y-m-d').'" ' ;
$result = mysqli_query($conn, $query) or die('error: ' .mysql_error());

if (mysqli_num_rows($result) >= 1){
    while ($row = $result->fetch_array(MYSQLI_NUM)) {
    	 echo json_encode($row);
	 }
} else {
    echo "error";
}
?>
