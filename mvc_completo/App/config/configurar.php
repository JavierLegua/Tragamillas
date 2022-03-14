<?php

    // Ruta de la aplicacion
    define('RUTA_APP', dirname(dirname(__FILE__)));

    // Ruta url, Ejemplo: http://localhost/daw2_mvc

    //Ruta url de localhost
    // define('RUTA_URL', 'http://localhost/Tragamillas/mvc_completo');

    //Ruta url del servidor red clase
    // define('RUTA_URL', 'http://192.168.100.154');
    // define('RUTA_URL', 'https://192.168.100.154');

    //Ruta url del servidor red externa
     define('RUTA_URL', 'http://80.28.234.191:64080');
    // define('RUTA_URL', 'https://80.28.234.191:64443');

    define('NOMBRE_SITIO', 'CRUD MVC - DAW2 Alcañiz');


    // Configuracion de la Base de Datos
    define('DB_HOST', '172.17.0.2');
    define('DB_USUARIO', 'root');
    define('DB_PASSWORD', 'alumno');
    define('DB_NOMBRE', 'tragamillas');

    //Constantes enviar email
    define('EmailEmisor', 'makelelesinformatica@gmail.com');
    define('EmailPass', 'Makeleles123');
    define('Emisor', 'Club Tragamillas');

    //Constante para las imagenes de las licencias
    define('RUTA_ImgDatos', RUTA_URL . '/public/img/datosBBDD/');

