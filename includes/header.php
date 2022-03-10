<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script>
	var $jq = jQuery.noConflict();
</script>
<script src="js/bootstrap.min.js"></script>
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet" media="all">
<style>
	.dropdown-menu {
	background-color: #be1a19;
		
}
	#lista:hover{
		background-color: #FE2E2E;
		color: #fff;
	}


	
</style>
<?php include('controlador/ctl_productos.php');?>
<div class="header-top">
	<div class="wrap">
		<!--<div class="header-top-left">
			<div class="box">
				<select tabindex="4" class="dropdown">
					<option value="" class="label" value="">Idioma :</option>
					<option value="1">Ingles</option>
					<option value="2">Franc&eacute;s</option>
					<option value="3">Alem&aacute;n</option>
				</select>
			</div>
			<div class="box1">
				<select tabindex="4" class="dropdown">
					<option value="" class="label" value="">Moneda :</option>
					<option value="1">$ Dolar</option>
					<option value="2"> Euro</option>
					<option value="3">$ MXN</option>
				</select>
			</div>
			<div class="clear"></div>
		</div>-->
		<div class="cssmenu">
			<ul>
				<li class="active">
					<!-- Single button -->
					<div class="btn-group">
						<button type="button" style="background-color: #be1a19;" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Iniciar Sesi&oacute;n <span class="caret"></span>
						</button>
						<ul class="dropdown-menu" style="">
							<li ><a id="lista" href="plataforma/man/index.php">Administrador</a></li>
							<li><a id="lista" href="plataforma/manasis/index.php">Asistente administrativo</a></li>
							<li><a id="lista" href="plataforma/manaseso/index.php">Asesor comercial / Ejecutivo de ventas</a></li>
							<li><a id="lista" href="plataforma/mangeren/index.php">Gerente de almacen</a></li>
							<li><a id="lista" href="plataforma/maning/index.php">Ingenieros</a></li>
						</ul>
                      
					</div>
				</li>
				
			</ul>
		</div>

		<div class="clear"></div>
	</div>
</div>
<div class="header-bottom">
	<div class="wrap">
		<div class="header-bottom-left">
			<div class="logo">
				<a href="index.php"><img src="img/logo.png" alt="" /></a>
			</div>
			
		</div>
		

		<div class="clear"></div>
	</div>
</div>

