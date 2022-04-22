<?php session_start(); ?>
<?php
if(isset($_GET['m'])){
	include('../../miscelaneos.php');
    include('../../modelo/mdlcomercio.php');
    
}else{
	include('../miscelaneos.php');  
    include('../modelo/mdlcomercio.php');
}
        /*
         * Insert image data into database
         */
        
        //DB details
        $dbHost     = 'localhost';
        $dbUsername = 'root';
        $dbPassword = '';
        $dbName     = 'valet_parking';
        
        //Create connection and select DB
        $db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
        $agregar = new ComercioModel();
        $tarifa=   $agregar->tarifa = $_POST['tarifa'];
        // Check connection
        if($db->connect_error){
            die("Connection failed: " . $db->connect_error);
        }
        
    
     
       
        
        
        //Insert image content into database
      
       
        

        $id= $_SESSION['idvalet'] ;

             $Update = $db->query("UPDATE contador SET stock = stock + 200 WHERE id_valet= $id;");
        if($Update ){
           
            header('Location: pedidos.php');

        }else{
            echo "File upload failed, please try again.";
        } 
    
    
?>