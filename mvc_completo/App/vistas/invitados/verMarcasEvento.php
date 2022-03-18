<?php require_once RUTA_APP.'/vistas/inc/header.php' ?>
<main class="flex-shrink-0 margenTop">
    <div class="container">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th>Dni</th>
                        <th>Marca</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($datos['marcaExt'] as $uruario): ?>
                        <tr>

                            <td><?php echo $uruario->nombreUsuario ?></td> 
                            <td><?php echo $uruario->apellidoUsuario ?></td>
                            <td><?php echo $uruario->dni ?></td>
                            <td><?php echo $uruario->marca ?></td>
                                      
                        </tr>
                    <?php endforeach ?>
                    <?php foreach($datos['marca'] as $uruario): ?>
                        <tr>

                            <td><?php echo $uruario->nombreUsuario ?></td> 
                            <td><?php echo $uruario->apellidoUsuario ?></td>
                            <td><?php echo $uruario->dniUsuario ?></td>
                            <td><?php echo $uruario->marca ?></td>
                                      
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</main>  
<?php require_once RUTA_APP.'/vistas/inc/footer.php' ?>