<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="estilos.css">
</head>
<?php require_once RUTA_APP.'/vistas/inc/header.php' ?>
<?php if (tienePrivilegios($datos['usuarioSesion']->idRol,[1,2])):?>
    <body>
<section class="main">
    <div class="container">

        <div class="row d-flex justify-content-around" style="margin-bottom: 50px;">
            <div class="borde border col-lg-3 col-md-3 p-0 tarjeta">
                <div class="card-header d-flex justify-content-center colortarjeta">
                    <i class="bi bi-people-fill iconsize"></i>
                </div>

                <div class="card-body">
                    <h4 class="card-title text-center">Grupos</h4>
                    <p class="card-text">
                        <div class="accordion accordion-flush" id="accordionFlushExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingOne1">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne1" aria-expanded="false" aria-controls="flush-collapseOne">
                                    Enlaces
                                    </button>
                                </h2>
                                <div id="flush-collapseOne1" class="accordion-collapse collapse" aria-labelledby="flush-headingOne1" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">
                                        <a href="#">Crear</a> <br>
                                        <a href="#">Eliminar</a> <br>
                                        <a href="#">Ver</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </p>
                </div>

            </div>

            <div class="borde border col-lg-3 col-md-3 p-0 tarjeta">
                <div class="card-header d-flex justify-content-center colortarjeta">
                    <i class="bi bi-calendar2-plus iconsize"></i>
                </div>
                
                <div class="card-body">
                    <h4 class="card-title text-center">Eventos</h4>
                    <p class="card-text">
                        <div class="accordion accordion-flush" id="accordionFlushExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingOne2">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne2" aria-expanded="false" aria-controls="flush-collapseOne">
                                    Enlaces
                                    </button>
                                </h2>
                                <div id="flush-collapseOne2" class="accordion-collapse collapse" aria-labelledby="flush-headingOne2" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">
                                        <a href="#">Organizar</a> <br>
                                        <a href="#">Gestionar</a> <br>
                                        <a href="#">Consultar</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </p>
                </div>

            </div>

            <div class="borde border col-lg-3 col-md-3 p-0 tarjeta">
                <div class="card-header d-flex justify-content-center colortarjeta">
                    <i class="bi bi-envelope iconsize"></i>
                </div>
                <div class="card-body">
                    <h4 class="card-title text-center">Correo</h4>
                    <p class="card-text">
                        <a href="#">Enviar</a> <br>
                        <a href="#">Gestionar</a>
                    </p>
                </div>
            </div>

            <div class="borde border col-lg-3 col-md- p-0 tarjeta">
                <div class="card-header d-flex justify-content-center colortarjeta">
                    <i class="bi bi-journal-text iconsize"></i>
                </div>
                <div class="card-body">
                    <h4 class="card-title text-center">Inscripciones</h4>
                    <p class="card-text">
                        <a href="#">Grupo</a> <br>
                        <a href="#">Evento</a>
                    </p>
                </div>
            </div>

            <div class="borde border col-lg-3 col-md- p-0 tarjeta">
                <div class="card-header d-flex justify-content-center colortarjeta">
                    <i class="bi bi-currency-euro iconsize"></i>
                </div>
                <div class="card-body">
                    <h4 class="card-title text-center">Facturación</h4>
                    <p class="card-text">
                        <a href="#">Consultar</a> <br>
                        <a href="#">Pagos</a>
                    </p>
                </div>
            </div>
        
        
            <div class="borde border col-md-4 p-0 tarjeta">
                <div class="card-header d-flex justify-content-center colortarjeta">
                <i class="bi bi-cart2 iconsize"></i>
                </div>
                <div class="card-body">
                    <h4 class="card-title text-center">Tiendas</h4>
                    <p class="card-text">
                        <div class="accordion accordion-flush" id="accordionFlushExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingOne6">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne6" aria-expanded="false" aria-controls="flush-collapseOne">
                                    Enlaces
                                    </button>
                                </h2>
                                <div id="flush-collapseOne6" class="accordion-collapse collapse" aria-labelledby="flush-headingOne6" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body"><a href="#">Consultar</a></div>
                                </div>
                            </div>
                        </div>
                    </p>
                </div>
            </div>

            <div class="borde border col-md-4 p-0 tarjeta">
                <div class="card-header d-flex justify-content-center colortarjeta">
                <i class="bi bi-file-earmark-person iconsize"></i>    
                </div>
                <div class="card-body">
                    <h4 class="card-title text-center">Licencias</h4>
                    <p class="card-text">
                        <a href="#">Consultar</a> <br>
                        <a href="#">Dar de alta</a>
                    </p>
                </div>
            </div>

            <div class="borde border col-md-4 p-0 tarjeta">
                <div class="card-header d-flex justify-content-center colortarjeta">
                    <i class='bi bi-calendar-date iconsize'></i>
                </div>
                <div class="card-body">
                    <h4 class="card-title text-center">Temporadas</h4>
                    <p class="card-text">
                        <a href="#">Consultar</a> <br>
                    </p>
                </div>
            </div>

            <div class="borde border col-md-4 p-0 tarjeta">
                <div class="card-header d-flex justify-content-center colortarjeta">
                    <i class='bi bi-person-fill iconsize'></i>
                </div>
        
                <div class="card-body">
                    <h4 class="card-title text-center">Usuarios</h4>
                    <p class="card-text">
                        <div class="accordion accordion-flush" id="accordionFlushExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingOne9">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne9" aria-expanded="false" aria-controls="flush-collapseOne">
                                    Enlaces
                                    </button>
                                </h2>
                                <div id="flush-collapseOne9" class="accordion-collapse collapse" aria-labelledby="flush-headingOne9" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body"><a href="#">Gestionar</a></div>
                                </div>
                            </div>
                        </div>
                    </p>
                </div>
            </div>

            

        </div><!-- fin row -->

    </div> <!-- fin container -->
</section>
</body>

<?php else: ?>
    <h1>HOLA</h1>
<?php endif ?>

<?php require_once RUTA_APP.'/vistas/inc/footer.php' ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>

