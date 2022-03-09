<?php require_once RUTA_APP.'/vistas/inc/header.php' ?>
<div class="container mainF">
    
    <a href=".." class="btn btn-light"><i class="bi bi-chevron-double-left"></i>Volver</a>
    <?php // print_r($datos['testSeleccionado']);exit; ?>
    <div class="card bg-light mt-5 w-75 card-center m-auto">
        <h2 class="card-header">Calificar alumno</h2>

        <form action="<?php echo RUTA_URL?>/alumnos/realizarTest/<?php echo $datos['idSeleccionado'] ?>" method="post" class="card-body">
        <input type="text" name="marca" placeholder="marca" class="form-control form-control-lg"></input>
        <input type="text" name="testSelecionado" value="<?php echo $datos['testSeleccionado'] ?>" class="form-control form-control-lg" readonly></input>
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
        <button class="btn btn-primary" type="submit">confirmar Nota</button>
        </form>
        
    </div>
</div>

<?php require_once RUTA_APP.'/vistas/inc/footer.php' ?>