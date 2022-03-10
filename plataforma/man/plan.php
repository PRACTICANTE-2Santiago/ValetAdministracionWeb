<?php session_start(); ?>
<?php
include('controlador/ctl_creditos.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Head HTML -->
    <?php include('includes/head.php') ?>
    <?php include('includes/oldspice.php') ?>
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
                
                <br>

                <?php $estat = (isset($_GET['esta']) ? $_GET['esta'] : 1); ?>

               
                <br>
                <br>
                <h1 align="center" style="font-weight: bold;">
                    <?php  if($_GET['esta']==0){echo"Inactivos";}
                        else if($_GET['esta']==1){echo"Activos";}
              ?>

                </h1>


                <div class="table-responsive">
                    <table id="filtro" class="table table-striped table-bordered dataTable">
                        <thead>
                            <tr>
                                <th>Estado</th>
                                <th>Id</th>
                                <th>Nombre</th>
                                <th>Costo</th>
                                <th>Servicios</th>
                                <th>Aviso</th>
                                <th>Cancelaciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- en el tr despues de una insercion o una modificacion, se remarcara la fila con success o warning -->
                            <?php 
                             $empleados = traeUsuarios(0, $estat);
														if(sizeof($empleados) > 0){
															foreach($empleados as $usua){
                                                                
               										 ?>
                            <tr>
                                <?php echo estatusAdmTabla($usua['estatus']); ?>
                                <td><?php echo $usua['id']?></td>
                                <td><?php echo $usua['nombre']?></td>
                                <td><?php echo $usua['costo']?></td>
                                <td><?php echo $usua['servicios']?></td>
                                <td><?php echo $usua['aviso']?></td>
                                <td><?php echo $usua['cancelaciones']?></td>
                               
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
    <!-- EO Contenido -->
    <!-- EO Row Principal -->
    <!-- Container Principal -->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <?php include_once('includes/jsfiles.php') ?>
</body>

</html>
