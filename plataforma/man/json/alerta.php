<?php session_start();  ?>
<?php
$conn = mysqli_connect("localhost", "adcontro_dcortin", "L_FT,WLPzhwW", "adcontro_residencialv2");
mysqli_query($conn, "SET NAMES 'utf8'");

$username = $_GET['UserName'];
$password = $_GET['Password'];

$query = 'select id,id_residencial,tipo_usuario, miembro_club from usuario where usuario = "'.$username.'" and contrasenia = "'.$password.'"';
$result = mysqli_query($conn, $query) or die('error: ' .mysql_error());

if (mysqli_num_rows($result) == 1){		
    $correo = mysqli_fetch_row($result);
	echo $correo[0];
	echo $correo[1];
	
	if($correo[2]== 0){		
		echo "<script>location.href='../../../../cliente/movil/controlador/ctl_tickets.php?m=77&idres=".$correo[1]."&idr=".$correo[0]."';</script>";		
	}else if($correo[2]== 2){
		echo "<script>location.href='../../cliente/inquilino/controlador/ctl_tickets.php?m=77&idres=".$correo[1]."&idr=".$correo[0]."';</script>";
	}else if($correo[2]== 3){
		echo "<script>location.href='../../cliente/externo/controlador/ctl_tickets.php?m=77&idres=".$correo[1]."&idr=".$correo[0]."';</script>";
	}
	
	
	
} else {
    echo "error";
}

?>