<?php

/*
 * Usaremos las variables 
 * $_GET['err'] -> error alojado en miscelaneos
 * $_GET['te'] -> Nos dira el tipo de error 
 * 
 * Tipos de errores:
 * 0 -> Error|Peligro, Rojo
 * 1 -> Exito, Verde
 * 2 -> Informativo, Azul
 * 3 -> Alerta, Amarillo
 * 
 * */


if(isset($_GET['err']) && isset($_GET['te']) ){
	if($_GET['err'] > -1 && $_GET['te'] > -1){
		$claseAlerta = array('alert-danger', 'alert-success', 'alert-info', 'alert-warning');
		$iconoAlerta = array('glyphicon-warning-sign', 'glyphicon-ok-sign', 'glyphicon-info-sign', 'glyphicon-exclamation-sign'); 
?>
		<div class="alert <?php echo $claseAlerta[$_GET['te']]; ?> alert-dismissable ">
	    	<button type="button" class="close" data-dismiss="alert">&times;</button>
	    	<strong><span class="glyphicon <?php echo $iconoAlerta[$_GET['te']]; ?>" ></span></strong> <?php echo $mensajes[$_GET['err']][0]; ?>
	    </div>
<?php	}
}
?>