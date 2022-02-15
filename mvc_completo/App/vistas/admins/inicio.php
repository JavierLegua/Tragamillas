<?php require_once RUTA_APP.'/vistas/inc/header.php' ?>
<body>
    <section class="main">
    <div class="container">

        <div class="row d-flex justify-content-around">  <!-- Esto lo que hace es que coja todo el ancho de la página -->

<!-- ----------------------- -->
            <div class="borde border col-lg-3 col-md-3 p-0 tarjeta shadow mb-5 bg-white rounded">
                <div class="card-header d-flex justify-content-center colortarjeta">
                    <i class="bi bi-people-fill iconsize"></i>
                </div>

                <div class="card-body d-flex justify-content-around">
                    
                    <p class="card-text">
                        <a class="colorb" href="#"><h4>Grupos</h4> <i class="bi bi-box-arrow-right iconsizeb"></i></a>
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
                        <a class="colorb" href="#"><h4>Eventos</h4> <i class="bi bi-box-arrow-right iconsizeb"></i></a>
                    </p>
                </div>
            </div>
<!-- ----------------------- -->

            <div class="borde border col-lg-3 col-md-3 p-0 tarjeta shadow mb-5 bg-white rounded">

                <div class="card-header d-flex justify-content-center colortarjeta">
                    <i class="bi bi-envelope iconsize"></i>
                </div>

                <div class="card-body d-flex justify-content-around">
                    <p class="card-text">
                        <a class="colorb" href="#"><h4>Correo</h4> <i class="bi bi-box-arrow-right iconsizeb"></i></a>
                    </p>
                </div>

            </div>


<!-- ----------------------- -->
            <div class="borde border col-lg-3 col-md- p-0 tarjeta shadow mb-5 bg-white rounded">

                <div class="card-header d-flex justify-content-center colortarjeta">
                    <i class="bi bi-journal-text iconsize"></i>
                </div>

                <div class="card-body d-flex justify-content-around">
                    <p class="card-text">
                        <a class="colorb" href="#"><h4>Inscripciones</h4> <i class="bi bi-box-arrow-right iconsizeb"></i></a>
                    </p>
                </div>

            </div>

<!-- ----------------------- -->


            <div class="borde border col-lg-3 col-md- p-0 tarjeta shadow mb-5 bg-white rounded">

                <div class="card-header d-flex justify-content-center colortarjeta">
                    <i class="bi bi-currency-euro iconsize"></i>
                </div>

                <div class="card-body d-flex justify-content-around">
                    <p class="card-text">
                        <a class="colorb" href="#"><h4>Facturación</h4> <i class="bi bi-box-arrow-right iconsizeb"></i></a>
                    </p>
                </div>

            </div>
        
 <!-- ----------------------- -->       
            <div class="borde border col-md-4 p-0 tarjeta shadow mb-5 bg-white rounded">
                <div class="card-header d-flex justify-content-center colortarjeta">
                <i class="bi bi-cart2 iconsize"></i>
                </div>

                <div class="card-body d-flex justify-content-around">
                    <p class="card-text">
                        <a class="colorb" href="<?php echo RUTA_URL?>/tiendas"><h4>Tiendas</h4> <i class="bi bi-box-arrow-right iconsizeb"></i></a>
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
                        <a class="colorb" href="#"><h4>Licencias</h4> <i class="bi bi-box-arrow-right iconsizeb"></i></a>
                    </p>
                </div>
            </div>

<!-- ----------------------- -->
            <div class="borde border col-md-4 p-0 tarjeta shadow mb-5 bg-white rounded">
                <div class="card-header d-flex justify-content-center colortarjeta">
                    <i class='bi bi-calendar-date iconsize'></i>
                </div>
                <div class="card-body d-flex justify-content-around">
                    <p class="card-text">
                        <a class="colorb" href="#"><h4>Temporadas</h4> <i class="bi bi-box-arrow-right iconsizeb"></i></a>
                    </p>
                </div>
            </div>
<!-- ----------------------- -->
            <div class="borde border col-md-4 p-0 tarjeta shadow mb-5 bg-white rounded">
                <div class="card-header d-flex justify-content-center colortarjeta">
                    <i class='bi bi-person-fill iconsize'></i>
                </div>
               
                <div class="card-body d-flex justify-content-around">
                    <p class="card-text">
                        <a class="colorb" href="<?php echo RUTA_URL?>/usuarios"><h4>Usuarios</h4> <i class="bi bi-box-arrow-right iconsizeb"></i></a>
                    </p>
                </div>
        
            </div>
<!-- ----------------------- -->
        </div><!-- fin row -->

    </div> <!-- fin container -->
</section>


<?php require_once RUTA_APP.'/vistas/inc/footer.php' ?>
