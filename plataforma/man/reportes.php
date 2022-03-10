<?php session_start(); ?>
<?php
include('controlador/ctl_reportes.php');
?>
<!DOCTYPE html>
<html lang="en">
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
                    Reportes por D&iacute;a <?php echo date('d-m-Y'); ?>
                </h2>
                <br>

                <?php  $fe= date('Y-m-d'); ?>
                <ul class="nav nav-tabs" style="font-size:17px; font-weight:bold;">
                    <li class="active"><a data-toggle="tab" href="#recibir">Recibir ( <?php echo traeEstatusAuto(1,$_SESSION['idvalet'],$fe) ?> )</a></li>
                    <li><a data-toggle="tab" href="#estacionar">Estacionar ( <?php echo traeEstatusAuto(2,$_SESSION['idvalet'],$fe); ?> )</a></li>
                    <li><a data-toggle="tab" href="#recoger">Recoger ( <?php echo traeEstatusAuto(3,$_SESSION['idvalet'],$fe); ?> )</a></li>
                    <li><a data-toggle="tab" href="#entregados">Entregados ( <?php echo traeEstatusAuto(4,$_SESSION['idvalet'],$fe); ?> )</a></li>
                </ul>
                <div class="tab-content">
                    <!--Usuarios Residencial: Administrador-->
                    <div id="recibir" class="tab-pane fade in active">
                        <br> <br>

                        <?php $estat = 1; ?>
                        <br>
                        <br>


                        <div class="table-responsive">
                            <table id="filtro" class="table table-striped table-bordered dataTable">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Placas</th>
                                        <th>Fecha</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- en el tr despues de una insercion o una modificacion, se remarcara la fila con success o warning -->
                                    <?php 
                            $fechas= date('Y-m-d');
                             $empleados =  traerAutos(0,$_SESSION['idvalet'],$fechas,$estat);
														if(sizeof($empleados) > 0){
															foreach($empleados as $usua){
                                               if($estat==1){
                                                   $fecha=date('d-m-Y H:i',strtotime($usua['fecha_registro']));
                                               }else if($estat==2){
                                                   $fecha=date('d-m-Y H:i',strtotime($usua['fecha_ubicacion']));
                                               }else if($estat==3){
                                                   $fecha=date('d-m-Y H:i',strtotime($usua['fecha_pedir']));
                                               }else if($estat==4){
                                                   $fecha=date('d-m-Y H:i',strtotime($usua['fecha_entregado']));
                                               }                 
               				?>
                                    <tr>
                                        <td><?php echo $usua['id']?></td>
                                        <td><?php echo $usua['placas'] ?></td>
                                        <td><?php echo $fecha?></td>
                                        <td>
                                            <button type="button" class="btn btn-primary" title="Ver" <?php echo irA('auto_info.php?edit=1&id='.$usua['id'].'&idvalet='.$_SESSION['idvalet'], 2); ?>> <span class="glyphicon glyphicon-eye-open"></span> </button>


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
                    </div>
                    <div id="estacionar" class="tab-pane fade">
                        <br> <br>

                        <?php  $estat = 2; ?>
                        <br>
                        <br>


                        <div class="table-responsive">
                            <table id="filtro" class="table table-striped table-bordered dataTable">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Placas</th>
                                        <th>Fecha</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- en el tr despues de una insercion o una modificacion, se remarcara la fila con success o warning -->
                                    <?php 
                            $fechas= date('Y-m-d');
                             $empleados =  traerAutos(0,$_SESSION['idvalet'],$fechas,$estat);
														if(sizeof($empleados) > 0){
															foreach($empleados as $usua){
                                               if($estat==1){
                                                   $fecha=date('d-m-Y H:i',strtotime($usua['fecha_registro']));
                                               }else if($estat==2){
                                                   $fecha=date('d-m-Y H:i',strtotime($usua['fecha_ubicacion']));
                                               }else if($estat==3){
                                                   $fecha=date('d-m-Y H:i',strtotime($usua['fecha_pedir']));
                                               }else if($estat==4){
                                                   $fecha=date('d-m-Y H:i',strtotime($usua['fecha_entregado']));
                                               }                 
               				?>
                                    <tr>
                                        <td><?php echo $usua['id']?></td>
                                        <td><?php echo $usua['placas'] ?></td>
                                        <td><?php echo $fecha?></td>
                                        <td>
                                            <button type="button" class="btn btn-primary" title="Ver" <?php echo irA('auto_info.php?edit=1&id='.$usua['id'].'&idvalet='.$_SESSION['idvalet'], 2); ?>> <span class="glyphicon glyphicon-eye-open"></span> </button>


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


                    </div>

                    <div id="recoger" class="tab-pane fade">
                        <br> <br>

                        <?php $estat = 3; ?>
                        <br>
                        <br>


                        <div class="table-responsive">
                            <table id="filtro" class="table table-striped table-bordered dataTable">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Placas</th>
                                        <th>Fecha</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- en el tr despues de una insercion o una modificacion, se remarcara la fila con success o warning -->
                                    <?php 
                            $fechas= date('Y-m-d');
                             $empleados =  traerAutos(0,$_SESSION['idvalet'],$fechas,$estat);
														if(sizeof($empleados) > 0){
															foreach($empleados as $usua){
                                               if($estat==1){
                                                   $fecha=date('d-m-Y H:i',strtotime($usua['fecha_registro']));
                                               }else if($estat==2){
                                                   $fecha=date('d-m-Y H:i',strtotime($usua['fecha_ubicacion']));
                                               }else if($estat==3){
                                                   $fecha=date('d-m-Y H:i',strtotime($usua['fecha_pedir']));
                                               }else if($estat==4){
                                                   $fecha=date('d-m-Y H:i',strtotime($usua['fecha_entregado']));
                                               }                 
               				?>
                                    <tr>
                                        <td><?php echo $usua['id']?></td>
                                        <td><?php echo $usua['placas'] ?></td>
                                        <td><?php echo $fecha?></td>
                                        <td>
                                            <button type="button" class="btn btn-primary" title="Ver" <?php echo irA('auto_info.php?edit=1&id='.$usua['id'].'&idvalet='.$_SESSION['idvalet'], 2); ?>> <span class="glyphicon glyphicon-eye-open"></span> </button>


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


                    </div>

                    <div id="entregados" class="tab-pane fade">
                        <br> <br>

                        <?php $estat = 4; ?>
                        <br>
                        <br>


                        <div class="table-responsive">
                            <table id="filtro" class="table table-striped table-bordered dataTable">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Placas</th>
                                        <th>Fecha</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- en el tr despues de una insercion o una modificacion, se remarcara la fila con success o warning -->
                                    <?php 
                            $fechas= date('Y-m-d');
                             $empleados =  traerAutos(0,$_SESSION['idvalet'],$fechas,$estat);
														if(sizeof($empleados) > 0){
															foreach($empleados as $usua){
                                               if($estat==1){
                                                   $fecha=date('d-m-Y H:i',strtotime($usua['fecha_registro']));
                                               }else if($estat==2){
                                                   $fecha=date('d-m-Y H:i',strtotime($usua['fecha_ubicacion']));
                                               }else if($estat==3){
                                                   $fecha=date('d-m-Y H:i',strtotime($usua['fecha_pedir']));
                                               }else if($estat==4){
                                                   $fecha=date('d-m-Y H:i',strtotime($usua['fecha_entregado']));
                                               }                 
               				?>
                                    <tr>
                                        <td><?php echo $usua['id']?></td>
                                        <td><?php echo $usua['placas'] ?></td>
                                        <td><?php echo $fecha?></td>
                                        <td>
                                            <button type="button" class="btn btn-primary" title="Ver" <?php echo irA('auto_info.php?edit=1&id='.$usua['id'].'&idvalet='.$_SESSION['idvalet'], 2); ?>> <span class="glyphicon glyphicon-eye-open"></span> </button>


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


                    </div>
                </div>

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
