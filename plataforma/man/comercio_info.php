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

                        if(sizeof($come) > 0){
			
		?>
                <h3 class="page-header">Datos >> <a href="Comercios.php?esta=1">Comercios</a> </h3>


                <h2 class="sub-header"><?php echo 'Nombre: '.$come['nombre']; ?></h2>


                <div class="row">
                    <div class="col-sm-12 col-md-6 col-lg-6">


                    
                    <div class="form-group">
                            <div class="col-sm-7 col-md-5 col-lg-3 text-right">
                                <label for="titulo">Nombre: </label>
                            </div>
                            <?php echo $come['nombre']; ?>
                        </div>

                    <div class="form-group">
                            <div class="col-sm-7 col-md-5 col-lg-3 text-right">
                                <label for="titulo">Calle: </label>
                            </div>
                            <?php echo $come['calle']; ?>
                        </div>
                       


                        <div class="form-group">
                            <div class="col-sm-7 col-md-5 col-lg-3 text-right">
                                <label for="titulo">codigo_postal: </label>
                            </div>
                            <?php echo $come['codigo_postal']; ?>
                        </div>
                       


                        <div class="form-group">
                            <div class="col-sm-7 col-md-5 col-lg-3 text-right">
                                <label for="titulo">Representante: </label>
                            </div>
                            <?php echo $come['representante']; ?>
                        </div>
                      





                        <div class="form-group">
                            <div class="col-sm-7 col-md-5 col-lg-3 text-right">
                                <label for="titulo">Correo El&eacute;ctronico: </label>
                            </div>
                            <?php echo $come['correo_electronico']; ?>
                        </div>
                      
                        

                           
                        <div class="col-sm-12 col-md-6 col-lg-6">
                            <section id="section-1" class="content-current">
                                <h4 style="color:#418bca; font-weight:bold;text-align:center">LOGOTIPO</h4>
                                <br>
                                <div style="border-style: dotted; border-color: #418bca;"> </div>
                                <br>
                               
                     
                                <br>
                                <?php echo '<img height="200" width="200"
                                 src="data:image/jpeg;base64,'.base64_encode($come["logotipo"]).'"/>'; ?>

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
