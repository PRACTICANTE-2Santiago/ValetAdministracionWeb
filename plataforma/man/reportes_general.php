<?php session_start(); ?>
<?php
include('controlador/ctl_reportes.php');
?>
<!DOCTYPE html>
<html lang="en">
<meta http-equiv="refresh" content="7" >
<head>
    <!-- Head HTML -->
    <?php include('includes/head.php') ?>
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
                <?php 
                include('includes/alertas.php');

          ?>
                <h2 class="sub-header">
                    Reportes General
                </h2>
                <br>

                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="well gray">
                            <div class="row">
                                <div class="col-xs-12">

                                    <form role="form" name="filtro" method="get" action="reportes_general.php">
                                        <div class="form-group">
                                            <div class="row">

                                                <div class="col-xs-5">
                                                    <label for="campoTexto">Fecha</label>
                                                    <input type="date" class="form-control" name="fecha" id="fecha" value="<?php echo date('Y-m-d'); ?>">

                                                </div>
                                                <!--
                                                <div class="col-xs-4">
                                                    <label for="campoTexto">Estatus</label>
                                                    <div class="form-group">

                                                        <select class="form-control" name="estatus" id="estatus" required>
                                                            <option value="">Seleccione un estatus</option>
                                                            <option value="-1">Todos</option>
                                                            <option value="1">Recibir</option>
                                                            <option value="2">Estacionar</option>
                                                            <option value="3">Recoger</option>
                                                            <option value="4">Entregado</option>

                                                        </select>
                                                    </div>

                                                </div>
-->


                                                <div class="col-xs-3 text-left" style="margin-top:25px">
                                                    <button class="btn btn-sm btn-primary" type="submit">
                                                        <span class="glyphicon glyphicon-search"></span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <?php   //if(isset($_GET['fecha']) and isset($_GET['estatus'])   ){
                        if(isset($_GET['fecha'])  ){
                                               
                ?>


                <br>
                <h2><strong>Fecha: <?php echo date('d-m-Y',strtotime($_GET['fecha']));?></strong></h2>

                <br>
                <br>
                <div class="table-responsive">
                    <table id="filtro" class="table table-striped table-bordered dataTable">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Placas</th>
                                <th>Fecha</th>
                                <th>Estatus</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- en el tr despues de una insercion o una modificacion, se remarcara la fila con success o warning -->
                            <?php 
                            $fechas= $_GET['fecha'];
                             $empleados =  traerAutos(0,$_SESSION['idvalet'],$fechas,-1);
														if(sizeof($empleados) > 0){
															foreach($empleados as $usua){
                                                              
               				?>
                            <tr>
                                <td><?php echo $usua['id']?></td>
                                <td><?php echo $usua['placas'] ?></td>
                                <td><?php
                                            if($usua['estatus']==1){
                                                   echo $fecha=date('d-m-Y H:i',strtotime($usua['fecha_registro']));
                                               }else if($usua['estatus']==2){
                                                   echo $fecha=date('d-m-Y H:i',strtotime($usua['fecha_ubicacion']));
                                               }else if($usua['estatus']==3){
                                                   echo $fecha=date('d-m-Y H:i',strtotime($usua['fecha_pedir']));
                                               }else if($usua['estatus']==4){
                                                   echo $fecha=date('d-m-Y H:i',strtotime($usua['fecha_entregado']));
                                               }  
                                    ?></td>
                                <td><?php
                                            if($usua['estatus']==1){
                                                   echo $estado='Recibir';
                                               }else if($usua['estatus']==2){
                                                   echo $estado='Estacionar';
                                               }else if($usua['estatus']==3){
                                                   echo $estado='Recoger';
                                               }else if($usua['estatus']==4){
                                                   echo $estado='Entregado';
                                               }
                                    ?></td>
                                <td>
                                    <button type="button" class="btn btn-primary" title="Ver" <?php echo irA('auto_infos.php?edit=1&id='.$usua['id'].'&idvalet='.$_SESSION['idvalet'], 2); ?>> <span class="glyphicon glyphicon-eye-open"></span> </button>


                                </td>
                            </tr>
                            <?php  }
                            }else{
                                echo "<tr><td colspan='7'><h5 class='text-center'>No Hay resultados para mostrar</h5></td></tr>";
                            }
                        ?>
                        </tbody>
                    </table>
                </div>
                <?php   } ?>



            </div>
        </div>
    </div>
    <!-- EO Contenido -->
    <!-- EO Row Principal -->
    <!-- Container Principal -->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <?php include_once('includes/jsfiles.php') ?>
</body>

</html>
