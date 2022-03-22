<?php require_once RUTA_APP.'/vistas/inc/header.php' ?>
<main class="flex-shrink-0 margenTop">

<div class="container">

    <!-- <form action="" method="post"> -->
    <!-- Cambiar numero de elementos por pagina -->
    <!-- <div class="mb-3" id="contenedorRoles"> -->
        <!-- <select name="numElementos" id="numElementos" class="form-control form-control-lg-3"> -->
            <!-- <option value="5" selected>5</option> -->
            <!-- <option value="10">10</option> -->
            <!-- <option value="15">15</option> -->
        <!-- </select> -->
    <!-- </div> -->
    <!-- <button type="submit" class="btn btn-success" value="Actualizar">Actualizar</button> -->
    <!-- </form> -->



    <!-- BUSCADOR -->
    <div class="row g-3 align-items justify-content-center mb-3 mt-3">
        <!-- <div class="col-auto">
            <label for="buscadorpalabra" class="col-form-label"></label>
        </div> -->
        <div class="col-6">
            <input oninput="buscadorFiltrador()" type="text" name="buscador" id="buscadorpalabra" class="form-control" aria-describedby="passwordHelpInline" placeholder="Buscador">
        </div>
    </div>
   
    <!-- FIN BUSCADOR -->
            
<?php
    
    if (isset($datos['usuario']->id_usuario)){
        $accion = "Modificar";
    } else {
        $accion = "Agregar";
    }
?>
<div class="table-responsive">

    <table class="table table-hover">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>DNI</th>
                <th>Email</th>
                <th>Teléfono</th>
                <th>Rol</th>
<?php if (tienePrivilegios($datos['usuarioSesion']->idRol,[1])):?>
                <th colspan="3" class="text-center">Acciones</th>
<?php endif ?>
            </tr>
        </thead>
        <tbody id="tablebody">
                
            
            <?php foreach($datos['usuario'] as $uruario): ?>
                <!--  <?php echo json_encode($datos) ?>-->
                
                <tr>
                    <td><?php echo $uruario->nombreUsuario ?></td>
                    <td><?php echo $uruario->apellidoUsuario ?></td>
                    <td><?php echo $uruario->dniUsuario ?></td>
                    <td><?php echo $uruario->email ?></td>
                    <td><?php echo $uruario->telefono ?></td>
                    <td><?php echo $uruario->idRol ?></td>
<?php if (tienePrivilegios($datos['usuarioSesion']->idRol,[1])):?>


                <td class="text-center">
                    <!-- PRUEBA -->
                    
                    <button class="btn btn-warning" id="myBtn<?php echo $uruario->id_usuario ?>" onclick="crearmodalEditar(<?php echo $uruario->id_usuario ?>)"><i class="bi bi-pencil"></i></button>
                    &nbsp;
                    <!-- Fin PRUEBA -->

                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalborrar_<?php echo $uruario->id_usuario ?>"><i class="bi bi-trash-fill"></i></button>
                    &nbsp;
                
                    <button type="button" class="btn colortarjeta text-light" data-bs-toggle="modal" data-bs-target="#cambiocontraseña_<?php echo $uruario->id_usuario ?>"><i class="bi bi-shield-lock"></i></button>
                </td>

                </tr>

