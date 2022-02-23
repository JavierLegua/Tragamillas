<?php require_once RUTA_APP.'/vistas/inc/header.php'?>
<body>
    <section>
        <div class="container">
            <div class="row vista justify-content-around justify-content-center align-items-center">
                
                <div class="borde border col-lg-3 col-md-3 p-0 tarjeta shadow mb-5 bg-white rounded">

                    <div class="card-header d-flex justify-content-center colortarjeta">
                        <i class="bi bi-stopwatch iconsize"></i>
                    </div>

                    <div class="card-body d-flex justify-content-around">
                        <p class="card-text">
                            <a class="colorb" href="#"><h4>Marcas/Test</h4> <i class="bi bi-box-arrow-right iconsizeb"></i></a>
                        </p>
                    </div>

                </div>

                <div class="borde border col-lg-3 col-md-3 p-0 tarjeta shadow mb-5 bg-white rounded">

                    <div class="card-header d-flex justify-content-center colortarjeta">
                        <i class="bi bi-file-earmark-person iconsize"></i>
                    </div>

                    <div class="card-body d-flex justify-content-around">
                        <p class="card-text">
                            <a class="colorb" href="#"><h4>Licencias</h4> <i class="bi bi-box-arrow-right iconsizeb"></i></a>
                        </p>
                    </div>

                </div>

                <div class="borde border col-md-3 p-0 tarjeta shadow mb-5 bg-white rounded">

                    <div class="card-header d-flex justify-content-center colortarjeta">
                        <i class='bi bi-people-fill iconsize'></i>
                    </div>
            
                    <div class="card-body d-flex justify-content-around">
                        <p class="card-text">
                            <a class="colorb" href="<?php echo RUTA_URL?>/alumnos"><h4>Alumnos</h4> <i class="bi bi-box-arrow-right iconsizeb"></i></a>
                        </p>
                    </div>

                </div>

                <div class="borde border col-lg-3 col-md-3 p-0 tarjeta shadow mb-5 bg-white rounded">

                    <div class="card-header d-flex justify-content-center colortarjeta">
                        <i class='bi bi-people-fill iconsize'></i>
                    </div>

                    <div class="card-body d-flex justify-content-around">
                        <p class="card-text">
                            <a class="colorb" href="<?php echo RUTA_URL?>/grupos"><h4>Grupos</h4> <i class="bi bi-box-arrow-right iconsizeb"></i></a>
                        </p>
                    </div>

                </div>

                <div class="borde border col-lg-3 col-md-3 p-0 tarjeta shadow mb-5 bg-white rounded">

                    <div class="card-header d-flex justify-content-center colortarjeta">
                        <i class="bi bi-journal-text iconsize"></i>
                    </div>

                    <div class="card-body d-flex justify-content-around">
                        <p class="card-text">
                            <a class="colorb" href="<?php echo RUTA_URL?>/entrenadores_inscripciones"><h4>Inscripciones</h4> <i class="bi bi-box-arrow-right iconsizeb"></i></a>
                        </p>
                    </div>
                    
                </div>
            
            </div>
        </div>
    </section>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> -->

<?php require_once RUTA_APP.'/vistas/inc/footer.php' ?>
