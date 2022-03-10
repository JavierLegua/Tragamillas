<?php require_once RUTA_APP.'/vistas/inc/header.php' ?>
<main class="flex-shrink-0 margenTop">
    <div class="container">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Id grupo</th>
                    <th>Nombre grupo</th>
                    <th>abierto</th>
                    <th>Id usuario</th>
                    <th>Nombre</th>
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
                            <td><?php echo $uruario->nombre ?></td>
                            <td><?php echo $uruario->abierto ?></td>
                            <td><?php echo $uruario->idUsuario ?></td>
                            <td><?php echo $uruario->apellidoUsuario ?></td>
                            <td><?php echo $uruario->activo ?></td>
                            <td><?php echo $uruario->aceptado ?></td>
                            <td>
                                <form action="<?php echo RUTA_URL?>/inscripciones_grupos/confirmarinscripcion/<?php echo $uruario->idUsuario?>/<?php echo $uruario->idGrupo?>/<?php echo $uruario->abierto?>" method="post">
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
    </div>
</main>
<?php require_once RUTA_APP.'/vistas/inc/footer.php' ?>
