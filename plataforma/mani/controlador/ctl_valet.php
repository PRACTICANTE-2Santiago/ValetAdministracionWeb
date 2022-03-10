<?php
if(isset($_GET['m'])){
	include('../../miscelaneos.php');
    include('../../modelo/mdlvalet.php');
    include('../../modelo/mdlusuario.php');
    
}else{
	include('../miscelaneos.php');  
    include('../modelo/mdlvalet.php');
    include('../modelo/mdlusuario.php');
}




function traeUsuarios($id ,$id_valet, $estatus){
	$usua = new UsuarioModel();	
	if($id > 0){
		$usua->setId($id);
	}else{
		($estatus > 0 ? $usua->id_valet = $id_valet : '');
		($estatus > -1 ? $usua->estatus = $estatus : '');
	}
	$usua->get();
	$retorno = array();
	if(sizeof($usua->rows)>0){
		if($id>0){
			$retorno = $usua->rows[0];
		}else{
			$retorno = $usua->rows;
		}
		$usua->_destruct();
		return $retorno;
	}else{
		return $retorno;
	}
}

function traeValet($id ,$nombre, $estatus){
	$valet = new ValetModel();	
	if($id > 0){
		$valet->setId($id);
	}else{
		($nombre != '' ? $valet->nombre = $nombre : '');
		($estatus > -1 ? $valet->estatus = $estatus : '');
	}
	$valet->get();
	$retorno = array();
	if(sizeof($valet->rows)>0){
		if($id>0){
			$retorno = $valet->rows[0];
		}else{
			$retorno = $valet->rows;
		}
		$valet->_destruct();
		return $retorno;
	}else{
		return $retorno;
	}
}

function traeEstatusValet($estatus){
	if($estatus>-1){
		$contTip = new ValetModel();
		$contTip->estatus = $estatus;
		$contTip->get();
		return sizeof($contTip->rows);
	}else{
		return array();
	}
}




if(isset($_GET['m'])){
	if($_GET['m'] == 1){ //insertar datos personales
		if(sizeof($_POST) >0){
            
			 $modificar = new ValetModel();
			 $modificar->id_pin = $_POST['id_pin'];			
             $modificar->nombre = $_POST['nombre'];
             $modificar->calle = $_POST['calle'];
             $modificar->num_ext = $_POST['num_ext'];
             $modificar->num_int = ($_POST['num_int'] != '' ? $_POST['num_int'] : 0);
             $modificar->colonia = $_POST['colonia'];
             $modificar->municipio = $_POST['municipio'];           
             $modificar->estado = $_POST['estado'];             
             $modificar->pais = $_POST['pais'];
			 $modificar->codigo_postal = $_POST['codigo_postal'];
			 $modificar->telefono = $_POST['telefono'];
             $modificar->correo_electronico = $_POST['correo_electronico'];
             $modificar->logotipo = $_POST['logotipo'];
             $modificar->representante = $_POST['representante'];
			 $modificar->estatus = 1;
            if($modificar->set()){
               echo irA('../valetes.php?np=18&edit=1&so=1', 1);
            }else{
                  echo irA('../valetes.php?np=18&so=0', 1);
            }
                            
            }else{
			echo irA('../valetes.php?np=18&so=0', 1);
            }
        		
		
	}else if($_GET['m'] == 2){ //Modificar 
		if(isset($_GET['id']) && sizeof($_POST)>0){ 
            
           
             $modificar = new ValetModel();
             $modificar->setId($_GET['id']);  
			 $modificar->id_pin = $_POST['id_pin'];			
             $modificar->nombre = $_POST['nombre'];
             $modificar->calle = $_POST['calle'];
             $modificar->num_ext = $_POST['num_ext'];
             $modificar->num_int = ($_POST['num_int'] != '' ? $_POST['num_int'] : 0);
             $modificar->colonia = $_POST['colonia'];
             $modificar->municipio = $_POST['municipio'];           
             $modificar->estado = $_POST['estado'];             
             $modificar->pais = $_POST['pais'];
			 $modificar->telefono = $_POST['telefono'];
			 $modificar->codigo_postal = $_POST['codigo_postal'];
             $modificar->correo_electronico = $_POST['correo_electronico'];
             $modificar->logotipo = $_POST['logotipo'];
             $modificar->representante = $_POST['representante'];
		     $modificar->estatus = 1;
            if($modificar->edit()){//modificar datos formacion
                 echo irA('../valetes.php?np=18&edit=1&id='.$_GET['id'].'&so=1', 1);
                
           }else{
                 echo irA('../valetes.php?np=18&so=0', 1);
           }             
            }else{
				echo irA('../valetes.php?np=18&so=0', 1);
            }
		
	}else if($_GET['m'] == 3){ //Desactivar 
		if(isset($_GET['id']) && isset($_GET['st'])){
			if($_GET['id'] > 0 && $_GET['st'] > -1){
                
				$modiTipo = new ValetModel();
				$modiTipo->setId($_GET['id']);
				$modiTipo->estatus = $_GET['st'];
				if($modiTipo->edit()){
                    echo irA('../valetes.php?esta='.$_GET['st'].'&err=2&so=2&np=18', 1);
                  }else{
                     echo irA('../valetes.php?esta='.$_GET['st'].'&err=0&so=0&np=18', 1);
                  }
					        
		}else{
			echo irA('../valetes.php?err=1&so=12&np=18', 1);
		}
	}else{
		echo irA('valetes.php', 1);
	}
}
}



?>
