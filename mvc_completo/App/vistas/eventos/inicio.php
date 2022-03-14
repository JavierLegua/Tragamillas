<?php require_once RUTA_APP.'/vistas/inc/header.php' ?>

<!-- <h1>hola</h1> -->

<main class="flex-shrink-0 margenTop">
    <div class="container">    
        <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Id evento</th>
                        <th>Nombre</th>
                        <th>Tipo</th>
                        <th>Precio</th>
                        <th>Fecha inicio</th>
                        <th>Fecha fin</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($datos['evento'] as $uruario): ?>
                        <tr>
                            <td><?php echo $uruario->idEvento ?></td>
                            <td><?php echo $uruario->nombre_evento ?></td>
                            <td><?php echo $uruario->tipo ?></td>
                            <td><?php echo $uruario->precio ?></td>
                            <td><?php echo $uruario->fecha_ini_even ?></td>
                            <td><?php echo $uruario->fecha_fin_even ?></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
        </table>
        <?php if (tienePrivilegios($datos['usuarioSesion']->idRol,[1])):?>
            <div class="col text-center">
                <a class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal" >+</a>
            </div>
        <?php endif ?>
    </div>
</main>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Registrar evento</h5>
            <button type="button" class="btn-close btn-danger" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        
            <form method="post" class="card-body" class="registrarNuevo" action="/eventos/agregarEvento">
                <div class="mt-3 mb-3">
                    <label for="nombre">Nombre: <sup>*</sup></label>
                    <input type="text" name="nombre_evento" id="nombre_evento" class="form-control form-control-lg">
                </div>
                <div class="mb-3">
                    <label for="tipo">Tipo: <sup>*</sup></label>
                    <input type="text" name="tipo" id="tipo" class="form-control form-control-lg" autocomplete="off" >
                </div>
                <div class="mb-3">
                    <label for="precio">Precio: <sup>*</sup></label>
                    <input type="text" name="precio" id="precio" class="form-control form-control-lg"  autocomplete="off" >
                </div>
                <div class="mb-3">
                    <label for="fi">Fecha inicio: <sup>*</sup></label>
                    <input type="text" name="fecha_ini_even" id="fecha_ini_even" class="form-control form-control-lg" placeholder="yyyy-mm-dd">
                </div>
                <div class="mb-3">
                    <label for="ff">Fecha fin: <sup>*</sup></label>
                    <input type="ff" name="fecha_fin_even" id="fecha_fin_even" class="form-control form-control-lg" placeholder="yyyy-mm-dd">
                </div>
                <input type="submit" class="btn btn-success" value="Registrar evento" onclick="return confirm('¿Seguro que quieres registrar este evento?');">
            </form>

        </div>
    </div>
  </div>
</div>
<?php require_once RUTA_APP.'/vistas/inc/footer.php' ?>