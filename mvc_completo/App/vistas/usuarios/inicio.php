<?php require_once RUTA_APP.'/vistas/inc/header.php' ?>
<?php
    if (isset($datos['usuario']->id_usuario)){
        $accion = "Modificar";
    } else {
        $accion = "Agregar";
    }
?>

    <table class="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Teléfono</th>
                <th>Rol</th>
<?php if (tienePrivilegios($datos['usuarioSesion']->idRol,[1])):?>
                <th>Acciones</th>
<?php endif ?>
            </tr>
        </thead>
        <tbody>
            <?php foreach($datos['usuario'] as $uruario): ?>
                <tr>
                    <td><?php echo $uruario->id_usuario ?></td>
                    <td><?php echo $uruario->apellidoUsuario ?></td>
                    <td><?php echo $uruario->email ?></td>
                    <td><?php echo $uruario->telefono ?></td>
                    <td><?php echo $uruario->idRol ?></td>
<?php if (tienePrivilegios($datos['usuarioSesion']->idRol,[1])):?>
                    <td>
                        <a href="<?php echo RUTA_URL?>/usuarios/editar/<?php echo $uruario->id_usuario ?>">Editar</a>
                        &nbsp;&nbsp;&nbsp;
                        <a href="<?php echo RUTA_URL?>/usuarios/borrar/<?php echo $uruario->id_usuario ?>">Borrar</a>
                        &nbsp;&nbsp;&nbsp;
                        <a href="<?php echo RUTA_URL?>/usuarios/actualizar/<?php echo $uruario->id_usuario ?>">Cambiar contraseña</a>
                    </td>
<?php endif ?>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>

<?php if (tienePrivilegios($datos['usuarioSesion']->idRol,[1])):?>
    <div class="col text-center">

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="rellenarRol()">
            Agregar
        </button>
    </div>

    <div class="container" id="listadoSesiones" style="display:none">
        <br><br>
        <h2>Sesiones de: <span id="usuarioSesion"></span></h2>
        <table class="table text-center">
            <thead>
                <tr>
                <th scope="col">id_sesion</th>
                <th scope="col">id_usuario</th>
                <th scope="col">fecha_inicio</th>
                <th scope="col">fecha_fin</th>
                <th scope="col">estado</th>
                </tr>
            </thead>
            <tbody id="tbodyTablaSesiones">

                
            </tbody>
        </table>
    </div>

<!-- Modal nuevo usuario -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"><?php echo $accion ?> Usuario</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

            <form method="post">
                <div class="mt-3 mb-3">
                    <label for="nombre">Nombre: <sup>*</sup></label>
                    <input type="text" name="nombre" id="nombre" class="form-control form-control-lg">
                </div>
                <div class="mb-3">
                    <label for="dni">DNI: <sup>*</sup></label>
                    <input type="text" name="dni" id="dni" class="form-control form-control-lg" maxlength="9" autocomplete="off"onblur="comprobarDni(this.value)">
                </div>
                <div class="mb-3">
                    <label for="cc">Cuenta: <sup>*</sup></label>
                    <input type="text" name="cc" id="cc" class="form-control form-control-lg" autocomplete="off" maxlength="24"onblur="fn_ValidateIBAN(this.value)">
                </div>
                <div class="mb-3">
                    <label for="fecha_nac">Fecha nacimiento: <sup>*</sup></label>
                    <input type="fecha_nac" name="fecha_nac" id="fecha_nac" class="form-control form-control-lg">
                </div>
                <div class="mb-3">
                    <label for="email">Email: <sup>*</sup></label>
                    <input type="email" name="email" id="email" class="form-control form-control-lg" autocomplete="off" onblur="validarEmail(this.value)">
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

<script>

    async function rellenarRol(){
        document.getElementById(contenedorRoles); 
        
        await fetch('<?php echo RUTA_URL?>/usuarios/obtenerrol') 
        .then(response => response.json())
        .then(data => datos = data);
/*comprobar si el elemento select esta creado, si  no lo esta lo crea y si esta no hace nada */
        if (condition) {
            
        }
        var dasfsaf  = document.createElement("select");
        var prueba = " form-control form-control-lg-3";
        dasfsaf.setAttribute("class", prueba);
        dasfsaf.setAttribute("id","selectrolll");
        
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
