<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.0/font/bootstrap-icons.css" integrity="sha384-7ynz3n3tAGNUYFZD3cWe5PDcE36xj85vyFkawcF6tIwxvIecqKvfwLiaFdizhPpN" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo RUTA_URL?>/css/estilos.css">
    <!-- <link rel="stylesheet" href="css/estilos.css"> -->
    <title><?php echo "Página de inicio"?></title>
</head>
<body>
    
<header>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <div class="container-fluid">
            <a href="<?php echo RUTA_URL?>" class="navbar-brand"><?php echo 'TRAGAMILLAS' ?></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
<?php if (tienePrivilegios($datos['usuarioSesion']->idRol,[1,2])):?>
                    <li class="nav-item">
                        <?php if (isset($datos['menuActivo']) && $datos['menuActivo'] == 1 ): ?>
                            <a class="nav-link active" aria-current="page" href="<?php echo RUTA_URL ?>/usuarios">Usuarios</a>
                        <?php else: ?>
                            <a class="nav-link" aria-current="page" href="<?php echo RUTA_URL ?>/usuarios">Usuarios</a>
                        <?php endif ?>
                    </li>

                    <li class="nav-item">
                        <?php if (isset($datos['menuActivo']) && $datos['menuActivo'] == 1 ): ?>
                            <div class="dropdown">
                                <button class="btn nav-link active dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                    Grupos
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <li><a class="dropdown-item" href="<?php echo RUTA_URL ?>/usuarios">Crear</a></li>
                                    <li><a class="dropdown-item" href="#">Eliminar</a></li>
                                    <li><a class="dropdown-item" href="#">Ver</a></li>
                                </ul>
                            </div>
                        <?php else: ?>
                            <div class="dropdown">
                                <button class="btn nav-link active dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                    Grupos
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <li><a class="dropdown-item" href="<?php echo RUTA_URL ?>/usuarios">Crear</a></li>
                                    <li><a class="dropdown-item" href="#">Eliminar</a></li>
                                    <li><a class="dropdown-item" href="#">Ver</a></li>
                                </ul>
                            </div>
                        <?php endif ?>
                    </li>

                    <li class="nav-item">
                        <?php if (isset($datos['menuActivo']) && $datos['menuActivo'] == 1 ): ?>
                            <a class="nav-link active" aria-current="page" href="<?php echo RUTA_URL ?>/usuarios">Licencias</a>
                        <?php else: ?>
                            <a class="nav-link" aria-current="page" href="<?php echo RUTA_URL ?>/usuarios">Licencias</a>
                        <?php endif ?>
                    </li>

                    <li class="nav-item">
                        <?php if (isset($datos['menuActivo']) && $datos['menuActivo'] == 1 ): ?>
                            <div class="dropdown">
                                <button class="btn nav-link active dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                    Eventos
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <li><a class="dropdown-item" href="<?php echo RUTA_URL ?>/usuarios">Organizar</a></li>
                                    <li><a class="dropdown-item" href="#">Gestionar</a></li>
                                    <li><a class="dropdown-item" href="#">Consultar</a></li>
                                </ul>
                            </div>
                        <?php else: ?>
                            <div class="dropdown">
                                <button class="btn nav-link active dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                    Eventos
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <li><a class="dropdown-item" href="<?php echo RUTA_URL ?>/usuarios">Organizar</a></li>
                                    <li><a class="dropdown-item" href="#">Gestionar</a></li>
                                    <li><a class="dropdown-item" href="#">Consultar</a></li>
                                </ul>
                            </div>
                        <?php endif ?>
                    </li>

                    <li class="nav-item">
                        <?php if (isset($datos['menuActivo']) && $datos['menuActivo'] == 1 ): ?>
                            <a class="nav-link active" aria-current="page" href="<?php echo RUTA_URL ?>/usuarios">Correo</a>
                        <?php else: ?>
                            <a class="nav-link" aria-current="page" href="<?php echo RUTA_URL ?>/usuarios">Correo</a>
                        <?php endif ?>
                    </li>

                    <li class="nav-item">
                        <?php if (isset($datos['menuActivo']) && $datos['menuActivo'] == 1 ): ?>
                            <a class="nav-link active" aria-current="page" href="<?php echo RUTA_URL ?>/usuarios">Inscripciones</a>
                        <?php else: ?>
                            <a class="nav-link" aria-current="page" href="<?php echo RUTA_URL ?>/usuarios">Inscripciones</a>
                        <?php endif ?>
                    </li>

                    <li class="nav-item">
                        <?php if (isset($datos['menuActivo']) && $datos['menuActivo'] == 1 ): ?>
                            <a class="nav-link active" aria-current="page" href="<?php echo RUTA_URL ?>/usuarios">Facturación</a>
                        <?php else: ?>
                            <a class="nav-link" aria-current="page" href="<?php echo RUTA_URL ?>/usuarios">Facturación</a>
                        <?php endif ?>
                    </li>

                    <li class="nav-item">
                        <?php if (isset($datos['menuActivo']) && $datos['menuActivo'] == 1 ): ?>
                            <a class="nav-link active" aria-current="page" href="<?php echo RUTA_URL ?>/tiendas">Tiendas</a>
                        <?php else: ?>
                            <a class="nav-link" aria-current="page" href="<?php echo RUTA_URL ?>/tiendas">Tiendas</a>
                        <?php endif ?>
                    </li>

                    <li class="nav-item">
                        <?php if (isset($datos['menuActivo']) && $datos['menuActivo'] == 1 ): ?>
                            <a class="nav-link active" aria-current="page" href="<?php echo RUTA_URL ?>/usuarios">Temporadas</a>
                        <?php else: ?>
                            <a class="nav-link" aria-current="page" href="<?php echo RUTA_URL ?>/usuarios">Temporadas</a>
                        <?php endif ?>
                    </li>
<?php endif ?>
                </ul>
                <ul class="navbar-nav ms-auto mb-2 mb-md-0">
                    <li class="navbar-text">
                        <?php echo $datos['usuarioSesion']->apellidoUsuario ?>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="<?php echo RUTA_URL ?>/login/logout">LogOut</a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>
</header>

<br><br><br>
