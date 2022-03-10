<?php
include('conexion.php');

$idvalet = $_POST['idvalet'];

$query = 'SELECT * FROM valet WHERE id="'.$idvalet.'" and estatus=1' ;
$result = mysqli_query($conn, $query) or die('error: ' .mysql_error());

if (mysqli_num_rows($result) >= 1){
    while ($row = $result->fetch_array(MYSQLI_NUM)) {
    	 echo json_encode($row);
	 }
} else {
    echo "error";
}
?>
