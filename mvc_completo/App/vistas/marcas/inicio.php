<?php require_once RUTA_APP.'/vistas/inc/header.php' ?>
<main class="flex-shrink-0 margenTop">
    <div class="container">

    <table class="table table-hover">
        <thead>
            <tr>
                <th>Fecha</th>
                <th>Marca</th>
                <th>Usuario</th>
                <th>Prueba</th>
                <th>Test</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($datos['marca'] as $uruario): ?>
                <?php if (tienePrivilegios($datos['usuarioSesion']->idRol,[2])):?>
                    <tr>
                        <td><?php echo $uruario->fecha ?></td>
                        <td><?php echo $uruario->marca ?></td>
                        <td><?php echo $uruario->apellidoUsuario ?></td>
                        <td><?php echo $uruario->nombre_prueba ?></td>
                        <td><?php echo $uruario->nombreTest ?></td>                
                    </tr>
                <?php endif ?>
            <?php endforeach ?>
        </tbody>
    </table>
    </div>
</main>  
<?php require_once RUTA_APP.'/vistas/inc/footer.php' ?>