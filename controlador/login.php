<?php session_start(); ?>
<?php
include('../plataforma/modelo/mdlvalet.php');
include('../plataforma/modelo/mdlusuario.php');
include('../plataforma/modelo/mdladministrador.php');
include ('../plataforma/miscelaneos.php');
if(isset($_GET['close'])){
	if($_GET['close'] == 1 && isset($_GET['idusu'])){
		$_SESSION = array();
		if(isset($_COOKIE[session_name()])) { 
   			 setcookie(session_name(), '', time() + 300, '/'); 
  		} 
		session_destroy();
		echo irA('../index.php', 1, 0);
		
	}
	echo irA('../index.php', 1, 0);	
}else{
if(isset($_POST['usua']) && isset($_POST['pwd']) && isset($_POST['pin'])){
    
    if($_POST['pin']=='00'){
        $usuario = new AdminModel();
        $usuario->usuario = htmlspecialchars($_POST['usua']);
        $usuario->contrasenia = htmlspecialchars($_POST['pwd']);
        $usuario->estatus =1;
        $usuario->limit = 1;
        $usuario->get();
        
        //print_r($usuario->rows);
        $_SESSION['intentos'] = (isset($_SESSION['intentos']) ? $_SESSION['intentos']++ : $_SESSION['intentos'] = 1);
            if(sizeof($usuario->rows) == 1){
                if(md5($_POST['pwd']) == md5($usuario->rows[0]['contrasenia'])){
                        if($usuario->rows[0]['estatus'] == 1 ){
                            //generamos la sesion
                            $_SESSION['idpin'] = "00";
                            $_SESSION['nombre'] = $pin->rows[0]['nombre'].' '.$pin->rows[0]['paterno'].' '.$pin->rows[0]['materno'];
                            $_SESSION['idusu'] = $usuario->rows[0]['id'];
                            $_SESSION['usu'] = $usuario->rows[0]['usuario'];
                            $_SESSION['pwd'] = md5($usuario->rows[0]['contrasenia']);
                            $_SESSION['intentos'] = 0;                            $usuario->_destruct();
                            
                               echo irA('../plataforma/mani/inicio.php', 1, 0);                  
                        }else{ //tipo de usuario incorrecto, agregamos el contador de intentos
                            $_SESSION['intentos']++;
                            echo irA('../?err=7&te=0', 1, 0);
                        }	
                    }else{ //usuario inactivo, lo regresamos al login
                        echo irA('../?err=9&te=0&msg=inactivo', 1, 0);
                    }
                }else{
                    //nos regresa diciendo que no coinciden las credenciales y agregando el contador de intentos en 1
                    echo irA('../?err=7&te=0&msg=cred incorrectas', 1, 0);
                }
        

    }else{
        
    $pin = new ValetModel();
	$pin->id_pin = $_POST['pin'];
	$pin->limit = 1;
	$pin->get();
    if(sizeof($pin->rows) == 1){
        
    
	$usuario = new UsuarioModel();
	$usuario->id_valet = $pin->rows[0]['id_valet'];
	$usuario->usuario = htmlspecialchars($_POST['usua']);
	$usuario->contrasena = htmlspecialchars($_POST['pwd']);
	$usuario->estatus =1;
	$usuario->limit = 1;
	$usuario->get($usuario->rows);
    
            $_SESSION['intentos'] = (isset($_SESSION['intentos']) ? $_SESSION['intentos']++ : $_SESSION['intentos'] = 1);
            if(sizeof($usuario->rows) == 1){

                if(md5($_POST['pwd']) == md5($usuario->rows[0]['contrasena'])){
                    //iniciamos la sesion y nos dirigimos a nuestro incio.			if($usuario->rows[0]['estatus']){ //usuario Activo
                        if($usuario->rows[0]['estatus'] == 1 ){
                            //generamos la sesion
                            $_SESSION['idvalet'] = $usuario->rows[0]['id_valet'];
                            $_SESSION['idpin'] = $pin->rows[0]['id_pin'];
                            $_SESSION['nombre'] = $pin->rows[0]['nombre'];
                            $_SESSION['idtipo'] = $usuario->rows[0]['tipo_usuario'];
                            $_SESSION['idusu'] = $usuario->rows[0]['id'];
                            $_SESSION['usu'] = $usuario->rows[0]['usuario'];
                            $_SESSION['pwd'] = md5($usuario->rows[0]['contrasena']);
                            $_SESSION['intentos'] = 0;
                            $usuario->_destruct();
                            
                            if($_SESSION['idtipo']=='1'){
                               echo irA('../plataforma/man/inicio.php', 1, 0);                  
                            }
                        }else{ //tipo de usuario incorrecto, agregamos el contador de intentos
                            $_SESSION['intentos']++;
                            echo irA('../?err=7&te=0', 1, 0);
                        }	
                    }else{ //usuario inactivo, lo regresamos al login
                        echo irA('../?err=9&te=0&msg=inactivo', 1, 0);
                    }
                }else{
                    //nos regresa diciendo que no coinciden las credenciales y agregando el contador de intentos en 1
                    echo irA('../?err=7&te=0&msg=cred incorrectas', 1, 0);
                }
	
        }else{
          echo irA('../?err=7&te=0&msg=cred incorrectas', 1, 0);

        }
      }
    }else{
		//nos regresa diciendo que no coinciden las credenciales
		echo irA('../?err=7&te=0&msg=no existe', 1, 0);
	}

} 
?>
