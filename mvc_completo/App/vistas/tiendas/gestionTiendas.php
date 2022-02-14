<?php require_once RUTA_APP.'/vistas/inc/header.php' ?>
    <table class="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Teléfono</th>
<?php if (tienePrivilegios($datos['usuarioSesion']->idRol,[1])):?>
                <th>Acciones</th>
<?php endif ?>
            </tr>
        </thead>
        <tbody>
            <?php foreach($datos['tienda'] as $uruario): ?>
                <tr>
                    <td><?php echo $uruario->id_usuario ?></td>
                    <td><?php echo $uruario->apellidoUsuario ?></td>
                    <td><?php echo $uruario->email ?></td>
                    <td><?php echo $uruario->telefono ?></td>
<?php if (tienePrivilegios($datos['usuarioSesion']->idRol,[1])):?>
                    <td>
                        <a href="<?php echo RUTA_URL?>/tiendas/editarTienda/<?php echo $uruario->id_usuario ?>">Editar</a>
                        &nbsp;&nbsp;&nbsp;
                        <a href="<?php echo RUTA_URL?>/tiendas/borrarTienda/<?php echo $uruario->id_usuario ?>">Borrar</a>
                        &nbsp;&nbsp;&nbsp;
                    </td>
<?php endif ?>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>

<?php if (tienePrivilegios($datos['usuarioSesion']->idRol,[1])):?>
    <div class="col text-center">
        <a class="btn btn-success" href="<?php echo RUTA_URL?>/tiendas/agregarTienda/">+</a>
    </div>

<?php endif ?>

<?php require_once RUTA_APP.'/vistas/inc/footer.php' ?>