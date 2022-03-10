<?php require_once RUTA_APP.'/vistas/inc/header.php' ?>
<main class="flex-shrink-0 margenTop">
  <div class="container">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>NOMBRE</th>
                    <th>CORREO</th>
                    <th>DNI</th>
                    <th>CUENTA</th>
                    <th>FECHA NACIMIENTO</th>
                    <th>TELEFONO</th>
                    <th>ACCIONES</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($datos['perfil'] as $uruario): ?>
                    <?php if (tienePrivilegios($datos['usuarioSesion']->idRol,[3])):?>
                        <tr>
                            <td><?php echo $uruario->apellidoUsuario ?></td>
                            <td><?php echo $uruario->email ?></td>
                            <td><?php echo $uruario->dniUsuario ?></td>
                            <td><?php echo $uruario->cc ?></td>
                            <td><?php echo $uruario->fecha_nac ?></td>
                            <td><?php echo $uruario->telefono ?></td>
                            <td>
                                <form action="<?php echo RUTA_URL?>/perfiles/cambiarClave/<?php echo $uruario->id_usuario?>" method="post">
                                    <input type="password" id="clave" name="clave" placeholder="nueva contraseña">
                                    <button class="btn btn-primary" type="submit">Cambiar contraseña</button>
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