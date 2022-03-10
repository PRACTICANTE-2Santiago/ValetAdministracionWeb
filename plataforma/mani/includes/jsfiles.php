<script src="../js/jquery-1.11.1.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/jquery.dataTables.min.js"></script>
<script src="../js/dataTables.bootstrap.js"></script>

<link rel="stylesheet" type="text/css" href="../css/jquery.dataTables.css">

<script>
$(document).ready(function(){
    $("#filtro, #filtro2").dataTable(
    	{
    		"language": {
    			"lengthMenu": "Mostrar _MENU_ Registros por P&aacute;gina",
           	 	"zeroRecords": "Sin Registros",
            	"info": "Mostrando P&aacute;gina _PAGE_ de _PAGES_",
            	"infoEmpty": "No hay informaci&oacute;n disponible",
         		"search": "Buscar ",
         		"paginate": {
      				"next": " Siguiente",
      				"previous": "Anterior "
    			},
         	 	"infoFiltered": "(Filtrado de _MAX_  Registros)"
         	}
        }
    );
});
$.fn.dataTable.ext.errMode = 'none';
</script>