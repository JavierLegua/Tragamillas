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

    const numPorPagina = 2
    let longitud = pedidosDecod.length
    let numPaginas = Math.ceil(longitud / numPorPagina)
    let inicio = 1
    var ini 

    function rellenarTabla(ini){

        document.getElementById("pedidos").innerHTML=""

        var varex = (ini*numPorPagina)-numPorPagina
        var varex2 = (ini*numPorPagina)
        //console.log(varex)
    for (let i = varex; i < varex2; i++) {
        
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
        var btn1 = "btn colortarjeta text-light"
        a1.setAttribute("class", btn1);
        td5.appendChild(a1)
        tr.appendChild(td5)

        var td6 = document.createElement("td")
        var a2 = document.createElement("a")
        a2.setAttribute('href', '<?php echo RUTA_URL?>/pedidos/borrarPedido/'+pedidosDecod[i].idEquipacion)
        var contenido6 = document.createTextNode("Borrar pedido")
        a2.appendChild(contenido6)
        var btn2 = "btn colortarjeta text-light"
        a2.setAttribute("class", btn2);
        td6.appendChild(a2)
        tr.appendChild(td6)
        
        document.getElementById("pedidos").appendChild(tr)

        }
    }

        document.addEventListener('load', rellenarTabla(inicio))
        //rellenarTabla(inicio)

        function menuPaginacion(){

            var nav = document.createElement("nav")
            var ul = document.createElement("ul")
            ul.classList.add("pagination",  "justify-content-center")
            var liPrimera = document.createElement("li")
            liPrimera.classList.add("page-item")
            var a = document.createElement("a")
            a.setAttribute('onclick', 'rellenarTabla('+inicio+')')
            a.classList.add("page-link")    
            var primera = document.createTextNode("Primera")
            a.appendChild(primera)
            liPrimera.appendChild(a)
            ul.appendChild(liPrimera)


            for (let j = 0; j < numPaginas; j++) {
              
            var li = document.createElement("li")
            li.classList.add("page-item")
            var a3 = document.createElement("a")
            //a3.setAttribute('href', '/')
            ini = (inicio + j)
            console.log(ini)
            a3.setAttribute('id', j+1)
            a3.setAttribute('onclick', 'rellenarTabla('+ini+')')
            a3.classList.add("page-link")    
            var numero = document.createTextNode(j+1)
            a3.appendChild(numero)
            li.appendChild(a3)
            ul.appendChild(li)

            }


            var liFinal = document.createElement("li")
            liFinal.classList.add("page-item")
            var a2 = document.createElement("a")
            a2.setAttribute('onclick', 'rellenarTabla('+numPaginas+')')
            a2.classList.add("page-link")    
            var ultima = document.createTextNode("Ultima")
            a2.appendChild(ultima)
            liFinal.appendChild(a2)
            ul.appendChild(liFinal)

            nav.appendChild(ul)

            document.getElementById("menuPaginacion").appendChild(nav)
        }
        document.addEventListener('load', menuPaginacion())

</script>

<?php require_once RUTA_APP.'/vistas/inc/footer.php' ?>