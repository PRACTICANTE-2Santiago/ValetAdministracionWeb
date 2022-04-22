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
                $usu=  traeUsuarios($_GET['id'], '', -1);

                        if(sizeof($usu) > 0){
			
		?>
                <h3 class="page-header">Datos >> <a href="creditos.php?esta=1">Creditos</a> </h3>


                <h2 class="sub-header"><?php echo 'Nombre: '.$usu['nombre']; ?></h2>


                <div class="row">
                    <div class="col-sm-12 col-md-6 col-lg-6">


              
                        <div class="form-group">
                            <div class="col-sm-7 col-md-5 col-lg-3 text-right">
                                <label for="titulo">Precio </label>
                            </div>
                            <?php echo $usu['costo']; ?>
                        </div>
                        <br>
                        <div class="form-group">
                            <div class="col-sm-7 col-md-5 col-lg-3 text-right">
                                <label for="titulo">Servicios </label>
                            </div>
                            <?php echo $usu['servicios']; ?>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-7 col-md-5 col-lg-3 text-right">
                                <label for="titulo">Aviso: </label>
                            </div>
                            <?php echo $usu['aviso']; ?>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-7 col-md-5 col-lg-3 text-right">
                                <label for="titulo">Cancelaciones: </label>
                            </div>
                            <?php echo $usu['cancelaciones']; ?>
                        </div>







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
