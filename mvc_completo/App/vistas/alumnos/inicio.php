<?php require_once RUTA_APP.'/vistas/inc/header.php' ?>
    <table class="table">
        <thead>
            <tr>
                <th>Id grupo</th>
                <th>nombre</th>
                <th>Id usuario</th>
                <th>nombre Usuario</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($datos['alumno'] as $uruario): ?>
                <?php if (tienePrivilegios($datos['usuarioSesion']->idRol,[2])):?>
                    <tr>
                        <td><?php echo $uruario->idGrupo ?></td>
                        <td><?php echo $uruario->nombre ?></td>
                        <td><?php echo $uruario->id_usuario ?></td>
                        <td><?php echo $uruario->apellidoUsuario ?></td>
                    </tr>
                <?php endif ?>
            <?php endforeach ?>
        </tbody>
    </table>

<?php require_once RUTA_APP.'/vistas/inc/footer.php' ?>