<?php @session_start(); ?>
<?php
include('controlador/ctl_valet.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Head HTML -->
    <?php include('includes/head.php') ?>
    <script src="https://code.jquery.com/jquery-2.1.4.js"></script>

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
			include('includes/alertas.php');
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
        								$valet = traeValet($_GET['id'], '', -1);

										if(sizeof($valet)>0){

                                            

        						?>

                <h3 class="page-header"> Datos >> <a href="valetes.php"> Valets </a> </h3>

                <h2 class="sub-header">Modificar Valet</h2>
                <div class="row">
                    <div class="col-sm-12 col-md-6 col-lg-6">
                        <br>
                        <form role="form" name="nvovalet" method="post" enctype="multipart/form-data" action="controlador/ctl_valet.php?m=2&id=<?php echo $valet['id']; ?>">
                            <section id="section-1" class="content-current">

                                <div class="fo-top">
                                    <div class="form-group">
                                        <label for="focusedinput">PIN</label>
                                        <input type="text" class="form-control" name="id_pin" id="id_pin" placeholder="Id Pin" value="<?php echo $valet['id_pin'];?>" required="required" readonly>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>

                                <div class="fo-top">
                                    <div class="form-group">
                                        <label for="focusedinput">Nombre</label>
                                        <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre" value="<?php echo $valet['nombre'];?>" required="required">
                                        <div class="clearfix"></div>
                                    </div>
                                </div>

                                <div style="border-style: dotted; border-color: #418bca;"> </div>
                                <br>
                                <div class=" fo-top">
                                    <div class="form-group">
                                        <label for="focusedinput"> Busca tu direcci&oacute;n</label>
                                        <input type="text" class="form-control" id="autocomplete" placeholder="Ingrese su dirección" onFocus="geolocate()">
                                    </div>
                                </div>
                                <br>
                                <div style="border-style: dotted; border-color: #418bca;"> </div>
                                <br>
                                <div class="fo-top">
                                    <div class="form-group">

                                        <label for="focusedinput">Calle</label>
                                        <input type="text" class="form-control" name="calle" id="route" placeholder="Calle" value="<?php echo $valet['calle'];?>" required="required">

                                        <div class="clearfix"></div>
                                    </div>
                                </div>

                                <div class="fo-top">
                                    <div class="form-group">

                                        <div class="col-sm-6 ctl">
                                            <label for="focusedinput">No. Ext.</label>
                                            <input type="number" class="form-control" name="num_ext" id="street_number" placeholder="No. Ext." value="<?php echo $valet['num_ext'];?>" required="required">
                                        </div>
                                        <div class="col-sm-6 ctl">
                                            <label for="focusedinput">No. Int.</label>
                                            <input type="number" class="form-control" name="num_int" id="num_int" value="<?php echo $valet['num_int'];?>" placeholder="No. Int.">
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>


                                <div class="fo-top">
                                    <div class="form-group">
                                        <div class="col-sm-6 ctl">

                                            <label for="focusedinput">Colonia</label>

                                            <input type="text" class="form-control" name="colonia" id="sublocality_level_1" placeholder="Colonia" value="<?php echo $valet['colonia'];?>" required="required">
                                        </div>
                                        <div class="col-sm-6 ctl">

                                            <label for="focusedinput">Ciudad</label>
                                            <input type="text" class="form-control" name="municipio" id="locality" value="<?php echo $valet['municipio'];?>" placeholder="Ciudad" required="required">
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                                <div class="fo-top">
                                    <div class="form-group">

                                        <div class="col-sm-6 ctl">
                                            <label for="focusedinput">Estado</label>

                                            <input type="text" class="form-control" name="estado" id="administrative_area_level_1" value="<?php echo $valet['estado'];?>" placeholder="Estado" required="required">

                                        </div>
                                        <div class="col-sm-6 ctl">

                                            <label for="focusedinput">Pa&iacute;s</label>
                                            <input type="text" class="form-control" name="pais" id="country" value="<?php echo $valet['pais'];?>" placeholder="Pa&iacute;s" required="required">
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>

                                <div class="fo-top">
                                    <div class="form-group">

                                        <label for="focusedinput">C.P</label>
                                        <input type="text" class="form-control" name="codigo_postal" id="postal_code" value="<?php echo $valet['codigo_postal'];?>" placeholder="CP" required="required">

                                        <div class="clearfix"></div>
                                    </div>
                                </div>




                                <br>



                                <div class="fo-top">

                                    <div class="fo-top">
                                        <div class="form-group">
                                            <label for="focusedinput">Tel&eacute;fono</label>
                                            <input type="text" class="form-control" name="telefono" id="telefono" placeholder="Tel&eacute;fono" value="<?php echo $valet['telefono'];?>" required="required" minlength="10" maxlength="10">
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>

                                    <div class="fo-top">
                                        <div class="form-group">
                                            <label for="focusedinput">Correo Electr&oacute;nico</label>
                                            <input type="mail" class="form-control" name="correo_electronico" id="correo_electronico" placeholder="Correo Electr&oacute;nico" value="<?php echo $valet['correo_electronico'];?>" required="required">
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>

                                    <div class="fo-top">
                                        <div class="form-group">
                                            <label for="focusedinput">Logotipo</label>
                                            <input type="text" class="form-control" name="logotipo" id="logotipo" placeholder="Logotipo" value="<?php echo $valet['logotipo'];?>" required="required">
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>

                                    <div class="fo-top">
                                        <div class="form-group">
                                            <label for="focusedinput">Representante</label>
                                            <input type="text" class="form-control" name="representante" id="representante" placeholder="Representante" value="<?php echo $valet['representante'];?>" required="required">
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>


                                    <br>

                                    <button type="submit" class="btn btn-primary pull-right" title="Registrar usuario">Guardar</button>
                                </div>
                            </section>


                        </form>
                        <?php
        		}		
        	}
        		
        ?>
                    </div>
                    <?php }else{ 
        ?>

                    <h3 class="page-header"> Datos >> <a href="valetes.php"> Valets</a> </h3>


                    <?php  
                                                    //function traeCoti($id,$id_sucursal, $estatus){

                        $movi= traeValet(0 ,'', -1);
                        foreach($movi as $mov){
                             if ($mov === end($movi)) {
                                  $con=$mov['id_pin'];
                            }
                        }
                    
                                 if($con<'09'){
                                     $suma=$con+1;
                                     $total= '0'.$suma;
                                 }else if($con>='09'){
                                     $suma=$con+1;
                                     $total= $suma;
                                 }
    
                   
                        ?>

                    <h2 class="sub-header">Registrar Valet</h2>
                    <div class="row">
                        <div class="col-sm-12 col-md-6 col-lg-6">
                            <br>

                            <form role="form" name="nvovalet" method="post" enctype="multipart/form-data" action="controlador/ctl_valet.php?m=1">
                                <section id="section-1" class="content-current">
                                    <div class="fo-top">
                                        <div class="form-group">
                                            <label for="focusedinput">PIN</label>
                                            <input type="text" class="form-control" name="id_pin" id="id_pin" value="<?php echo $total?>" required="required" readonly>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>

                                    <div class="fo-top">
                                        <div class="form-group">
                                            <label for="focusedinput">Nombre</label>
                                            <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre" required="required">
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>

                                    <div style="border-style: dotted; border-color: #418bca;"> </div>
                                    <br>
                                    <div class=" fo-top">
                                        <div class="form-group">
                                            <label for="focusedinput"> Busca tu direcci&oacute;n</label>
                                            <input type="text" class="form-control" id="autocomplete" placeholder="Ingrese su dirección" onFocus="geolocate()">
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
                                                <label for="focusedinput">No. Ext.</label>
                                                <input type="number" class="form-control" name="num_ext" id="street_number" placeholder="No. Ext." required="required">
                                            </div>
                                            <div class="col-sm-6 ctl">
                                                <label for="focusedinput">No. Int.</label>
                                                <input type="number" class="form-control" name="num_int" id="num_int" placeholder="No. Int.">
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

                                                <label for="focusedinput">Ciudad</label>
                                                <input type="text" class="form-control" name="municipio" id="locality" placeholder="Ciudad" required="required">
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
                                            <input type="text" class="form-control" name="codigo_postal" id="postal_code" placeholder="CP" required="required">

                                            <div class="clearfix"></div>
                                        </div>
                                    </div>




                                    <br>


                                    <div class="fo-top">
                                        <div class="form-group">
                                            <label for="focusedinput">Tel&eacute;fono</label>
                                            <input type="text" class="form-control" name="telefono" name="id" placeholder="Tel&eacute;fono" required="required" minlength="10" maxlength="10">
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>

                                    <div class="fo-top">
                                        <div class="form-group">
                                            <label for="focusedinput">Correo Electr&oacute;nico</label>
                                            <input type="mail" class="form-control" name="correo_electronico" id="correo_electronico" placeholder="Correo Electr&oacute;nico" required="required">
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>

                                    <div class="fo-top">
                                        <div class="form-group">
                                            <label for="focusedinput">Logotipo</label>
                                            <input type="text" class="form-control" name="logotipo" id="logotipo" placeholder="Logotipo" required="required">
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>

                                    <div class="fo-top">
                                        <div class="form-group">
                                            <label for="focusedinput">Representante</label>
                                            <input type="text" class="form-control" name="representante" id="representante" placeholder="Representante" required="required">
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
        <script src="includes/script.js"> </script>

        <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places&key=AIzaSyBzwyxjKlYJnnIlkML4bfsDmuQId-zP4oI"></script>



</body>

</html>