<div id="<?php echo $uruario->id_usuario ?>" class="modal1">
<div class="modal-content1">
        <div class="modal-header">
            <h5 class="modal-title"> Editar Usuario  <?php echo $uruario->nombreUsuario ?></h5>
            <span onclick="cerrar(<?php echo $uruario->id_usuario ?>)" class="close"><i class="bi bi-x-lg"></i></span>
        </div>
    <!-- Modal content -->
    
        <form method="post" action="<?php echo RUTA_URL?>/usuarios/editar/<?php echo $uruario->id_usuario ?>">
            <div class="mt-3 mb-3">
                <label for="nombre">Nombre: <sup>*</sup></label>
                <input type="text" name="nombre" id="nombre" class="form-control form-control-lg" value="<?php echo $uruario->nombreUsuario ?>">
            </div>
            <div class="mt-3 mb-3">
                <label for="apellido">Apellido: <sup>*</sup></label>
                <input type="text" name="apellido" id="apellido" class="form-control form-control-lg" value="<?php echo $uruario->apellidoUsuario ?>">
            </div>
            <div class="mb-3">
                <label for="dni">DNI: <sup>*</sup></label>
                <input type="text" name="dni" id="dni" class="form-control form-control-lg" maxlength="9" autocomplete="off" onblur="comprobarDni(this.value)" value="<?php echo $uruario->dniUsuario ?>">
            </div>
            <div class="mb-3">
                <label for="cc">Cuenta: <sup>*</sup></label>
                <input type="text" name="cc" id="cc_<?php echo $uruario->id_usuario ?>" class="form-control form-control-lg" autocomplete="off" maxlength="24" onblur="fn_ValidateIBAN(<?php echo $uruario->cc ?>)" value="<?php echo $uruario->cc ?>">
            </div>
            <div class="mb-3">
                <label for="fecha_nac">Fecha nacimiento: <sup>*</sup></label>
                <input type="date" name="fecha_nac" id="fecha_nac" class="form-control form-control-lg" placeholder="yyyy-mm-dd" value="<?php echo $uruario->fecha_nac ?>">
            </div>
            <div class="mb-3">
                <label for="email">Email: <sup>*</sup></label>
                <input type="email" name="email" id="email" class="form-control form-control-lg" autocomplete="off" onblur="validarEmail(this.value)" value="<?php echo $uruario->email ?>">
            </div>
            <div class="mb-3">
                <label for="telefono">Teléfono: <sup>*</sup></label>
                <input type="text" name="telefono" id="telefono" class="form-control form-control-lg" value="<?php echo $uruario->telefono ?>">
            </div>

            <input type="submit" class="btn btn-success" value="Editar Usuario" onclick="return confirm('¿Seguro que quieres <?php echo $accion ?> este usuario?');">
        </form>
    </div>
</div>



<!-- Modal borrar usuario -->
<div class="modal fade" id="modalborrar_<?php echo $uruario->id_usuario ?>" tabindex="-1" aria-labelledby="exampleModalBorrar" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalBorrar">Borrar Usuario</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

            <form method="post" action="<?php echo RUTA_URL?>/usuarios/borrar/<?php echo $uruario->id_usuario ?>">
                <div class="mt-3 mb-3">
                    <label for="nombre">Nombre: <sup>*</sup></label>
                    <input type="text" name="nombre" id="nombre" class="form-control form-control-lg" value="<?php echo $uruario->apellidoUsuario ?>" disabled>
                </div>
                <div class="mb-3">
                    <label for="email">Email: <sup>*</sup></label>
                    <input type="email" name="email" id="email" class="form-control form-control-lg" value="<?php echo $uruario->email ?>" disabled>
                </div>
                <div class="mb-3">
                    <label for="telefono">Teléfono: <sup>*</sup></label>
                    <input type="text" name="telefono" id="telefono" class="form-control form-control-lg" value="<?php echo $uruario-> telefono ?>" disabled>
                </div>
                <input type="submit" class="btn btn-success" value="Borrar Usuario" onclick="return confirm('¿Seguro que quieres eliminar este usuario?');">
            </form>

        </div>
    </div>
  </div>
</div>
<!-- fin modal borrar usuario -->


<!-- modal cambiar contraseña -->

<div class="modal fade" id="cambiocontraseña_<?php echo $uruario->id_usuario ?>" tabindex="-1" aria-labelledby="exampleModalcambio" aria-hidden="true" onclick="evento()">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalcambio">Cambiar contraseña <?php echo $uruario->apellidoUsuario ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="limpiarC(<?php echo $uruario->id_usuario ?>)"></button>
            </div>
            <div class="modal-body container">
                <form method="post" id="cambiarClave_<?php echo $uruario->id_usuario ?>" action="<?php echo RUTA_URL?>/usuarios/actualizar/<?php echo $uruario->id_usuario ?>">
                    <div class="row d-flex justify-content-around"> 

                        <div class="input-group mb-3">
                            <input type="password" name="clave" id="clave_<?php echo $uruario->id_usuario ?>" class="form-control" aria-describedby="botonMostrar">
                            <button class="btn btn-outline-primary" type="button" id="botonMostrar" onclick="mostrarPass(<?php echo $uruario->id_usuario ?>)"><i class="bi bi-eye"></i></button>
                        </div>

                        <input type="submit" class="btn btn-success" value="Actualizar contraseña" onclick="return confirm('¿Seguro que quieres actualizar la contraseña?');">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- fin modal cambiar contraseña -->


