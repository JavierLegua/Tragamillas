<?php require_once RUTA_APP.'/vistas/inc/header.php' ?>
<main class="flex-shrink-0 margenTop">
    <div class="container">    
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Id Evento</th>
                    <th>Nombre</th>
                    <th>Tipo</th>
                    <th>Precio</th>
                    <th>Fecha inicio</th>
                    <th>Fecha fin</th>
    <?php if (tienePrivilegios($datos['usuarioSesion']->idRol,[5])):?>
                    <th>Acciones</th>
    <?php endif ?>
                </tr>
            </thead>
            <tbody>
                <?php foreach($datos['inscripcionEvento'] as $uruario): ?>
                    <?php if (tienePrivilegios($datos['usuarioSesion']->idRol,[5])):?>
                        <tr>
                            <td><?php echo $uruario->idEvento ?></td>
                            <td><?php echo $uruario->nombre_evento ?></td>
                            <td><?php echo $uruario->tipo ?></td>
                            <td><?php echo $uruario->precio ?></td>
                            <td><?php echo $uruario->fecha_ini_even ?></td>
                            <td><?php echo $uruario->fecha_fin_even ?></td>
                            <td>
                                <form action="<?php echo RUTA_URL?>/inscripcionesEventos/agregarInscripcion/<?php echo $uruario->idEvento?>" method="post">
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