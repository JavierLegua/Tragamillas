<?php require_once RUTA_APP.'/vistas/inc/header.php' ?>
<main class="flex-shrink-0 margenTop">
    <div class="container">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Fecha</th>
                        <th>Marca</th>
                        <th>Prueba</th>
                        <th>Test</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($datos['marca'] as $uruario): ?>
                        <?php if (tienePrivilegios($datos['usuarioSesion']->idRol,[3])):?>
                            <tr>
                                <td><?php echo $uruario->fecha ?></td>
                                <td><?php echo $uruario->marca ?></td>
                                <td><?php echo $uruario->nombre_prueba ?></td>
                                <td><?php echo $uruario->nombreTest ?></td>                
                            </tr>
                        <?php endif ?>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</main>  
<?php require_once RUTA_APP.'/vistas/inc/footer.php' ?>