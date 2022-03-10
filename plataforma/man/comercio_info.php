<?php session_start(); ?>
<?php
include('controlador/ctl_comercios.php');
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
                $come=  traeComercios($_GET['id'],$_SESSION['idvalet'] ,1);

                        if(sizeof($usu) > 0){
			
		?>
                <h3 class="page-header">Datos >> <a href="Comercios.php?esta=1">Administradores</a> </h3>


                <h2 class="sub-header"><?php echo 'Nombre: '.$come['nombre']; ?></h2>


                <div class="row">
                    <div class="col-sm-12 col-md-6 col-lg-6">


                    <br>

                    <div class="form-group">
                            <div class="col-sm-7 col-md-5 col-lg-3 text-right">
                                <label for="titulo">Calle: </label>
                            </div>
                            <?php echo $come['calle']; ?>
                        </div>
                        <br>


                        <div class="form-group">
                            <div class="col-sm-7 col-md-5 col-lg-3 text-right">
                                <label for="titulo">codigo_postal: </label>
                            </div>
                            <?php echo $come['codigo']; ?>
                        </div>
                        <br>


                        <div class="form-group">
                            <div class="col-sm-7 col-md-5 col-lg-3 text-right">
                                <label for="titulo">Representante: </label>
                            </div>
                            <?php echo $come['representante']; ?>
                        </div>
                        <br>





                        <div class="form-group">
                            <div class="col-sm-7 col-md-5 col-lg-3 text-right">
                                <label for="titulo">Correo El&eacute;ctronico: </label>
                            </div>
                            <?php echo $come['correo_electronico']; ?>
                        </div>
                        <br>
                        

                        <div class="form-group">
                            <div class="col-sm-7 col-md-5 col-lg-3 text-right">
                                <label for="titulo">Tarifa: </label>
                            </div>
                            <?php echo $come['tarifa']; ?>
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
