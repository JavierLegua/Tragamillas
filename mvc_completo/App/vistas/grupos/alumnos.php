<?php require_once RUTA_APP.'/vistas/inc/header.php' ?>
    <table class="table">
        <thead>
            <tr>
                <th>Id alumno</th>
                <th>Nombre</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($datos['grupo'] as $uruario): ?>
                <tr>
                    <td><?php echo $uruario->idUsuario ?></td>
                    <td><?php echo $uruario->apellidoUsuario ?></td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>

    <a class="btn btn-primary justify-content-center" href="<?php echo RUTA_URL?>/grupos/cerrarGrupos/<?php echo $this->datos['idGrupo']?>">Cerrar grupo</a>
    <a class="btn btn-primary justify-content-center" href="<?php echo RUTA_URL?>/grupos/abrirGrupos/<?php echo $this->datos['idGrupo']?>">Abrir grupo</a>
<?php require_once RUTA_APP.'/vistas/inc/footer.php' ?>