<?php


        
require 'conexion.php';


$id_valet=  1;			
$plan = $_POST['plan'];
$costo = $_POST['costo'];
$servicios = $_POST['servicios'];
$cancelaciones = $_POST['cancelaciones'];  
$comprobante =  $_POST['image'];
$estatus = 1 ;



$insertar = "INSERT INTO `pedidos` (`id_valet`,
 `plan`, 
 `costo`, 
 `servicios`,
  `cancelaciones`, 
  `comprobante`, 
  `estatus`) VALUES ( '1', '$plan', '$costo', '$servicios', '$cancelaciones ', '$comprobante', '$estatus ');";

$query = mysqli_query($conectar,$insertar);
$nuevaURL='mis creditos.';
if($query){
    header('Location: '.$nuevaURL.php);
}else{
    echo"compra rechazada "; 
}
?>