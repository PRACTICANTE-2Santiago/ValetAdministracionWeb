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

                    <h3 class="page-header"> Datos >> <a href="valetes.php"> Asignar credito</a> </h3>


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

                    <h2 class="sub-header">Asignar credito</h2>
                    <div class="row">
                        <div class="col-sm-12 col-md-6 col-lg-6">
                            <br>

                            <form role="form" name="nvovalet" method="post" enctype="multipart/form-data" action="controlador/ctl_valet.php?m=1">
                                <section id="section-1" class="content-current">
                               
                                    <label for="cars">Selecciona un valet:</label>

<select name="cars" id="cars">
<option value="volvo">valet</option>
  <option value="volvo">Banco</option>
  <option value="saab">Walmart</option>
  <option value="mercedes">Mariscos</option>
  <option value="audi">Nisan</option>
</select>

                                  

<label for="cars">Selecciona un credito:</label>

<select name="cars" id="cars">
<option value="volvo">credito</option>
  <option value="volvo">Premium</option>
  <option value="saab">Standart</option>
  <option value="mercedes">Basic</option>

</select>


                                    <br>

                                    <button type="button"class="btn btn-primary" title="Nuevo Valet" <?php echo irA('admincreditos.php', 2); ?>>
                        <span class="glyphicon glyphicon-plus-sign"></span> Asignar
                    </button>                                  </section>
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