<?php endif ?>


            <?php endforeach ?>
        </tbody>
    </table><!-- fin table -->

</div> <!-- fin table-responsive -->
</div>    



<?php if (tienePrivilegios($datos['usuarioSesion']->idRol,[1])):?>
    <div class="col text-center" onMouseDown="comprobarExiste()">

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="rellenarRol()">
            Agregar
        </button>
    </div>
</main>    


<!-- Modal nuevo usuario -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" onclick="evento()">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"><?php echo $accion = 'Agregar'?> Usuario</h5>
            <button type="button" class="btn-close btn-danger" data-bs-dismiss="modal" aria-label="Close" onclick="limpiar()"></button>
        </div>
        <div class="modal-body">
        
            <form method="post" action="/usuarios/agregar" id="formNuevoUsuario">
                <div class="mt-3 mb-3">
                    <label for="nombre">Nombre: <sup>*</sup></label>
                    <input type="text" name="nombre" id="nombre" class="form-control form-control-lg">
                </div>
                <div class="mt-3 mb-3">
                    <label for="apellido">Apellido: <sup>*</sup></label>
                    <input type="text" name="apellido" id="apellido" class="form-control form-control-lg">
                </div>
                <div class="mb-3">
                    <label for="dni">DNI: <sup>*</sup></label>
                    <input type="text" name="dni" id="dni" class="form-control form-control-lg" maxlength="9" autocomplete="off" onblur="comprobarDni(this.value)">
                </div>
                <div class="mb-3">
                    <label for="cc">Cuenta: <sup>*</sup></label>
                    <input type="text" name="cc" id="cc" class="form-control form-control-lg" autocomplete="off" maxlength="24" onblur="fn_ValidateIBAN(this.value)">
                </div>
                <div class="mb-3">
                    <label for="fecha_nac">Fecha nacimiento: <sup>*</sup></label>
                    <input type="date" name="fecha_nac" id="fecha_nac" class="form-control form-control-lg" placeholder="yyyy-mm-dd">
                </div>
                <div class="mb-3">
                    <label for="email">Email: <sup>*</sup></label>
                    <input type="email" name="email" id="email" class="form-control form-control-lg" autocomplete="off" onblur="validarEmail(this.value)">
                </div>

                <div class="mb-3">
                    <label for="email">Clave: <sup>*</sup></label>
                    <input type="password" name="clave" id="clave" class="form-control form-control-lg" autocomplete="off">
                </div>
    
                <div class="mb-3">
                    <label for="telefono">Teléfono: <sup>*</sup></label>
                    <input type="text" name="telefono" id="telefono" class="form-control form-control-lg">
                </div>

                <div class="mb-3" id="contenedorRoles">
                    <label for="rol" >Rol: <sup>*</sup></label>
                    
                </div>
                <input type="submit" class="btn btn-success" value="<?php echo $accion ?> Usuario" onclick="return confirm('¿Seguro que quieres <?php echo $accion ?> este usuario?');">
            </form>

        </div>
    </div>
  </div>
</div>
<!-- Fin modal nuevo usuario -->


<!-- paginacion -->

<br><br>
<nav aria-label="Page navigation example">
  <ul class="pagination justify-content-center">

  <li class="page-item"><a class="page-link textoColor" href="<?php echo RUTA_URL?>/usuarios/index/0" tabindex="-1" aria-disabled="true">Primera</a></li>

  <?php for ($i=0; $i < $this->numPaginas; $i++): ?>

    <li class="page-item"><a class="page-link textoColor" href="<?php echo RUTA_URL?>/usuarios/index/<?php echo $i?>"><?php echo $i+1 ?></a></li>

  <?php endfor ?>

  <li class="page-item"><a class="page-link textoColor" href="<?php echo RUTA_URL?>/usuarios/index/<?php echo $this->numPaginas-1?>" tabindex="-1" aria-disabled="true">Última</a></li>
    
  </ul>
</nav>

