<?php session_start(); ?>
<?php
include('controlador/ctl_creditos.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Head HTML -->
    <?php include('includes/head.php');
	include('includes/oldspice.php'); ?>
    <script src="http://code.jquery.com/jquery-2.1.4.js"></script>



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

                <?php if(isset($_GET['edit']) && isset($_GET['id'])){
        								if($_GET['edit'] == 1 && $_GET['id'] > 0){

        ?>
                <?php
                $come=   traeUsuarios($_GET['id'],$_SESSION['idvalet'] ,1);

                        if(sizeof($come) > 0){
			
		?>

<form name="MiForm" id="MiForm" method="post" action="cargar.php" enctype="multipart/form-data">
                <h3 class="page-header">DETALLE DE COMPRA  : <a href=" mis creditos.php?esta=1">CREDITOS</a> </h3>


                <h2 class="sub-header"><?php echo 'Nombre: '.$come['nombre']; ?></h2>


                <div class="row">
                    <div>


                    
                    <div class="form-group">
                            <div class="col-sm-7 col-md-5 col-lg-3 text-right">
                                <label name="nombre" for="titulo">Nombre: </label>
                            </div>
                            <input type="text" id="plan" name="plan" required
       minlength="4" maxlength="8" size="10" value=" <?php echo $come['nombre']; ?>">

                          
                        </div>

                    <div class="form-group">
                            <div class="col-sm-7 col-md-5 col-lg-3 text-right">
                                <label name="costo" for="titulo">Costo: </label>
                            </div>
                            <input type="text" id="costo" name="costo" required
       minlength="4" maxlength="8" size="10" value=" <?php echo $come['costo']; ?>">
                        </div>
                       


                        <div class="form-group">
                            <div class="col-sm-7 col-md-5 col-lg-3 text-right">
                                <label name="servicios" for="titulo">Servicios: </label>
                            </div>
                            <input type="text" id="servicios" name="servicios" required
       minlength="4" maxlength="8" size="10" value=" <?php echo $come['servicios']; ?>">
                        </div>
                       


                        <div class="form-group">
                            <div class="col-sm-7 col-md-5 col-lg-3 text-right">
                                <label name="aviso" for="titulo">Aviso: </label>
                            </div>
                            <input type="text" id="aviso" name="aviso" required
       minlength="4" maxlength="8" size="10" value=" <?php echo $come['aviso']; ?>">
                        </div>
                      

                        <div class="form-group">
                            <div class="col-sm-7 col-md-5 col-lg-3 text-right">
                                <label name="cancelaciones" for="titulo">Cancelaciones </label>
                            </div>
                            <input type="text" id="cancelaciones" name="cancelaciones" required
       minlength="4" maxlength="8" size="10" value=" <?php echo $come['cancelaciones']; ?>">
                        </div>
                      
                        <h4 class="text-center">Seleccione comprobante a cargar</h4>
        <div class="form-group">
          <label class="col-sm-2 control-label">Comprobante de Pago</label>
          <div class="col-sm-8">
            <input type="file" class="form-control" id="image" name="image"  require>
          </div>
          <button name="submit" class="btn btn-primary">Realizar Pedido</button>
        </div>
                                      <br>
                                      </div>         









                    </div>

                </div>

                </form>
              
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
