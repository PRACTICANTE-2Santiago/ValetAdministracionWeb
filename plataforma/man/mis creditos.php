<?php session_start(); ?>
<?php
include('controlador/ctl_creditos.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Head HTML -->
    <?php include('includes/head.php') ?>
    <style>
        .ventana{
            background-color: rgba(0,0,0,0.8);
            backdrop-filter: blur(2px);
            border-radius: none;
            display: none ;
            color: #fff;
            height: 100%;
            width: 100%;
            left: 0%;
            position: fixed;
            top: 0%;
            z-index: 1000;
        }
        .form{
            border-radius: 30px;
            background-color: #ecececd9;
            width: 40%;
            height: 60%;
            margin: 20px;
            padding: 30px;
            color: #424242e6;
            top: 10%;
            left: 30%;
            right: 30%;
            position: absolute;
        }
        .btnModal {
            margin: 30px;
        }
    </style>
</head>
 
    <body>
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
    <?php
 
   // Dirección o IP del servidor MySQL
    $host = "localhost";
 
    // Puerto del servidor MySQL
    $puerto = "3306";
 
   // Nombre de usuario del servidor MySQL
   $usuario = "root";
 
    // Contraseña del usuario
   $contrasena = "";
 
   // Nombre de la base de datos
   $baseDeDatos ="valet_parking";
 
   // Nombre de la tabla a trabajar
    $tabla = "contador";
  
 
    function Conectarse()
   {
     global $host, $puerto, $usuario, $contrasena, $baseDeDatos, $tabla , $tabla2;
 
     if (!($link = mysqli_connect($host.":".$puerto, $usuario, $contrasena))) 
     { 
        echo "Error conectando a la base de datos.<br>"; 
       exit(); 
            }
     else
      {
     
      }
     if (!mysqli_select_db($link, $baseDeDatos)) 
      { 
      
        exit(); 
      }
     else
      {
       
     }
   return $link; 
    } 
 
    $link = Conectarse();
 $id= $_SESSION['idvalet'] ;
   $query = "SELECT * FROM $tabla  where id_valet = $id  ";
    $result = mysqli_query($link, $query); 
 
 
   ?>
 

 
 <h4 align="center" style="font-weight: bold">MIS CREDITOS</h4>
                      
                            


 <div class="table-responsive">
                    <table id="filtro" class="table table-striped table-bordered dataTable">
                        <thead>
                            <tr>  
                                
                                <th>Actualmente tus Estacionamientos disponibles son:</th>
                          
                            </tr>
                        </thead>
                        <tbody>
                            <!-- en el tr despues de una insercion o una modificacion, se remarcara la fila con success o warning -->
                            <?php 
                          while($row = mysqli_fetch_array($result))
                          { 
                        
                             printf("<tr><td>%s</td></tr>", $row["stock"]); 
                        
                           } 
                        
                           mysqli_free_result($result); 
                        
                           mysqli_close($link); 
                            ?>
                          
                          
 

 
 
                        </tbody>
                    </table>
                   
                </div>
              
               
            <!-- Menu -->
           
            <!-- EO Menu -->

            <!-- Contenido -->
           
        
                
                <br>

                <?php $estat = (isset($_GET['esta']) ? $_GET['esta'] : 1); ?>

               
            
                <h1 align="center" style="font-weight: bold;"> NUESTROS PLANES
                    <?php  
                        
              ?>

                </h1>


                <div class="table-responsive">
                    <table id="filtro" class="table table-striped "  >
                        <thead>
                            <tr>
                               
                               
                                <th width="50%" bgcolor="gren">Nombre</th>
                                <th width="50%" bgcolor="gren">Costo</th>
                                <th width="50%" bgcolor="gren">Servicios</th>
                                <th width="50%" bgcolor="gren">Aviso</th>
                                <th width="50%" bgcolor="gren">Cancelaciones</th>
                                <th width="50%" bgcolor="gren">Acciones</th>
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
                              
                                
                                <td><?php echo $usua['nombre']?></td>
                                <td><?php echo $usua['costo']?></td>
                                <td><?php echo $usua['servicios']?></td>
                                <td><?php echo $usua['aviso']?></td>
                                <td><?php echo $usua['cancelaciones']?></td>
                                <td>

                                <button type="button" class="btn btn-primary" title="Ver" <?php echo irA('infocompra.php?edit=1&id='.$usua['id'], 2); ?>> <span class="glyphicon glyphicon-eye-open"></span> Adquirir </button>


                                    <td>
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
 
    

  
    <div class="ventana">
        <div class="form form-group">
            <a href="javascript:closeModal();">X</a>
            <header><h1>Gestor de Tarifas</h1></header>
            <form action="upload.php" method="post" enctype="multipart/form-data">
                <br>
                
                <!--<h4>Modificar Tarifa</h4>-->
                <h1>Registro Actualizado</h1>
               
                <br>
                <label for="focusedinput">Nuevo Precio $</label>
                <input class="form-control"  name="tarifa" id="tarifa"  type="number" placeholder="00.00">

                <br>
                <br>
                <input type="submit" name="submit" value="UPLOAD" onclick="location.href='Comercios.php?';"/>
                <input type="button" class="btn btn-danger btnModal" value="Cancelar" onClick="jacascript:closeModal();">
            </form>
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