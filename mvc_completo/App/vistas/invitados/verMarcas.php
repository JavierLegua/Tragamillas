<?php require_once RUTA_APP.'/vistas/inc/header.php' ?>
<main class="flex-shrink-0 margenTop">
    <div class="container">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Tipo</th>
                        <th>Fecha inicio</th>
                        <th>Fecha fin</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($datos['evento'] as $uruario): ?>
                            <tr>
                            <td><?php echo $uruario->nombre_evento ?></td>
                            <td><?php echo $uruario->tipo ?></td>
                            <td><?php echo $uruario->fecha_ini_even ?></td>
                            <td><?php echo $uruario->fecha_fin_even ?></td> 
                            <td>
                                <a href="<?php echo RUTA_URL?>/marcasExt/verMarcas/<?php echo $uruario->idEvento ?>" class="btn btn-primary" type="submit">Ver Marcas</a>
                            </td>              
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</main>  
<?php require_once RUTA_APP.'/vistas/inc/footer.php' ?>