<?php session_start(); ?>
<?php
require 'conexion.php';


if(isset($_POST["submit"])){
    $revisar = getimagesize($_FILES["image"]["tmp_name"]);
    if($revisar !== false){
        $image = $_FILES['image']['tmp_name'];
        $imgContenido = addslashes(file_get_contents($image));
        
$id_valet = $_SESSION['idvalet'];
$plan = $_POST['plan'];
$costo = $_POST['costo'];
$servicios = $_POST['servicios'];
$cancelaciones = $_POST['cancelaciones'];  

$estatus = 1 ;



$insertar = "INSERT INTO `pedidos` (`id_valet`,
 `plan`, 
 `costo`, 
 `servicios`,
  `cancelaciones`, 
  `comprobante`, 
  `estatus`) VALUES ( '$id_valet', '$plan', '$costo', '$servicios', '$cancelaciones ', '$imgContenido', '$estatus ');";

$query = mysqli_query($conectar,$insertar);
$nuevaURL='mis creditos.';
if($query){
    header('Location: '.$nuevaURL.php );
  
}else{
    echo"compra rechazada "; 
}
}else{
    echo "Por favor seleccione imagen a subir.";
}}
?>