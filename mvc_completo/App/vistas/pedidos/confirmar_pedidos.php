<?php require_once RUTA_APP.'/vistas/inc/header.php' ?>

<div class="container mainF">

    <a href=".." class="btn btn-light"><i class="bi bi-chevron-double-left"></i>Volver</a>

    <div class="card bg-light mt-5 w-75 card-center" style=" margin: auto;">
    <h2 class="card-header">Confirmar pedido</h2>

    <form method="post" class="card-body">
        <div class="mt-3 mb-3">
                <label for="id">ID Usuario: <sup>*</sup></label>
                <input type="text" name="id" id="id" class="form-control form-control-lg" value="<?php echo $datos['pedido']->idUsuario ?> " disabled>
        </div>

        <div class="mt-3 mb-3">
                <label for="talla">Talla: <sup>*</sup></label>
                <input type="text" name="talla" id="talla" class="form-control form-control-lg" value="<?php echo $datos['pedido']->talla ?> " disabled>
        </div>

        <div class="mt-3 mb-3">
                <label for="idPedido">ID Pedido: <sup>*</sup></label>
                <input type="text" name="idPedido" id="idPedido" class="form-control form-control-lg" value="<?php echo $datos['pedido']->idEquipacion ?> " disabled>
        </div>

        <div class="mt-3 mb-3">
                <label for="entregado">Entregado: <sup>*</sup></label>
                <input type="text" name="entregado" id="entregado" class="form-control form-control-lg" value="<?php echo $datos['pedido']->entregado ?> " disabled>
        </div>

        <input type="submit" class="btn btn-success" value="Confirmar pedido" onclick="return confirm('¿Seguro que quieres confirmar este pedido?');">
    </form>

</div>

<?php require_once RUTA_APP.'/vistas/inc/footer.php' ?>