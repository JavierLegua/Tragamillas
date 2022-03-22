<?php require_once RUTA_APP.'/vistas/inc/header.php' ?>
<main class="flex-shrink-0 margenTop">
    <div class="container">    
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Nombre Evento</th>
                    <th>Socio</th>
                    <th>Aceptado</th>
    <?php if (tienePrivilegios($datos['usuarioSesion']->idRol,[2])):?>
                    <th>Acciones</th>
    <?php endif ?>
                </tr>
            </thead>
            <tbody>
                <?php foreach($datos['inscripcionEvento'] as $uruario): ?>
                    <?php if (tienePrivilegios($datos['usuarioSesion']->idRol,[2])):?>
                        <tr>
                            <td><?php echo $uruario->nombre_evento ?></td>
                            <td><?php echo $uruario->apellidoUsuario ?></td>
                            <td><?php echo $uruario->aceptado ?></td>
                            <td>
                                <form action="<?php echo RUTA_URL?>/inscripcionesEventos/aceptarEvento/<?php echo $uruario->idEvento?>/<?php echo $uruario->id_usuario?>" method="post">
                                    <button class="btn colortarjeta text-light" type="submit">Aceptar al evento</button>
                                </form>
                            </td>
                            <td>
                                <form action="<?php echo RUTA_URL?>/inscripcionesEventos/cancelarEvento/<?php echo $uruario->idEvento?>/<?php echo $uruario->id_usuario?>" method="post">
                                    <button class="btn colortarjeta text-light" type="submit">Denegar evento</button>
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
