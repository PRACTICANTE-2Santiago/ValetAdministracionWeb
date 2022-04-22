<?php session_start(); ?>
<?php
include('controlador/ctl_valet.php');

?>
<?php


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
                <h3 class="page-header">Datos >> <a href="valetes.php?esta=1">Valets</a> </h3>


                <h2 class="sub-header"><?php echo 'Nombre: '.$usu['nombre']; ?></h2>


                <div class="row">
                    <div class="col-sm-12 col-md-6 col-lg-6">


                       
                        <div class="form-group">
                            <div class="col-sm-7 col-md-5 col-lg-3 text-right">
                                <label for="titulo">Correo El&eacute;ctronico: </label>
                            </div>
                            <?php echo $usu['correo_electronico']; ?>
                        </div>
                        <br>
                        <div class="form-group">
                            <div class="col-sm-7 col-md-5 col-lg-3 text-right">
                                <label for="titulo">Tel&eacute;fono: </label>
                            </div>
                            <?php echo $usu['telefono']; ?>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-7 col-md-5 col-lg-3 text-right">
                                <label for="titulo">Representante: </label>
                            </div>
                            <?php echo $usu['representante']; ?>
                        </div>
                        
                            
                        <h2 class="page-header">Datos Choferes </h2>
                        
                <?php $estat = (isset($_GET['esta']) ? $_GET['esta'] : 1); ?>
                
                <br>
                <br>

                <div class="table-responsive">
                    <table id="filtro" class="table table-striped table-bordered dataTable">
                        <thead>
                            <tr>
                                <th>Estado</th>
                                <th>Id</th>
                                <th>Nombre</th>
                                <th>Correo El&eacute;ctronico</th>
                                <th>Usuario</th>
                               
                            </tr>
                        </thead>
                        <tbody>
                            <!-- en el tr despues de una insercion o una modificacion, se remarcara la fila con success o warning -->
                            <?php 
                             $empleados = traeChoferes(0,$estat);
														if(sizeof($empleados) > 0){
															foreach($empleados as $chofer){
                                                                
               										 ?>
                            <tr>
                                <?php echo estatusAdmTabla($chofer['estatus']); ?>
                                <td><?php echo $chofer['id']?></td>
                                <td><?php echo $chofer['nombre'].' '.$chofer['apellido_paterno'].' '.$chofer['apellido_materno'] ?></td>
                                <td><?php echo $chofer['correo_electronico']?></td>
                                <td><?php echo $chofer['usuario']?></td>
                              
                            </tr>
                            <?php  }
                            }else{
                                echo "<tr><td colspan='7'><h5 class='text-center'>No Hay resultados para mostrar</h5></td></tr>";
                            }
                        ?>
                        </tbody>
                    </table>
                </div>
                <h2 class="page-header">Reporte </h2>
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
            </div>
        </div>
    </div>

                     





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
