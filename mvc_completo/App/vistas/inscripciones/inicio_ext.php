<?php require_once RUTA_APP.'/vistas/inc/header.php' ?>
<script src="main.js"></script>

<div class="container mainF">

    <a href=".." class="btn btn-light"><i class="bi bi-chevron-double-left"></i>Volver</a>

    <div class="card bg-light mt-5 w-75 justify-content-center align-items-center;">
        <h2 class="card-header">INSCRIPCION</h2>
        <form method="post" class="card-body" action="<?php echo RUTA_URL?>/inscripcionesEventosExt/agregarInscripcion/<?php echo $this->datos['inscripcion']->idEvento ?>">
            <div class="mt-3 mb-3">
                <label for="apellidoUsuario">Nombre: <sup>*</sup></label>
                <input type="text" name="apellidoUsuario" id="nombre" class="form-control form-control-lg" value="">
            </div>
            <div class="mb-3">
                <label for="dni">DNI: <sup>*</sup></label>
                <input type="text" name="dni" id="dni" class="form-control form-control-lg" maxlength="9" autocomplete="off" value="" onblur="comprobarDni(this.value)">
            </div>
            <div class="mb-3">
                <label for="cc">Cuenta: <sup>*</sup></label>
                <input type="text" name="cc" id="cc" class="form-control form-control-lg" autocomplete="off" maxlength="24" value="" onblur="fn_ValidateIBAN(this.value)">
            </div>
            <div class="mb-3">
                <label for="fecha_nac">Fecha nacimiento: <sup>*</sup></label>
                <input type="date" name="fecha_nac" id="fecha_nac" class="form-control form-control-lg" value="">
            </div>
            <div class="mb-3">
                <label for="email">Email: <sup>*</sup></label>
                <input type="email" name="email" id="email" class="form-control form-control-lg" autocomplete="off" value="">
            </div>
            <div class="mb-3">
                <label for="telefono">TELEFONO: <sup>*</sup></label>
                <input type="text" name="telefono" id="telefono" class="form-control form-control-lg" maxlength="9" autocomplete="off" value="">
            </div>
            <input type="submit" class="btn btn-success" value="Confirmar inscripcion">
        </form>
        
    </div>
</div>

<?php require_once RUTA_APP.'/vistas/inc/footer.php' ?>
