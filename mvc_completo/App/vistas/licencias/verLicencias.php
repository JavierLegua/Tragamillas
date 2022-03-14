<?php require_once RUTA_APP.'/vistas/inc/header.php' ?>


<main class="flex-shrink-0 margenTop">


<!-- <div class="table-responsive">

    <table class="table table-hover">
        <thead>
            <tr>
                <th>id Usuario</th>
                <th>Número licencia</th>
                <th>Fecha caducidad</th>
                <th>Tipo</th>
                <th>Foto</th>
<?php if (tienePrivilegios($datos['usuarioSesion']->idRol,[1])):?>
                <th colspan="3" class="text-center">Acciones</th>
<?php endif ?>
            </tr>
        </thead>
        <tbody>
                
            
            <?php foreach($datos['usuario'] as $uruario): ?>
                <!--  <?php echo json_encode($datos) ?>-->
                
                <tr>
                    <td><?php echo $uruario->id_usuario ?></td>
                    <td><?php echo $uruario->apellidoUsuario ?></td>
                    <td><?php echo $uruario->email ?></td>
                    <td><?php echo $uruario->telefono ?></td>
                    <td><?php echo $uruario->idRol ?></td>
                    <?php if (tienePrivilegios($datos['usuarioSesion']->idRol,[1])):?>
                        <td>
                            <button class="btn btn-warning" id="myBtn<?php echo $uruario->id_usuario ?>" onclick="crearmodalEditar(<?php echo $uruario->id_usuario ?>)"><i class="bi bi-pencil"></i></button>
                            &nbsp;&nbsp;
                        </td>
                </tr> -->


</main>


<?php require_once RUTA_APP.'/vistas/inc/footer.php' ?>