<?php require_once RUTA_APP.'/vistas/inc/header.php' ?>
<main class="flex-shrink-0 margenTop">
    <div class="container">
        <div class="table-responsive">

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Teléfono</th>
        <?php if (tienePrivilegios($datos['usuarioSesion']->idRol,[1])):?>
                        <th>Acciones</th>
        <?php endif ?>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($datos['tienda'] as $uruario): ?>
                        <tr>
                            <td><?php echo $uruario->id_usuario ?></td>
                            <td><?php echo $uruario->apellidoUsuario ." ". $uruario->nombreUsuario?></td>
                            <td><?php echo $uruario->email ?></td>
                            <td><?php echo $uruario->telefono ?></td>
        <?php if (tienePrivilegios($datos['usuarioSesion']->idRol,[1])):?>
                            <td>
                            <button class="btn btn-warning" id="myBtn<?php echo $uruario->id_usuario ?>" onclick="crearmodalEditar(<?php echo $uruario->id_usuario ?>)"><i class="bi bi-pencil"></i></button>
                            &nbsp;

                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalborrar_<?php echo $uruario->id_usuario ?>"><i class="bi bi-trash-fill"></i></button>
                            &nbsp;

                            <button type="button" class="btn colortarjeta text-light" data-bs-toggle="modal" data-bs-target="#cambiocontraseña_<?php echo $uruario->id_usuario ?>"><i class="bi bi-shield-lock"></i></button>

                            </td>
        <?php endif ?>
                        </tr>
                        <div id="<?php echo $uruario->id_usuario ?>" class="modal1">
<div class="modal-content1">
        <div class="modal-header">
            <h5 class="modal-title"> Editar Tienda  <?php echo $uruario->nombreUsuario ?></h5>
            <span onclick="cerrar(<?php echo $uruario->id_usuario ?>)" class="close"><i class="bi bi-x-lg"></i></span>
        </div>
    <!-- Modal content -->
    
        <form method="post" action="<?php echo RUTA_URL?>/tiendas/editarTienda/<?php echo $uruario->id_usuario ?>">
            <div class="mt-3 mb-3">
                <label for="nombre">Nombre: <sup>*</sup></label>
                <input type="text" name="nombre" id="nombre" class="form-control form-control-lg" value="<?php echo $uruario->nombreUsuario ?>">
            </div>
            <div class="mt-3 mb-3">
                <label for="apellido">Apellido: <sup>*</sup></label>
                <input type="text" name="apellido" id="apellido" class="form-control form-control-lg" value="<?php echo $uruario->apellidoUsuario ?>">
            </div>
            <div class="mb-3">
                <label for="dni">DNI: <sup>*</sup></label>
                <input type="text" name="dni" id="dni" class="form-control form-control-lg" maxlength="9" autocomplete="off" onblur="comprobarDni(this.value)" value="<?php echo $uruario->dniUsuario ?>">
            </div>
            <div class="mb-3">
                <label for="cc">Cuenta: <sup>*</sup></label>
                <input type="text" name="cc" id="cc_<?php echo $uruario->id_usuario ?>" class="form-control form-control-lg" autocomplete="off" maxlength="24" onblur="fn_ValidateIBAN(<?php echo $uruario->cc ?>)" value="<?php echo $uruario->cc ?>">
            </div>
            <div class="mb-3">
                <label for="fecha_nac">Fecha creación: <sup>*</sup></label>
                <input type="date" name="fecha_nac" id="fecha_nac" class="form-control form-control-lg" placeholder="yyyy-mm-dd" value="<?php echo $uruario->fecha_nac ?>">
            </div>
            <div class="mb-3">
                <label for="email">Email: <sup>*</sup></label>
                <input type="email" name="email" id="email" class="form-control form-control-lg" autocomplete="off" onblur="validarEmail(this.value)" value="<?php echo $uruario->email ?>">
            </div>
            <div class="mb-3">
                <label for="telefono">Teléfono: <sup>*</sup></label>
                <input type="text" name="telefono" id="telefono" class="form-control form-control-lg" value="<?php echo $uruario->telefono ?>">
            </div>

            <input type="submit" class="btn btn-success" value="Editar Usuario" onclick="return confirm('¿Seguro que quieres <?php echo $accion ?> este usuario?');">
        </form>
    </div>
</div>

<!-- Modal borrar usuario -->
<div class="modal fade" id="modalborrar_<?php echo $uruario->id_usuario ?>" tabindex="-1" aria-labelledby="exampleModalBorrar" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalBorrar">Borrar Usuario</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

            <form method="post" action="<?php echo RUTA_URL?>/tiendas/borrarTienda/<?php echo $uruario->id_usuario ?>">
                <div class="mt-3 mb-3">
                    <label for="nombre">Nombre: <sup>*</sup></label>
                    <input type="text" name="nombre" id="nombre" class="form-control form-control-lg" value="<?php echo $uruario->apellidoUsuario ?>" disabled>
                </div>
                <div class="mb-3">
                    <label for="email">Email: <sup>*</sup></label>
                    <input type="email" name="email" id="email" class="form-control form-control-lg" value="<?php echo $uruario->email ?>" disabled>
                </div>
                <div class="mb-3">
                    <label for="telefono">Teléfono: <sup>*</sup></label>
                    <input type="text" name="telefono" id="telefono" class="form-control form-control-lg" value="<?php echo $uruario-> telefono ?>" disabled>
                </div>
                <input type="submit" class="btn btn-success" value="Borrar Usuario" onclick="return confirm('¿Seguro que quieres eliminar este usuario?');">
            </form>

        </div>
    </div>
  </div>
