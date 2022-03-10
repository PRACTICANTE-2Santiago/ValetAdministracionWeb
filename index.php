<?php session_start(); ?>
<?php include ('plataforma/miscelaneos.php'); ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="ISO-8859-1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>..:: link - Valet ::..</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">


</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-md-4 col-md-offset-4 login">
                <div align="middle">
                    <img src="img/reportes_logo.png" width="50%" height="50%" />
                </div>
                <?php include('includes/msgs.php'); ?>
                <!-- Mnsaje de error -->
                <h1 class="text-center">Iniciar Sesi&oacute;n</h1>
                <form name="iniciarSesion" action="controlador/login.php" method="post">
                    <div class="form-group">
                        <input style="border-radius: 6px" type="text" class="form-control input-lg" name="pin" id="pin" placeholder="PIN" required="required" />
                    </div>
                    <div class="form-group">
                        <input style="border-radius: 6px" type="text" class="form-control input-lg" name="usua" id="usua" placeholder="Usuario" required="required" />
                    </div>
                    <div class="form-group">
                        <input style="border-radius: 6px" type="password" class="form-control input-lg" name="pwd" id="pwd" placeholder="Contrase&ntilde;a" required="required" />
                    </div>
                    <br>
                    <p class="text-center">
                        <button style="background-color:#09aa61" class="btn btn-lg" type="submit" name="iniciar">Iniciar Sesi&oacute;n</button>
                    </p>

                </form>
            </div>
        </div>
    </div>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <?php //include('recuperar.php'); ?>
    <script src="../js/bootstrap.min.js"></script>
</body>

</html>
