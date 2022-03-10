<?php
date_default_timezone_set('America/Mexico_City');
include_once('constantes.php');
define('FACTORFOLIO', 100);
define('FFE', 1500);
$anioini = 2015;
$mensajes = array(
	0 => array('Ha ocurrido un error disculpe las molestias', '#d9534f','glyphicon-remove'),	
	1 => array('Dato Insertado Correctamente', '#5cb85c','glyphicon-ok'),
	2 => array('Dato Actualizado Correctamente', '#5cb85c','glyphicon-ok'),
	3 => array('Dato Inhabilitado Correctamente', '#5cb85c','glyphicon-ok'),
	4 => array('Ha intentado llevar a cabo un ataque al sistema, ya ha sido notificado al Administrador', '#d9534f','glyphicon-remove'),
	5 => array('Error en la Base de datos: ', '#f0ad4e','glyphicon-warning-sign'),
	6 => array('Dato Habilitado Correctamente', '#5cb85c','glyphicon-ok'),
	7 => array('Usuario y/o contrase�a incorrectos', '#f0ad4e','glyphicon-warning-sign','alert-warning'),
	8 => array('Su Sesi�n ha terminado, inicie sesi�n nuevamente', '#46b8da','glyphicon-ban-circle','alert-info'),
	9 => array('Usuario Inactivo', '#d9534f','glyphicon-remove', 'alert-danger'),
	10 => array('Registro Grupal Exitoso. Registros exitosos: ', '#5cb85c','glyphicon-ok'),
	11 => array('Registro Grupal Fallido, con la visita: ', '#f0ad4e','glyphicon-warning-sign'),
	12 => array('Datos Invalidos: ', '#f0ad4e','glyphicon-warning-sign'),
	13 =>array('Mensaje Enviado','#5cb85c','glyphicon-ok'),
	14 =>array('No se puedo enviar mensaje','#d9534f','glyphicon-remove'),
	15 =>array('Queja y Sugerencia con Mensaje Creada','#5cb85c','glyphicon-ok'),
	16 =>array('Queja y Sugerencia sin Mensaje Creada','#5cb85c','glyphicon-ok'),
	17 =>array('Check In Correcto','#5cb85c','glyphicon-ok'),
	18 =>array('Check In Incorrecto','#d9534f','glyphicon-remove'),
	19 =>array('Check Out Correcto','#5cb85c','glyphicon-ok'),
	20 =>array('Check Out Incorrecto','#d9534f','glyphicon-remove'),
	21 =>array('Queja y Sugerencia Cerrada','#5cb85c','glyphicon-ok'),
	22 =>array('Necesitas Subir un Archivo Valido','#d9534f','glyphicon-remove'),
	23 =>array('Suscripci�n Cancelada','#5cb85c','glyphicon-ok'),
	24 =>array('No se pudo cancelar suscripci�n','#d9534f','glyphicon-remove'),
	25 =>array('Nombre de usuario ya existe','#5cb85c','glyphicon-ok'),
	26 =>array('Clasificado Aprobado','#5cb85c','glyphicon-ok'),
	27 =>array('Clasificado No Aprobado','#d9534f','glyphicon-remove'),
	28 =>array('Eliminado Correctamente','#d9534f','glyphicon-remove'),
	29 =>array('Agregado Correctamente','#5cb85c','glyphicon-ok'),
	30 =>array('Pago Liquidado Correctamente','#5cb85c','glyphicon-ok'),
	31 =>array('No Existe Pago','#d9534f','glyphicon-remove'),
	32 =>array('Registro de Entrada Exitoso','#5cb85c','glyphicon-ok'),
	33 =>array('Resgistro de Entrada Fallido','#d9534f','glyphicon-remove'),
	34 =>array('Registro de Salida Exitoso','#5cb85c','glyphicon-ok'),
	35 =>array('Resgistro de Salida Fallido','#d9534f','glyphicon-remove'),
	36 =>array('No se puede registrar sin dejar identificaci&oacute;n','#d9534f','glyphicon-remove'),
	37 =>array('M&oacute;dulo en Construcci&oacute;n ', '#f0ad4e','glyphicon-warning-sign'),
	38 =>array('Calificaci�n Enviada Exitosamente','#5cb85c','glyphicon-ok'),
	39 =>array('Se ha enviado la nueva contrase&ntilde;a a su correo','#5cb85c','glyphicon-ok'),
	40 =>array('Lo sentimos no es posible recuperar la contrase&ntilde;a','#d9534f','glyphicon-remove'),
	41 => array('Accion Realizada Correctamente', '#5cb85c','glyphicon-ok'),
	42 => array('Factura Emitida Correctamente', '#5cb85c','glyphicon-ok'),
	43 => array('Emision Cancelada Correctamente', '#5cb85c','glyphicon-ok'),
	44 => array('No hay cuentas receptoras', '#5cb85c','glyphicon-ok')
	
	
);