</div>
<!-- fin modal borrar usuario -->

<!-- modal cambiar contraseña -->

<div class="modal fade" id="cambiocontraseña_<?php echo $uruario->id_usuario ?>" tabindex="-1" aria-labelledby="exampleModalcambio" aria-hidden="true" onclick="evento()">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalcambio">Cambiar contraseña <?php echo $uruario->apellidoUsuario ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="limpiarC(<?php echo $uruario->id_usuario ?>)"></button>
            </div>
            <div class="modal-body container">
                <form method="post" id="cambiarClave_<?php echo $uruario->id_usuario ?>" action="<?php echo RUTA_URL?>/tiendas/actualizarT/<?php echo $uruario->id_usuario ?>">
                    <div class="row d-flex justify-content-around"> 

                        <div class="input-group mb-3">
                            <input type="password" name="clave" id="clave_<?php echo $uruario->id_usuario ?>" class="form-control" aria-describedby="botonMostrar">
                            <button class="btn btn-outline-primary" type="button" id="botonMostrar" onclick="mostrarPass(<?php echo $uruario->id_usuario ?>)"><i class="bi bi-eye"></i></button>
                        </div>

                        <input type="submit" class="btn btn-success" value="Actualizar contraseña" onclick="return confirm('¿Seguro que quieres actualizar la contraseña?');">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- fin modal cambiar contraseña -->
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>

<?php if (tienePrivilegios($datos['usuarioSesion']->idRol,[1])):?>
    <div class="col text-center">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="rellenarRol()">
            Agregar
        </button>
    </div>

<?php endif ?>

</main>
<!-- Modal nuevo usuario -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" onclick="evento()">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"><?php echo $accion = 'Agregar'?> Usuario</h5>
            <button type="button" class="btn-close btn-danger" data-bs-dismiss="modal" aria-label="Close" onclick="limpiar()"></button>
        </div>
        <div class="modal-body">
        
            <form method="post" action="/tiendas/agregarTienda" id="formNuevoUsuario">
                <div class="mt-3 mb-3">
                    <label for="nombre">Nombre: <sup>*</sup></label>
                    <input type="text" name="nombre" id="nombre" class="form-control form-control-lg">
                </div>
                <div class="mt-3 mb-3">
                    <label for="apellido">Apellido: <sup>*</sup></label>
                    <input type="text" name="apellido" id="apellido" class="form-control form-control-lg">
                </div>
                <div class="mb-3">
                    <label for="dni">DNI: <sup>*</sup></label>
                    <input type="text" name="dni" id="dni" class="form-control form-control-lg" maxlength="9" autocomplete="off" onblur="comprobarDni(this.value)">
                </div>
                <div class="mb-3">
                    <label for="cc">Cuenta: <sup>*</sup></label>
                    <input type="text" name="cc" id="cc" class="form-control form-control-lg" autocomplete="off" maxlength="24" onblur="fn_ValidateIBAN(this.value)">
                </div>
                <div class="mb-3">
                    <label for="fecha_nac">Fecha creación: <sup>*</sup></label>
                    <input type="date" name="fecha_nac" id="fecha_nac" class="form-control form-control-lg" placeholder="yyyy-mm-dd">
                </div>
                <div class="mb-3">
                    <label for="email">Email: <sup>*</sup></label>
                    <input type="email" name="email" id="email" class="form-control form-control-lg" autocomplete="off" onblur="validarEmail(this.value)">
                </div>

                <div class="mb-3">
                    <label for="email">Clave: <sup>*</sup></label>
                    <input type="password" name="clave" id="clave" class="form-control form-control-lg" autocomplete="off">
                </div>
    
                <div class="mb-3">
                    <label for="telefono">Teléfono: <sup>*</sup></label>
                    <input type="text" name="telefono" id="telefono" class="form-control form-control-lg">
                </div>

                <!-- <div class="mb-3" id="contenedorRoles">
                    <label for="rol" >Rol: <sup>*</sup></label>
                    
                </div> -->
                <input type="submit" class="btn btn-success" value="<?php echo $accion ?> Usuario" onclick="return confirm('¿Seguro que quieres <?php echo $accion ?> este usuario?');">
            </form>

        </div>
    </div>
  </div>
</div>
<!-- Fin modal nuevo usuario -->
<?php require_once RUTA_APP.'/vistas/inc/footer.php' ?>