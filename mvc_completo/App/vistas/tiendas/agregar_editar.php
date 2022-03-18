<?php require_once RUTA_APP.'/vistas/inc/header.php' ?>
<script src="main.js"></script>
<?php
    if (isset($datos['tienda']->id_usuario)){
        $accion = "Modificar";
    } else {
        $accion = "Agregar";
    }
?>
<div class="container mainF">

    <a href=".." class="btn btn-light"><i class="bi bi-chevron-double-left"></i>Volver</a>

    <div class="card bg-light mt-5 w-75 card-center" style=" margin: auto;">
        <h2 class="card-header"><?php echo $accion ?> Tienda</h2>

        <form method="post" class="card-body">
            <div class="mt-3 mb-3">
                <label for="nombre">Nombre: <sup>*</sup></label>
                <input type="text" name="nombre" id="nombre" class="form-control form-control-lg" value="<?php echo $datos['tienda']->apellidoUsuario ?>">
            </div>
            <div class="mb-3">
                <label for="dni">DNI: <sup>*</sup></label>
                <input type="text" name="dni" id="dni" class="form-control form-control-lg" value="<?php echo $datos['tienda']->dniUsuario ?>" onblur="comprobarDni(this.value)">
            </div>
            <div class="mb-3">
                <label for="cc">Cuenta: <sup>*</sup></label>
                <input type="text" name="cc" id="cc" class="form-control form-control-lg" value="<?php echo $datos['tienda']->cc ?>">
            </div>
            <div class="mb-3">
                <label for="fecha_nac">Fecha nacimiento: <sup>*</sup></label>
                <input type="fecha_nac" name="fecha_nac" id="fecha_nac" class="form-control form-control-lg" value="<?php echo $datos['tienda']->fecha_nac ?>">
            </div>
            <div class="mb-3">
                <label for="email">Email: <sup>*</sup></label>
                <input type="email" name="email" id="email" class="form-control form-control-lg" value="<?php echo $datos['tienda']->email ?>" onblur="validarEmail(this.value)">
            </div>
            <?php 
            if ($accion == "Agregar") { 
            ?>
            <div class="mb-3">
                <label for="clave">Nueva contraseña: <sup>*</sup></label>
                <input type="password" name="clave" id="clave" class="form-control form-control-lg" value="">
            </div>
            <div>
                <button class="btn btn-primary" type="button" onclick="mostrarPass()"><i class="glyphicon glyphicon-eye-open"></i>Mostrar contraseña</button> <br>     <!--  mostrar icono en el boton -->
            </div>
            <?php 
            }
            ?>
            <div class="mb-3">
                <label for="telefono">Teléfono: <sup>*</sup></label>
                <input type="text" name="telefono" id="telefono" class="form-control form-control-lg" value="<?php echo $datos['tienda']->telefono ?>">
            </div>
            <div class="mb-3">
                <label for="activado">Activado: <sup>*</sup></label>
                <input type="activado" name="activado" id="activado" class="form-control form-control-lg" value="<?php echo $datos['tienda']->activado ?>">
            </div>
            <div class="mb-3">
                <label for="rol">Rol: <sup>*</sup></label>
                <select name="rol" id="rol" class="form-select form-select-lg" disabled>
                    <?php foreach($datos['listaRoles'] as $rol): ?>
                        <?php if ($rol->idRol == $datos['tienda']->idRol):?>
                            <option value="<?php echo $rol->idRol?>" selected><?php echo $rol->nombreRol?></option>
                        <?php else: ?>
                            <option value="4"><?php echo $rol->nombreRol?></option>
                        <?php endif ?>
                    <?php endforeach ?>
                </select>
            </div>
            <input type="submit" class="btn btn-success" value="<?php echo $accion ?> Tienda" onclick="return confirm('¿Seguro que quieres <?php echo $accion ?> esta tienda?');">
        </form>
        
    </div>
</div>

<?php require_once RUTA_APP.'/vistas/inc/footer.php' ?>
