<?php session_start(); ?>
<?php
include('controlador/ctl_pedido.php');
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
                $usu=  traeValet($_GET['id'], '', -1);

                        if(sizeof($usu) > 0){
			
		?>
                <h3 class="page-header">Datos >> <a href="pedidos.php?esta=1">Pedidos</a> </h3>


                <div class="fo-top">
                                    <div class="form-group">
                                        <label for="focusedinput">Plan</label>

                                        <input type="text" class="form-control" name="plan" placeholder="Plan" required="required" value="<?php echo $usu['plan'];?>">
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                       
                                <div class="fo-top">
                                    <div class="form-group">
                                        <label for="focusedinput">Precio</label>

                                        <input type="text" class="form-control" name="costo" placeholder="Precio" required="required" value="<?php echo $usu['costo'];?>">
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                                <div class="fo-top">
                                    <div class="form-group">
                                        <label for="focusedinput">Servicios</label>

                                        <input type="text" class="form-control" name="  servicios" placeholder="Plan" required="required" value="<?php echo $usu['plan'];?>">
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                        <div class="col-sm-12 col-md-6 col-lg-6">
                            <section id="section-1" class="content-current">
                                <h4 style="color:#418bca; font-weight:bold;text-align:right ">Comprobante de Pago</h4>
                                <br>
                                <div style="border-style: dotted; border-color: #418bca;"> </div>
                                <br>
                               
                     
                                <br>
                                <?php echo '<img height="500" width="600"
                                 src="data:image/jpeg;base64,'.base64_encode($usu["comprobante"]).'"/>'; ?>
                         

                                </div>
                                <form action="upload.php" method="post" enctype="multipart/form-data">
                                <button  <?php echo irA('controlador/ctl_pedido.php?m=3&st=0&id='.$usu['id'], 2); ?>type="submit" name="submit" value="UPLOAD" > <span class="glyphicon glyphicon-ok"></span> Aprobar Pedido</button>






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
