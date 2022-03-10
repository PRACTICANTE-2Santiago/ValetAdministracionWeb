<?php
$conn = mysqli_connect("localhost", "adcontro_dcortin", "L_FT,WLPzhwW", "adcontro_residencialv2");
mysqli_query($conn, "SET NAMES 'utf8'");

$username = $_POST['UserName'];
$password = $_POST['Password'];

$query = 'select correo_electronico from usuario where usuario = "'.$username.'" and contrasenia = "'.$password.'"';
$result = mysqli_query($conn, $query) or die('error: ' .mysql_error());

if (mysqli_num_rows($result) == 1){		
    $correo = mysqli_fetch_row($result);
	echo $correo[0];
} else {
    echo "error";
}

?>