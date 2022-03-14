<?php require_once RUTA_APP.'/vistas/inc/header.php' ?>
<main class="flex-shrink-0 margenTop">
    <div class="container">
        <div class="table-responsive">
            <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Id pedido</th>
                            <th>Tipo</th>
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
                        <?php if (tienePrivilegios($datos['usuarioSesion']->idRol,[4]) && $uruario->entregado != 1):?>
                            <tr>
                                <td><?php echo $uruario->idEquipacion ?></td>
                                <td><?php echo $uruario->tipo ?></td>
                                <td><?php echo $uruario->talla ?></td>
                                <td><?php echo $uruario->idUsuario ?></td>
                                <td><?php echo $uruario->apellidoUsuario ?></td>
                                <td>
                                    <a href="<?php echo RUTA_URL?>/pedidos/confirmarPedido/<?php echo $uruario->idEquipacion ?>">Confirmar entrega</a>
                                    &nbsp;&nbsp;&nbsp;&nbsp;
                                    <a href="<?php echo RUTA_URL?>/pedidos/borrarPedido/<?php echo $uruario->idEquipacion ?>">Borrar pedido</a>
                                </td>                
                            </tr>
                        <?php endif ?>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</main>

<!-- <?php echo $this->pedidosCod['pedidoCod'];  ?> -->


<script>

    let pedidos = '<?php echo $this->pedidosCod['pedidoCod'];  ?>'

    let pedidosDecod = JSON.parse(pedidos)

    // console.log(JSON.parse(pedidos))

    console.log(pedidosDecod[0])

</script>

<?php require_once RUTA_APP.'/vistas/inc/footer.php' ?>