<?php require_once RUTA_APP.'/vistas/inc/header.php' ?>
    <main class="flex-shrink-0 mt-auto">
    <div class="container">
        <div class="row justify-content-around justify-content-center align-items-center mt-5"> 

<!-- ----------------------- -->
            <div class="borde border col-lg-3 col-md-3 p-0 tarjeta shadow mb-5 bg-white rounded">
                <div class="card-header d-flex justify-content-center colortarjeta">
                    <i class="bi bi-people-fill iconsize"></i>
                </div>

                <div class="card-body d-flex justify-content-around">
                    
                    <p class="card-text">
                        <a class="colorb" href="<?php echo RUTA_URL ?>/grupos"><h4>Grupos</h4></a>
                    </p>
                </div>
            </div>
<!-- ----------------------- -->
            <div class="borde border col-lg-3 col-md-3 p-0 tarjeta shadow mb-5 bg-white rounded">
                <div class="card-header d-flex justify-content-center colortarjeta">
                    <i class="bi bi-calendar2-plus iconsize"></i>
                </div>
                
                <div class="card-body d-flex justify-content-around">
                    
                    <p class="card-text">
                        <a class="colorb" href="<?php echo RUTA_URL ?>/eventos"><h4>Eventos</h4></a>
                    </p>
                </div>
            </div>
<!-- ----------------------- -->

            <!-- <div class="borde border col-lg-3 col-md-3 p-0 tarjeta shadow mb-5 bg-white rounded">

                <div class="card-header d-flex justify-content-center colortarjeta">
                    <i class="bi bi-envelope iconsize"></i>
                </div>

                <div class="card-body d-flex justify-content-around">
                    <p class="card-text">
                        <a class="colorb" href="<?php echo RUTA_URL?>/Admin/mantenimiento"><h4>Correo</h4></a>
                    </p>
                </div>

            </div> -->


<!-- ----------------------- -->
            <!-- <div class="borde border col-lg-3 col-md- p-0 tarjeta shadow mb-5 bg-white rounded">

                <div class="card-header d-flex justify-content-center colortarjeta">
                    <i class="bi bi-journal-text iconsize"></i>
                </div>

                <div class="card-body d-flex justify-content-around">
                    <p class="card-text">
                        <a class="colorb" href="<?php //echo RUTA_URL?>/entrenadores_inscripciones"><h4>Inscripciones</h4></a>
                    </p>
                </div>

            </div> -->

<!-- ----------------------- -->


            <!-- <div class="borde border col-lg-3 col-md- p-0 tarjeta shadow mb-5 bg-white rounded">

                <div class="card-header d-flex justify-content-center colortarjeta">
                    <i class="bi bi-currency-euro iconsize"></i>
                </div>

                <div class="card-body d-flex justify-content-around">
                    <p class="card-text">
                        <a class="colorb" href="<?php echo RUTA_URL?>/Admin/mantenimiento"><h4>Facturación</h4></a>
                    </p>
                </div>

            </div> -->

 <!-- ----------------------- -->  

            <div class="borde border col-md-4 p-0 tarjeta shadow mb-5 bg-white rounded">
                <div class="card-header d-flex justify-content-center colortarjeta">
                <i class="bi bi-cart2 iconsize"></i>
                </div>

                <div class="card-body d-flex justify-content-around">
                    <p class="card-text">
                        <a class="colorb" href="<?php echo RUTA_URL?>/tiendas"><h4>Tiendas</h4></a>
                    </p>
                </div>
            </div>
            

     
            

<!-- ----------------------- -->
            <div class="borde border col-md-4 p-0 tarjeta shadow mb-5 bg-white rounded">
                <div class="card-header d-flex justify-content-center colortarjeta">
                    <i class="bi bi-file-earmark-person iconsize"></i>    
                </div>

                <div class="card-body d-flex justify-content-around">
                    <p class="card-text">
                        <a class="colorb" href="<?php echo RUTA_URL?>/licencias"><h4>Licencias</h4></a>
                    </p>
                </div>
            </div>

<!-- ----------------------- -->
            <!-- <div class="borde border col-md-4 p-0 tarjeta shadow mb-5 bg-white rounded">
                <div class="card-header d-flex justify-content-center colortarjeta">
                    <i class='bi bi-calendar-date iconsize'></i>
                </div>
                <div class="card-body d-flex justify-content-around">
                    <p class="card-text">
                        <a class="colorb" href="<?php echo RUTA_URL?>/Admin/mantenimiento"><h4>Temporadas</h4></a>
                    </p>
                </div>
            </div> -->
<!-- ----------------------- -->
            <div class="borde border col-md-4 p-0 tarjeta shadow mb-5 bg-white rounded">
                <div class="card-header d-flex justify-content-center colortarjeta">
                    <i class='bi bi-person-fill iconsize'></i>
                </div>
               
                <div class="card-body d-flex justify-content-around">
                    <p class="card-text">
                        <a class="colorb" href="<?php echo RUTA_URL?>/usuarios"><h4>Usuarios</h4></a>
                    </p>
                </div>
        
            </div>
<!-- ----------------------- -->
        </div><!-- fin row -->

    </div> <!-- fin container -->
</main>

<?php require_once RUTA_APP.'/vistas/inc/footer.php' ?>
