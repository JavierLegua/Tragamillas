<?php require_once RUTA_APP.'/vistas/inc/header.php' ?>
    <table class="table">
        <thead>
            <tr>
                <th>Id grupo</th>
                <th>Nombre</th>
                <th>Abierto</th>
<?php if (tienePrivilegios($datos['usuarioSesion']->idRol,[2])):?>
                <th>Acciones</th>
<?php endif ?>
            </tr>
        </thead>
        <tbody>
            <?php foreach($datos['grupo'] as $uruario): ?>
                <tr>
                    <td><?php echo $uruario->idGrupo ?></td>
                    <td><?php echo $uruario->nombre ?></td>
                    <td><?php echo $uruario->abierto ?></td>
<?php if (tienePrivilegios($datos['usuarioSesion']->idRol,[2])):?>
                    <td>
                        <a href="<?php echo RUTA_URL?>/grupos/verGrupos/<?php echo $uruario->idGrupo ?>">Ver grupo</a>
                    </td>
<?php endif ?>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>

<?php require_once RUTA_APP.'/vistas/inc/footer.php' ?>