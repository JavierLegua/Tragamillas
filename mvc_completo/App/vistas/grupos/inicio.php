<?php require_once RUTA_APP.'/vistas/inc/header.php' ?>
<main class="flex-shrink-0 margenTop">
    <div class="container">    
        <div class="table-responsive">
            <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Id grupo</th>
                            <th>Nombre</th>
                            <th>Abierto</th>
            <?php if (tienePrivilegios($datos['usuarioSesion']->idRol,[1,2])):?>
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
            <?php if (tienePrivilegios($datos['usuarioSesion']->idRol,[1,2])):?>
                                <td>
                                    <a class="btn colortarjeta text-light" href="<?php echo RUTA_URL?>/grupos/verGrupos/<?php echo $uruario->idGrupo ?>">Ver grupo</a>
                                </td>
            <?php endif ?>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
            </table>
        </div>
    </div>
</main>
<?php require_once RUTA_APP.'/vistas/inc/footer.php' ?>