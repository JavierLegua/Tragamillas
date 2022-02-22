<?php

    // Ruta de la aplicacion
    define('RUTA_APP', dirname(dirname(__FILE__)));

    // Ruta url, Ejemplo: http://localhost/daw2_mvc
    define('RUTA_URL', 'http://localhost/Tragamillas/mvc_completo');

    define('NOMBRE_SITIO', 'CRUD MVC - DAW2 Alcañiz');


    // Configuracion de la Base de Datos
    define('DB_HOST', 'localhost');
    define('DB_USUARIO', 'root');
    define('DB_PASSWORD', 'toor');
    define('DB_NOMBRE', 'tragamillas');


    // Mostrar errores PHP (Desactivar en producción)
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    // Incluir la libreria PHPMailer
    // use PHPMailer\PHPMailer\PHPMailer;
    // use PHPMailer\PHPMailer\Exception;
    // use PHPMailer\PHPMailer\SMTP;

    // require 'librerias/PHPMailer/src/Exception.php';
    // require 'librerias/PHPMailer/src/PHPMailer.php';
    // require 'librerias/PHPMailer/src/SMTP.php';

    // Inicio
    $mail = new PHPMailer(true);

    try {
        // Configuracion SMTP
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                         // Mostrar salida (Desactivar en producción)
        $mail->isSMTP();                                               // Activar envio SMTP
        $mail->Host  = 'CONFIGURAR_SERVIDOR_SMTP';                     // Servidor SMTP
        $mail->SMTPAuth  = true;                                       // Identificacion SMTP
        $mail->Username  = 'CONFIGURAR_USUARIO_SMTP';                  // Usuario SMTP
        $mail->Password  = 'CONFIGURAR_CONTRASEÑA_SMTP';	          // Contraseña SMTP
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port  = 587;
        $mail->setFrom('hola@prueba.com', 'Tu nombre');                // Remitente del correo

        // Destinatarios
        $mail->addAddress('prueba@midominio.com', 'Nombre del destinario');  // Email y nombre del destinatario

        // Contenido del correo
        $mail->isHTML(true);
        $mail->Subject = 'Asunto del correo';
        $mail->Body  = 'Contenido del correo <b>en HTML!</b>';
        $mail->AltBody = 'Contenido del correo en texto plano para los clientes de correo que no soporten HTML';
        $mail->send();
        echo 'El mensaje se ha enviado';
    } catch (Exception $e) {
        echo "El mensaje no se ha enviado. Mailer Error: {$mail->ErrorInfo}";
    }
