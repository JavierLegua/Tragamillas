<?php require_once RUTA_APP.'/vistas/inc/header.php' ?>


<main class="flex-shrink-0 margenTop">


<div class="container mainF">

    <a href=".." class="btn btn-light"><i class="bi bi-chevron-double-left"></i>Volver</a>

    <div class="card bg-light mt-5 w-75 justify-content-center align-items-center;">
        <h2 class="card-header">Añadir licencia</h2>

        <form method="post" ENCTYPE="multipart/form-data" class="card-body">
            <div class="mt-3 mb-3">
                <label for="numlic">Número licencia: <sup>*</sup></label>
                <input type="text" name="numlic" id="numlic" class="form-control form-control-lg">
            </div>
            <div class="mb-3">
                <label for="dorsal">Dorsal: <sup>*</sup></label>
                <input type="text" name="dorsal" id="dorsal" class="form-control form-control-lg" maxlength="9" autocomplete="off" >
            </div>
            <div class="mb-3">
                <label for="fecha_cad">Fecha caducidad: <sup>*</sup></label>
                <input type="fecha_cad" name="fecha_cad" id="fecha_cad" class="form-control form-control-lg">
            </div>
            <div class="mb-3">
                <label for="tipo">Tipo licencia: <sup>*</sup></label>
                <select name="tipo" id="tipo" class="form-select form-select-lg">
                    <option value="Escolar">Escolar</option>
                    <option value="Federada">Federada</option>
                </select>
            </div>
            <div class="mb-3">
                <input accept="image/*" type="file" id="" name="imagenLicAdmin" >
            </div>
            <input type="submit" class="btn btn-success" value="Añadir licencia" onclick="return confirm('¿Seguro que quieres añadir esta licencia?');">
        </form>
        
    </div>
</div>


</main>


<?php require_once RUTA_APP.'/vistas/inc/footer.php' ?>