<?php
if(isset($_GET['m'])){
	include('../../miscelaneos.php');
    include('../../modelo/mdlautomovil.php');
    
}else{
	include('../miscelaneos.php');  
    include('../modelo/mdlautomovil.php');
}


function traerAuto($id ,$id_valet, $estatus){
    $usua = new AutoModel();	
	if($id > 0){
		$usua->setId($id);
	}else{
		($id_valet > -1 ? $usua->id_valet = $id_valet : '');
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

function traerAutos($id ,$id_valet,$fecha, $estatus){
    $usua = new AutoModel();	
	if($id > 0){
		$usua->setId($id);
	}else{
		($id_valet > -1? $usua->id_valet = $id_valet : '');
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

function traeEstatusAuto($estatus,$id_valet,$fecha){    if($estatus>-1){
		$contTip = new AutoModel();
		$contTip->estatus = $estatus;
		$contTip->id_valet = $id_valet;
		$contTip->mes = $fecha;
		$contTip->get();
		return sizeof($contTip->rows);
	}else{
		return array();
	}
}
?>
