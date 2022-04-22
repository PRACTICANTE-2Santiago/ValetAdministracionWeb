<?php
if(isset($_GET['m'])){
	include('../../miscelaneos.php');
    include('../../modelo/mdlchofer.php');
    
}else{
	include('../miscelaneos.php');  
    include('../modelo/mdlchofer.php');
}



function traeChoferes($id ,$id_valet, $estatus){
	$chof = new ChoferModel();	
	if($id > 0){
		$chof->setId($id);
	}else{
		($estatus > -1 ? $chof->id_valet = $id_valet : '');
		($estatus > -1 ? $chof->estatus = $estatus : '');
	}
	$chof->get();
	$retorno = array();
	if(sizeof($chof->rows)>0){
		if($id>0){
			$retorno = $chof->rows[0];
		}else{
			$retorno = $chof->rows;
		}
		$chof->_destruct();
		return $retorno;
	}else{
		return $retorno;
	}
}

function traeEstatusChofer($estatus,$id_valet){
	if($estatus>-1){
		$contTip = new ChoferModel();
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
            
			 $agregar = new ChoferModel();
			 $agregar->id_valet = $_GET['idvalet'];		
             $agregar->usuario = $_POST['usuario'];
             $agregar->contrasenia = $_POST['contrasena'];
             $agregar->nombre = $_POST['nombre'];
             $agregar->apellido_paterno = $_POST['apellido_paterno'];
             $agregar->apellido_materno = $_POST['apellido_materno'];
             $agregar->ine = $_POST['ine'];           
             $agregar->licencia = $_POST['licencia'];             
             $agregar->telefono = $_POST['telefono'];
			 $agregar->correo_electronico = $_POST['correo_electronico'];
             $agregar->fecha_registro = date('Y-m-d H:i:s');
             $agregar->token = '';
			 $agregar->estatus = 1;
            if($agregar->set()){
               echo irA('../choferes.php?np=18&edit=1&so=1', 1);
            }else{
                  echo irA('../choferes.php?np=18&so=0', 1);
            }
                            
            }else{
			echo irA('../choferes.php?np=18&so=0', 1);
            }
        		
		
	}else if($_GET['m'] == 2){ //Modificar 
		if(isset($_GET['id']) && sizeof($_POST)>0){ 
            
           
             $modificar = new ChoferModel();
             $modificar->setId($_GET['id']);  
             $modificar->usuario = $_POST['usuario'];
             $modificar->contrasenia = $_POST['contrasena'];
             $modificar->nombre = $_POST['nombre'];
             $modificar->apellido_paterno = $_POST['apellido_paterno'];
             $modificar->apellido_materno = $_POST['apellido_materno'];
             $modificar->ine = $_POST['ine'];            
             $modificar->licencia = $_POST['licencia'];           
             $modificar->telefono = $_POST['telefono'];
			 $modificar->correo_electronico = $_POST['correo_electronico'];
		     $modificar->estatus = 1;
            if($modificar->edit()){//modificar datos formacion
                 echo irA('../choferes.php?np=18&edit=1&id='.$_GET['id'].'&so=1', 1);
                
           }else{
                 echo irA('../choferes.php?np=18&so=0', 1);
           }             
            }else{
				echo irA('../choferes.php?np=18&so=0', 1);
            }
		
	}else if($_GET['m'] == 3){ //Desactivar 
		if(isset($_GET['id']) && isset($_GET['st'])){
			if($_GET['id'] > 0 && $_GET['st'] > -1){
                
				$modiTipo = new ChoferModel();
				$modiTipo->setId($_GET['id']);
				$modiTipo->estatus = $_GET['st'];
				if($modiTipo->edit()){
                    echo irA('../choferes.php?esta='.$_GET['st'].'&err=2&so=2&np=18', 1);
                  }else{
                     echo irA('../choferes.php?esta='.$_GET['st'].'&err=0&so=0&np=18', 1);
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
