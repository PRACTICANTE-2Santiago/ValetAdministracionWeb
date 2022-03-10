<?php
$conn = mysqli_connect("localhost", "adcontro_dcortin", "L_FT,WLPzhwW", "adcontro_residencialv2");
mysqli_query($conn, "SET NAMES 'utf8'");

$username = $_POST['UserName'];
$password = $_POST['Password'];
$token = $_POST['Token'];

$query = 'select id from usuario where usuario = "'.$username.'" and contrasenia = "'.$password.'"';
$result = mysqli_query($conn, $query) or die('error: ' .mysql_error());

if (mysqli_num_rows($result) == 1){
	$query2 = 'UPDATE usuario SET token = "'.$token.'" WHERE usuario="'.$username.'" and contrasenia = "'.$password.'"';
	$result2 = mysqli_query($conn, $query2) or die('error: ' .mysql_error());
    echo "success";
} else {
    echo "error";
}

?>