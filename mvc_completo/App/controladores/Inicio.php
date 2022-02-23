<?php

    class Inicio extends Controlador{

        public function __construct(){

            $this->loginModelo = $this->modelo('LoginModelo');
            $this->usuarioModelo = $this->modelo('Usuario');

        }

        public function index ($error = ''){
            
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                $this->datos['email'] = trim($_POST['email']);
                $this->datos['clave'] = trim($_POST['clave']);

                $usuarioSesion = $this->loginModelo->loginEmail($this->datos['email']);

                if(isset($usuarioSesion)) {
                    $accesoPermitido = password_verify($this->datos['clave'], $usuarioSesion->clave)
                    ;       //comprobamos que la contraseña introducida concuerde con el hash guardado de la bbdd
                    // print_r($this->datos['clave']); echo "<br>";
                    // print_r($usuarioSesion->clave);
                    // exit();
                    if($accesoPermitido){
                        Sesion::crearSesion($usuarioSesion);
                        $this->loginModelo->registroSesion($usuarioSesion->id_usuario); // registro el login en DDBB
                        redireccionar('/'); 
                    } else {
                        echo "fallo";
                    }
                } else {
                    redireccionar('/login/index/error_1');
                }
            }else{
                if (Sesion::sesionCreada($this->datos)){     // dependiendo del rol que tiene el usuario el cual ha iniciado sesion se le redirige a una pagina u otra
                    if ($this->datos['usuarioSesion']->idRol == 1) {
                        redireccionar('/admin');
                    } elseif ($this->datos['usuarioSesion']->idRol == 2){
                        redireccionar('/entrenador');
                    } elseif ($this->datos['usuarioSesion']->idRol == 3){
                        redireccionar('/socio');
                    } elseif ($this->datos['usuarioSesion']->idRol == 4){
                        redireccionar('/tienda');
                    }    
                } else{
                    $this->datos['error'] = $error;
                    $this->vista('login', $this->datos);
                }
            }
               
        }

        public function recuperarPass(){

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                //funcion para generar contraseña aleatoria

                $cadena = "abcdefghijklmnopqrstxwyz0123456789";
                $longitudCadena=strlen($cadena);    
                $pass = "";
                $longitudPass=6;    

                    for($i=1 ; $i<=$longitudPass ; $i++){
                        $pos=rand(0,$longitudCadena-1);     
                        $pass .= substr($cadena,$pos,1);
                    }

                $passCifrada = password_hash($pass, PASSWORD_BCRYPT);

                $to = $_POST['emailRec'];
                //$email = "javierlegua14@gmail.com";
                //$to = "javierlegua14@gmail.com";
                $nombreTo = "Socio";
                $asunto = "Recuperación contraseña";
                $cuerpo = "Su contraseña temporal es: $pass";

                EnviarEmail::sendEmail($to,$nombreTo,$asunto,$cuerpo);

                $this->usuarioModelo->recuperarPass($to, $passCifrada);

                //echo json_encode($email);
            }else{
                redireccionar('/');
            }
        }

    }