$nvapag = array(
	0 => array('equipo.php'),
	1 => array('marca.php'),
	2 => array('modelo.php'),
	3 => array('procesador.php'),
	4 => array('unidad_optica.php'),
	5 => array('categoria.php'),
	6 => array('memoria.php'),
	7 => array('disco_duro.php'),
	8 => array('logmein.php'),
	9 => array('poliza.php'),
	10 => array('monitor_pantalla.php'),
	11 => array('forma.php'),
	12 => array('sucursal.php'),
	13 => array('usuario.php'),
	14 => array('cliente.php'),
	15 => array('horario.php'),
	16 => array('nivel.php'),
	17 => array('puesto.php'),
	18 => array('usuario.php'),
	19 => array('movimiento.php'),
	20 => array('nvodescuento.php'),
	21 => array('nvapenalizacion.php'),
	22 => array('nvoctgingreso.php'),
	23 => array('nvopago.php'),
	24 => array('nvoegreso.php'),
	25 => array('nvoegdescuento.php'),
	26 => array('nvaegpenalizacion.php'),
	27 => array('nvoctgegreso.php'),
	28 => array('nvoproveedor.php'),
	29 => array('nvogrupo.php'),
	30 => array('entradas.php'),
	31 => array('salidas.php'),
	32 => array('trabajadores.php'),
	33 => array('sal_trabajadores.php'),
	34 => array('documentos.php'),
	35 => array('catalogoingresos.php'),
	36 => array('factura.php'),
	37 => array('movimientos.php'),
	38 => array('egpagos.php'),
	39 => array('facteg.php'),
	40 => array('facturas.php'),
	41 => array('nvafactegr.php'),
	42 => array('nvacuenta.php'),
	43 => array('movimiento.php?cr=1&idc=0'),
	44 => array('subirfile.php'),
	45 => array('solicitud.php')
	
	
);


function imprimeAlerta($tmsj, $msj, $tipo){
	return "<div class='alert ".$tipo." alert-dismissible' role='alert'>
  <button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button>
  <strong>".$tmsj."</strong> ".$msj."
</div>";
}

function irA($url, $type){
	//url -> Archivo a donde nos llevara
	//$type -> 1 para explicito 0 para implicito(dentro de una etiqueta <script> o onclick='') 2 para crear la 
	//etiqueta onclick=''
	if($type == 1){
		return "<script>location.href='".$url."'</script>;";
	}else if($type == 2){
		return "onclick=\"location.href='".$url."';\"";
	}else{
		return "location.href='".$url."';";
	}	
}

function abrirArchivo($url, $type, $donde){
	//url -> Archivo a donde nos llevara
	//$type -> 1 para explicito 0 para implicito(dentro de una etiqueta <script> o onclick='') 2 para crear la 
	//etiqueta onclick=''
	//$donde -> 0 en la misma ventana o 1 en una nueva pesta�a
	if($donde){ 
		if($type == 1){
			return "<script>window.open('".$url."');</script>;";
		}else if($type == 2){
			return "onclick=\"window.open('".$url."');\"";
		}else{
			return "window.open('".$url."');";
		}
	}else{
		if($type == 1){
			return "<script>location.href='".$url."'</script>;";
		}else if($type == 2){
			return "onclick=\"location.href='".$url."';\"";
		}else{
			return "location.href='".$url."';";
		}	
	}	
}

function verificarCampo($campo){
	$listaNegra = array(
		'<?', '<?php', '?>', '<script>
    ', '

</script>', '$_', '$-'
);
}


function verificarSesion($regreso, $tipoUsu){
if(isset($_SESSION['idusu']) && isset($_SESSION['usu']) && isset($_SESSION['pwd']) && isset($_SESSION['tip'])){
if(!($_SESSION['idusu']>0 && htmlspecialchars($_SESSION['usu']) != '' && $_SESSION['tip'] == $tipoUsu && $_SESSION['pwd'] != '')){
echo irA($regreso, 1, 0);
}
}else{
echo irA($regreso, 1, 0);
}
}

function extensionArchivo($archivo){
if($archivo != ''){
$partes = explode('.', $archivo);
$ext = end($partes);
return $ext;
}else{
return '';
}
}

function estatusAdmTabla($status){
if($status == 1){
return "<td class='estatus text-center st-ok'><span class='glyphicon glyphicon-ok-circle' title='Activo'></span></td>";
}else if($status == 2){
return "<td class='estatus text-center st-pend'><span class='glyphicon glyphicon-asterisk' title='Aprobacion Pendiente/Sin Actividad'></span></td>";
}else{
return "<td class='estatus text-center st-blk'><span class='glyphicon glyphicon-ban-circle' title='Inactivo'></span></td>";
}
}

function estatusRegCaseta($status){
if($status == 1){
return "<td class='estatus text-center st-ok'><span class='glyphicon glyphicon-ok' title='Activo'></span></td>";
}else if($status == 2){
return "<td class='estatus text-center st-info'><span class='glyphicon glyphicon-ok' title='Entro y Salio'></span><span class='glyphicon glyphicon-ok' title='Entro y Salio'></span></td>";
}else if($status == 3){
return "<td class='estatus text-center st-blk'><span class='glyphicon glyphicon-ban-circle' title='Cancelado'></span></span></td>";
}else{
return "<td class='estatus text-center st-pend'><span class='glyphicon glyphicon-asterisk' title='Sin Actividad'></span></td>";
}
}

