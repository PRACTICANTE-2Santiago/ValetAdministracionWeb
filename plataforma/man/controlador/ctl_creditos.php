<?php
if(isset($_GET['m'])){
	include('../../miscelaneos.php');
    include('../../modelo/mdlcreditos.php');
}else{
	include('../miscelaneos.php');  
    include('../modelo/mdlcreditos.php');
}



function verificaNombreUsuario($nombreU){
	$valida = new ValetModel();
	$valida->usuario = $nombreU;
	$valida->get();
	if(sizeof($valida->rows)==1){
		$valida->_destruct();
		return TRUE;
	}else{
		$valida->_destruct();
		return FALSE;
	}
}


function traeUsuarios($id , $estatus){
	$usua = new ValetModel();	
	if($id > 0){
		$usua->setId($id);
	}else{
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

function traeEstatusUsua($estatus){
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
             
            
			$agregar = new ValetModel();
			$agregar->nombre = $_POST['nombre'];
            $agregar->paterno = $_POST['paterno'];
            $agregar->materno = $_POST['materno'];
            $agregar->correo_electronico = $_POST['correo'];
            $agregar->telefono = $_POST['telefono'];
            $agregar->usuario = $_POST['usuario'];
            $agregar->contrasenia = $_POST['contrasenia'];
            $agregar->fecha_registro =  date('Y-m-d H:i:s');
			$agregar->estatus = 1;
                if($agregar->set()){
                    echo irA('../usuarios.php?np=18&edit=1&st=1', 1);
                }else{
                      echo irA('../usuarios.php?np=18&st=0', 1);
                }
                            
            }else{
			echo irA('../usuarios.php?np=18&st=0', 1);
            }
        		
		
	}else if($_GET['m'] == 2){ //Modificar 
		if(isset($_GET['id']) && sizeof($_POST)>0){ 
                                   
			$modificar = new ValetModel();
            $modificar->setId($_GET['id']);
			$modificar->nombre = $_POST['nombre'];
            $modificar->paterno = $_POST['paterno'];
            $modificar->materno = $_POST['materno'];
            $modificar->correo_electronico = $_POST['correo'];
            $modificar->telefono = $_POST['telefono'];
            $modificar->usuario = $_POST['usuario'];
            $modificar->contrasenia = $_POST['contrasenia'];
			$modificar->estatus = 1;
                if($modificar->edit()){//modificar datos formacion
                    echo irA('../usuarios.php?np=18&edit=1&id='.$_GET['id'].'&st=1', 1);
                }else{
                     echo irA('../usuarios.php?np=18&st=0', 1);
                }             
            }else{
				echo irA('../usuarios.php?np=18&st=0', 1);
            }
		
	}else if($_GET['m'] == 3){ //Desactivar 
		if(isset($_GET['id']) && isset($_GET['st'])){
			if($_GET['id'] > 0 && $_GET['st'] > -1){
                
				$modiTipo = new ValetModel();
				$modiTipo->setId($_GET['id']);
				$modiTipo->estatus = $_GET['st'];
				if($modiTipo->edit()){
                    echo irA('../usuarios.php?esta='.$_GET['st'].'&err=2&st=2&np=18', 1);
                  }else{
                     echo irA('../usuarios.php?esta='.$_GET['st'].'&err=0&st=0&np=18', 1);
                  }
					        
		}else{
			echo irA('../usuarios.php?err=1&st=12&np=18', 1);
		}
	}else{
		echo irA('usuarios.php', 1);
	}
}
}



?>
