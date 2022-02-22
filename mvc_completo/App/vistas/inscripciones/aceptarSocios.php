<?php require_once RUTA_APP.'/vistas/inc/header.php' ?>
    <table class="table">
        <thead>
            <tr>
                <th>Id grupo</th>
                <th>Id usuario</th>
                <th>nombre</th>
                <th>activo</th>
                <th>aceptado</th>
<?php if (tienePrivilegios($datos['usuarioSesion']->idRol,[2])):?>
                <th>Acciones</th>
<?php endif ?>
            </tr>
        </thead>
        <tbody>
            <?php foreach($datos['inscripcion'] as $uruario): ?>
                <?php if (tienePrivilegios($datos['usuarioSesion']->idRol,[2])):?>
                    <tr>
                        <td><?php echo $uruario->idGrupo ?></td>
                        <td><?php echo $uruario->idUsuario ?></td>
                        <td><?php echo $uruario->apellidoUsuario ?></td>
                        <td><?php echo $uruario->activo ?></td>
                        <td><?php echo $uruario->aceptado ?></td>
                        <td>
                            <form action="<?php echo RUTA_URL?>/inscripciones_grupos/confirmarinscripcion/<?php echo $uruario->idUsuario?>/<?php echo              $uruario->idGrupo?>" method="post">
                                <button class="btn btn-primary" type="submit">Aceptar inscripcion</button>
                            </form>
                            
                        </td>  
                        <td>
                            <form action="<?php echo RUTA_URL?>/inscripciones_grupos/cancelarinscripcion/<?php echo $uruario->idUsuario?>/<?php echo $uruario->idGrupo?>" method="post">
                                <button class="btn btn-primary" type="submit">Cancelar inscripcion</button>
                            </form>
                        </td>  
                    </tr>
                <?php endif ?>
            <?php endforeach ?>
        </tbody>
    </table>

<?php require_once RUTA_APP.'/vistas/inc/footer.php' ?>
