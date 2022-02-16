
<footer class="footer">
    <div class="container-fluid position-absolute bottom-0 end-0 color">


    <?php if (tienePrivilegios($datos['usuarioSesion']->idRol,[1])):?>

        <div class="row" style="height: 70px;">

            <div class="col mt-4">
                <a class="color" href="<?php echo RUTA_URL ?>/usuarios">Usuarios</a>
                <a class="color" href="#">Grupos</a>
                <a class="color" href="#">Licencias</a>
                <a class="color" href="#">Eventos</a>
                <a class="color" href="#">Correo</a>
                <a class="color" href="#">Inscripciones</a>
                <a class="color" href="#">Facturación</a>
                <a class="color" href="#">Tiendas</a>
                <a class="color" href="#">Temporadas</a>
            </div>

            <div class="col" style="margin-right: 150px;">
                <a href=""><i class="bi bi-facebook float-end ms-3" style='font-size:35px; color:#023ef9'></i> </a>
                <i class="bi bi-instagram float-end ms-3" style="font-size:35px; color:#023ef9"></i>
                <i class="bi bi-youtube float-end ms-3" style="font-size:35px; color:#023ef9"></i>
            </div>

        </div>

    <?php endif ?>

    <?php if (tienePrivilegios($datos['usuarioSesion']->idRol,[2])):?>

        <div class="row" style="height: 70px;">

            <div class="col mt-4">
                <a class="color" href="<?php echo RUTA_URL ?>/usuarios">Alumnos</a>
                <a class="color" href="#">Marcas-Test</a>
                <a class="color" href="#">Licencias</a>
                <a class="color" href="#">Inscripciones</a>
            </div>

            <div class="col" style="margin-right: 150px;">
                <a href=""><i class="bi bi-facebook float-end ms-3" style='font-size:35px; color:#023ef9'></i> </a>
                <i class="bi bi-instagram float-end ms-3" style="font-size:35px; color:#023ef9"></i>
                <i class="bi bi-youtube float-end ms-3" style="font-size:35px; color:#023ef9"></i>
            </div>

        </div>

    <?php endif ?>

    <?php if (tienePrivilegios($datos['usuarioSesion']->idRol,[3])):?>

        <div class="row" style="height: 70px;">

            <div class="col mt-4">
                <a class="color" href="<?php echo RUTA_URL ?>/usuarios">Perfil</a>
                <a class="color" href="#">Marcas-Test</a>
                <a class="color" href="#">Licencias</a>
                <a class="color" href="#">Inscripciones</a>
                <a class="color" href="#">Pagos cuotas</a>
            </div>

            <div class="col" style="margin-right: 150px;">
                <a href=""><i class="bi bi-facebook float-end ms-3" style='font-size:35px; color:#023ef9'></i> </a>
                <i class="bi bi-instagram float-end ms-3" style="font-size:35px; color:#023ef9"></i>
                <i class="bi bi-youtube float-end ms-3" style="font-size:35px; color:#023ef9"></i>
            </div>

        </div>

    <?php endif ?>


    <?php if (tienePrivilegios($datos['usuarioSesion']->idRol,[4])):?>

        <div class="row" style="height: 70px;">

            <div class="col mt-4">
                <a class="color" href="<?php echo RUTA_URL ?>/socios">Socios</a>
                <a class="color" href="<?php echo RUTA_URL?>/pedidos">Pedidos</a>
            </div>

            <div class="col" style="margin-right: 150px;">
                <a href=""><i class="bi bi-facebook float-end ms-3" style='font-size:35px; color:#023ef9'></i> </a>
                <i class="bi bi-instagram float-end ms-3" style="font-size:35px; color:#023ef9"></i>
                <i class="bi bi-youtube float-end ms-3" style="font-size:35px; color:#023ef9"></i>
            </div>

        </div>

    <?php endif ?>

    
        
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="<?php echo RUTA_URL?>/js/main.js"></script>
</body>
</html>