<?php require_once RUTA_APP.'/vistas/inc/header.php' ?>

<main class="flex-shrink-0 margenTop">

    <div class="container">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Número licencia</th>
                    <th>Fecha caducidad</th>
                    <th>Tipo</th>
                    <th>Dorsal</th>
                    <th>Imagen</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($datos['licencia'] as $licencias): ?>
                    <tr>
                        <td><?php echo $licencias->num_licencia ?></td>
                        <td><?php echo $licencias->fecha_cad_licen ?></td>
                        <td><?php echo $licencias->tipo ?></td>
                        <td><?php echo $licencias->dorsal ?></td>
                        <td><?php if ($licencias->img==''){echo '-';}else {?> <img width="50" height="50" src="<?php echo RUTA_ImgDatos. $licencias->img?>"><?php ;}?></td>
                        <?php if (tienePrivilegios($datos['usuarioSesion']->idRol,[1])):?>


<td>    
    <button class="btn btn-warning" id="myBtn<?php echo $licencias->num_licencia ?>" onclick="crearmodalEditar(<?php echo $licencias->num_licencia ?>)"><i class="bi bi-pencil"></i></button>
    &nbsp;&nbsp;

    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalborrar_<?php echo $licencias->num_licencia ?>"><i class="bi bi-trash-fill"></i></button>
    &nbsp;&nbsp;
</td>

</tr>

<div id="<?php echo $licencias->num_licencia ?>" class="modal1">
<div class="modal-content1">
<div class="modal-header">
<h5 class="modal-title"> Editar Licencia  <?php echo $licencias->num_licencia ?></h5>
<span onclick="cerrar(<?php echo $licencias->num_licencia ?>)" class="close"><i class="bi bi-x-lg"></i></span>
</div>


<form method="post" ENCTYPE="multipart/form-data" action="<?php echo RUTA_URL?>/Licencias/editar/<?php echo $licencias->num_licencia ?>">
<div class="mb-3">
<label for="dorsal">Dorsal: <sup>*</sup></label>
<input type="text" name="dorsal" id="dorsal" class="form-control form-control-lg">
</div>
<div class="mb-3">
<label for="fecha_cad">Fecha caducidad: <sup>*</sup></label>
<input type="date" name="fecha_cad" id="fecha_cad" class="form-control form-control-lg">
</div>
<div class="mb-3">
    <label for="tipo">Tipo licencia: <sup>*</sup></label>
        <select name="tipo" id="tipo" class="form-select form-select-lg">
            <option value="Escolar">Escolar</option>
            <option value="Federada">Federada</option>
        </select>
</div>
<div class="mb-3">
    <input accept="image/*" type="file" id="imagenLic" name="imagenLic" >
</div>
<input type="submit" class="btn btn-success" value="Editar licencia" onclick="return confirm('¿Seguro que quieres editar esta licencia?');">
</form>
</div>
</div>



<!-- Modal borrar licencia -->
<div class="modal fade" id="modalborrar_<?php echo $licencias->num_licencia ?>" tabindex="-1" aria-labelledby="exampleModalBorrar" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="exampleModalBorrar">Borrar licencia</h5>
<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">

<form method="post" action="<?php echo RUTA_URL?>/Licencias/borrar/<?php echo $licencias->num_licencia ?>">
<div class="mt-3 mb-3">
    <label for="num_lic">Número licencia: <sup>*</sup></label>
    <input type="text" name="num_lic" id="num_lic" class="form-control form-control-lg" value="<?php echo $licencias->num_licencia ?>" disabled>
</div>
<div class="mb-3">
    <label for="dorsal">Dorsal: <sup>*</sup></label>
    <input type="text" name="dorsal" id="dorsal" class="form-control form-control-lg" value="<?php echo $licencias->dorsal ?>" disabled>
</div>
<input type="submit" class="btn btn-success" value="Borrar licencia" onclick="return confirm('¿Seguro que quieres eliminar esta licencia?');">
</form>

</div>
</div>
</div>
</div>


<?php endif ?>
                <?php endforeach ?>
            </tbody>
        </table>

    </div>

</main>


<?php require_once RUTA_APP.'/vistas/inc/footer.php' ?>