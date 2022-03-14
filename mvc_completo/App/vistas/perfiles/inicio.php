<!-- https://mdbootstrap.com/docs/standard/extended/profiles/ -->
<?php require_once RUTA_APP.'/vistas/inc/header.php' ?>
<main class="flex-shrink-0 mt-auto">
  <div class="container">
       
                <?php foreach($datos['perfil'] as $uruario): ?>
                    <?php if (tienePrivilegios($datos['usuarioSesion']->idRol,[3])):?>
                            <?php  $uruario->apellidoUsuario ?>
                            <?php  $uruario->email ?>
                            <?php  $uruario->dniUsuario ?>
                            <?php  $uruario->cc ?>
                            <?php  $uruario->fecha_nac ?>
                            <?php  $uruario->telefono ?>  
                    <?php endif ?>
                <?php endforeach ?>

<div class="py-5">
    <div class="row justify-content-around justify-content-center align-items-center mt-5">
      <div class="col col-lg-8 mb-4 mb-lg-0">
        <div class="card mb-3" style="border-radius: .5rem;">
          <div class="row g-0">
            <div class="col-md-4 gradient-custom text-center text-white" style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
              <img
                src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava1-bg.webp"
                alt="Avatar"
                class="img-fluid my-5"
              />
              <h5 class="text-dark"><?php echo $uruario->apellidoUsuario ?></h5>
            </div>
            <div class="col-md-8">
              <div class="card-body p-4">
                <h6>Información</h6>
                <hr class="mt-0 mb-4">
                  <div class="row pt-1">
                    <div class="col-6 mb-3">
                      <h6>Email</h6>
                      <p class="text-muted"><?php echo $uruario->email ?></p>
                    </div>
                    <div class="col-6 mb-3">
                      <h6>Telefono</h6>
                      <p class="text-muted"><?php echo $uruario->telefono ?></p>
                    </div>
                    <div class="col-6 mb-3">
                      <h6>DNI:</h6>
                      <p class="text-muted"><?php echo $uruario->dniUsuario ?></p>
                    </div>
                    <div class="col-6 mb-3">
                      <h6>Fecha Nacimiento</h6>
                      <p class="text-muted"><?php echo $uruario->fecha_nac ?></p>
                    </div>
                    <div class="col-6 mb-3">
                      <h6>Cuenta Bancaria</h6>
                      <p class="text-muted"><?php echo $uruario->cc ?></p>
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
                <div>
                    <p>Nombre: <?php echo $uruario->apellidoUsuario ?></p>
                    <p>Email: <?php echo $uruario->email ?></p>
                    <p>DNI: <?php echo $uruario->dniUsuario ?></p>
                    <p>Nº cuenta corriente: <?php echo $uruario->cc ?></p>
                    <p>Fecha Nacimiento: <?php echo $uruario->fecha_nac ?></p>
                    <p>Telefono: <?php echo $uruario->telefono ?></p>
                </div>
    </div>
</main>
<?php require_once RUTA_APP.'/vistas/inc/footer.php' ?>