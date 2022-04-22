<?php
 
if(isset($_GET['m'])){
	include('../../miscelaneos.php');
    include('../../modelo/mdlcomercio.php');
    
}else{
	include('../miscelaneos.php');  
    include('../modelo/mdlcomercio.php');
}



function traeComercios($id ,$id_valet, $estatus){
	$come = new ComercioModel();	
	if($id > 0){
		$come->setId($id);
	}else{
		($estatus > -1 ? $come->id_valet = $id_valet : '');
		($estatus > -1 ? $come->estatus = $estatus : '');
	}
	$come->get();
	$retorno = array();
	if(sizeof($come->rows)>0){
		if($id>0){
			$retorno = $come->rows[0];
		}else{
			$retorno = $come->rows;
		}
		$come->_destruct();
		return $retorno;
	}else{
		return $retorno;
	}
}

function traeEstatusCome($estatus,$id_valet){
	if($estatus>-1){
		$contTip = new ComercioModel();
		$contTip->estatus = $estatus;
		$contTip->id_valet = $id_valet;
		$contTip->get();
		return sizeof($contTip->rows);
	}else{
		return array();
	}
}



if(isset($_GET['m'])){
	if($_GET['m'] == 1){ //insertar datos personales
		if(sizeof($_POST) >0){
            $check = getimagesize($_FILES["image"]["tmp_name"]);
    if($check !== false)
        $image = $_FILES['image']['tmp_name'];
        $imgContent = addslashes(file_get_contents($image));
			 $agregar = new ComercioModel();
		 	 $agregar->id_valet = $_GET['idvalet'];				
             $agregar->nombre = $_POST['nombre'];
			 $agregar->razonsocial = $_POST['razonsocial'];
             $agregar->calle = $_POST['calle'];
             $agregar->codigo_postal = $_POST['codigo_postal'];   
			 $agregar->telefono = $_POST['telefono'];   
			 $agregar->correo_electronico = $_POST['correo_electronico'];
			 $agregar->logotipo = $imgContent;
             $agregar->representante = $_POST['representante'];
             $agregar->tarifa = $_POST['tarifa'];
			 $agregar->estatus = 1;
            if($agregar->set()){
               echo irA('../Comercios.php?np=18&edit=1&so=1', 1);
            }else{
                  echo irA('../Comercios.php?np=18&so=0', 1);
            }
                            
            }else{
			echo irA('../Comercios.php?np=18&so=0', 1);
            }
        		
		
	}else if($_GET['m'] == 2){ //Modificar 
		if(isset($_GET['id']) && sizeof($_POST)>0){ 
            
			$modificar = new ComercioModel();
             $modificar->setId($_GET['id']);  
             $modificar->nombre = $_POST['nombre'];
			 $modificar->razonsocial = $_POST['razonsocial'];
             $modificar->calle = $_POST['calle'];
             $modificar->codigo_postal =  $_POST['codigo_postal'];            
			 $modificar->telefono = $_POST['telefono'];
			 $modificar->correo_electronico = $_POST['correo_electronico'];
             $modificar->representante = $_GET['representante'];
             $modificar->tarifa = $_POST['tarifa'];
			 $modificar->estatus = 1;
			 if($modificar->edit()){//modificar datos formacion
				echo irA('../Comercios.php?np=18&edit=1&id='.$_GET['id'].'&so=1', 1);
			   
		  }else{
				echo irA('../Comercios.php?np=18&so=0', 1);
		  }             
		   }else{
			   echo irA('../Comercios.php?np=18&so=0', 1);
		   }
	   
   }else if($_GET['m'] == 3){ //Desactivar 
	   if(isset($_GET['id']) && isset($_GET['st'])){
		   if($_GET['id'] > 0 && $_GET['st'] > -1){
			   
			   $modiTipo = new ComercioModel();
			   $modiTipo->setId($_GET['id']);
			   $modiTipo->estatus = $_GET['st'];
			   if($modiTipo->edit()){
				   echo irA('../Comercios.php?esta='.$_GET['st'].'&err=2&so=2&np=18', 1);
				 }else{
					echo irA('../Comercios.php?esta='.$_GET['st'].'&err=0&so=0&np=18', 1);
				 }
						   
	   }else{
		   echo irA('../choferes.php?err=1&so=12&np=18', 1);
	   }
   }else{
	   echo irA('choferes.php', 1);
   }
}
}


?>