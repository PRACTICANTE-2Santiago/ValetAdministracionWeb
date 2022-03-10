<?php session_start(); ?>
<!-- Modal Login -->
<script type="text/javascript">
//<![CDATA[
var tlJsHost = ((window.location.protocol == "https:") ? "https://secure.comodo.com/" : "http://www.trustlogo.com/");
document.write(unescape("%3Cscript src='" + tlJsHost + "trustlogo/javascript/trustlogo.js' type='text/javascript'%3E%3C/script%3E"));
//]]>
</script>    
<html>
<body>
	
<div class="modal fade" id="alerta" tabindex="-1" role="dialog" aria-labelledby="Alerta Residencial" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" style="color:#FFF;" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">
        	<div class="row">
        		<div class="col-sm-3 col-md-3 col-lg-3 col-sm-offset-4 col-md-offset-4 col-lg-offset-4">
        			<img class="" src="gal/Alerta_Residencial.png">
        		</div
        	</div>
        </h4>
      </div>
      <div class="modal-body" style="text-align: justify;">
		<form role="form" name="alerta" method="post" enctype="multipart/form-data" action="controlador/ctl_alerta.php?m=11&idres=<?php echo $_SESSION['resi']."&idr=".$_SESSION['idusu'] ?>">
			<h5 >Con el fin de brindarle una mayor seguridad, reporte en este módulo cualquier anomalía o emergencia.</h5>
			<br>
        	<div class="form-group">
        		<textarea rows="4" style="margin-left: 0" name="descripcion" class="form-control" id="descripcion" required="required" placeholder="Descripción"></textarea>
        	</div>
        	<div class="form-group">
        		<h5>Anexar Archivo</h5>
        	</div>	
        	<div class="form-group">
        		<input type="file" class=" form-control" style="margin-left: 0;" name="archivo">
        	</div>
        
      </div>
      <div class="modal-footer">
      	<div class="row">
      		<div class="col-sm-3 col-md-3 col-lg-3 col-sm-offset-4 col-md-offset-4 col-lg-offset-4">
        		<h5><button style=" margin-left:45px; font-weight:bold; color:#1b9bca;" type="submit" class="btn btn-default" >Reportar</button></h5>
      		</div>  	
       </div>
        </form>
      </div>
    </div>
  </div>
</div>
</body>
</html>   