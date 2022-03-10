<?php 
	if(isset($_GET['so'])){
		//echo imprimeAlerta($mensajes[$_GET['so']][0], (isset($_GET['msg']) ? $_GET['msg'] : ''), $mensajes[$_GET['so']][1]);
		//bitacoraClie($mensajes[$_GET['so']][0],basename($_SERVER['PHP_SELF']));
		//$idOp = bitacoraClie($mensajes[$_GET['so']][0],basename($_SERVER['PHP_SELF']));
		echo imprimeAlerta1($mensajes[$_GET['so']][0], (isset($_GET['msg']) ? $_GET['msg'] : ''), $mensajes[$_GET['so']][1], $mensajes[$_GET['so']][2], $nvapag[$_GET['np']][0]);
	}
?>
