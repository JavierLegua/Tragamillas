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
    <link rel="stylesheet" href="<?php echo RUTA_URL?>/public/css/estilos.css">
    <!-- <link rel="stylesheet" href="css/estilos.css"> -->
    <title><?php echo "Página de inicio"?></title>
</head>
<body class="d-flex flex-column h-100">
<header>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark orden">
        <div class="container-fluid">
            <a href="/" class="navbar-brand"><?php echo 'TRAGAMILLAS' ?></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav me-auto mb-2 mb-md-0">

<?php if (tienePrivilegios($datos['usuarioSesion']->idRol,[1])):?>
                    <li class="nav-item">
                        <?php if (isset($datos['menuActivo']) && $datos['menuActivo'] == 1 ): ?>
                            <a class="nav-link active" aria-current="page" href="<?php echo RUTA_URL ?>/usuarios">Usuarios</a>
                        <?php else: ?>
                            <a class="nav-link" aria-current="page" href="<?php echo RUTA_URL ?>/usuarios">Usuarios</a>
                        <?php endif ?>
                    </li>

                    <li class="nav-item">
                        <?php if (isset($datos['menuActivo']) && $datos['menuActivo'] == 1 ): ?>
                            <a class="nav-link active" aria-current="page" href="<?php echo RUTA_URL ?>/grupos">Grupos</a>
                        <?php else: ?>
                            <a class="nav-link" aria-current="page" href="<?php echo RUTA_URL ?>/grupos">Grupos</a>
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
                            <a class="nav-link active" aria-current="page" href="<?php echo RUTA_URL ?>/eventos">Eventos</a>
                        <?php else: ?>
                            <a class="nav-link active" aria-current="page" href="<?php echo RUTA_URL ?>/eventos">Eventos</a>
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

<?php if (tienePrivilegios($datos['usuarioSesion']->idRol,[2])):?>
                    <li class="nav-item">
                        <?php if (isset($datos['menuActivo']) && $datos['menuActivo'] == 1 ): ?>
                            <a class="nav-link active" aria-current="page" href="<?php echo RUTA_URL ?>/usuarios">Alumnos</a>
                        <?php else: ?>
                            <a class="nav-link" aria-current="page" href="<?php echo RUTA_URL ?>/usuarios">Alumnos</a>
                        <?php endif ?>
                    </li>

                    <li class="nav-item">
                        <?php if (isset($datos['menuActivo']) && $datos['menuActivo'] == 1 ): ?>
                            <a class="nav-link active" aria-current="page" href="<?php echo RUTA_URL ?>/usuarios">Marcas/Test</a>
                        <?php else: ?>
                            <a class="nav-link" aria-current="page" href="<?php echo RUTA_URL ?>/usuarios">Marcas/Test</a>
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
                                    Inscripciones
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <li><a class="dropdown-item" href="<?php echo RUTA_URL ?>/usuarios">Inscripciones grupos</a></li>
                                    <li><a class="dropdown-item" href="<?php echo RUTA_URL ?>/usuarios">Inscripciones eventos</a></li>
                                </ul>
                            </div>
                        <?php else: ?>
                            <div class="dropdown">
                                <button class="btn nav-link active dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                    Eventos
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <li><a class="dropdown-item" href="<?php echo RUTA_URL ?>/usuarios">Inscripciones grupos</a></li>
                                    <li><a class="dropdown-item" href="<?php echo RUTA_URL ?>/usuarios">Inscripciones eventos</a></li>
                                </ul>
                            </div>
                        <?php endif ?>
                    </li>

<?php endif ?>

<?php if (tienePrivilegios($datos['usuarioSesion']->idRol,[3])):?>

                    <li class="nav-item">
                        <?php if (isset($datos['menuActivo']) && $datos['menuActivo'] == 1 ): ?>
                            <a class="nav-link active" aria-current="page" href="<?php echo RUTA_URL ?>/usuarios">Perfil</a>
                        <?php else: ?>
                            <a class="nav-link" aria-current="page" href="<?php echo RUTA_URL ?>/usuarios">Perfil</a>
                        <?php endif ?>
                    </li>

                    <li class="nav-item">
                        <?php if (isset($datos['menuActivo']) && $datos['menuActivo'] == 1 ): ?>
                            <a class="nav-link active" aria-current="page" href="<?php echo RUTA_URL ?>/usuarios">Marcas/Test</a>
                        <?php else: ?>
                            <a class="nav-link" aria-current="page" href="<?php echo RUTA_URL ?>/usuarios">Marcas/Test</a>
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
                            <a class="nav-link active" aria-current="page" href="<?php echo RUTA_URL ?>/usuarios">Pagos cuotas</a>
                        <?php else: ?>
                            <a class="nav-link" aria-current="page" href="<?php echo RUTA_URL ?>/usuarios">Pagos cuotas</a>
                        <?php endif ?>
                    </li>

                    <li class="nav-item">
                        <?php if (isset($datos['menuActivo']) && $datos['menuActivo'] == 1 ): ?>
                            <a class="nav-link active" aria-current="page" href="<?php echo RUTA_URL ?>/usuarios">Inscripciones</a>
                        <?php else: ?>
                            <a class="nav-link" aria-current="page" href="<?php echo RUTA_URL ?>/usuarios">Inscripciones</a>
                        <?php endif ?>
                    </li>

<?php endif ?>

<?php if (tienePrivilegios($datos['usuarioSesion']->idRol,[4])):?>

    <li class="nav-item">
        <?php if (isset($datos['menuActivo']) && $datos['menuActivo'] == 1 ): ?>
            <a class="nav-link active" aria-current="page" href="<?php echo RUTA_URL ?>/socios">Socios</a>
        <?php else: ?>
            <a class="nav-link" aria-current="page" href="<?php echo RUTA_URL ?>/socios">Socios</a>
        <?php endif ?>
    </li>

    <li class="nav-item">
        <?php if (isset($datos['menuActivo']) && $datos['menuActivo'] == 1 ): ?>
            <a class="nav-link active" aria-current="page" href="<?php echo RUTA_URL ?>/pedidos">Pedidos</a>
        <?php else: ?>
            <a class="nav-link" aria-current="page" href="<?php echo RUTA_URL ?>/pedidos">Pedidos</a>
        <?php endif ?>
    </li>

<?php endif ?>

<?php if (tienePrivilegios($datos['usuarioSesion']->idRol,[5])):?>
    <li class="nav-item">
        <?php if (isset($datos['menuActivo']) && $datos['menuActivo'] == 1 ): ?>
            <a class="nav-link active" aria-current="page" href="<?php echo RUTA_URL ?>/socios">Inscripcion Eventos</a>
        <?php else: ?>
            <a class="nav-link active" aria-current="page" href="<?php echo RUTA_URL ?>/socios">Inscripcion Eventos</a>
        <?php endif ?>
    </li>

    <li class="nav-item">
        <?php if (isset($datos['menuActivo']) && $datos['menuActivo'] == 1 ): ?>
            <a class="nav-link active" aria-current="page" href="<?php echo RUTA_URL ?>/pedidos">Consultar Marcas</a>
        <?php else: ?>
            <a class="nav-link active" aria-current="page" href="<?php echo RUTA_URL ?>/pedidos">Consultar Marcas</a>
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
