<?php session_start(); ?>
<?php
include('controlador/ctl_administrador.php');
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
                $usu=  traeUsuarios($_GET['id'], 1); 

                        if(sizeof($usu) > 0){
			
		?>
                <h3 class="page-header">Datos >> <a href="usuarios.php?esta=1">Administradores</a> </h3>


                <h2 class="sub-header"><?php echo 'Nombre: '.$usu['nombre'].' '.$usu['paterno'].' '.$usu['materno']; ?></h2>


                <div class="row">
                    <div class="col-sm-12 col-md-6 col-lg-6">


                        <div class="form-group">
                            <div class="col-sm-7 col-md-5 col-lg-3 text-right">
                                <label for="titulo">Correo El&eacute;ctronico: </label>
                            </div>
                            <?php echo $usu['correo_electronico']; ?>
                        </div>
                        <br>
                        <div class="form-group">
                            <div class="col-sm-7 col-md-5 col-lg-3 text-right">
                                <label for="titulo">Tel&eacute;fono: </label>
                            </div>
                            <?php echo $usu['telefono']; ?>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-7 col-md-5 col-lg-3 text-right">
                                <label for="titulo">Usuario: </label>
                            </div>
                            <?php echo $usu['usuario']; ?>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-7 col-md-5 col-lg-3 text-right">
                                <label for="titulo">Contrase&ntilde;a: </label>
                            </div>
                            <?php echo $usu['contrasenia']; ?>
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