function estatusRegCaseta2($status){
if($status == 1){
return "<h4 class=' text-left st-ok'><span class='glyphicon glyphicon-ok' title='Activo'></span> Entro</h4>";
}else if($status == 2){
return "<h4 class=' text-left st-info'><span class='glyphicon glyphicon-ok' title='Entro y Salio'></span><span class='glyphicon glyphicon-ok' title='Entro y Salio'></span> Entro y Salio</h4>";
}else if($status == 3){
return "<h4 class=' text-left st-blk'><span class='glyphicon glyphicon-ban-circle' title='Cancelado'></span></span> Cancelado</h4>";
}else{
return "<h4 class=' text-left st-pend'><span class='glyphicon glyphicon-asterisk' title='Sin Actividad'></span> Sin Actividad</h4>";
}
}

function formateaCant($cantidad){
if($cantidad > 0){
return '$ '.number_format($cantidad, 2);
}else{
return '$ 0.0';
}
}

function irAMsg($url, $msg, $type){
if($type == 1){
return "<script>
    if (confirm('Esta Seguro que desea ".$msg."')) {
        location.href = '".$url."';
    } else {
        return false;
    }

</script>";
}else if($type == 2){
return "onclick=\"if(confirm('Esta Seguro que desea ".$msg."')){location.href='".$url."';}else{return false;}\"";
}else{
return "if(confirm('Esta Seguro que desea ".$msg."')){location.href='".$url."';}else{return false;}";
}
}

function msgConf($msg, $type){
if($type == 1){
return "<script>
    if (confirm('Esta Seguro que desea ".$msg."')) {
        return true;;
    } else {
        return false;
    }

</script>";
}else if($type == 2){
return "onclick=\"if(confirm('Esta Seguro que desea ".$msg."')){return true;}else{return false;}\"";
}else{
return "if(confirm('Esta Seguro que desea ".$msg."')){return true;}else{return false;}";
}
}


function imprimeAlerta1($tmsj, $msj, $tipo, $icono){
return "<div class='modal fade' id='mimodal' style='color: #555;'>
    <div class='modal-dialog'>
        <div class='modal-content'>
            <div class='modal-header'>
                <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                <h4 class='modal-title'>Notificaciones del Sistema</h4>
            </div>
            <div class='modal-body '>
                <p style='font-size:15px;'><span style='color:".$tipo."' class='glyphicon ".$icono."'></span>&nbsp;".$tmsj.".</br><span style='font-size:12px; margin-left:20px'></span></p>
            </div>
            <div class='modal-footer'>
                <button type='button' class='btn btn-primary' data-dismiss='modal'>Continuar</button>
            </div>
        </div>
    </div>
</div>
<script>
    window.onload = function() {
        $('#mimodal').modal('show');
    }

</script>
";
}

function verificarVigencia($fecha, $diasPrevios){
if($fecha != ''){
$hoy = time();
$vigencia = strtotime($fecha);
return ($hoy > $vigencia ? 0 : ((($vigencia - $hoy)/86400) <= $diasPrevios ? 1 : 2)); }else{ return 2; } } function anioActual($a){ $retorno=array( 'D'=> (int)date('d'),
    'M' => (int)date('m'),
    'A' => ($a > 0 ? $a : (int)date('Y')),
    'T' => ($a > 0 ? ($a%4 == 0 ? 1 : 0) : (int)date('L'))
    );
    return $retorno;
    }

    $meses = array(
    1=>array(1, 'ENE', 'Enero'),
    array(2, 'FEB', 'Febrero'),
    array(3, 'MAR', 'Marzo'),
    array(4, 'ABR', 'Abril'),
    array(5, 'MAY', 'Mayo'),
    array(6, 'JUN', 'Junio'),
    array(7, 'JUL', 'Julio'),
    array(8, 'AGO', 'Agosto'),
    array(9, 'SEP', 'Septiembre'),
    array(10, 'OCT', 'Octubre'),
    array(11, 'NOV', 'Noviembre'),
    array(12, 'DIC', 'Diciembre')
    );

    $diass = array(
    1=>array(1, '1', '1'),
    array(2, '2', '2'),
    array(3, '3', '3'),
    array(4, '4', '4'),
    array(5, '5', '5'),
    array(6, '6', '6'),
    array(7, '7', '7'),
    array(8, '8', '8'),
    array(9, '9', '9'),
    array(10, '10', '10'),
    array(11, '11', '11'),
    array(12, '12', '12'),
    array(13, '13', '13'),
    array(14, '14', '14'),
    array(15, '15', '15'),
    array(16, '16', '16'),
    array(17, '17', '17'),
    array(18, '18', '18'),
    array(19, '19', '19'),
    array(20, '20', '20'),
    array(21, '21', '21'),
    array(22, '22', '22'),
    array(23, '23', '23'),
    array(24, '24', '24'),
    array(25, '25', '25'),
    array(26, '26', '26'),
    array(27, '27', '27'),
    array(28, '28', '28'),
    array(29, '29', '29'),
    array(30, '30', '30'),
    array(31, '31', '31')
    );

    ?>