<!-- fin paginacion -->

<script>

function buscadorFiltrador(){
    var palabra = document.getElementById("buscadorpalabra").value;
    let usuarios = '<?php echo $this->usuEncript['usuarios'];  ?>'

    let usuariosDecod = JSON.parse(usuarios)
   
    document.getElementById("tablebody").innerHTML = "";

    for (let i = 0; i < usuariosDecod.length; i++) {
        if (palabra == "") {
            //escribir la tabla con todos los usuarios
            //location.reload();
            window.location.href="<?php echo RUTA_URL?>/usuarios/index/0 ?>";


        } else if(usuariosDecod[i].nombreUsuario.toLowerCase().includes(palabra.toLowerCase()) || usuariosDecod[i].dniUsuario.toLowerCase().includes(palabra.toLowerCase()) || usuariosDecod[i].apellidoUsuario.toLowerCase().includes(palabra.toLowerCase())) {
          

            var nUsu = usuariosDecod[i].nombreUsuario ;      
            console.log(nUsu);
            console.log(usuariosDecod[i].apellidoUsuario);

            var tr = document.createElement("tr")
            var td = document.createElement("td")

            

            var contenido = document.createTextNode(usuariosDecod[i].nombreUsuario)
            td.appendChild(contenido)
            tr.appendChild(td)

            var td2 = document.createElement("td")
            var contenido2 = document.createTextNode(usuariosDecod[i].apellidoUsuario)
            td2.appendChild(contenido2)
            tr.appendChild(td2)

            var td1 = document.createElement("td")
            var contenido1 = document.createTextNode(usuariosDecod[i].dniUsuario)
            td1.appendChild(contenido1)
            tr.appendChild(td1)

            var td3 = document.createElement("td")
            var contenido3 = document.createTextNode(usuariosDecod[i].email)
            td3.appendChild(contenido3)
            tr.appendChild(td3)

            var td4 = document.createElement("td")
            var contenido4 = document.createTextNode(usuariosDecod[i].telefono)
            td4.appendChild(contenido4)
            tr.appendChild(td4)

            var td5 = document.createElement("td")
            var contenido5 = document.createTextNode(usuariosDecod[i].idRol)
            td5.appendChild(contenido5)
            tr.appendChild(td5)

            var td6 = document.createElement("td")

            var tc = "text-center"
            td6.setAttribute("class", tc)

            var a2 = document.createElement("button")
            var icon = document.createElement("i") 
            var iclase = "bi bi-pencil"
            icon.setAttribute("class", iclase)
            var contenido6 = document.createTextNode(icon)
            a2.appendChild(icon)
            var btn2 = "btn btn-warning"
            a2.setAttribute("class", btn2)
            a2.setAttribute("onclick", "crearmodalEditar("+usuariosDecod[i].id_usuario+")")
            td6.appendChild(a2)
            

            var a3 = document.createElement("button")
            var iconb = document.createElement("i") 
            var iclaseb = "bi bi-trash-fill"
            iconb.setAttribute("class", iclaseb)
            var contenido6 = document.createTextNode(iconb)
            a3.appendChild(iconb)
            var btn3 = "btn btn-danger ms-3"
            a3.setAttribute("class", btn3)
            a3.setAttribute("data-bs-target", "#modalborrar_"+usuariosDecod[i].id_usuario)
            a3.setAttribute("data-bs-toggle", "modal")
            td6.appendChild(a3)
            tr.appendChild(td6)

            var a4 = document.createElement("button")
            var iconc = document.createElement("i")
            var iclasec = "bi bi-shield-lock"
            iconc.setAttribute("class", iclasec)
            var contenidoc = document.createTextNode(iconc)
            a4.appendChild(iconc)
            var btn4 = "btn colortarjeta ms-3 text-light"
            a4.setAttribute("class", btn4)
            a4.setAttribute("data-bs-target", "#cambiocontraseña_"+usuariosDecod[i].id_usuario)
            a4.setAttribute("data-bs-toggle", "modal")
            td6.appendChild(a4)
            tr.appendChild(td6)

            document.getElementById("tablebody").appendChild(tr);

            //alert(usuariosDecod[i].id_usuario); 
           // exit();
        }
    }    
}

    function limpiarC(id) {
        var div2 = document.getElementById("cambiarClave_"+id);
        div2.reset();
    }

    function limpiar() {
        var div1 = document.getElementById("formNuevoUsuario");
        div1.reset();
    }

    function evento() {
       
        var div1 = document.getElementById("formNuevoUsuario");
        document.addEventListener("keyup", function (limpiar) {
        if (event.keyCode === 27) {
            div1.reset();
            
        }
        });
    }


