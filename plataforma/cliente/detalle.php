<?php @session_start(); ?>
<?php
include('controlador/ctl_detalle.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Head HTML -->
    <?php include('includes/head.php') ?>
    <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>


    <script src="https://www.gstatic.com/firebasejs/8.4.1/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.4.1/firebase-analytics.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.4.1/firebase-storage.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.4.1/firebase-messaging.js"></script>
    <script type="text/javascript">
        
    
    <?php if($_GET['id_val']!=4){ ?>
        // Your web app's Firebase configuration
        // For Firebase JS SDK v7.20.0 and later, measurementId is optional
        var firebaseConfig = {
            apiKey: "AIzaSyDBC4_QSLqM1i_FON92r77xb5TOgp6Q2Vc",
            authDomain: "valetparkinglkm-64b72.firebaseapp.com",
            projectId: "valetparkinglkm-64b72",
            storageBucket: "valetparkinglkm-64b72.appspot.com",
            messagingSenderId: "462450661269",
            appId: "1:462450661269:web:beab903f5e216e162b089c",
            measurementId: "G-CB4KL6W2DC"
        };
        // Initialize Firebase
        firebase.initializeApp(firebaseConfig);

  <?php }else if($_GET['id_val']==4){ ?>
  // Your web app's Firebase configuration
  // For Firebase JS SDK v7.20.0 and later, measurementId is optional
  var firebaseConfig = {
    apiKey: "AIzaSyBusaLRg3yviJECGXU8sTja2A89cJiyDn0",
    authDomain: "valetgrayparking-e0d83.firebaseapp.com",
    projectId: "valetgrayparking-e0d83",
    storageBucket: "valetgrayparking-e0d83.appspot.com",
    messagingSenderId: "584101804960",
    appId: "1:584101804960:web:82add801dcd0655de902c5",
    measurementId: "G-JRHZTH8RBM"
  };
  // Initialize Firebase
  firebase.initializeApp(firebaseConfig);
  <?php } ?>
    
  

const messaging = firebase.messaging();
messaging.requestPermission()
    .then(function () {
        console.log('Have a permission');
        return messaging.getToken();
    })
    .then(function (token) {
        saveToken(token);

        console.log(token);
    })
    .catch(function (err) {
        console.log('Error Ocurred');
    })

function saveToken(token) {
    // console.log(token);
    jQuery.ajax({
        data: {
            "token": token,
            "id_usuario": <?php echo $_GET['id'];?>
        },
        type: "post",
        url: "https://valet.linkom.mx/valet_archivos/token.php",
        success: function (result) {
            console.log(result)
        }
    });

}

messaging.onMessage(function (payload) {
    console.log('onMessage: ', payload);
    var title = payload.notification.title;
    var options = {
        body: payload.notification.body,
        icon: payload.notification.icon

    };
    var myNotification = new Notification(title, options);
});
    </script>



</head>

<body onload="mostrarModal()">
    <script>
        function mostrarModal() {
            $("#mostrarmodal").modal("show");

        }

    </script>
    <?php 
			include('includes/alertas.php');
		?>
    <!-- Encabezado Pagina -->
    <?php include('includes/header.php') ?>
    <!-- Container Principal -->
    <div class="container-fluid">
        <!-- Row Principal -->
        <div class="row">
            <!-- Menu -->

            <!-- EO Menu -->

            <!-- Contenido -->
            <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

                <!-- Large modal -->

                <div id="mostrarmodal" class="modal fade bd-example-modal-lg" data-backdrop="static" data-keyboard="false" tabindex=”-1″ role="dialog">



                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="container-fluid">
                                <!-- Row Principal -->
                                <div class="row">
                                    <!-- Menu -->

                                    <!-- EO Menu -->

                                    <!-- Contenido -->
                                    <div class="col-sm-12 main">
                                        <?php
                                            $valet= traeValet($_GET['id_val'] , 1);
                                            $auto= traeAuto($_GET['id'] ,$_GET['id_val'], -1);
                                            $fecha_max =date ( 'Y-m-d H:i:s' , strtotime( '+1 day ' , strtotime ( $auto['fecha_registro'] ) ));                             

                                        ?>
                                        <h3 class="page-header"> <?php echo $valet['nombre']?> >> Detalle </h3>


                                        
                                        <?php if($auto['condiciones'] ==0){ ?>
                                                
                                            
                                        <div class="row">
                                            <div class="col-sm-12 col-md-12 col-lg-12">
                                                
                                                <div class="col-xs-12">
                                                    <h4 style="color:#000000; font-weight:bold;text-align:CENTER">CLAUSULAS</h4>
                                                    <br/>
                                                    <h4 style="color:#000000; ;text-align:JUSTIFY">1.- Este boleto representa un contrato y al dejar el boleto representa la aceptación del mismo, en caso de no estar de acuerdo; favor de solicitar su vehículo </h4>
                                                    <br/>
                                                    <h4 style="color:#000000; ;text-align:JUSTIFY">2.- En caso de extravío boleto se hará entrega a quien acredite la propiedad del vehículo. Costo de boleto extraviado $100.00(cien pesos 00/100) en caso de pérdida de la llave, la empresa solo se hace responsable por la llave de su vehículo. </h4>
                                                    <br/>
                                                    <h4 style="color:#000000; ;text-align:JUSTIFY">3.- La empresa NO se hace responsable por golpes, rayones, fallas mecánicas o eléctricas del vehículo. </h4>
                                                    <br/>
                                                    <h4 style="color:#000000; ;text-align:JUSTIFY">4.- La empresa NO se hace responsable de siniestros ocasionados por la inundaciones, incendios, temblores o alborotos populares.</h4>
                                                    <br/>
                                                    <h4 style="color:#000000; ;text-align:JUSTIFY">5.- Vehículo abandonado al término del horario, la empresa dará aviso al establecimiento y se depositará en el estacionamiento más cercano; siendo costo y riesgo del consumidor, NO de la empresa.</h4>
                                                    <br/>
                                                    <h4 style="color:#000000; ;text-align:JUSTIFY">6.- El empleado de la empresa hará la anotación del presente y para el caso del extravío de cualquiera de los objetos descritos en un manifiesto la empresa responderá con la cantidad de $500; La empresa NO se hace responsable de artículos NO manifestados.</h4> 
                                                    <br/>
                                                    <h4 style="color:#000000; ;text-align:JUSTIFY">7.- Nuestra póliza de seguros solo responde en caso de robo o pérdida total a vehículos que cuenten con seguro.</h4>
                                                    <br/>
                                                    <h4 style="color:#000000; ;text-align:JUSTIFY">8.- En caso de algún percance o golpe con el vehículo señalad en este boleto, la reparación de tal será en talleres de la empresa en un tiempo de 10 a 15 días hábiles a partir del siniestro, si el usuario procediera de manera indiferente sin causa justificada será baja costo y riesgo. El usuario del servicio asume por cuenta propia los gatos que se generen con motivo de traslados y demás accesorios durante el tiempo que permanezca el vehículo en reparación.</h4> 
                                                    <br/>
                                                    <h4 style="color:#000000;text-align:JUSTIFY">9.- El prestador del servicio se deslinda de cualquier responsabilidad penal, civil, laboral de cualquier otra índole cuando el vehículo sea irregular o sea reportado como robado.</h4> 
                                                    <br/>
                                                    <h4 style="color:#000000;text-align:JUSTIFY">10.- Una vez entregado el vehículo no se acepta reclamación alguna por algún daño o perdida.</h4>
                                                    <br/>
                                                
                                                <div class="col-xs-6">

                                                   <button type="button" class="btn btn-danger " title="Declinar" <?php echo irA('controlador/ctl_detalle.php?m=3&id_val='.$_GET['id_val'].'&id='.$_GET['id'].'&condi=1', 2); ?>> <span class="glyphicon glyphicon-remove"></span> Declinar</button>
                                                </div>
                                                <div class="col-xs-6">
                                                   <button type="button" class="btn btn-success " title="Aceptar" <?php echo irA('controlador/ctl_detalle.php?m=3&id_val='.$_GET['id_val'].'&id='.$_GET['id'].'&condi=2', 2); ?>> <span class="glyphicon glyphicon-ok"></span> Aceptar</button>
                                                </div>

                                                </div>
                                            </div>
                                            <br/>
                                            
                                            <?php }if($auto['condiciones']==1){ ?>
                                                <div class="col-sm-12 col-md-6 col-lg-6">
                                                    <div class="col-xs-12">
                                                        <h4 style="color:#418bca; font-weight:bold;text-align:CENTER">COMUNICATE CON EL VALET</h4>
                                                    </div>
                                                </div>
                                           <? }else if($auto['condiciones']==2){
                                            if($auto['estatus']<=4 and date('Y-m-d H:i:s')<$fecha_max and $auto['comentarios_cliente']== ''){ ?>

                                            <div class="col-sm-12 col-md-6 col-lg-6">
                                                <div class="col-xs-12">
                                                    <h4 style="color:#418bca; font-weight:bold;text-align:CENTER">DATOS AUTO</h4>
                                                </div>
                                                <div class="row">
                                                    <div class="col-xs-3 text-right">
                                                        <div class="form-group">
                                                            <label for="titulo">Placa: </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-9 text-left">
                                                        <div class="form-group">
                                                            <?php echo $auto['placas']; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-xs-3 text-right">
                                                        <div class="form-group">
                                                            <label for="titulo">Descrip.: </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-9 text-left">
                                                        <div class="form-group">
                                                            <?php echo $auto['descripcion']; ?>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-xs-3 text-right">
                                                        <div class="form-group">
                                                            <label for="titulo">Fecha: </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-9 text-left">
                                                        <div class="form-group">
                                                            <?php echo date('d-m-Y',strtotime($auto['fecha_registro'])); ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">

                                                    <div class="col-xs-3 text-right">
                                                        <div class="form-group">
                                                            <label for="titulo">Hora: </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-9 text-left">
                                                        <div class="form-group">

                                                            <?php echo date('H:i',strtotime($auto['fecha_registro'])); ?>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-xs-8">
                                                        <?php if($auto['foto1']==""){}else{ ?>
                                                        <div id="capa"></div>
                                                        <br>
                                                        <?php } ?>
                                                    </div>
                                                    <div class="col-xs-8">
                                                        <?php if($auto['foto2']==""){}else{ ?>
                                                        <div id="capa2"></div>
                                                        <br>
                                                        <?php } ?>
                                                    </div>
                                                    <div class="col-xs-8">
                                                        <?php if($auto['foto3']==""){}else{ ?>
                                                        <div id="capa3"></div>
                                                        <br>
                                                        <?php } ?>
                                                    </div>
                                                </div>



                                                <script>
                                                    var storageRef = firebase.storage().ref();

                                                    storageRef.child('auto/<?php echo $auto['foto1'] ?>').getDownloadURL().then(function(url) {

                                                        var imagen = document.createElement("img");
                                                        imagen.setAttribute("whit", "auto");
                                                        imagen.setAttribute("height", 150);
                                                        imagen.setAttribute("src", url);

                                                        var div = document.getElementById("capa");
                                                        div.appendChild(imagen);

                                                    }).catch(function(error) {});

                                                    var storageRef2 = firebase.storage().ref();

                                                    storageRef2.child('auto/<?php echo $auto['foto2'] ?>').getDownloadURL().then(function(url) {

                                                        var imagen = document.createElement("img");
                                                        imagen.setAttribute("whit", "auto");
                                                        imagen.setAttribute("height", 150);
                                                        imagen.setAttribute("src", url);

                                                        var div = document.getElementById("capa2");
                                                        div.appendChild(imagen);

                                                    }).catch(function(error) {});

                                                    var storageRef3 = firebase.storage().ref();

                                                    storageRef3.child('auto/<?php echo $auto['foto3'] ?>').getDownloadURL().then(function(url) {

                                                        var imagen = document.createElement("img");
                                                        imagen.setAttribute("whit", "auto");
                                                        imagen.setAttribute("height", 150);
                                                        imagen.setAttribute("src", url);

                                                        var div = document.getElementById("capa3");
                                                        div.appendChild(imagen);

                                                    }).catch(function(error) {});

                                                </script>


                                                <!--
                                                <?php if($auto['estatus']>1){ ?>
                                                <div class="col-xs-12">
                                                    <h4 style="color:#418bca; font-weight:bold;text-align:CENTER">DATOS UBICACI&Oacute;N</h4>
                                                </div>
                                                <div class="row">
                                                    <div class="col-xs-3 text-right">
                                                        <div class="form-group">
                                                            <label for="titulo">Ubicaci&oacute;n: </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-9 text-left">
                                                        <div class="form-group">
                                                            <?php echo $auto['latitud'].'<br>'.$auto['longitud']; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-xs-3 text-right">
                                                        <div class="form-group">
                                                            <label for="titulo">Comen.: </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-9 text-left">
                                                        <div class="form-group">
                                                            <?php echo $auto['comentarios']; ?>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-xs-3 text-right">
                                                        <div class="form-group">
                                                            <label for="titulo">Fecha: </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-9 text-left">
                                                        <div class="form-group">
                                                            <?php echo date('d-m-Y',strtotime($auto['fecha_ubicacion'])); ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">

                                                    <div class="col-xs-3 text-right">
                                                        <div class="form-group">
                                                            <label for="titulo">Hora: </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-9 text-left">
                                                        <div class="form-group">
                                                            <?php echo date('H:i',strtotime($auto['fecha_ubicacion'])); ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php } ?>
-->

                                                <?php if($auto['estatus']==2){ ?>
                                                <button type="button" class="btn btn-success pull-right" title="Pedir Auto" <?php echo irAMsg('controlador/ctl_detalle.php?m=1&id_val='.$_GET['id_val'].'&id='.$_GET['id'], 'Pedir el auto?', 2); ?>> <span class="glyphicon glyphicon-ok"></span> Solicitar Auto ?</button>
                                                <?php } ?>

                                                <?php if($auto['estatus']>2){ ?>
                                                <div class="col-xs-12">
                                                    <h4 style="color:#418bca; font-weight:bold;text-align:CENTER">SOLICITUD DE AUTO</h4>
                                                </div>

                                                <div class="row">
                                                    <div class="col-xs-3 text-right">
                                                        <div class="form-group">
                                                            <label for="titulo">Fecha: </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-9 text-left">
                                                        <div class="form-group">
                                                            <?php echo date('d-m-Y',strtotime($auto['fecha_pedir'])); ?>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="row">

                                                    <div class="col-xs-3 text-right">
                                                        <div class="form-group">
                                                            <label for="titulo">Hora: </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-9 text-left">
                                                        <div class="form-group">
                                                            <?php echo date('H:i',strtotime($auto['fecha_pedir'])); ?>
                                                        </div>
                                                    </div>
                                                </div>

                                                <?php if($auto['fecha_notificado']== '0000-00-00 00:00:00'){ ?>
                                                <?php }else if($auto['fecha_notificado']!= '0000-00-00 00:00:00' and $auto['estatus']=='3'){ ?>
                                                <div class="col-xs-12">
                                                    <h4 style="color:#D82C2C; font-weight:bold;text-align:CENTER">TÚ AUTO LLEGA DE 3 A 5 MIN</h4>
                                                </div>
                                                <br />
                                                <?php }else if($auto['fecha_notificado']!= '0000-00-00 00:00:00' and $auto['estatus']=='4'){
    
                                                    }
                                                                            }
                                                    ?>

                                                <?php if($auto['estatus']>3){ ?>

                                                <div class="col-xs-12">
                                                    <h4 style="color:#418bca; font-weight:bold;text-align:CENTER">DATOS ENTREGA</h4>
                                                </div>

                                                <div class="col-xs-12">
                                                    <h4 style="color:#65A82D; font-weight:bold;text-align:CENTER">TÚ AUTO HA SIDO ENTREGADO</h4>
                                                </div>
                                                <br />
                                                <br />
                                                <br />
                                                <br />

                                                <div class="row">
                                                    <div class="col-xs-3 text-right">
                                                        <div class="form-group">
                                                            <label for="titulo">Fecha: </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-9 text-left">
                                                        <div class="form-group">
                                                            <?php echo date('d-m-Y',strtotime($auto['fecha_entregado'])); ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">

                                                    <div class="col-xs-3 text-right">
                                                        <div class="form-group">
                                                            <label for="titulo">Hora: </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-9 text-left">
                                                        <div class="form-group">
                                                            <?php echo date('H:i',strtotime($auto['fecha_entregado'])); ?>
                                                        </div>
                                                    </div>
                                                </div>

                                                <?php if($auto['comentarios_cliente']== '' and $auto['estatus']==4){ ?>

                                                <form role="form" method="post" action="controlador/ctl_detalle.php?m=2&id_val=<?php echo $_GET['id_val'].'&id='.$_GET['id']; ?>" name="aviso">
                                                    <div class="form-group">
                                                        <label class="pull-left" for="avisoImportante">Su opinión es importante (Observaciones):</label>
                                                        <textarea class="form-control no-rez" rows="3" id="comentarios" name="comentarios"></textarea>
                                                    </div>
                                                    <button type="submit" class="btn btn-primary pull-right">Registrar Comentario</button>
                                                </form>
                                                <?php }if($auto['comentarios_cliente']!= ''){ ?>
                                                <div class="row">
                                                    <div class="col-xs-3 text-right">
                                                        <div class="form-group">
                                                            <label for="titulo">Comen.: </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-9 text-left">
                                                        <div class="form-group">
                                                            <?php echo $auto['comentarios_cliente']; ?>
                                                        </div>
                                                    </div>
                                                </div>

                                                <?php } }
                                                    }else if($auto['estatus']==4 and $fecha_max>=date('Y-m-d H:i:s') and $auto['comentarios_cliente']== '' ){?>

                                                <div class="col-xs-12">
                                                    <h4 style="color:#418bca; font-weight:bold;text-align:CENTER">GRACIAS POR VENIR A VALET <br><br><?php echo strtoupper($valet['nombre'])?> </h4>
                                                </div>
                                                <?php }else if($auto['estatus']==4 and $auto['comentarios_cliente']!= ''){ ?>
                                                <div class="col-xs-12">
                                                    <h4 style="color:#418bca; font-weight:bold;text-align:CENTER">GRACIAS POR VENIR A VALET <br><br><?php echo strtoupper($valet['nombre'])?> </h4>
                                                </div>
                                                <?php } }?>




                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>




            </div>

        </div>
        <!-- EO Contenido -->
    </div>
    <!-- EO Row Principal -->
    <!-- Container Principal -->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

</body>

</html>
