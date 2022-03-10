<?php
if(isset($_GET['m'])){
	include('../../miscelaneos.php');
	include('../../modelo/mdltarifa.php');
}else{
	include('../miscelaneos.php');
	include('../modelo/mdltarifa.php');
}


function traeTarifa($id,$id_valet, $estatus){
	$clie = new TarifaModel();	
	if($id > 0){
		$clie->setId($id);
	}else{
        ($id_valet > -1 ? $clie->id_valet = $id_valet: '');        
		($estatus > -1 ? $clie->estatus = $estatus : '');
	}
	$clie->get();
	$retorno = array();
	if(sizeof($clie->rows)>0){
		if($id>0){
			$retorno = $clie->rows[0];
		}else{
			$retorno = $clie->rows;
		}
		$clie->_destruct();
		return $retorno;
	}else{
		return $retorno;
	}
}

if(isset($_GET['m'])){
	if($_GET['m'] == 1){ //insertar 
		if(sizeof($_POST) >0){
            
        	$agregar = new TarifaModel();
            $agregar->id_valet = $_GET['idvalet'];
			$agregar->tarifa = $_POST['tarifa'];
            $agregar->fecha_registro =  date('Y-m-d');
			$agregar->estatus = 1;
            if($agregar->set()){
				$eli = $agregar->liid;
                echo irA('../tarifa.php?np=14&edit=1&id='.$eli.'&st=1', 1);
            }else{
				echo irA('../tarifa.php?np=14&st=0', 1);
            }
        }else{
            echo irA('../tarifa.php?np=14&st=0', 1);
        }			
		
	}else if($_GET['m'] == 2){ //Modificar 
		if(isset($_GET['id']) && sizeof($_POST)>0){
            
              
			$modificar = new TarifaModel();
            $modificar->setId($_GET['id']);
			$modificar->tarifa = $_POST['tarifa'];
            $modificar->fecha_registro =  date('Y-m-d');
			$modificar->estatus = 1;
            if($modificar->edit()){            
                   echo irA('../tarifa.php?np=14&edit=1&id='.$_GET['id'].'&st=1', 1);
            }else{
			echo irA('../tarifa.php?np=14&st=0', 1);
            }			
		}else{
		echo irA('../tarifa.php?err=1&so=12&np=14', 1);
		}
	}else{
		echo irA('tarifa.php', 1);
	}
}



?>
