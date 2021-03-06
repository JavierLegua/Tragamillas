<!-- https://mdbootstrap.com/docs/standard/extended/profiles/ -->
<?php require_once RUTA_APP.'/vistas/inc/header.php' ?>
<main class="flex-shrink-0 mt-auto">
  <div class="container">
                <?php foreach($datos['perfil'] as $uruario): ?>
                    <?php if (tienePrivilegios($datos['usuarioSesion']->idRol,[3])):?>
                            <?php  $uruario->nombreUsuario ?>
                            <?php  $uruario->apellidoUsuario ?>
                            <?php  $uruario->email ?>
                            <?php  $uruario->dniUsuario ?>
                            <?php  $uruario->cc ?>
                            <?php  $uruario->fecha_nac ?>
                            <?php  $uruario->telefono ?>  
                    <?php endif ?>
                <?php endforeach ?>
      <div class="text-center">
        <h2 class="fw-bold fs-3 "><?php echo "$uruario->nombreUsuario $uruario->apellidoUsuario" ?></h2>
      </div>
      <div class="row justify-content-center py-5">
        <div class="col col-lg-8 mb-4 mb-lg-0">
          <div class="card mb-3 bordes">
            <div class="row g-0">
              <div class="col-md-4 color text-center text-white bordePartes">
              <?php if ($uruario->foto==''){echo '';}else {?> <img class="mt-auto img-fluid p-4" src="<?php echo RUTA_ImgDatos. $uruario->foto?>"><?php ;}?>
              </div>
              <div class="col-md-8">
                <div class="card-body p-4">
                  <h6 class="fw-bold ">Información:</h6>
                  <hr class="mt-0 mb-4">
                    <div class="row pt-1">
                      <div class="col-6 mb-3">
                        <h6 class="fw-bold">Email:</h6>
                        <p class="text-muted"><?php echo $uruario->email ?></p>
                      </div>
                      <div class="col-6 mb-3">
                        <h6 class="fw-bold">Telefono:</h6>
                        <p class="text-muted"><?php echo $uruario->telefono ?></p>
                      </div>
                      <div class="col-6 mb-3">
                        <h6 class="fw-bold">DNI:</h6>
                        <p class="text-muted"><?php echo $uruario->dniUsuario ?></p>
                      </div>
                      <div class="col-6 mb-3">
                        <h6 class="fw-bold">Fecha Nacimiento:</h6>
                        <p class="text-muted"><?php echo $uruario->fecha_nac ?></p>
                      </div>
                      <div class="col-6 mb-3">
                        <h6 class="fw-bold">Cuenta Bancaria:</h6>
                        <p class="text-muted"><?php echo $uruario->cc ?></p>
                      </div>
                      <div class="col-6 mb-3">
                        <button type="button" class="mt-3 btn colortarjeta text-light" data-bs-toggle="modal" data-bs-target="#cambiocontraseña_<?php echo $uruario->id_usuario ?>">Cambiar Contraseña</button>
                      </div>
                      
                      <div class="mb-3">
                      <h6 class="fw-bold">Foto Perfil:</h6>
                      <hr class="mt-0 mb-4">
                        <form action="<?php echo RUTA_URL?>/usuarios/subirFoto/<?php echo $uruario->id_usuario ?>" ENCTYPE="multipart/form-data" method="post">
                          <div class="mb-3">
                              <input accept="image/*" type="file" id="" name="imagen" >
                          </div>
                          <input type="submit" class="btn btn-success" value="Actualizar foto" onclick="return confirm('¿Seguro que quieres actualizar la foto de perfil?');">
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
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
</main>
<?php require_once RUTA_APP.'/vistas/inc/footer.php' ?>