<?php require_once RUTA_APP.'/vistas/inc/header.php'?>
<main class="flex-shrink-0 margenTop">
    <div class="container">
    <form action="<?php echo RUTA_URL?>/tests/crearTest" method="post" class="card-body">
        <input type="text" name="nombreTest" placeholder="nombre del test" class="form-control form-control-lg"></input>
        <button class="btn btn-primary" type="submit">Crear test</button>
    </form>
    </div>
</main>    
<?php require_once RUTA_APP.'/vistas/inc/footer.php' ?>