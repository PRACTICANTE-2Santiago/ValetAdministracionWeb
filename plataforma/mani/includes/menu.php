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
                <div class="accordion-body collapse <?php echo isset($pa) ? $pa == 'comunidad' ? 'in': '' :''; ?>" id="collapseDatos">


                    <a href="usuarios.php?esta=1">
                        <div class="accordion-inner">Administradores</div>
                    </a>


                    <a href="valetes.php?esta=1">
                        <div class="accordion-inner">Valets</div>
                    </a>


                    <a href="creditos.php?esta=1">
                        <div class="accordion-inner">Creditos</div>
                    </a>

                    <a href="admincreditos.php?esta=1">
                        <div class="accordion-inner">Renta de Creditos</div>
                    </a>

                 





                </div>
            </div>
        </div>








    <li><a href="https://linkom.mx" target="_blank">Powered by LINKOM &copy; <?php echo date('Y')?></a></li>
</ul>
