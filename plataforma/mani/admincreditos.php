<?php session_start(); ?>
<?php
include('controlador/ctl_valet.php');
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

                    <button type="button" name="nvousu" class="btn btn-primary" title="Nuevo Valet" <?php echo irA('asignarcredito.php', 2); ?>>
                        <span class="glyphicon glyphicon-plus-sign"></span> Asignar credito a valet
                    </button>  
                </h2>
                <br>

                <?php $estat = (isset($_GET['esta']) ? $_GET['esta'] : 1); ?>
                <h4 class="text-right">
                    <button type="button" id="boton_uno" class="btn btn-success" onclick="location.href='valetes.php?esta=1';"> Activos( <?php echo traeEstatusValet(1); ?> ) </button>

                    <button type="button" id="boton_dos" class="btn btn-danger" onclick="location.href='valetes.php?esta=0';"> Inactivos( <?php echo traeEstatusValet(0); ?> ) </button>
                </h4>

                <script>
                    function myFunction() {

                        if (<?php echo $_GET['esta'] ?> == 1) {
                            var boton = document.getElementById("boton_uno");
                            boton.setAttribute("class", "btn btn-success");

                            var boton1 = document.getElementById("boton_dos");
                            boton1.setAttribute("class", "btn btn-secondary");


                        } else if (<?php echo $_GET['esta'] ?> == 0) {

                            var boton1 = document.getElementById("boton_uno");
                            boton1.setAttribute("class", "btn btn-secondary");

                            var boton2 = document.getElementById("boton_dos");
                            boton2.setAttribute("class", "btn btn-danger");

                        }
                    }

                </script>


                <br>
                <br>

                <div class="table-responsive">
                    <table id="filtro" class="table table-striped table-bordered dataTable">
                        <thead>
                            <tr>
                                <th>Estado</th>
                                <th>Id</th>
                                <th>PIN</th>
                                <th>Nombre Valet</th>
                                <th>Plan</th>
                                <th>Fecha</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- en el tr despues de una insercion o una modificacion, se remarcara la fila con success o warning -->
                            <?php 
                             $valetes = traeValet(0,'', $estat);
														if(sizeof($valetes) > 0){
															foreach($valetes as $valet){
               										 ?>
                            <tr>
                                <?php echo estatusAdmTabla($valet['estatus']); ?>
                                <td><?php echo $valet['id']?></td>
                                <td><?php echo $valet['id_pin']?></td>
                                <td><?php echo $valet['nombre'] ?></td>
                                <td><?php echo $valet['correo_electronico']?></td>
                                <td><?php echo $valet['representante']?></td>
                                <td>
                                    <?php if($valet['estatus']== 1){ ?>
                                    <button type="button" class="btn btn-info" title="Actualizar" <?php echo irA('valet.php?edit=1&id='.$valet['id'], 2); ?>> <span class="glyphicon glyphicon-pencil"></span> </button>

                                    <button type="button" class="btn btn-warning" title="Ver" <?php echo irA('valet_info.php?edit=1&id='.$valet['id'], 2); ?>> <span class="glyphicon glyphicon-eye-open"></span> </button>


                                    <?php
                                                                $usu= traeUsuarios(0 ,$valet['id'], 1);
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

                                    <button type="button" class="btn btn-danger" title="Desactivar" <?php echo irA('controlador/ctl_valet.php?m=3&st=0&id='.$valet['id'], 2); ?>> <span class="glyphicon glyphicon-trash"></span> </button>
                                    <?php }else{ ?>
                                    <button type="button" class="btn btn-success" title="Reactivar" <?php echo irA('controlador/ctl_valet.php?m=3&st=1&id='.$valet['id'], 2); ?>> <span class="glyphicon glyphicon-refresh"></span> </button>
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
