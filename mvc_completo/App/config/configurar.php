<?php

    // Ruta de la aplicacion
    define('RUTA_APP', dirname(dirname(__FILE__)));

    // Ruta url, Ejemplo: http://localhost/daw2_mvc

    //Ruta url de localhost
     define('RUTA_URL', 'http://localhost/Tragamillas/mvc_completo');

    //Ruta url del servidor red clase
     //define('RUTA_URL', 'http://192.168.100.154');
    // define('RUTA_URL', 'https://192.168.100.154');

    //Ruta url del servidor red externa
<<<<<<< HEAD
    define('RUTA_URL', 'http://80.28.234.191:64080');
=======
<<<<<<< Updated upstream
    //define('RUTA_URL', 'http://80.28.234.191:64080');
=======
    // define('RUTA_URL', 'http://80.28.234.191:64080');
>>>>>>> Stashed changes
>>>>>>> 605357c617d9e6d5f7140f437110000250a4d46f
    // define('RUTA_URL', 'https://80.28.234.191:64443');

    define('NOMBRE_SITIO', 'CRUD MVC - DAW2 Alcañiz');


    // Configuracion de la Base de Datos
    define('DB_HOST', 'localhost');
    define('DB_USUARIO', 'root');
    define('DB_PASSWORD', 'toor');
    define('DB_NOMBRE', 'tragamillas');

    //Constantes enviar email
    define('EmailEmisor', 'makelelesinformatica@gmail.com');
    define('EmailPass', 'Makeleles123');
    define('Emisor', 'Club Tragamillas');

    //Constante para las imagenes de las licencias
    define('RUTA_ImgDatos', RUTA_URL . '/public/img/datosBBDD/');

