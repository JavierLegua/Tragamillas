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
                <tbody id="pedidos">
                    
                        <?php if (tienePrivilegios($datos['usuarioSesion']->idRol,[4]) && $uruario->entregado != 1):?>

                        <?php endif ?>
                    
                </tbody>
            </table>
        </div>
    </div>
    <div id="menuPaginacion">

        </div>
</main>


<script>

    //Paginación en JavaScript

    let pedidos = '<?php echo $this->pedidosCod['pedidoCod'];  ?>'

    let pedidosDecod = JSON.parse(pedidos)

    const numPorPagina = 1
    let longitud = pedidosDecod.length
    let numPaginas = Math.ceil(longitud / numPorPagina)
    let inicio = 0

    function rellenarTabla(){

    for (let i = inicio; i < (inicio + numPorPagina); i++) {
        var tr = document.createElement("tr")

        var td = document.createElement("td")
        var contenido = document.createTextNode(pedidosDecod[i].idEquipacion)
        td.appendChild(contenido)
        tr.appendChild(td)

        var td1 = document.createElement("td")
        var contenido1 = document.createTextNode(pedidosDecod[i].tipo)
        td1.appendChild(contenido1)
        tr.appendChild(td1)

        var td2 = document.createElement("td")
        var contenido2 = document.createTextNode(pedidosDecod[i].talla)
        td2.appendChild(contenido2)
        tr.appendChild(td2)

        var td3 = document.createElement("td")
        var contenido3 = document.createTextNode(pedidosDecod[i].idUsuario)
        td3.appendChild(contenido3)
        tr.appendChild(td3)

        var td4 = document.createElement("td")
        var contenido4 = document.createTextNode(pedidosDecod[i].apellidoUsuario)
        td4.appendChild(contenido4)
        tr.appendChild(td4)

        var td5 = document.createElement("td")
        var a1 = document.createElement("a")
        a1.setAttribute('href', '<?php echo RUTA_URL?>/pedidos/confirmarPedido/'+pedidosDecod[i].idEquipacion)
        var contenido5 = document.createTextNode("Confirmar pedido")
        a1.appendChild(contenido5)
        td5.appendChild(a1)
        tr.appendChild(td5)

        var td6 = document.createElement("td")
        var a2 = document.createElement("a")
        a2.setAttribute('href', '<?php echo RUTA_URL?>/pedidos/borrarPedido/'+pedidosDecod[i].idEquipacion)
        var contenido6 = document.createTextNode("Borrar pedido")
        a2.appendChild(contenido6)
        td6.appendChild(a2)
        tr.appendChild(td6)
        
        document.getElementById("pedidos").appendChild(tr)
        
        }
        }

        rellenarTabla()

        function menuPaginacion(){

            var nav = document.createElement("nav")
            var ul = document.createElement("ul")
            ul.classList.add("pagination",  "justify-content-center")

            var liprimero = document.createElement("li")
            liprimero.classList.add("page-item")
            var a = document.createElement("a")
            a.setAttribute('href', '/')
            a.classList.add("page-link")    
            var primera = document.createTextNode("Primera")
            a.appendChild(primera)
            liprimero.appendChild(a)
            ul.appendChild(liprimero)


            for (let i = 0; i < numPaginas; i++) {
                
            var li = document.createElement("li")
            li.classList.add("page-item")
            var a3 = document.createElement("a")
            a3.setAttribute('href', '/')
            a3.classList.add("page-link")    
            var numero = document.createTextNode(i+1)
            a3.appendChild(numero)
            li.appendChild(a3)
            ul.appendChild(li)

            }


            var lifinal = document.createElement("li")
            lifinal.classList.add("page-item")
            var a2 = document.createElement("a")
            a2.setAttribute('href', '/')
            a2.classList.add("page-link")    
            var ultima = document.createTextNode("Ultima")
            a2.appendChild(ultima)
            lifinal.appendChild(a2)
            ul.appendChild(lifinal)

            nav.appendChild(ul)

            document.getElementById("menuPaginacion").appendChild(nav)
        }
        menuPaginacion()

</script>

<?php require_once RUTA_APP.'/vistas/inc/footer.php' ?>