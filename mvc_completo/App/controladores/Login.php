<?php

    class Login extends Controlador{

        public function __construct(){

            $this->loginModelo = $this->modelo('LoginModelo');

        }

        public function index ($error = ''){
            
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                //comprobamos que la contraseña introducida concuerde con el hash guardado de la bbdd

                

                $this->datos['email'] = trim($_POST['email']);
                $this->datos['clave'] = trim($_POST['clave']);

                //$claveCifrada = password_hash($this->datos['clave'], PASSWORD_BCRYPT);
                $usuarioSesion = $this->loginModelo->loginEmail($this->datos['email'], $this->datos['clave']);

                if(isset($usuarioSesion) && !empty($usuarioSesion)){  // si tiene datos el objeto devuelto entramos
                    Sesion::crearSesion($usuarioSesion);
                    $this->loginModelo->registroSesion($usuarioSesion->id_usuario); // registro el login en DDBB
                    redireccionar('/');
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
        public function logout(){
            Sesion::iniciarSesion($this->datos);        // controlamos si no esta iniciada la sesion y cogemos los datos de la sesion
            $this->loginModelo->registroFinSesion($this->datos['usuarioSesion']->id_usuario);       // registramos fecha cierre de sesion
            Sesion::cerrarSesion();
            redireccionar('/');
        }
    }
?>
