<?php require_once RUTA_APP.'/vistas/inc/header.php' ?>
<main class="flex-shrink-0 margenTop">
    <div class="container">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($datos['participante'] as $uruario): ?>
                        <?php //print_r($uruario->idEvento);exit; ?>
                        <?php if (tienePrivilegios($datos['usuarioSesion']->idRol,[2])):?>
                            <tr>
                                <td><?php echo $uruario->nombreUsuario ?></td>
                                <td><?php echo $uruario->apellidoUsuario ?></td>
                                <td>
                                    <form method="POST" action="<?php echo RUTA_URL?>/MarcasEventos/agregarMarca/<?php echo $uruario->idUsuario ?>">
                                        <input type="text" placeholder="marca" name="marca">
                                        <input type="text" value="<?php echo $uruario->idEvento ?>" name="idEvento" readonly>
                                        <button class="btn btn-primary" type="submit">Asignar Marca</button>
                                    </form>
                                </td>              
                            </tr>
                        <?php endif ?>
                    <?php endforeach ?>
                    <?php foreach($datos['participanteExt'] as $uruario): ?>
                        <?php //print_r($uruario);exit; ?>
                        <?php if (tienePrivilegios($datos['usuarioSesion']->idRol,[2])):?>
                            <tr>
                                <td></td>
                                <td><?php echo $uruario->apellidoUsuario ?></td>
                                <td>
                                    <form method="POST" action="<?php echo RUTA_URL?>/MarcasEventos/agregarMarcaExt/<?php echo $uruario->dni ?>">
                                        <input type="text" placeholder="marca" name="marca">
                                        <input type="text" value="<?php echo $uruario->idEvento ?>" name="idEvento" readonly>
                                        <button class="btn btn-primary" type="submit">Asignar Marca</button>
                                    </form>
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