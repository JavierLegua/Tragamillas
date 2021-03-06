<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>Log-In</title>
    <script src="<?php echo RUTA_URL?>/public/js/main.js"></script>
    <link rel="stylesheet" href="<?php echo RUTA_URL?>/public/css/estilos.css">
</head>

<body>
<main class="flex-shrink-0 margenTop">

  <div class="container">
    <div class="row d-flex vh-100 justify-content-center align-items-center">
      <div class="col-xl-4 col-lg-5 col-md-6 col-sm-8">

        <div class="card text-white justify-content-center align-items-center shadow mb-5 bg-body rounded padtop">
        
            <img src="<?php echo RUTA_URL?>/public/img/logo_tragamillas.png" alt="" class="avatar padbotom">
        
          <div class="card-body text-center padtop">

            <div class="mb-md-5 mt-md-5">
              <form method="post">

                <div class="form-outline form-white mb-4">
                  <input type="email" name="email" id="email" class="form-control form-control-lg" placeholder="Usuario (email)" required/>
                </div>
                
                <div class="form-outline form-white mb-4">
                  <input type="password" name="clave" id="clave" class="form-control form-control-lg" placeholder="Contraseña" autocomplete="off" required/>
                </div>

                <input type="submit" class="color mt-3 btn btn-lg px-5 colortarjeta colortarjetahover" value="Login"> <br>
              </form>  
            </div>

            <!-- ------------------------------Comienzo modal recuperar contraseña--------------------- -->

            <!-- Button trigger modal -->
            <button type="button" class="btn btn-outline-light btn-lg px-5 colortarjeta colortarjetahover" data-bs-toggle="modal" data-bs-target="#recuperar">
              Recuperar contraseña
            </button>

            <!-- Modal -->
            <div class="modal fade" id="recuperar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog mb-1">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title text-dark" id="exampleModalLabel">Correo de recuperación</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body text-dark">
                    <form id="emailRecuperacion" method="post" class="card-body">
                      <div class="mb-3">
                          <label for="email">Email de recuperación: <sup>*</sup></label>
                          <input type="email" name="emailRec" id="emailRec" class="form-control form-control-lg" autocomplete="off" value="">
                      </div>
                    </form>
                  </div>
                  <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button> -->
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal" onclick="recuperarPass()">Enviar correo</button>
                  </div>
                </div>
              </div>
            </div>

            <!-- -----------------------------Fin modal recuperar contreseña------------------------------ -->

              <br><br><a href="<?php echo RUTA_URL ?>"><img src="<?php echo RUTA_URL?>/public/img/arrow-left-circle-fill.png" alt="img" style=" width: 35px;"></a>
        </div>
        
      </div>

      <!-- -------------------------Entrar como externo------------------------- -->

      <p class="text-center">Entrar como <a href="<?php echo RUTA_URL?>/invitados">invitado</a></p>

      <!-- -------------------------Modal registrar nuevo usuario------------------------- -->

      <p class="text-center">¿No estás registrado aún? <a href="" data-bs-toggle="modal" data-bs-target="#registrar">Regístrate</a></p>

      <div class="modal fade" id="registrar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Registrar usuario</h5>
            <button type="button" class="btn-close btn-danger" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        
            <form method="post" class="card-body" class="registrarNuevo" action="/inicio/agregar">
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
                    <label for="telefono">Teléfono: <sup>*</sup></label>
                    <input type="text" name="telefono" id="telefono" class="form-control form-control-lg">
                </div>
                <input type="submit" class="btn btn-success" value="Registrar Usuario" onclick="return confirm('¿Seguro que quieres registrar este usuario?');">
            </form>

        </div>
    </div>
  </div>
</div>

      
    </div>

    

  </div>
</main>

<script>

  async function recuperarPass(){
        const data = new FormData(document.getElementById('emailRecuperacion'));
        //alert("dddddd")
         await fetch('<?php echo RUTA_URL?>/inicio/recuperarPass', {
             method: "POST",
             body: data,
         })
             .then((resp) => resp.json())
             .then(function(data) {
              
              console.log(data)

                 if (Boolean(data)){
                   alert('Revisa tu correo')
                 } else {
                     alert('Error al Cerrar la sesión')
                 }
                
             })
    }


</script>

</body>
</html>





 