function comprobarExiste(){
    var element = document.getElementById("contenedorRoles");
    
    if(typeof(element) != 'undefined' && element != null){
        eliminar_elemento();
    } else{
        rellenarRol();
    }
}

function eliminar_elemento(){
    var valor = document.getElementById("contenedorRoles");
    var selectrolll = document.getElementById("selectrolll");
    var throwawayNode = valor.removeChild(selectrolll);
}

async function rellenarRol(){
    
    await fetch('<?php echo RUTA_URL?>/usuarios/obtenerrol') 
    .then(response => response.json())
    .then(data => datos = data);
    
    var dasfsaf  = document.createElement("select");
    var prueba = " form-control form-control-lg-3";
    dasfsaf.setAttribute("class", prueba);
    dasfsaf.setAttribute("id","selectrolll");
    dasfsaf.setAttribute("name","rol");
    
    let option0 = document.createElement("option");
    
        option0.setAttribute("value", "0");
        let option1Texto0 = document.createTextNode(" ");
        option0.appendChild(option1Texto0);
        dasfsaf.appendChild(option0);

    datos.forEach(datosObjet => {

        let option1 = document.createElement("option");
        option1.setAttribute("value", datosObjet.idRol);
        let option1Texto = document.createTextNode(datosObjet.nombreRol);
        option1.appendChild(option1Texto);
        dasfsaf.appendChild(option1);
        
    });        
    document.getElementById("contenedorRoles").appendChild(dasfsaf);
}

    function getSesiones(id_usuario){
        fetch('<?php echo RUTA_URL?>/usuarios/sesiones/'+id_usuario, {
            headers: {
                "Content-Type": "application/json"
            },
            credentials: 'include'
        })
            .then((resp) => resp.json())
            .then(function(data) {
                let sesiones = data.sesiones
                let usuario = data.usuario

                document.getElementById("tbodyTablaSesiones").innerHTML = ""
                document.getElementById("usuarioSesion").innerHTML = usuario.apellidoUsuario

                document.getElementById("listadoSesiones").style.display="block";

                for (i = 0; i < sesiones.length; i++){
                    let fechaInicio = new Date(sesiones[i].fecha_inicio)
                    let fechaFin = new Date(sesiones[i].fecha_fin)
                    let fechaFinOut = "-"
                    let estado
                    if (sesiones[i].fecha_fin) {
                        fechaFinOut = fechaFin.toLocaleString()
                        estado = "cerrada"
                    } else {
                        estado = '<div class="col text-center"> \
                                    <a class="btn btn-success" href="javascript:cerrarSesion(\''+id_usuario+'\',\''+sesiones[i].id_sesion+'\')"> \
                                        Cerrar \
                                    </a> \
                                </div>'
                    }
                    
                    document.getElementById("tbodyTablaSesiones").insertRow(-1).innerHTML = 
                                '<td>' + sesiones[i].id_sesion + '</td>' + 
                                '<td>' + sesiones[i].id_usuario + '</td>' + 
                                '<td>' + fechaInicio.toLocaleString() + '</td>' + 
                                '<td>' + fechaFinOut + '</td>' +
                                '<td>' + estado + '</td>'
                }
            })
    }


    async function cerrarSesion(id_usuario,id_sesion){
        const data = new FormData();
        data.append('id_sesion', id_sesion);
        
        await fetch('<?php echo RUTA_URL?>/usuarios/cerrarSesion/', {
            method: "POST",
            body: data,
        })
            .then((resp) => resp.json())
            .then(function(data) {
    
                if (Boolean(data)){
                    getSesiones(id_usuario)
                } else {
                    alert('Error al Cerrar la sesión')
                }
                
            })
    }

</script>
<?php endif ?>

<?php require_once RUTA_APP.'/vistas/inc/footer.php' ?>
