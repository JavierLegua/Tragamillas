<?php require_once RUTA_APP.'/vistas/inc/header.php'?>
    <form action="<?php echo RUTA_URL?>/tests/crearTest" method="post" class="card-body">
        <input type="text" name="nombreTest" placeholder="nombre del test" class="form-control form-control-lg"></input>
        <button class="btn btn-primary" type="submit">Crear test</button>
    </form>
<?php require_once RUTA_APP.'/vistas/inc/footer.php' ?>