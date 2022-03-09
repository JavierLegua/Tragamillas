<?php require_once RUTA_APP.'/vistas/inc/header.php' ?>
    <table class="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
<?php if (tienePrivilegios($datos['usuarioSesion']->idRol,[2])):?>
                <th>Acciones</th>
<?php endif ?>
            </tr>
        </thead>
        <tbody>
            <?php foreach($datos['tests'] as $uruario): ?>
                <tr>
                    <td><?php echo $uruario->idTest ?></td>
                    <td><?php echo $uruario->nombreTest ?></td>
<?php if (tienePrivilegios($datos['usuarioSesion']->idRol,[2])):?>
                    <td>
                        <a href="<?php echo RUTA_URL?>/tests/agregarPruebaTest/<?php echo $uruario->idTest ?>">Agregar pruebas</a>
                    </td>
<?php endif ?>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>

<?php if (tienePrivilegios($datos['usuarioSesion']->idRol,[2])):?>
    <div class="col text-center">
        <a class="btn btn-success" href="<?php echo RUTA_URL?>/tests/crearTest/">+</a>
    </div>

<?php endif ?>

<?php require_once RUTA_APP.'/vistas/inc/footer.php' ?>