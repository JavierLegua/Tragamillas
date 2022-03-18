<?php require_once RUTA_APP.'/vistas/inc/header.php' ?>
    <section>
        <div class="container">
            <div class="row vista justify-content-around justify-content-center align-items-center ">
                
                <div class="borde border col-lg-3 col-md-3 p-0 tarjeta shadow mb-5 bg-white rounded">
                    <div class="card-header d-flex justify-content-center colortarjeta">
                        <i class="bi bi-person-badge iconsize"></i>
                    </div>

                    <div class="card-body d-flex justify-content-around">
                        <p class="card-text">
                            <a class="colorb" href="<?php echo RUTA_URL?>/socios"><h4>Socios</h4></a>
                        </p>
                    </div>

                </div>

                <div class="borde border col-lg-3 col-md-3 p-0 tarjeta shadow mb-5 bg-white rounded">
                    <div class="card-header d-flex justify-content-center colortarjeta">
                        <i class="bi bi-journal-check iconsize"></i>
                    </div>

                    <div class="card-body d-flex justify-content-around">
                        <p class="card-text">
                            <a class="colorb" href="<?php echo RUTA_URL?>/pedidos"><h4>Pedidos</h4></a>
                        </p>
                    </div>
                </div>
            
            </div>
        </div>
    </section>

<?php require_once RUTA_APP.'/vistas/inc/footer.php' ?>
