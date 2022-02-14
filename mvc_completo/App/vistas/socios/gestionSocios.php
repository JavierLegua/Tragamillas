<?php require_once RUTA_APP.'/vistas/inc/header.php' ?>
    <table class="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Teléfono</th>
<?php if (tienePrivilegios($datos['usuarioSesion']->idRol,[4])):?>
                <th>Acciones</th>
<?php endif ?>
            </tr>
        </thead>
        <tbody>
            <?php foreach($datos['socio'] as $uruario): ?>
                <tr>
                    <td><?php echo $uruario->id_usuario ?></td>
                    <td><?php echo $uruario->apellidoUsuario ?></td>
                    <td><?php echo $uruario->email ?></td>
                    <td><?php echo $uruario->telefono ?></td>
<?php if (tienePrivilegios($datos['usuarioSesion']->idRol,[4])):?>
                    <td>
                        <a href="<?php echo RUTA_URL?>/tiendas/marcarRopa/<?php echo $uruario->id_usuario ?>">Marcar ropa</a>
                    </td>
<?php endif ?>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>

<?php require_once RUTA_APP.'/vistas/inc/footer.php' ?>