<?php @session_start(); ?>
<?php
include('controlador/ctl_usuarios.php');
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
        								$admin = traeUsuarios($_GET['id'] ,0, '', -1);

										if(sizeof($admin)>0){

                                            

        						?>

                <h3 class="page-header"> Datos >> <a href="valetes.php?esta=1"> Usuarios </a> </h3>

                <h2 class="sub-header">Modificar Usuario</h2>
                <div class="row">
                    <div class="col-sm-12 col-md-6 col-lg-6">
                        <br>
                        <form role="form" name="nvoproducto" method="post" enctype="multipart/form-data" action="controlador/ctl_usuarios.php?m=2&id=<?php echo $admin['id']; ?>">
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

                                <div class="col-sm-4">
                                    <div class="fo-top">
                                        <div class="form-group">
                                            <label for="focusedinput">Apellido Paterno</label>

                                            <input type="text" class="form-control" name="apellido_paterno" placeholder="Apellido Paterno" value="<?php echo $admin['apellido_paterno'];?>" required="required">

                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="fo-top">
                                        <div class="form-group">
                                            <label for="focusedinput">Apellido Materno</label>

                                            <input type="text" class="form-control" name="apellido_materno" placeholder="Apellido Msaterno" value="<?php echo $admin['apellido_materno'];?>" required="required">

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
                                <div class=" fo-top">
                                    <div class="form-group">
                                        <label for="focusedinput"> Busca tu direcci&oacute;n</label>
                                        <input type="text" class="form-control" id="autocomplete" placeholder="Ingrese su direcci??n" onFocus="geolocate()">
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

                                        <div class="col-sm-6 ctl">
                                            <label for="focusedinput">No. Ext.</label>

                                            <input type="number" class="form-control" name="num_ext" id="street_number" placeholder="No. Ext." required="required" value="<?php echo $admin['num_ext'];?>">
                                        </div>
                                        <div class="col-sm-6 ctl">
                                            <label for="focusedinput">No. Int.</label>

                                            <input type="number" class="form-control" name="num_int" placeholder="No. Int." value="<?php echo $admin['num_int'];?>">
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                                <div class="fo-top">
                                    <div class="form-group">
                                        <div class="col-sm-6 ctl">
                                            <label for="focusedinput">Colonia</label>

                                            <input type="text" class="form-control" name="colonia" id="sublocality_level_1" placeholder="Colonia" required="required" value="<?php echo $admin['colonia'];?>">
                                        </div>
                                        <div class="col-sm-6 ctl">
                                            <label for="focusedinput">Municipio</label>
                                            <input type="text" class="form-control" name="municipio" id="locality" placeholder="Colonia" required="required" value="<?php echo $admin['municipio'];?>">

                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                                <div class="fo-top">
                                    <div class="form-group">
                                        <div class="col-sm-6 ctl">
                                            <label for="focusedinput">Estado</label>
                                            <input type="text" class="form-control" name="estado" id="administrative_area_level_1" placeholder="Colonia" required="required" value="<?php echo $admin['estado'];?>">


                                        </div>
                                        <div class="col-sm-6 ctl">

                                            <label for="focusedinput">Pa&iacute;s</label>
                                            <input type="text" class="form-control" name="pais" id="country" placeholder="Pa&iacute;s" required="required" value="<?php echo $admin['pais'];?>">
                                        </div>
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
                                <h4 style="color:#418bca; font-weight:bold;text-align:center">DATOS DE SISTEMA</h4>
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
                                </div>
                                <br>




                                <button type="submit" class="btn btn-primary pull-right" title="Registrar usuario">Guardar</button>
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

                <h3 class="page-header"> Valet >> <a href="valetes.php?esta=1"> Usuarios</a> </h3>



                <h2 class="sub-header">Registrar Usuario</h2>
                <div class="row">
                    <div class="col-sm-12 col-md-6 col-lg-6">
                        <br>

                        <form role="form" name="nvoproducto" method="post" enctype="multipart/form-data" action="controlador/ctl_usuarios.php?m=1<?php echo '&idvalet='.$_GET['id'].'&tipo=1'; ?>">
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

                                <div class="col-sm-4">
                                    <div class="fo-top">
                                        <div class="form-group">
                                            <label for="focusedinput">Apellido Paterno</label>

                                            <input type="text" class="form-control" name="apellido_paterno" placeholder="Nombre" required="required">

                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="fo-top">
                                        <div class="form-group">
                                            <label for="focusedinput">Apellido Materno</label>

                                            <input type="text" class="form-control" name="apellido_materno" placeholder="Nombre" required="required">

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
                                <div class=" fo-top">
                                    <div class="form-group">
                                        <label for="focusedinput"> Busca tu direcci&oacute;n</label>
                                        <input type="text" class="form-control" id="autocomplete" placeholder="Ingrese su direcci??n" onFocus="geolocate()">
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

                                        <div class="col-sm-6 ctl">
                                            <label for="focusedinput">No.Ext.</label>

                                            <input type="number" class="form-control" name="num_ext" id="street_number" placeholder="No. Ext." required="required">
                                        </div>
                                        <div class="col-sm-6 ctl">
                                            <label for="focusedinput">No.Int.</label>

                                            <input type="number" class="form-control" name="num_int" placeholder="No. Int.">
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                                <div class="fo-top">
                                    <div class="form-group">
                                        <div class="col-sm-6 ctl">
                                            <label for="focusedinput">Colonia</label>
                                            <input type="text" class="form-control" name="colonia" id="sublocality_level_1" placeholder="Colonia" required="required">



                                        </div>
                                        <div class="col-sm-6 ctl">
                                            <label for="focusedinput">Municipio</label>
                                            <input type="text" class="form-control" name="municipio" id="locality" placeholder="Municipio" required="required">
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                                <div class="fo-top">
                                    <div class="form-group">

                                        <div class="col-sm-6 ctl">
                                            <label for="focusedinput">Estado</label>
                                            <input type="text" class="form-control" name="estado" id="administrative_area_level_1" placeholder="Estado" required="required">

                                        </div>
                                        <div class="col-sm-6 ctl">
                                            <label for="focusedinput">Pa&iacute;s</label>
                                            <input type="text" class="form-control" name="pais" id="country" placeholder="Pa&iacute;s" required="required">


                                        </div>



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
                                <h4 style="color:#418bca; font-weight:bold;text-align:center">DATOS DE SISTEMA</h4>
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
                                </div>
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
