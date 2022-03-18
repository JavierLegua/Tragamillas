<?php require_once RUTA_APP.'/vistas/inc/header.php' ?>

<div class="container mainF">

    <a href=".." class="btn btn-light"><i class="bi bi-chevron-double-left"></i>Volver</a>

    <div class="card bg-light mt-5 w-75 card-center m-auto">
        <h2 class="card-header">Calificar alumno</h2>

        <form action="<?php echo RUTA_URL?>/alumnos/verPruebas/<?php echo $datos['idSeleccionado'] ?>" method="post" class="card-body">
        <div class="mb-3">
            <label for="idTest">Test: <sup>*</sup></label>
            <select name="idTest" id="idTest" class="form-select form-select-lg">
                <?php foreach($datos['test'] as $test): ?>
                    <?php if ($test->idTest == $datos['test']->idTest):?>
                        <option value="<?php echo $test->idTest?>" selected><?php echo $test->nombreTest?></option>
                    <?php else: ?>
                        <option value="<?php echo $test->idTest?>"><?php echo $test->nombreTest?></option>
                    <?php endif ?>
                <?php endforeach ?>
            </select>
        </div>
        <button class="btn btn-primary" type="submit">confirmar Test</button>
        </form>
    </div>
</div>

<?php require_once RUTA_APP.'/vistas/inc/footer.php' ?>