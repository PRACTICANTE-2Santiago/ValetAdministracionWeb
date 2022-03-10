<?php session_start(); ?>
<?php
include('controlador/ctl_comercios.php');
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

                    <button type="button" name="nvousu" class="btn btn-primary" title="Agregar" <?php echo irA('Comercio.php', 2); ?>>
                        <span class="glyphicon glyphicon-plus-sign"></span> Nuevo
                    </button> Comercios
                </h2>
                <br>

                <?php $estat = (isset($_GET['esta']) ? $_GET['esta'] : 1); ?>
                <h4 class="text-right">
                    <button type="button" class="btn btn-success" onclick="location.href='Comercios.php?esta=1';"> Activos( <?php echo traeEstatusCome(1,$_SESSION['idvalet']); ?> ) </button>

                    <button type="button" class="btn btn-danger" onclick="location.href='Comercios.php?esta=0';"> Inactivos( <?php echo traeEstatusCome(0,$_SESSION['idvalet']); ?> ) </button>
                </h4>
                <br>
                <br>

                <div class="table-responsive">
                    <table id="filtro" class="table table-striped table-bordered dataTable">
                        <thead>
                            <tr>
                                <th>Estado</th>
                                <th>Id</th>
                                <th>Nombre</th>
                                <th>Representante</th>
                         
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- en el tr despues de una insercion o una modificacion, se remarcara la fila con success o warning -->
                            <?php 
                             $empleados = traeComercios(0,$_SESSION['idvalet'], $estat);
														if(sizeof($empleados) > 0){
															foreach($empleados as $come){
                                                                
               										 ?>
                            <tr>
                                <?php echo estatusAdmTabla($come['estatus']); ?>
                                <td><?php echo $come['id']?></td>
                                <td><?php echo $come['nombre'] ?></td>
                                <td><?php echo $come['representante']?></td>
                             
                                <td> <?php if($come['estatus']== 1){ ?>
                                    <button type="button" class="btn btn-info" title="Actualizar" <?php echo irA('comercio.php?edit=1&id='.$come['id'], 2); ?>> <span class="glyphicon glyphicon-pencil"></span> </button>
                                    <button type="button" class="btn btn-primary" title="Ver" <?php echo irA('comercio_info.php?edit=1&id='.$come['id'], 2); ?>> <span class="glyphicon glyphicon-eye-open"></span> </button>

                                    <button type="button" class="btn btn-danger" title="Desactivar" <?php echo irA('controlador/ctl_comercios.php?m=3&st=0&id='.$come['id'], 2); ?>> <span class="glyphicon glyphicon-trash"></span> </button>
                                    <?php }else{ ?>
                                    <button type="button" class="btn btn-success" title="Reactivar" <?php echo irA('controlador/ctl_comercios.php?m=3&st=1&id='.$come['id'], 2); ?>> <span class="glyphicon glyphicon-refresh"></span> </button>
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
