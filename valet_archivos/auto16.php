<?php
include('conexion.php');
define( 'API_ACCESS_KEY', 'AAAAa6w1F5U:APA91bGPQ0U4xmDwd8inZtStB2FuxJuxGNDu-8-YfndSqVRPIndanoN-yiquMjs09PUXfcXGFdZ8v-hshBVKFeiRnQuz2xyM1C2y3kIZ8k1ETi49HXgdx4wrqtRVWJBLqozhIPr4UlJ-' );
	
$id = $_POST['id'];
$token = $_POST['token'];
$id_valet = $_POST['id_valet'];

    $query = 'UPDATE automovil SET  fecha_pedir = "'.date('Y-m-d H:i:s').'", fecha_notificado = "'.date('Y-m-d H:i:s').'" , estatus=3 WHERE id = "'.$id.'"';
    $result = mysqli_query($conn, $query) or die('error: ' .mysql_error());

    if($result == TRUE){
        
         $registrationIds = $token;

							$msg = array(
                                'title' => "Notificación",
						   		'body'  => "TÚ AUTO LLEGA DE 3 A 5 MIN",
						   		'icon'  => "https://valet.linkom.mx/valet_archivos/reportes_logo.png",
                                'click_action'=> 'https://valet.linkom.mx/plataforma/cliente/detalle.php?id_val="'.$id_valet.'"&id="'.$id.'"'
						     );
							 $fields = array(
							    'to'  => $registrationIds,
							    'notification' => $msg
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
//echo $result;
        
        echo "succes"; 
        
        
} else {
    echo "error";
} 
?>
