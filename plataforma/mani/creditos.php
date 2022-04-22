<?php session_start(); ?>
<?php
include('controlador/ctl_creditos.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Head HTML -->
    <?php include('includes/head.php') ?>
</head>

<body onload="myFunction()">
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

                    <button type="button" name="nvousu" class="btn btn-primary" title="Nuevo Valet" <?php echo irA('credito.php', 2); ?>>
                        <span class="glyphicon glyphicon-plus-sign"></span> Nuevo
                    </button> Credito
                </h2>
                <br>
                <?php $estat = (isset($_GET['esta']) ? $_GET['esta'] : 1); ?>

<h4 class="text-right">
    <button type="button" class="btn btn-success" onclick="location.href='creditos.php?esta=1';"> Activos( <?php echo traeEstatusCredito(1); ?> ) </button>

    <button type="button" class="btn btn-danger" onclick="location.href='creditos.php?esta=0';"> Inactivos( <?php echo traeEstatusCredito(0); ?> ) </button>
</h4>
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
                                <th>Nombre</th>
                                <th>Precio</th>
                                <th>Servicios</th>
                                <th>Aviso</th>
                                <th>Cancelacioens </th>
                                <th>Acciones</th>
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
                                <td><?php echo $usua['nombre'] ?></td>
                                <td><?php echo $usua['costo']?></td>
                                <td><?php echo $usua['servicios']?></td>
                                <td><?php echo $usua['aviso'] ?></td>
                                <td><?php echo $usua['cancelaciones']?></td>
                                <td>
                                    <?php if($usua['estatus']== 1){ ?>
                                    <button type="button" class="btn btn-info" title="Actualizar" <?php echo irA('credito.php?edit=1&id='.$usua['id'], 2); ?>> <span class="glyphicon glyphicon-pencil"></span> </button>

                                    <button type="button" class="btn btn-warning" title="Ver" <?php echo irA('creditos_info.php?edit=1&id='.$usua['id'], 2); ?>> <span class="glyphicon glyphicon-eye-open"></span> </button>


                                    <?php
                                                                $usu= traeUsuarios(0 ,$usua['id'], 1);
														          if(sizeof($usu) > 0){
                                                                      
                                                                      foreach($usu as $usus){
                                                                     if ($usus === reset($usu)) {
                                                                          $con=$usus['id'];
                                                                    }
                                                                }
                                    ?>

                                    <?php
                                                                  }else{
                                                                      
                                    ?>

                                    <?php } ?>

                                    <button type="button" class="btn btn-danger" title="Desactivar" 
                                    <?php echo irA('controlador/ctl_creditos.php?m=3&st=0&id='.$usua['id'], 2); 
                                    ?>> <span class="glyphicon glyphicon-trash"></span> </button>
                                    <?php }else{ ?>
                                    <button type="button" class="btn btn-success" title="Reactivar" <?php echo irA('controlador/ctl_creditos.php?m=3&st=1&id='.$usua['id'], 2); ?>> <span class="glyphicon glyphicon-refresh"></span> </button>
                                    <?php }?>
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


    <!-- EO Contenido -->
    <!-- EO Row Principal -->
    <!-- Container Principal -->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <?php include_once('includes/jsfiles.php') ?>
</body>

</html>
