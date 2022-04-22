<?php
if(isset($_GET['m'])){
	
	include('../../miscelaneos.php');
    include('../../modelo/mdlcreditos.php');
}else{

	include('../miscelaneos.php');  
    include('../modelo/mdlcreditos.php');
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


function traeEstatusCredito($estatus){
	if($estatus>-1){
		$contTip = new ValetModel ();
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
            $agregar->costo = $_POST['costo'];
            $agregar->servicios = $_POST['servicios'];
            $agregar->aviso = $_POST['aviso'];
            $agregar->cancelaciones = $_POST['cancelaciones'];
            $agregar->estatus = 1;
                if($agregar->set()){
					console.error;
                    echo irA('../creditos.php?np=18&edit=1&st=1', 1);

                }else{
                      echo irA('../creditos.php?np=18&st=0', 1);
                }
                            
            }else{
			echo irA('../creditos.php?np=18&st=0', 1);
            }
        		
		
	}else if($_GET['m'] == 2){ //Modificar 
		if(isset($_GET['id']) && sizeof($_POST)>0){ 
                                   
			$modificar = new ValetModel();
            $modificar->setId($_GET['id']);
			$modificar->nombre = $_POST['nombre'];
            $modificar->costo = $_POST['costo'];
            $modificar->servicios = $_POST['servicios'];
            $modificar->aviso = $_POST['aviso'];
            $modificar->cancelaciones = $_POST['cancelaciones'];
            
			$modificar->estatus = 1;
                if($modificar->edit()){//modificar datos formacion
					
                    echo irA('../creditos.php?np=18&edit=1&id='.$_GET['id'].'&st=1', 1);
                }else{
                     echo irA('../creditos.php?np=18&st=0', 1);
                }             
            }else{
				echo irA('../creditos.php?np=18&st=0', 1);
            }
		
	}else if($_GET['m'] == 3){ //Desactivar 
		if(isset($_GET['id']) && isset($_GET['st'])){
			if($_GET['id'] > 0 && $_GET['st'] > -1){
                
				$modiTipo = new ValetModel();
				$modiTipo->setId($_GET['id']);
				$modiTipo->estatus = $_GET['st'];
				if($modiTipo->edit()){
                    echo irA('../creditos.php?esta='.$_GET['st'].'&err=2&st=2&np=18', 1);
                  }else{
                     echo irA('../creditos.php?esta='.$_GET['st'].'&err=0&st=0&np=18', 1);
                  }
					        
		}else{
			echo irA('../creditos.php?err=1&st=12&np=18', 1);
		}
	}else{
		echo irA('creditos.php', 1);
	}
}
}



?>
