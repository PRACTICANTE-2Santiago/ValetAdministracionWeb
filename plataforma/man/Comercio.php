<?php @session_start(); ?>
<?php
include('controlador/ctl_comercios.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Head HTML -->
    <?php include('includes/head.php') ?>
    <script src="https://code.jquery.com/jquery-2.1.4.js"></script>
    <script>
        function verificar() {
            if (document.getElementById("usuario").value != '') {
                $.ajax({
                    type: "GET",
                    cache: false,
                    url: "controlador/valida.php",
                    data: "me=1&uname=" + document.getElementById("usuario").value + "&idvalet=<?php echo $_SESSION['idvalet']?>",
                    success: function(msg) {
                        $("#valUsu").html(msg);
                    }
                });
            }
        }

    </script>

    <script>
        function verificar_correo() {
            if (document.getElementById("correo").value != '') {
                $.ajax({
                    type: "GET",
                    cache: false,
                    url: "controlador/valida_correo.php",
                    data: "me=1&uname=" + document.getElementById("correo").value + "&idvalet=<?php echo $_SESSION['idvalet']?>",
                    success: function(msg) {
                        $("#valCorreo").html(msg);
                    }
                });
            }
        }

    </script>
</head>

<body>
    <?php 
			include('includes/alertas2.php');
		?>
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

                <?php if(isset($_GET['edit']) && isset($_GET['id'])){
        								if($_GET['edit'] == 1 && $_GET['id'] > 0){
        								$admin = traeComercios($_GET['id'] ,0, '', -1);

										if(sizeof($admin)>0){

                                            

        						?>

                <h3 class="page-header"> Datos >> <a href="Comercios.php"> Comercios </a> </h3>

                <h2 class="sub-header">Modificar Comercio</h2>
                <div class="row">
                    <div class="col-sm-12 col-md-6 col-lg-6">
                        <br>
                        <form role="form" name="nvoproducto" method="post" enctype="multipart/form-data" action="controlador/ctl_comercios.php?m=2&id=<?php echo $admin['id']; ?>">
                            <section id="section-1" class="content-current">
                                <h4 style="color:#418bca; font-weight:bold;text-align:center">DATOS PERSONALES</h4>
                                <br>

                                <div class="col-sm-4">
                                    <div class="fo-top">
                                        <div class="form-group">
                                            <label for="focusedinput">Nombre</label>

                                            <input type="text" class="form-control" name="nombre" placeholder="Nombre" value="<?php echo $admin['nombre'];?>" required="required">

                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </div>

                              
                                <br>
                                <br>
                                <br>
                                <br>

                                <div style="border-style: dotted; border-color: #418bca;"> </div>
                                <br>



                                       <div class="fo-top">
                                        <div class="form-group">
                                            <label for="focusedinput">Logotipo</label>
                                            <input type="file" class="upload"  />
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>

                                <br>
                                <div style="border-style: dotted; border-color: #418bca;"> </div>
                                <br>
                                <div class="fo-top">
                                    <div class="form-group">
                                        <label for="focusedinput">Calle</label>

                                        <input type="text" class="form-control" name="calle" id="route" placeholder="Calle" required="required" value="<?php echo $admin['calle'];?>">

                                        <div class="clearfix"></div>
                                    </div>
                                </div>

                                
                                <div class="fo-top">
                                    <div class="form-group">

                                        <label for="focusedinput">C.P</label>

                                        <input type="text" class="form-control" name="codigo" id="postal_code" placeholder="C&oacute;digo Postal" value="<?php echo $admin['codigo_postal'];?>" required="required" minlength="5" maxlength="5">
                                        <div class="clearfix"></div>
                                    </div>
                                </div>

                                <div class="fo-top">
                                    <div class="form-group">
                                        <label for="focusedinput">Tel&eacute;fono</label>
                                        <input type="text" class="form-control" id="telefono" name="telefono" minlength="10" maxlength="10" placeholder="4428528766" value="<?php echo $admin['telefono'];?>" required="required">
                                        <div class="clearfix"></div>
                                    </div>
                                </div>

                                <div class="fo-top">
                                    <div id='valCorreo'>
                                        <div class="form-group">
                                            <label for="focusedinput">Correo Electr&oacute;nico</label>
                                            <input type="mail" class="form-control" onchange="verificar_correo();" id="correo" name="correo" placeholder="Correo Electr&oacute;nico" value="<?php echo $admin['correo_electronico'];?>" required="required">
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </div>

                                <br>

                             <div class="fo-top">
                             <div class="form-group">
                             <label for="focusedinput">Representante</label>

                             <input type="text" class="form-control" name="representante" id="route" placeholder="Representante" required="required">

                             <div class="clearfix"></div>
                             </div>
                             </div>


                             <br>

<div class="fo-top">
<div class="form-group">
<label for="focusedinput">Tarifa</label>

<input type="text" class="form-control" name="tarifa" id="route" placeholder="Tarifa" required="required">

<div class="clearfix"></div>
</div>
</div>


                             

                                <br>
                                <!--<h4 style="color:#418bca; font-weight:bold;text-align:center">DATOS DE SISTEMA</h4>
                                <br>
                                <div class="fo-top">
                                    <div id='valUsu'>
                                        <div class="form-group">
                                            <label for="focusedinput">Usuario</label>
                                            <input type="text" onchange="verificar();" class="form-control" id="usuario" name="usuario" placeholder="Usuario" required="required" value="<?php echo $admin['usuario'];?>">
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="fo-top">
                                    <div class="form-group">
                                        <label for="focusedinput">Contrase&ntilde;a</label>
                                        <input type="text" class="form-control" name="contrasena" placeholder="Contrase&ntilde;a" required="required" minlength="6" value="<?php echo $admin['contrasena'];?>">
                                        <div class="clearfix"></div>
                                    </div>
                                </div>-->
                                <br>




                             <button type="submit" class="btn btn-primary pull-right" title="Registrar usuario">Guardar</button>

                             <input type="button" class="btn btn-danger" value="Cancelar" onClick="history.go(-1);">

                            </section>


                        </form>
                    </div>
                    <?php
        		}		
        	}
        		
        ?>
                </div>
                <?php }else{ 
        ?>

                <h3 class="page-header"> Datos >> <a href="Comercios.php"> Comercios</a> </h3>



                <h2 class="sub-header">Registrar Comercio</h2>
                <div class="row">
                    <div class="col-sm-12 col-md-6 col-lg-6">
                        <br>

                        <form role="form" name="nvoproducto" method="post" enctype="multipart/form-data" action="controlador/ctl_comercios.php?m=1<?php echo '&idvalet='.$_SESSION['idvalet'].'&tipo='.$_SESSION['idtipo']; ?>">
                            <section id="section-1" class="content-current">
                                <h4 style="color:#418bca; font-weight:bold;text-align:center">DATOS PERSONALES</h4>
                                <br>
                                <div class="col-sm-4">
                                    <div class="fo-top">
                                        <div class="form-group">
                                            <label for="focusedinput">Nombre</label>

                                            <input type="text" class="form-control" name="nombre" placeholder="Nombre" required="required">

                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </div>

                              

                                <br>
                                <br>
                                <br>
                                <br>

                                <div style="border-style: dotted; border-color: #418bca;"> </div>
                                <br>



                                        <div class="fo-top">
                                        <div class="form-group">
                                            <label for="focusedinput">Logotipo</label>
                                            <input type="file" class="upload"  />
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>

                                    <br>
                                <div style="border-style: dotted; border-color: #418bca;"> </div>
                                <br>
                                <div class="fo-top">
                                    <div class="form-group">
                                        <label for="focusedinput">Calle</label>

                                        <input type="text" class="form-control" name="calle" id="route" placeholder="Calle" required="required">

                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                                
                                <div class="fo-top">
                                    <div class="form-group">

                                        <label for="focusedinput">C.P</label>

                                        <input type="text" class="form-control" name="codigo" id="postal_code" placeholder="C&oacute;digo Postal" required="required" minlength="5" maxlength="5">
                                        <div class="clearfix"></div>

                                    </div>
                                </div>
                                <div class="fo-top">
                                    <div class="form-group">
                                        <label for="focusedinput">Tel&eacute;fono</label>
                                        <input type="text" class="form-control" id="telefono" name="telefono" minlength="10" maxlength="10" placeholder="4428528766" required="required">
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                                <div class="fo-top">
                                    <div id='valCorreo'>
                                        <div class="form-group">
                                            <label for="focusedinput">Correo Electr&oacute;nico</label>
                                            <input type="mail" class="form-control" onchange="verificar_correo();" id="correo" name="correo" placeholder="Correo Electr&oacute;nico" required="required">
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </div>

                                 <br>

                                 <div class="fo-top">
                                    <div class="form-group">
                                        <label for="focusedinput">Representante</label>

                                        <input type="text" class="form-control" name="representante" id="route" placeholder="Representante" required="required">

                                        <div class="clearfix"></div>
                                    </div>
                                </div>


                                <br>

<div class="fo-top">
<div class="form-group">
<label for="focusedinput">Tarifa</label>

<input type="text" class="form-control" name="tarifa" id="route" placeholder="Tarifa" required="required">

<div class="clearfix"></div>
</div>
</div>

                                
                                <!--<h4 style="color:#418bca; font-weight:bold;text-align:center">DATOS DE SISTEMA</h4>
                                <br>
                                <div class="fo-top">
                                    <div id='valUsu'>
                                        <div class="form-group">
                                            <label for="focusedinput">Usuario</label>
                                            <input type="text" onchange="verificar();" class="form-control" id="usuario" name="usuario" placeholder="Usuario" required="required">
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="fo-top">
                                    <div class="form-group">
                                        <label for="focusedinput">Contrase&ntilde;a</label>
                                        <input type="text" class="form-control" id="contrasena" name="contrasena" placeholder="Contrase&ntilde;a" required="required" minlength="6">
                                        <div class="clearfix"></div>
                                    </div>
                                </div>-->
                                <br>

                               
                               
                               
                                <button type="submit" class="btn btn-primary pull-right" title="Registrar usuario">Registrar</button>
                           
                                <input type="button" class="btn btn-danger" value="Cancelar" onClick="history.go(-1);">
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
