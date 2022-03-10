<?php require_once RUTA_APP.'/vistas/inc/header.php' ?>
<main class="flex-shrink-0 margenTop">
  <div class="container">

  

    <table class="table table-hover">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Teléfono</th>
<?php if (tienePrivilegios($datos['usuarioSesion']->idRol,[4])):?>
                <th>Acciones</th>
<?php endif ?>
            </tr>
        </thead>
        <tbody>
            <?php foreach($datos['socio'] as $uruario): ?>
                <tr>
                    <td><?php echo $uruario->id_usuario ?></td>
                    <td><?php echo $uruario->apellidoUsuario ?></td>
                    <td><?php echo $uruario->email ?></td>
                    <td><?php echo $uruario->telefono ?></td>
<?php if (tienePrivilegios($datos['usuarioSesion']->idRol,[4])):?>
                    <td>
                        <a href="<?php echo RUTA_URL?>/socios/marcarRopa/<?php echo $uruario->id_usuario ?>">Pedir ropa</a>
                    </td>
<?php endif ?>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>

    <!-- paginacion -->

<br><br>
<nav aria-label="Page navigation example">
  <ul class="pagination justify-content-center">

  <li class="page-item"><a class="page-link" href="<?php echo RUTA_URL?>/socios/index/0" tabindex="-1" aria-disabled="true">Primera</a></li>

  <?php for ($i=0; $i < $this->numPaginas; $i++): ?>

    <li class="page-item"><a class="page-link" href="<?php echo RUTA_URL?>/socios/index/<?php echo $i?>"><?php echo $i+1 ?></a></li>

  <?php endfor ?>

  <li class="page-item"><a class="page-link" href="<?php echo RUTA_URL?>/socios/index/<?php echo $this->numPaginas-1?>" tabindex="-1" aria-disabled="true">Última</a></li>
    
     
 

  
  

    <!-- <li class="page-item disabled">
      <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
    </li>
    <li class="page-item"><a class="page-link" href="<?php echo RUTA_URL?>/usuarios/index/0">1</a></li>
    <li class="page-item"><a class="page-link" href="<?php echo RUTA_URL?>/usuarios/index/1">2</a></li>
    <li class="page-item"><a class="page-link" href="<?php echo RUTA_URL?>/usuarios/index/2">3</a></li>
    <li class="page-item"><a class="page-link" href="<?php echo RUTA_URL?>/usuarios/index/3">4</a></li>
    <li class="page-item">
      <a class="page-link" href="#">Next</a>
    </li> -->
  </ul>
</nav>

  </div>
</main>
<!-- fin paginacion -->

<?php require_once RUTA_APP.'/vistas/inc/footer.php' ?>