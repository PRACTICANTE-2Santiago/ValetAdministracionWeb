<?php
	include('../../modelo/mdlusuario.php');
	
	function verificaNombreUsuario($nombreU,$idvalet){
		$valida = new UsuarioModel();
		$valida->id_valet = $idvalet;
		$valida->correo_electronico = $nombreU;
		$valida->get();
		if(sizeof($valida->rows)==1){
			$valida->_destruct();
			return TRUE;
		}else{
			$valida->_destruct();
			return FALSE;
		}
	}
	
	if(isset($_GET['me'])){
		if($_GET['me'] == 1){
			if($_GET['uname'] != ''){
				if(verificaNombreUsuario($_GET['uname'],$_GET['idvalet'])){
					echo "
					<div class='form-group has-error has-feedback'>
  						<label for='focusedinput' >Correo Electr&oacute;nico</label>
  							<input type='text' class='form-control' id='correo' alt='El correo ya existe' value='' name='correo' onblur='verificar_correo();'>
  							<span style='margin-right:15px' class='glyphicon glyphicon-remove form-control-feedback' ></span>
                            <h5 style='color:red'>El correo <strong>".$_GET['uname']."</strong> ya existe</h5>
						<div class='clearfix'></div>
					</div>
					";
				}else{
					echo "
					<div class='form-group has-success has-feedback'>
  						<label for='focusedinput' >Correo Electr&oacute;nico</label>
  							<input type='text' class='form-control' id='correo' alt='El correo Valido' value='".$_GET['uname']."' name='correo' onblur='verificar_correo();'>
  							<span style='margin-right:15px' class='glyphicon glyphicon-ok form-control-feedback'></span>
						<div class='clearfix'></div>
					</div>
					";
				}
			}
		}
	}
?>
