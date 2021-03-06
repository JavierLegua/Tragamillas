<?php require_once RUTA_APP.'/vistas/inc/header.php' ?>
<main class="flex-shrink-0 margenTop">
    <div class="container">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Id grupo</th>
                        <th>nombre</th>
                        <th>Id usuario</th>
                        <th>nombre Usuario</th>
                        <th>Acciones</th>
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
                                <td>
                                    <a class="btn colortarjeta text-light" href="<?php echo RUTA_URL?>/alumnos/realizarTest/<?php echo $uruario->id_usuario ?>">Realizar test</a>
                                </td>
                            </tr>
                        <?php endif ?>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</main>
<?php require_once RUTA_APP.'/vistas/inc/footer.php' ?>