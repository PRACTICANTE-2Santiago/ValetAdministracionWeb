<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container-fluid">


        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="inicio.php"><?php echo ('Administrador '.$_SESSION['nombre']);?></a>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="usuario.php?val=1&id=<?php echo $_SESSION['idusu']; ?>" title="Clic para editar mis datos">Bienvenido: <?php echo $_SESSION['usu']; ?></a></li>
                <li><a href="../../controlador/login.php?close=1&idusu=<?php echo $_SESSION['idusu'];?>" title="Cerrar Sesi&oacute;n"><span class="glyphicon glyphicon-off"></span></a></li>
            </ul>
        </div>
    </div>
</div>
