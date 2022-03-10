<?php
include('conexion.php');

$idvalet = $_POST['idvalet'];
$id = $_POST['id'];


$query = 'SELECT * FROM automovil WHERE id_valet="'.$idvalet.'" and id="'.$id.'"' ;
$result = mysqli_query($conn, $query) or die('error: ' .mysql_error());

if (mysqli_num_rows($result) >= 1){
    while ($row = $result->fetch_array(MYSQLI_NUM)) {
    	 echo json_encode($row);
	 }
} else {
    echo "error";
}
?>
