<?php
    define( 'API_ACCESS_KEY', 'AAAAa6w1F5U:APA91bGPQ0U4xmDwd8inZtStB2FuxJuxGNDu-8-YfndSqVRPIndanoN-yiquMjs09PUXfcXGFdZ8v-hshBVKFeiRnQuz2xyM1C2y3kIZ8k1ETi49HXgdx4wrqtRVWJBLqozhIPr4UlJ-' );
	
	$tokens = array('cz-5QNmGUsM56ltZUe73Wa:APA91bH7L9r0ZghbT0oKwc50U6DpUU5SMqnI_x3fm7zPWk8aOwY47tbwMlMVRKzXgxIL-HTQzOYiclVg3vDFq02ThmsJn5YYeWjYnkSaYQomu587VIp28IajPbOJmyCNvzF3vZZxFs5B'
	);

	
foreach($tokens as $chofer){	
         $registrationIds = $chofer;

							$msg = array(
                                'title' => "Hola",
						   		'body'  => "Daniel",
						   		'icon'  => "https://valet.linkom.mx/valet_archivos/reportes_logo.png",
                                'click_action'=> 'https://valet.linkom.mx/plataforma/cliente/detalle.php?id_val=1&id=51'
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
echo $result;
		
	}
    
?>
