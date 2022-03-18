<?php require_once RUTA_APP.'/vistas/inc/header.php' ?>
<main class="flex-shrink-0 margenTop">
    <div class="container">
        <div class="table-responsive">

            <table class="table table-hover">
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
                                <a class="btn btn-warning" href="<?php echo RUTA_URL?>/tiendas/editarTienda/<?php echo $uruario->id_usuario ?>"><i class="bi bi-pencil"></i></a>
                                &nbsp;&nbsp;&nbsp;
                                <a class="btn btn-danger" href="<?php echo RUTA_URL?>/tiendas/borrarTienda/<?php echo $uruario->id_usuario ?>"><i class="bi bi-trash-fill"></i></a>
                                &nbsp;&nbsp;&nbsp;
                                <a class="btn colortarjeta text-light" href="<?php echo RUTA_URL?>/usuarios/actualizar/<?php echo $uruario->id_usuario ?>"><i class="bi bi-shield-lock"></i></a>
                            </td>
        <?php endif ?>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>

<?php if (tienePrivilegios($datos['usuarioSesion']->idRol,[1])):?>
    <div class="col text-center">
        <a class="btn btn-success" href="<?php echo RUTA_URL?>/tiendas/agregarTienda/">+</a>
    </div>

<?php endif ?>

</main>
<?php require_once RUTA_APP.'/vistas/inc/footer.php' ?>