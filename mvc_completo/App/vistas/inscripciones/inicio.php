<?php require_once RUTA_APP.'/vistas/inc/header.php' ?>
    <table class="table">
        <thead>
            <tr>
                <th>Id grupo</th>
                <th>nombre</th>
<?php if (tienePrivilegios($datos['usuarioSesion']->idRol,[3])):?>
                <th>Acciones</th>
<?php endif ?>
            </tr>
        </thead>
        <tbody>
            <?php foreach($datos['inscripcion'] as $uruario): ?>
                <?php if (tienePrivilegios($datos['usuarioSesion']->idRol,[3])):?>
                    <tr>
                        <td><?php echo $uruario->idGrupo ?></td>
                        <td><?php echo $uruario->nombre ?></td>
                        <td>
                            <form action="<?php echo RUTA_URL?>/inscripciones/agregarinscripcion/<?php echo $uruario->idGrupo?>" method="post">
                                <button type="submit">Pre-inscribirse</button>
                            </form>
                            
                        </td>                
                    </tr>
                <?php endif ?>
            <?php endforeach ?>
        </tbody>
    </table>

<?php require_once RUTA_APP.'/vistas/inc/footer.php' ?>
