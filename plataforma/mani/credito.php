<?php @session_start(); ?>
<?php
include('controlador/ctl_creditos.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Head HTML -->
    <?php include('includes/head.php') ?>
    <?php include('includes/oldspice.php') ?>
    <script src="https://code.jquery.com/jquery-2.1.4.js"></script>
    <script>
        function verificar() {
            if (document.getElementById("usuario").value != '') {
                $.ajax({
                    type: "GET",
                    cache: false,
                    url: "controlador/valida.php",
                    data: "me=1&uname=" + document.getElementById("usuario").value + "&resi=0",
                    success: function(msg) {
                        $("#valUsu").html(msg);
                    }
                });
            }
        }

    </script>
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
            <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                <?php 
			include('includes/alertas.php');
		?>
                <?php if(isset($_GET['edit']) && isset($_GET['id'])){
        				if($_GET['edit'] == 1 && $_GET['id'] > 0){
        				   $admin = traeUsuarios($_GET['id'], 1);
										if(sizeof($admin)>0){

                                            

        						?>

                <h3 class="page-header"> Datos >> <a href="creditos.php?esta=1"> Creditos </a> </h3>

                <h2 class="sub-header">Modificar Credito</h2>
                <div class="row">
                    <div class="col-sm-12 col-md-6 col-lg-6">
                        <br>
                        <form role="form" name="nvoproducto" method="post" enctype="multipart/form-data" action="controlador/ctl_creditos.php?m=2&id=<?php echo $admin['id']; ?>">
                            <section id="section-1" class="content-current">
                                <h4 style="color:#418bca; font-weight:bold;text-align:center">DATOS PERSONALES</h4>
                                <br>
                                <div class="fo-top">
                                    <div class="form-group">
                                        <label for="focusedinput">Nombre</label>
                                        <input type="text" class="form-control" name="nombre" placeholder="Nombre" required="required" value="<?php echo $admin['nombre'];?>">

                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                                <div class="fo-top">

                                    <label for="focusedinput">Precio</label>
                                    <input type="text" class="form-control" name="costo" placeholder="Precio" required="required" value="<?php echo $admin['costo'];?>">

                                    <div class="clearfix"></div>
                                </div>
                                <br>
                                <div class="fo-top">
                                    <div class="form-group">
                                        <label for="focusedinput">Servicios</label>

                                        <input type="text" class="form-control" name="servicios" placeholder="Servicios" required="required" value="<?php echo $admin['servicios'];?>">
                                        <div class="clearfix"></div>
                                    </div>
                                </div>

                                <div class="fo-top">
                                    <div class="form-group">
                                        <label for="focusedinput">Aviso</label>
                                        <input type="text" class="form-control" name="aviso" placeholder="Aviso" required="required"  value="<?php echo $admin['aviso'];?>">
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                                <div class="fo-top">
                                    <div class="form-group">
                                        <label for="focusedinput">Cancelaciones</label>
                                        <input type="mail" class="form-control" name="cancelaciones" placeholder="Cancelaciones" required="required" value="<?php echo $admin['cancelaciones'];?>">
                                        <div class="clearfix"></div>
                                    </div>
                                </div>

                              




                                <button type="submit" class="btn btn-primary pull-right" title="Registrar usuario">Guardar</button>
                            </section>

                            </form>

                            <?php
        		}		
        	}
        		
        ?>
                </div>
                <?php }else{ 
        ?>

                <h3 class="page-header"> Datos >> <a href="creditos.php?esta=1"> Creditos</a> </h3>


                <?php 
			include('includes/alertas.php');
		?>
                <h2 class="sub-header">Registrar Creditos</h2>
                <div class="row">
                    <div class="col-sm-12 col-md-6 col-lg-6">
                        <br>

                        <form role="form" name="nvoproducto" method="post" enctype="multipart/form-data" action="controlador/ctl_creditos.php?m=1">
                            <section id="section-1" class="content-current">
                                <h4 style="color:#418bca; font-weight:bold;text-align:center">DATOS CREDITO</h4>
                                <br>
                                <div class="fo-top">
                                        <div class="form-group">
                                            <label for="focusedinput">Nombre</label>
                                            <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre" required="required">
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                    <div class="fo-top">
                                        <div class="form-group">
                                            <label for="focusedinput">Costo</label>
                                            <input type="text" class="form-control" name="costo" id="costo" placeholder="Costo" required="required">
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>

                                   
                                    <div class=" fo-top">
                                        <div class="form-group">
                                            <label for="focusedinput"> Servicios</label>
                                            <input type="text" class="form-control" name="servicios" id="servicios" placeholder="Servicios" onFocus="geolocate()">
                                        </div>
                                    </div>
                                    
                                    <div class="fo-top">
                                        <div class="form-group">

                                            <label for="focusedinput">Avisos</label>
                                            <input type="text" class="form-control" name="aviso" id="aviso"  placeholder="Avisos" required="required">

                                            <div class="clearfix"></div>
                                        </div>
                                    </div>

                                    <div class="fo-top">
                                        <div class="form-group">

                                            <label for="focusedinput">Cancelaciones</label>
                                            <input type="text" class="form-control" name="cancelaciones" id="cancelaciones" placeholder="Cancelaciones" required="required">

                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                    <br>
                                <br>

                                <button type="submit" class="btn btn-primary pull-right" title="Registrar usuario">Registrar</button>
                            </section>
                        </form>
                    </div>

                </div>
            </div>
            <?php	
        } ?>
        </div>
        <!-- EO Contenido -->
    </div>
    <!-- EO Row Principal -->
    <!-- Container Principal -->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <?php include('includes/jsfiles.php') ?>
    <?php include_once('includes/jsscripts.php'); ?>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places&key=AIzaSyBzwyxjKlYJnnIlkML4bfsDmuQId-zP4oI"></script>
    <script src="includes/script.js"> </script>

</body>

</html>
