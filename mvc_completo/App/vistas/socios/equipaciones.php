<?php require_once RUTA_APP.'/vistas/inc/header.php' ?>

<div class="container mainF">

    <a href=".." class="btn btn-light"><i class="bi bi-chevron-double-left"></i>Volver</a>

    <div class="card bg-light mt-5 w-75 card-center m-auto">
        <h2 class="card-header">Añadir equipación</h2>

        <form method="post" class="card-body">
            <div class="mt-3 mb-3">
                <label for="talla">Talla: <sup>*</sup></label>
                <select name="talla" id="talla" class="form-control form-control-lg">
                    <option value="seleccione una talla" selected>Seleccione una opción:</option>
                    <option value="8-9 años">8-9 años</option>
                    <option value="10-11 años">10-11 años</option>
                    <option value="12-14 años">12-14 años</option>
                    <option value="XS">XS</option>
                    <option value="S">S</option>
                    <option value="M">M</option>
                    <option value="L">L</option>
                    <option value="XL">XL</option>
                    <option value="XXL">XXL</option>
                </select>
            </div>
            <div class="mt-3 mb-3">
                <label for="prenda">Tipo prenda: <sup>*</sup></label>
                <select name="prenda" id="prenda" class="form-control form-control-lg">
                    <option value="seleccione una talla" selected>Seleccione una opción:</option>
                    <option value="sudadera">Sudadera</option>
                    <option value="chandal">Chandal</option>
                    <option value="manguitos">Manguitos</option>
                    <option value="1equipacion">1º Equipación</option>
                    <option value="2equipacion">2º Equipación</option>
                </select>
            </div>
            <!-- <div class="mb-3">
                <label for="idOtrosGastos">Precio: <sup>*</sup></label>
                <input type="idOtrosGastos" name="idOtrosGastos" id="idOtrosGastos" class="form-control form-control-lg"></input>
            </div> -->
            <input type="submit" class="btn btn-success" value="Añadir equipación" onclick="return confirm('¿Seguro que quieres <?php echo $accion ?> esta equipación?');">
        </form>
        
    </div>
</div>

<?php require_once RUTA_APP.'/vistas/inc/footer.php' ?>
