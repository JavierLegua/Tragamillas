<?php require_once RUTA_APP.'/vistas/inc/header.php'?>
    <form action="<?php echo RUTA_URL?>/tests/crearTest" method="post">
        <input type="text" name="nombreTest">
        <button class="btn btn-primary" type="submit">crear test</button>
    </form>
<?php require_once RUTA_APP.'/vistas/inc/footer.php' ?>