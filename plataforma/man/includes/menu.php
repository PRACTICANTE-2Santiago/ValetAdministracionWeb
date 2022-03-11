<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">





<ul class="nav nav-sidebar">

    <li>

        <div class="accordion" id="accordionDatos">
            <div class="accordion-group">
                <div class="accordion-heading" href="#collapseDatos" data-toggle="collapse" data-parent="#accordionDatos">
                    <a class="accordion-toggle">
                        Datos <span class="caret"></span>
                    </a>
                </div>
                <div class="accordion-body <?php echo isset($pa) ? $pa == 'comunidad' ? 'in': '' :''; ?>" id="collapseDatos">


                    <a href="usuarios.php?esta=1">
                        <div class="accordion-inner">Administradores</div>
                    </a>



                    <a href="choferes.php?esta=1">
                        <div class="accordion-inner">Choferes</div>
                    </a>

                <a href="mis creditos.php?esta=1">
                        <div class="accordion-inner">Mis creditos</div>
                    </a>


                    <a href="Comercios.php?esta=1">
                        <div class="accordion-inner">Comercios</div>
                    </a>


                   



                </div>
            </div>
        </div>

        <div class="accordion" id="accordionReportes">
            <div class="accordion-group">
                <div class="accordion-heading" href="#collapseReportes" data-toggle="collapse" data-parent="#accordionReportes">
                    <a class="accordion-toggle">
                        Reportes <span class="caret"></span>
                    </a>
                </div>
                <div class="accordion-body  <?php echo isset($pa) ? $pa == 'comunidad' ? 'in': '' :''; ?>" id="collapseReportes">


                    <a href="reportes.php?esta=1">
                        <div class="accordion-inner">Reporte del D&iacute;a</div>
                    </a>



                    <a href="reportes_general.php?esta=1">
                        <div class="accordion-inner">Reporte General</div>
                    </a>


                </div>
            </div>
        </div>








    <li><a href="https://linkom.mx" target="_blank">Powered by LINKOM &copy; <?php echo date('Y')?></a></li>
</ul>
