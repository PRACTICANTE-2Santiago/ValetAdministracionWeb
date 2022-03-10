<?php @session_start(); ?>
<?php

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Head HTML -->
    <?php include('includes/head.php') ?>
    <script src="https://code.jquery.com/jquery-2.1.4.js"></script>
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

                


                <h3 class="page-header"> Datos >> Creditos </h3>

                <h2 class="sub-header"> Creditos</h2>
                <div class="row">
                    <div class="col-sm-12 col-md-6 col-lg-6">
                        <br>
                <?php 
               
                ?>
                

                        <form role="form" name="nvoproducto" method="post" enctype="multipart/form-data" action="controlador/ctl_tarifa.php?m=2<?php echo '&id='. $tarifa[0]['id']; ?>">
                            <section id="section-1" class="content-current">
                                
                                <div class="col-sm-12">
                                    <div class="fo-top">
                                        <div class="form-group">
                                            <label for="focusedinput">Tipo de Plan </label>

                                            <input type="text" class="form-control" name="tarifa" placeholder="Premium $500 " required="required" disabled>
                                           


                                            <a href="plan.php?esta=1">
                        <div class="accordion-inner">Verifica los beneficios de tu plan aqui </div>
                    </a>

                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </div>
                                

                              
                            </section>
                        </form>
                        
                        
                        
                         <form role="form" name="nvoproducto" method="post" enctype="multipart/form-data" action="controlador/ctl_tarifa.php?m=1<?php echo '&idvalet='.$_SESSION['idvalet']; ?>">
                            <section id="section-1" class="content-current">
                                
                                <div class="col-sm-12">
                                    <div class="fo-top">
                                        <div class="form-group">
                                            <label for="focusedinput">Stock</label>

                                            <input type="text" class="form-control" name="stock" placeholder=" 50" required="required" disabled>
<br>

<label for="focusedinput">Creditos Totales</label>
                                            <input type="text" class="form-control" name="utilizados" placeholder="56 " required="required" disabled>


                                            
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </div>

                              
                            </section>
                        </form>
                        
                   
                    </div>

                </div>
            </div>
           
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
   
</body>

</html>
