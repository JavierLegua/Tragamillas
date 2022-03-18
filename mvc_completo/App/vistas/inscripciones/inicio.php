<?php require_once RUTA_APP.'/vistas/inc/header.php' ?>
<main class="flex-shrink-0 margenTop">
    <div class="container">    
        <table class="table table-hover">
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
                                    <button class="btn btn-primary" type="submit">Pre-inscribirse</button>
                                </form>
                                
                            </td>                
                        </tr>
                    <?php endif ?>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</main>
<?php require_once RUTA_APP.'/vistas/inc/footer.php' ?>
