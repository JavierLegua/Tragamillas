<?php require_once RUTA_APP.'/vistas/inc/header.php'?>
    <form action="<?php echo RUTA_URL?>/tests/agregarPruebaTest/<?php echo $datos['idSeleccionado'] ?>" method="post" class="card-body">
        <div class="mb-3">
            <label for="idPrueba">Prueba: <sup>*</sup></label>
            <select name="idPrueba" id="idPrueba" class="form-select form-select-lg">
                <?php foreach($datos['pruebas'] as $prueba): ?>
                    <?php if ($prueba->idPrueba == $datos['pruebas']->idPrueba):?>
                        <option value="<?php echo $prueba->idPrueba?>" selected><?php echo $prueba->nombre_prueba?></option>
                    <?php else: ?>
                        <option value="<?php echo $prueba->idPrueba?>"><?php echo $prueba->nombre_prueba?></option>
                    <?php endif ?>
                <?php endforeach ?>
            </select>
        </div>
        <input type="text" name="detalles" placeholder="especificacion" class="form-control form-control-lg"></input>
        <button class="btn btn-primary" type="submit">crear test</button>
    </form>
<?php require_once RUTA_APP.'/vistas/inc/footer.php' ?>