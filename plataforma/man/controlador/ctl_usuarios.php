<?php
if(isset($_GET['m'])){
	include('../../miscelaneos.php');
    include('../../modelo/mdlusuario.php');
    
}else{
	include('../miscelaneos.php');  
    include('../modelo/mdlusuario.php');
}





function traeUsuarios($id ,$id_valet, $estatus){
	$usua = new UsuarioModel();	
	if($id > 0){
		$usua->setId($id);
	}else{
		($estatus > -1 ? $usua->id_valet = $id_valet : '');
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

function traeEstatusUsua($estatus,$id_valet){
	if($estatus>-1){
		$contTip = new UsuarioModel();
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
            
			 $agregar = new UsuarioModel();
			 $agregar->id_valet = $_GET['idvalet'];
			 $agregar->tipo_usuario = $_GET['tipo'];
             $agregar->usuario = $_POST['usuario'];
             $agregar->contrasena = $_POST['contrasena'];
             $agregar->nombre = $_POST['nombre'];
             $agregar->apellido_paterno = $_POST['apellido_paterno'];
             $agregar->apellido_materno = $_POST['apellido_materno'];
             $agregar->calle = $_POST['calle'];
             $agregar->num_ext = $_POST['num_ext'];
			 $agregar->num_int = ($_POST['num_int'] != '' ? $_POST['num_int'] : 0);
             $agregar->colonia = $_POST['colonia'];
             $agregar->municipio =  $_POST['municipio'];
             $agregar->estado = $_POST['estado'];
             $agregar->pais = $_POST['pais'];
             $agregar->codigo_postal = $_POST['codigo'];
             $agregar->telefono = $_POST['telefono'];
			 $agregar->correo_electronico = $_POST['correo'];
             $agregar->fecha_registro = date('Y-m-d H:i:s');
			 $agregar->estatus = 1;
            if($agregar->set()){
               echo irA('../usuarios.php?np=18&edit=1&so=1', 1);
            }else{
                  echo irA('../usuarios.php?np=18&so=0', 1);
            }
                            
            }else{
			echo irA('../usuarios.php?np=18&so=0', 1);
            }
        		
		
	}else if($_GET['m'] == 2){ //Modificar 
		if(isset($_GET['id']) && sizeof($_POST)>0){ 
            
           
             $modificar = new UsuarioModel();
             $modificar->setId($_GET['id']);  
             $modificar->usuario = $_POST['usuario'];
             $modificar->contrasena = $_POST['contrasena'];
             $modificar->nombre = $_POST['nombre'];
             $modificar->apellido_paterno = $_POST['apellido_paterno'];
             $modificar->apellido_materno = $_POST['apellido_materno'];
             $modificar->calle = $_POST['calle'];
             $modificar->num_ext = $_POST['num_ext'];
			 $modificar->num_int = ($_POST['num_int'] != '' ? $_POST['num_int'] : 0);
             $modificar->colonia = $_POST['colonia'];
             $modificar->municipio =  $_POST['municipio'];
             $modificar->estado = $_POST['estado'];
             $modificar->pais = $_POST['pais'];
             $modificar->codigo_postal = $_POST['codigo'];
             $modificar->telefono = $_POST['telefono'];
			 $modificar->correo_electronico = $_POST['correo'];
		     $modificar->estatus = 1;
            if($modificar->edit()){//modificar datos formacion
                 echo irA('../usuarios.php?np=18&edit=1&id='.$_GET['id'].'&so=1', 1);
                
           }else{
                 echo irA('../usuarios.php?np=18&so=0', 1);
           }             
            }else{
				echo irA('../usuarios.php?np=18&so=0', 1);
            }
		
	}else if($_GET['m'] == 3){ //Desactivar 
		if(isset($_GET['id']) && isset($_GET['st'])){
			if($_GET['id'] > 0 && $_GET['st'] > -1){
                
				$modiTipo = new UsuarioModel();
				$modiTipo->setId($_GET['id']);
				$modiTipo->estatus = $_GET['st'];
				if($modiTipo->edit()){
                    echo irA('../usuarios.php?esta='.$_GET['st'].'&err=2&so=2&np=18', 1);
                  }else{
                     echo irA('../usuarios.php?esta='.$_GET['st'].'&err=0&so=0&np=18', 1);
                  }
					        
		}else{
			echo irA('../usuarios.php?err=1&so=12&np=18', 1);
		}
	}else{
		echo irA('usuarios.php', 1);
	}
}
}



?>
