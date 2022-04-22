<?php
if(isset($_GET['m'])){
	include('../../miscelaneos.php');
    include('../../modelo/mdlautomovil.php');
    
}else{
	include('../miscelaneos.php');  
    include('../modelo/mdlautomovil.php');
}


function traerAuto($id ,$id_comercios, $estatus){
    $usua = new AutoModel();	
	if($id > 0){
		$usua->setId($id);
	}else{
		($id_comercios > -1 ? $usua->id_comercios = $id_comercios : '');
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

function traerAutos($id ,$id_comercios,$fecha, $estatus){
    $usua = new AutoModel();	
	if($id > 0){
		$usua->setId($id);
	}else{
		($id_comercios > -1? $usua->id_comercios = $id_comercios : '');
		($fecha != ''? $usua->mes = $fecha : '');
		//($fecha != ''  ? $usua->fecha_nu = $fecha : '');
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

function traeEstatusAuto($estatus,$id_comercios,$fecha){    if($estatus>-1){
		$contTip = new AutoModel();
		$contTip->estatus = $estatus;
		$contTip->id_comercios = $id_comercios;
		$contTip->mes = $fecha;
		$contTip->get();
		return sizeof($contTip->rows);
	}else{
		return array();
	}
}
?>
