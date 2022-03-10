<?php session_start(); ?>

<?php
	include('controlador/ctl_inicio.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Head HTML -->

    <script src="https://code.jquery.com/jquery-2.1.4.js"></script>


    <?php include('includes/head.php') ?>
    <?php include('includes/header.php') ?>

</head>

<body>
    <!-- Encabezado Pagina -->
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




                <!-- EO Contenido -->
            </div>
            <!-- EO Row Principal -->
        </div>
    </div>

</body>
<?php include('includes/jsfiles.php') ?>

</html>
