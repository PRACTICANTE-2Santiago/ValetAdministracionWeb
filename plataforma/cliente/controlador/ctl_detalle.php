<?php
if(isset($_GET['m'])){
	include('../../miscelaneos.php');
    include('../../modelo/mdlvalet.php');
    include('../../modelo/mdlautomovil.php');
    include('../../modelo/mdlchofer.php');
    
}else{
	include('../miscelaneos.php');  
    include('../modelo/mdlvalet.php');
    include('../modelo/mdlautomovil.php');
    include('../modelo/mdlchofer.php');
}




function traeValet($id , $estatus){
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

function traeAuto($id ,$id_valet, $estatus){	$usua = new AutoModel();	
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

function traeUsuarios($id ,$nombre, $estatus){
	$usua = new UsuarioModel();	
	if($id > 0){
		$usua->setId($id);
	}else{
		($nombre != '' ? $usua->nombre = $nombre : '');
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

function traeEstatusUsua($estatus){
	if($estatus>-1){
		$contTip = new UsuarioModel();
		$contTip->estatus = $estatus;
		$contTip->get();
		return sizeof($contTip->rows);
	}else{
		return array();
	}
}




if(isset($_GET['m'])){
	if($_GET['m'] == 1){ //Modificar 
		if(isset($_GET['id']) ){ 
            
           
             if($_GET['id_val']!=4){
                     define( 'API_ACCESS_KEY', 'AAAAa6w1F5U:APA91bGPQ0U4xmDwd8inZtStB2FuxJuxGNDu-8-YfndSqVRPIndanoN-yiquMjs09PUXfcXGFdZ8v-hshBVKFeiRnQuz2xyM1C2y3kIZ8k1ETi49HXgdx4wrqtRVWJBLqozhIPr4UlJ-' );
	
                }else if($_GET['id_val']==4){
                    define('API_ACCESS_KEY','AAAAh_8uO6A:APA91bEH4c0yJYu7fvIYP8lQtbj2hXNOPrRXRsJwsL2MaLak0e7sTcRNtIH82LgeKhzp6b7vqzZwMDM7vNjoXo8b6kiBt-zM5OYN1JjAUdKwbltyvCdMwz5TXW6xdstEOlvJvHDyC_yx' );
                }
            
             $modificar = new AutoModel();
             $modificar->setId($_GET['id']);  
             $modificar->fecha_pedir = date('Y-m-d H:i:s');
		     $modificar->estatus = 3;
            if($modificar->edit()){//modificar datos formacion
                
                //residentes	
                                $valet = new ValetModel(); 
                                $valet->setId();  
								$valet->estatus = 1; 
								$valet->get();
                
               
                                $auto = new AutoModel(); 
                                $auto->setId($_GET['id']);  
								$auto->id_valet = $_GET['id_val'];     
								$auto->get();
                
								$choferes = new ChoferModel(); 
								$choferes->id_valet = $_GET['id_val'];     
								$choferes->estatus = 1; 
								$choferes->get();
								
								//mandar notificacion push a app
						  foreach($choferes->rows as $chofer){								
							$registrationIds = $chofer['token'];
							$autos= utf8_encode('Auto Solicitado:  '.$auto->rows[0]['placas']);
							$msg = array(
						   		'body'  => $autos,
						  		'title' => utf8_encode(strtoupper($valet->rows[0]['nombre'])),
   	                            'tema'  => 'Placas',
						     );
							 $fields = array(
							    'to'  => $registrationIds,
							    'data' => $msg
							 );							 
						 	$headers = array(
							    'Authorization: key=' . API_ACCESS_KEY,
							    'Content-Type: application/json'
						  	);
							#Send Reponse To FireBase Server 
							  $ch = curl_init();
							  curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
							  curl_setopt( $ch,CURLOPT_POST, true );
							  curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
							  curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
							  curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
							  curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
							  $result = curl_exec($ch );
							  curl_close( $ch );							
						}
								
                
                 echo irA('../detalle.php?id_val='.$_GET['id_val'].'&id='.$_GET['id'], 1);
                
           }else{
                 echo irA('../detalle.php?np=18&so=0', 1);
           }             
            }else{
				echo irA('../detalle.php?np=18&so=0', 1);
            }
		
	}else if($_GET['m'] == 2){ //Modificar 
            
           
             $modificar = new AutoModel();
             $modificar->setId($_GET['id']);  
             $modificar->comentarios_cliente = $_POST['comentarios'];
		     $modificar->estatus = 4;
            if($modificar->edit()){//modificar datos formacion
                 echo irA('../detalle.php?id_val='.$_GET['id_val'].'&id='.$_GET['id'], 1);
                
           }else{
                 echo irA('../detalle.php?np=18&so=0', 1);
           }             
    }else if($_GET['m'] == 3){ //condiciones 
            
                if($_GET['id_val']!=4){
                     define( 'API_ACCESS_KEY', 'AAAAa6w1F5U:APA91bGPQ0U4xmDwd8inZtStB2FuxJuxGNDu-8-YfndSqVRPIndanoN-yiquMjs09PUXfcXGFdZ8v-hshBVKFeiRnQuz2xyM1C2y3kIZ8k1ETi49HXgdx4wrqtRVWJBLqozhIPr4UlJ-' );
	
                }else if($_GET['id_val']==4){
                    define('API_ACCESS_KEY','AAAAh_8uO6A:APA91bEH4c0yJYu7fvIYP8lQtbj2hXNOPrRXRsJwsL2MaLak0e7sTcRNtIH82LgeKhzp6b7vqzZwMDM7vNjoXo8b6kiBt-zM5OYN1JjAUdKwbltyvCdMwz5TXW6xdstEOlvJvHDyC_yx' );
                }
        
                                $auto_info = new AutoModel(); 
                                $auto_info->setId($_GET['id']);  
								$auto_info->id_valet = $_GET['id_val'];     
								$auto_info->get();
        
           
             $modificar = new AutoModel();
             $modificar->setId($_GET['id']);  
             $modificar->condiciones = $_GET['condi'];
             $modificar->estatus =$auto_info->rows[0]['estatus'];

            if($modificar->edit()){//modificar datos formacion
                    if($_GET['condi']==1){
                        
                         $valet = new ValetModel(); 
                                $valet->setId($_GET['id_val']);  
								$valet->estatus = 1; 
								$valet->get();
                
                
                        
                                $auto = new AutoModel(); 
                                $auto->setId($_GET['id']);  
								$auto->id_valet = $_GET['id_val'];     
								$auto->get();
                
								$choferes = new ChoferModel(); 
								$choferes->id_valet = $_GET['id_val'];     
								$choferes->estatus = 1; 
								$choferes->get();
								
								//mandar notificacion push a app
						  foreach($choferes->rows as $chofer){								
							$registrationIds = $chofer['token'];
							$autos= utf8_encode('Auto no acepto condiciones:  '.$auto->rows[0]['placas']);
							$msg = array(
						   		'body'  => $autos,
						  		'title' => utf8_encode(strtoupper($valet->rows[0]['nombre'])),
   	                            'tema'  => 'Placas',
						     );
							 $fields = array(
							    'to'  => $registrationIds,
							    'data' => $msg
							 );							 
						 	$headers = array(
							    'Authorization: key=' . API_ACCESS_KEY,
							    'Content-Type: application/json'
						  	);
							#Send Reponse To FireBase Server 
							  $ch = curl_init();
							  curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
							  curl_setopt( $ch,CURLOPT_POST, true );
							  curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
							  curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
							  curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
							  curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
							  $result = curl_exec($ch );
							  curl_close( $ch );							
						}
                       
                        echo irA('../detalle.php?id_val='.$_GET['id_val'].'&id='.$_GET['id'], 1);

                    }else{
                        echo irA('../detalle.php?id_val='.$_GET['id_val'].'&id='.$_GET['id'], 1);
                  
                    }
                               
                
                
           }else{
                 echo irA('../detalle.php?id_val='.$_GET['id_val'].'&id='.$_GET['id'], 1);
           }             
    }
}



?>
