<?php session_start(); ?>
<?php
if(isset($_POST["submit"])){
    $revisar = getimagesize($_FILES["image"]["tmp_name"]);
    if($revisar !== false){
        $image = $_FILES['image']['tmp_name'];
        $imgContenido = addslashes(file_get_contents($image));
        
        //Credenciales Mysql
        $Host = 'localhost';
        $Username = 'root';
        $Password = '';
        $dbName = 'valet_parking';
        
        //Crear conexion con la abse de datos
        $db = new mysqli($Host, $Username, $Password, $dbName);
        
        // Cerciorar la conexion
        if($db->connect_error){
            die("Connection failed: " . $db->connect_error);
        }
        $id_valet = $_SESSION['idvalet'];
$plan = $_POST['plan'];
$costo = $_POST['costo'];
$servicios = $_POST['servicios'];
$cancelaciones = $_POST['cancelaciones'];  

$estatus = 1 ;
        
        //Insertar imagen en la base de datos
        $insertar = $db->query("INSERT into pedidos ( id_valet,
        plan, 
        costo, 
        servicios,
         cancelaciones, 
         comprobante, 
         estatus) VALUES (' $id_valet ','$plan ','$costo','$servicios','$cancelaciones ','$imgContenido', '$estatus');");
        // COndicional para verificar la subida del fichero
        if($insertar){
            $nuevaURL='mis creditos.';
            header('Location: '.$nuevaURL.php );
        }else{
            echo "Ha fallado la subida, reintente nuevamente.";
            $nuevaURL='mis creditos.';
            header('Location: '.$nuevaURL.php );
        } 
        // Sie el usuario no selecciona ninguna imagen
    }else{
        echo "Por favor seleccione imagen a subir.";
    }
}
?>