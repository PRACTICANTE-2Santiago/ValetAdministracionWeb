<?php
include('conexion.php');

$idvalet = $_POST['idvalet'];
$idusuario = $_POST['idusuario'];
$placas = $_POST['placas'];
$descripcion =$_POST['descripcion'];
$foto1 = $_POST['foto1'];
$foto2 = $_POST['foto2'];
$foto3 = $_POST['foto3'];




$query = 'INSERT INTO automovil (id_valet,
                                placas,
                                descripcion,
                                foto1,
                                foto2,
                                foto3,
                                id_registro,
                                fecha_registro,
                                id_ubicacion,
                                longitud,
                                latitud,
                                comentarios,
                                fecha_ubicacion,
                                fecha_pedir,
                                id_entrega,
                                fecha_entregado,
                                comentarios_entregado,
                                fecha_notificado,
                                comentarios_cliente,
                                token,
                                condiciones,
                                estatus)
                                VALUES (
                                "'.$idvalet.'",
                                "'.$placas.'",
                                "'.$descripcion.'",
                                "'.$foto1.'",
                                "'.$foto2.'",
                                "'.$foto3.'",
                                "'.$idusuario.'",
                                "'.date('Y-m-d H:i:s').'",
                                0,
                                "",
                                "",
                                "",
                                "0000-00-00 00:00:00",
                                "0000-00-00 00:00:00",
                                0,
                                 "0000-00-00 00:00:00",
                                 "",
                                "0000-00-00 00:00:00",
                                 "",
                                 "",
                                 "0",
                                1)';
$result = mysqli_query($conn,$query) or die('error: ' .mysql_error());

if ($result == TRUE){
       $ul=mysqli_insert_id($conn);
    echo $ul; 
} else {
    echo "error";
} 
?>
