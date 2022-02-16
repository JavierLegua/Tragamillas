<?php require_once RUTA_APP.'/vistas/inc/header.php' ?>
    <table class="table">
        <thead>
            <tr>
                <th>Id pedido</th>
                <th>Talla</th>
                <th>Id usuario</th>
                <th>Nombre usuario</th>
<?php if (tienePrivilegios($datos['usuarioSesion']->idRol,[4])):?>
                <th>Acciones</th>
<?php endif ?>
            </tr>
        </thead>
        <tbody>
            <?php foreach($datos['pedido'] as $uruario): ?>
                <tr>
                    <td><?php echo $uruario->idEquipacion ?></td>
                    <td><?php echo $uruario->talla ?></td>
                    <td><?php echo $uruario->idUsuario ?></td>
                    <td><?php echo $uruario->apellidoUsuario ?></td>
<?php if (tienePrivilegios($datos['usuarioSesion']->idRol,[4]) && $uruario->entregado != 1):?>
                    <td>
                        <a href="<?php echo RUTA_URL?>/pedidos/confirmarPedido/<?php echo $uruario->idEquipacion ?>">Confirmar entrega</a>
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <a href="<?php echo RUTA_URL?>/pedidos/borrarPedido/<?php echo $uruario->idEquipacion ?>">Borrar pedido</a>
                    </td>
<?php endif ?>
<?php if (tienePrivilegios($datos['usuarioSesion']->idRol,[4]) && $uruario->entregado == 1):?>
                    <td>
                        <?php echo 'pedido entregado'?>
                    </td>
<?php endif ?>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>

<?php require_once RUTA_APP.'/vistas/inc/footer.php' ?>