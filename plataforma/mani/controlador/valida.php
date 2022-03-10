<?php
	include('../../modelo/mdlusuario.php');
	
	function verificaNombreUsuario($nombreU,$idvalet){
		$valida = new UsuarioModel();
        $valida->id_valet = $idvalet;
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
	
	if(isset($_GET['me'])){
		if($_GET['me'] == 1){
			if($_GET['uname'] != ''){
				if(verificaNombreUsuario($_GET['uname'],$_GET['idvalet'])){
					echo "
					<div class='form-group has-error has-feedback'>
  						<label for='focusedinput' >Usuario</label>
  							<input type='text' class='form-control' id='usuario' alt='el usuario ya existe' value='' name='usuario' onblur='verificar();'>
  							<span style='margin-right:15px' class='glyphicon glyphicon-remove form-control-feedback' ></span>
                            <h5 style='color:red'>El Usuario <strong>".$_GET['uname']."</strong> ya existe</h5>
						<div class='clearfix'></div>
					</div>
					";
				}else{
					echo "
					<div class='form-group has-success has-feedback'>
  						<label for='focusedinput' >Usuario</label>
  							<input type='text' class='form-control' id='usuario' alt='el usuario Valido' value='".$_GET['uname']."' name='usuario' onblur='verificar();'>
  							<span style='margin-right:15px' class='glyphicon glyphicon-ok form-control-feedback'></span>
						<div class='clearfix'></div>
					</div>
					";
				}
			}
		}
	}
?>
