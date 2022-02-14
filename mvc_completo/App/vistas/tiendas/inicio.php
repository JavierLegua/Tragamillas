<?php require_once RUTA_APP.'/vistas/inc/header.php' ?>
    <section>
        <div class="container">
            <div class="row d-flex justify-content-around" style="margin-bottom: 50px;">
                
                <div class="borde border col-lg-3 col-md-3 p-0 tarjeta shadow mb-5 bg-white rounded">
                    <div class="card-header d-flex justify-content-center colortarjeta">
                        <i class="bi bi-person-badge iconsize"></i>
                    </div>

                    <div class="card-body">
                        
                        <p class="card-text">
                            <div class="accordion accordion-flush" id="accordionFlushExample1">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="flush-headingOne1">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne1" aria-expanded="false" aria-controls="flush-collapseOne1">
                                        <h5 class="card-title text-center">Socios</h5>
                                        </button>
                                    </h2>
                                    <div id="flush-collapseOne1" class="accordion-collapse collapse" aria-labelledby="flush-headingOne1" data-bs-parent="#accordionFlushExample1">
                                        <div class="accordion-body">
                                            <a href="<?php echo RUTA_URL?>/socios">Consultar Socios</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </p>
                    </div>
                </div>

                <div class="borde border col-lg-3 col-md-3 p-0 tarjeta shadow mb-5 bg-white rounded">
                    <div class="card-header d-flex justify-content-center colortarjeta">
                        <i class="bi bi-journal-check iconsize"></i>
                    </div>

                    <div class="card-body">
                        
                        <p class="card-text">
                            <div class="accordion accordion-flush" id="accordionFlushExample3">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="flush-headingOne3">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                            <h5 class="card-title text-center">Reparto Ropa </h5>
                                        </button>
                                    </h2>
                                    <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne3" data-bs-parent="#accordionFlushExample3">
                                        <div class="accordion-body">
                                            <a href="#">Ropa Recogida</a> <br>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </p>
                    </div>
                </div>
            
            </div>
        </div>
    </section>

<?php require_once RUTA_APP.'/vistas/inc/footer.php' ?>
