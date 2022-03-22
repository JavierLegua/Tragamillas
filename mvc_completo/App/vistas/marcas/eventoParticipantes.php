<?php require_once RUTA_APP.'/vistas/inc/header.php' ?>
<main class="flex-shrink-0 margenTop">
    <div class="container">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th>Marca</th>
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


                                <form class="row g-3" method="POST" action="<?php echo RUTA_URL?>/MarcasEventos/agregarMarca/<?php echo $uruario->idUsuario ?>">
                                    <div class="col-auto">
                                        <input type="text" class="form-control" placeholder="marca" name="marca">
                                    </div>
                                    <div class="col-auto">
                                        <input type="text" hidden value="<?php echo $uruario->idEvento ?>" name="idEvento" readonly>
                                        
                                    </div>
                                    <div class="col-auto">
                                        <button class="btn colortarjeta text-light" type="submit">Asignar Marca</button>
                                    </div>
                                </form>

                                    <!-- <form class="row g-3" method="POST" action="<?php echo RUTA_URL?>/MarcasEventos/agregarMarca/<?php echo $uruario->idUsuario ?>">
                                        <div class="col-5">                                
                                            <input type="text" class="form-control" placeholder="marca" name="marca">
                                            <input type="text" hidden value="<?php echo $uruario->idEvento ?>" name="idEvento" readonly>
                                            
                                        </div> 
                                    </form> -->
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
                                    <form method="POST" class="row g-3" action="<?php echo RUTA_URL?>/MarcasEventos/agregarMarcaExt/<?php echo $uruario->dni ?>">
                                    <div class="col-auto">
                                        <input type="text" class="form-control" placeholder="marca" name="marca">
                                    </div>
                                    <div class="col-auto">
                                        <input type="text" hidden value="<?php echo $uruario->idEvento ?>" name="idEvento" readonly>
                                        
                                    </div>
                                    <div class="col-auto">
                                        <button class="btn colortarjeta text-light" type="submit">Asignar Marca</button>
                                    </div>
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