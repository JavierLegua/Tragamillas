<?php require_once RUTA_APP.'/vistas/inc/header.php' ?>
<main class="flex-shrink-0 margenTop">
    <div class="container">
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

        <a class="btn colortarjeta text-light justify-content-center" href="<?php echo RUTA_URL?>/grupos/cerrarGrupos/<?php echo $this->datos['idGrupo']?>">Cerrar grupo</a>
        <a class="btn colortarjeta text-light justify-content-center" href="<?php echo RUTA_URL?>/grupos/abrirGrupos/<?php echo $this->datos['idGrupo']?>">Abrir grupo</a>
    </div>    
</main>
<?php require_once RUTA_APP.'/vistas/inc/footer.php' ?>