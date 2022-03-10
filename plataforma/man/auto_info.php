<?php session_start(); ?>
<?php
include('controlador/ctl_reportes.php');
?>
<!DOCTYPE html>
<html lang="en">
<meta http-equiv="refresh" content="7" >
<head>
    <!-- Head HTML -->
    <?php include('includes/head.php');
	include('includes/oldspice.php'); ?>
    <script src="http://code.jquery.com/jquery-2.1.4.js"></script>
    <script src="https://www.gstatic.com/firebasejs/7.2.1/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/7.2.1/firebase-storage.js"></script>


    <?php if($_GET['idvalet']!=4){ ?>
    <script>
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
        firebase.analytics();

    </script>
  <?php }else if($_GET['idvalet']==4){ ?>
    <script>
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
  firebase.analytics();
</script>
  <?php } ?>


</head>

<body>
    <!-- Encabezado Pagina -->
    <?php include('includes/header.php') ?>
    <!-- Container Principal -->
    <div class="container-fluid">
        <!-- Row Principal -->
        <div class="row">
            <!-- Menu -->
            <div class="col-sm-3 col-md-2 sidebar">
                <?php include('includes/menu.php') ?>
            </div>
            <!-- EO Menu -->

            <!-- Contenido -->
            <div class="col-sm-12 col-sm-offset-3 col-md-10 col-md-offset-2 main">

                <?php if(isset($_GET['edit']) && isset($_GET['id'])){
        								if($_GET['edit'] == 1 && $_GET['id'] > 0){

        ?>
                <?php
                $usu= traerAuto($_GET['id'],$_GET['idvalet'], -1); 
                        if(sizeof($usu) > 0){
			
		?>
                <h3 class="page-header">Datos >> <a href="reportes.php?esta=1">Reporte del D&iacute;a</a> </h3>


                <h2 class="sub-header"><?php echo 'Placas: '.$usu['placas']; ?></h2>


                <div class="row">
                    <div class="col-sm-12 col-md-6 col-lg-6">
                        <h4 style="color:#418bca; font-weight:bold;text-align:left">DATOS AUTO</h4>

                        <div class="row">
                            <div class="col-xs-3 text-right">
                                <div class="form-group">
                                    <label for="titulo">Descripci&oacute;n: </label>
                                </div>
                            </div>
                            <div class="col-xs-9 text-left">
                                <div class="form-group">
                                    <?php echo $usu['descripcion']; ?>
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
                                    <?php echo date('d-m-Y',strtotime($usu['fecha_registro'])); ?>
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
                                    <?php echo date('H:i',strtotime($usu['fecha_registro'])); ?>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-xs-12">
                                <?php if($usu['foto1']==""){}else{ ?>
                                <div id="capa"></div>
                                <br>
                                <?php } ?>
                            </div>
                            <div class="col-xs-12">
                                <?php if($usu['foto2']==""){}else{ ?>
                                <div id="capa2"></div>
                                <br>
                                <?php } ?>
                            </div>
                            <div class="col-xs-12">
                                <?php if($usu['foto3']==""){}else{ ?>
                                <div id="capa3"></div>
                                <br>
                                <?php } ?>
                            </div>
                        </div>



                        <script>
                            var storageRef = firebase.storage().ref();

                            storageRef.child('auto/<?php echo $usu['foto1'] ?>').getDownloadURL().then(function(url) {

                                var imagen = document.createElement("img");
                                imagen.setAttribute("whit", "auto");
                                imagen.setAttribute("height", 200);
                                imagen.setAttribute("src", url);

                                var div = document.getElementById("capa");
                                div.appendChild(imagen);

                            }).catch(function(error) {});

                            var storageRef2 = firebase.storage().ref();

                            storageRef2.child('auto/<?php echo $usu['foto2'] ?>').getDownloadURL().then(function(url) {

                                var imagen = document.createElement("img");
                                imagen.setAttribute("whit", "auto");
                                imagen.setAttribute("height", 200);
                                imagen.setAttribute("src", url);

                                var div = document.getElementById("capa2");
                                div.appendChild(imagen);

                            }).catch(function(error) {});

                            var storageRef3 = firebase.storage().ref();

                            storageRef3.child('auto/<?php echo $usu['foto3'] ?>').getDownloadURL().then(function(url) {

                                var imagen = document.createElement("img");
                                imagen.setAttribute("whit", "auto");
                                imagen.setAttribute("height", 200);
                                imagen.setAttribute("src", url);

                                var div = document.getElementById("capa3");
                                div.appendChild(imagen);

                            }).catch(function(error) {});

                        </script>

                        <?php if($usu['estatus']>1){ ?>
                        <h4 style="color:#418bca; font-weight:bold;text-align:left">DATOS UBICACI&Oacute;N</h4>



                        <div class="row">
                            <div class="col-xs-3 text-right">
                                <div class="form-group">
                                    <label for="titulo">Ubicaci&oacute;n: </label>
                                </div>
                            </div>
                            <div class="col-xs-9 text-left">
                                <div class="form-group">
                                    <?php echo $usu['latitud'].','.$usu['longitud']; ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-3 text-right">
                                <div class="form-group">
                                    <label for="titulo">Comentarios: </label>
                                </div>
                            </div>
                            <div class="col-xs-9 text-left">
                                <div class="form-group">
                                    <?php echo $usu['comentarios']; ?>
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
                                    <?php echo date('d-m-Y',strtotime($usu['fecha_ubicacion'])); ?>
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
                                    <?php echo date('H:i',strtotime($usu['fecha_ubicacion'])); ?>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                        <?php if($usu['estatus']>2){ ?>

                        <h4 style="color:#418bca; font-weight:bold;text-align:left">DATOS PEDIR</h4>
                        <div class="row">
                            <div class="col-xs-3 text-right">
                                <div class="form-group">
                                    <label for="titulo">Fecha: </label>
                                </div>
                            </div>
                            <div class="col-xs-9 text-left">
                                <div class="form-group">
                                    <?php echo date('d-m-Y',strtotime($usu['fecha_pedir'])); ?>
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
                                    <?php echo date('H:i',strtotime($usu['fecha_pedir'])); ?>
                                </div>
                            </div>
                        </div>

                        <?php if($usu['comentarios_cliente']== '' and $usu['estatus']==3){ 
                                } else if($usu['estatus']>2){ 
                                    if($usu['comentarios_cliente']== ''){
                                     }else{
                        ?>


                        <div class="row">
                            <div class="col-xs-3 text-right">
                                <div class="form-group">
                                    <label for="titulo">Comentarios: </label>
                                </div>
                            </div>
                            <div class="col-xs-9 text-left">
                                <div class="form-group">
                                    <?php echo $usu['comentarios_cliente']; ?>
                                </div>
                            </div>
                        </div>

                        <?php }
                            } ?>
                        <?php if($usu['fecha_notificado']== '0000-00-00 00:00:00'){ }else{?>

                        <div class="row">
                            <div class="col-xs-3 text-right">
                                <div class="form-group">
                                    <label for="titulo">Fecha Noti.: </label>
                                </div>
                            </div>
                            <div class="col-xs-9 text-left">
                                <div class="form-group">
                                    <?php echo date('d-m-Y',strtotime($usu['fecha_notificado'])); ?>
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
                                    <?php echo date('H:i',strtotime($usu['fecha_notificado'])); ?>
                                </div>
                            </div>
                        </div>
                        <?php } }?>

                        <?php if($usu['estatus']>3){ ?>

                        <h4 style="color:#418bca; font-weight:bold;text-align:left">DATOS ENTREGA</h4>


                        <div class="row">
                            <div class="col-xs-3 text-right">
                                <div class="form-group">
                                    <label for="titulo">Fecha: </label>
                                </div>
                            </div>
                            <div class="col-xs-9 text-left">
                                <div class="form-group">
                                    <?php echo date('d-m-Y',strtotime($usu['fecha_entregado'])); ?>
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
                                    <?php echo date('H:i',strtotime($usu['fecha_entregado'])); ?>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-3 text-right">
                                <div class="form-group">
                                    <label for="titulo">Comentarios: </label>
                                </div>
                            </div>
                            <div class="col-xs-9 text-left">
                                <div class="form-group">
                                    <?php echo $usu['comentarios_entregado']; ?>
                                </div>
                            </div>
                        </div>

                        <?php } ?>
                    </div>
                </div>


                <?php	
                    }                      
                } } 
                ?>
            </div>
            <!-- EO Contenido -->
        </div>
    </div>
    <!-- EO Row Principal -->
    <!-- Container Principal -->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <?php include('includes/jsfiles.php') ?>
</body>

</html>
