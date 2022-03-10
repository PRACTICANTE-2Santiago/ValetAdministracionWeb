<?php @session_start(); ?>
<?php
include('controlador/ctl_tarifa.php');
?>
<!DOCTYPE html>
<html lang="en">
<meta http-equiv="refresh" content="7" >
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

                


                <h3 class="page-header"> Datos >> Tarifa </h3>

                <h2 class="sub-header">Registrar Tarifa</h2>
                <div class="row">
                    <div class="col-sm-12 col-md-6 col-lg-6">
                        <br>
                <?php 
                    $tarifa= traeTarifa(0,$_SESSION['idvalet'], 1);
                        if(sizeof($tarifa)>0){
                ?>
                

                        <form role="form" name="nvoproducto" method="post" enctype="multipart/form-data" action="controlador/ctl_tarifa.php?m=2<?php echo '&id='. $tarifa[0]['id']; ?>">
                            <section id="section-1" class="content-current">
                                
                                <div class="col-sm-12">
                                    <div class="fo-top">
                                        <div class="form-group">
                                            <label for="focusedinput">Tarifa</label>

                                            <input type="text" class="form-control" name="tarifa" placeholder="Premiun $50 y Normal $30" required="required" value="<?php echo $tarifa[0]['tarifa']?>">





                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </div>

                              
                                <button type="submit" class="btn btn-primary pull-right" title="Registrar usuario">Actualizar</button>
                            </section>
                        </form>
                        
                        <?php }else{?>
                        
                         <form role="form" name="nvoproducto" method="post" enctype="multipart/form-data" action="controlador/ctl_tarifa.php?m=1<?php echo '&idvalet='.$_SESSION['idvalet']; ?>">
                            <section id="section-1" class="content-current">
                                
                                <div class="col-sm-12">
                                    <div class="fo-top">
                                        <div class="form-group">
                                            <label for="focusedinput">Tarifa</label>

                                            <input type="text" class="form-control" name="tarifa" placeholder="Premiun $50 " required="required">
<br>
                                            <input type="text" class="form-control" name="tarifa" placeholder=" Normal $30" required="required">


                                            
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </div>

                              
                                <button type="submit" class="btn btn-primary pull-right" title="Registrar usuario">Registrar</button>
                            </section>
                        </form>
                        
                        <?php }?>
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
