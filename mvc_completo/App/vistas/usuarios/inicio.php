<?php require_once RUTA_APP.'/vistas/inc/header.php' ?>

<div class="container">
    <div class="row">
        <div class="col col-lg-12">

     
<?php
    if (isset($datos['usuario']->id_usuario)){
        $accion = "Modificar";
    } else {
        $accion = "Agregar";
    }
?>
    <table class="table m-auto">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Teléfono</th>
                <th>Rol</th>
<?php if (tienePrivilegios($datos['usuarioSesion']->idRol,[1])):?>
                <th colspan="3" class="text-center">Acciones</th>
<?php endif ?>
            </tr>
        </thead>
        <tbody>
                
            
            <?php foreach($datos['usuario'] as $uruario): ?>
                <!--  <?php echo json_encode($datos) ?>-->
                
                <tr>
                    <td><?php echo $uruario->id_usuario ?></td>
                    <td><?php echo $uruario->apellidoUsuario ?></td>
                    <td><?php echo $uruario->email ?></td>
                    <td><?php echo $uruario->telefono ?></td>
                    <td><?php echo $uruario->idRol ?></td>
<?php if (tienePrivilegios($datos['usuarioSesion']->idRol,[1])):?>


                <td>
                    <!-- PRUEBA -->
                    
                    <button class="btn btn-warning" id="myBtn<?php echo $uruario->id_usuario ?>" onclick="crearmodalEditar(<?php echo $uruario->id_usuario ?>)"><i class="bi bi-pencil"></i></button>
                    &nbsp;&nbsp;
                    <!-- Fin PRUEBA -->

                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalborrar_<?php echo $uruario->id_usuario ?>"><i class="bi bi-trash-fill"></i></button>
                    &nbsp;&nbsp;
                
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#cambiocontraseña_<?php echo $uruario->id_usuario ?>">Cambiar contraseña</button>
                </td>

                </tr>

        


<div id="<?php echo $uruario->id_usuario ?>" class="modal1">
<div class="modal-content1">
        <div class="modal-header">
            <h5 class="modal-title"> Editar Usuario  <?php echo $uruario->apellidoUsuario ?></h5>
            <span onclick="cerrar(<?php echo $uruario->id_usuario ?>)" class="close"><i class="bi bi-x-lg"></i></span>
        </div>
    <!-- Modal content -->
    
        <form method="post" action="<?php echo RUTA_URL?>/usuarios/editar/<?php echo $uruario->id_usuario ?>">
            <div class="mt-3 mb-3">
                <label for="nombre">Nombre: <sup>*</sup></label>
                <input type="text" name="nombre" id="nombre" class="form-control form-control-lg" value="<?php echo $uruario->apellidoUsuario ?>">
            </div>
            <div class="mb-3">
                <label for="dni">DNI: <sup>*</sup></label>
                <input type="text" name="dni" id="dni" class="form-control form-control-lg" maxlength="9" autocomplete="off" onblur="comprobarDni(this.value)" value="<?php echo $uruario->dniUsuario ?>">
            </div>
            <div class="mb-3">
                <label for="cc">Cuenta: <sup>*</sup></label>
                <input type="text" name="cc" id="cc" class="form-control form-control-lg" autocomplete="off" maxlength="24" onblur="fn_ValidateIBAN(this.value)" value="<?php echo $uruario->cc ?>">
            </div>
            <div class="mb-3">
                <label for="fecha_nac">Fecha nacimiento: <sup>*</sup></label>
                <input type="fecha_nac" name="fecha_nac" id="fecha_nac" class="form-control form-control-lg" placeholder="yyyy-mm-dd" value="<?php echo $uruario->fecha_nac ?>">
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

<div class="modal fade" id="cambiocontraseña_<?php echo $uruario->id_usuario ?>" tabindex="-1" aria-labelledby="exampleModalcambio" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalcambio">Cambiar contraseña <?php echo $uruario->apellidoUsuario ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body container">
                <form method="post" action="<?php echo RUTA_URL?>/usuarios/actualizar/<?php echo $uruario->id_usuario ?>">

                    <div class="d-flex justify-content-around row"> 

                        <!-- <div class="mb-3">
                            <label for="clave">Nueva contraseña: <sup>*</sup></label>
                            <input type="password" name="clave" id="clave" class="form-control form-control-lg">
                            <button class="btn btn-primary" type="button" onclick="mostrarPass()"><i class="bi bi-eye"></i></button> 
                        </div>  -->

                        <div class="input-group mb-3">
                            <input type="password" name="clave" id="clave" class="form-control" aria-describedby="botonMostrar">
                            <button class="btn btn-outline-primary" type="button" id="botonMostrar" onclick="mostrarPass()"><i class="bi bi-eye"></i></button>
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
    </table>
</div>    <!-- fin table -->



<?php if (tienePrivilegios($datos['usuarioSesion']->idRol,[1])):?>
    <div class="col text-center" onMouseDown="comprobarExiste()">

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="rellenarRol()">
            Agregar
        </button>
    </div>


<!-- Modal nuevo usuario -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"><?php echo $accion = 'Agregar'?> Usuario</h5>
            <button type="button" class="btn-close btn-danger" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        
            <form method="post" action="<?php echo RUTA_URL?>/usuarios/agregar">
                <div class="mt-3 mb-3">
                    <label for="nombre">Nombre: <sup>*</sup></label>
                    <input type="text" name="nombre" id="nombre" class="form-control form-control-lg">
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
                    <input type="fecha_nac" name="fecha_nac" id="fecha_nac" class="form-control form-control-lg" placeholder="yyyy-mm-dd">
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
                    <br><label for="telefono">Teléfono: <sup>*</sup></label>
                    <input type="text" name="telefono" id="telefono" class="form-control form-control-lg">
                </div>
                <div class="mb-3">
                    <label for="activado">Activado: <sup>*</sup></label>
                    <input type="activado" name="activado" id="activado" class="form-control form-control-lg">
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
    <li class="page-item disabled">
      <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
    </li>
    <li class="page-item"><a class="page-link" href="<?php echo RUTA_URL?>/usuarios/index/0">1</a></li>
    <li class="page-item"><a class="page-link" href="<?php echo RUTA_URL?>/usuarios/index/1">2</a></li>
    <li class="page-item"><a class="page-link" href="<?php echo RUTA_URL?>/usuarios/index/2">3</a></li>
    <li class="page-item">
      <a class="page-link" href="#">Next</a>
    </li>
  </ul>
</nav>

<!-- fin paginacion -->

<script>

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
