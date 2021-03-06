<footer class="footer mt-auto py-2 color">
    <div class="container">
    <?php if (tienePrivilegios($datos['usuarioSesion']->idRol,[1])):?>

        <div class="row">

            <div class="col mt-3">
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

            <div class="col">
                <a href=""><i class="bi bi-facebook float-end ms-3 iconfooter"></i></a>
                <i class="bi bi-instagram float-end ms-3 iconfooter"></i>
                <i class="bi bi-youtube float-end ms-3 iconfooter"></i>
            </div>

        </div>

    <?php endif ?>

    <?php if (tienePrivilegios($datos['usuarioSesion']->idRol,[2])):?>

        <div class="row">

            <div class="col mt-3">
                <a class="color" href="<?php echo RUTA_URL ?>/usuarios">Alumnos</a>
                <a class="color" href="#">Marcas-Test</a>
                <a class="color" href="#">Licencias</a>
                <a class="color" href="#">Inscripciones</a>
            </div>

            <div class="col">
                <a href=""><i class="bi bi-facebook float-end ms-3 iconfooter"></i></a>
                <i class="bi bi-instagram float-end ms-3 iconfooter"></i>
                <i class="bi bi-youtube float-end ms-3 iconfooter"></i>
            </div>

        </div>

    <?php endif ?>

    <?php if (tienePrivilegios($datos['usuarioSesion']->idRol,[3])):?>

        <div class="row">

            <div class="col mt-3">
                <a class="color" href="<?php echo RUTA_URL ?>/usuarios">Perfil</a>
                <a class="color" href="#">Marcas-Test</a>
                <a class="color" href="#">Licencias</a>
                <a class="color" href="#">Inscripciones</a>
                <a class="color" href="#">Pagos cuotas</a>
            </div>

            <div class="col">
                <a href=""><i class="bi bi-facebook float-end ms-3 iconfooter"></i></a>
                <i class="bi bi-instagram float-end ms-3 iconfooter"></i>
                <i class="bi bi-youtube float-end ms-3 iconfooter"></i>
            </div>

        </div>

    <?php endif ?>


    <?php if (tienePrivilegios($datos['usuarioSesion']->idRol,[4])):?>

        <div class="row">

            <div class="col mt-3">
                <a class="color" href="<?php echo RUTA_URL ?>/socios">Socios</a>
                <a class="color" href="<?php echo RUTA_URL?>/pedidos">Pedidos</a>
            </div>

            <div class="col">
                <a href=""><i class="bi bi-facebook float-end ms-3 iconfooter"></i></a>
                <i class="bi bi-instagram float-end ms-3 iconfooter"></i>
                <i class="bi bi-youtube float-end ms-3 iconfooter"></i>
            </div>

        </div>

    <?php endif ?>

    <?php if (tienePrivilegios($datos['usuarioSesion']->idRol,[5])):?>
        <div class="row">

            <div class="col mt-3">
                <a class="color" href="#">Inscripcion Eventos</a>
                <a class="color" href="#">Consultar Marcas</a>
                
            </div>

            <div class="col">
                <a href="https://es-es.facebook.com/tragamillasalcaniz/"><i class="bi bi-facebook float-end ms-3 iconfooter"></i></a>
                <a href="https://www.instagram.com/aoctragamillas/"><i class="bi bi-instagram float-end ms-3 iconfooter"></i></a>
                <a href="https://www.youtube.com/channel/UCqGEJt6GHKsFvZieC04VCow"><i class="bi bi-youtube float-end ms-3 iconfooter"></i></a>
            </div>

        </div>

    <?php endif ?>
        
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="<?php echo RUTA_URL?>/public/js/main.js"></script>
</body>
</html>