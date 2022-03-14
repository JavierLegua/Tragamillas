<?php
    class Invitados extends Controlador{

        public function __construct(){
            Sesion::iniciarSesionAnonimo($this->datos);
            
            $this->datos['rolesPermitidos'] = [5];          // Definimos los roles que tendran acceso
            //print_r($this->datos);exit;
            if (!tienePrivilegios($this->datos['usuarioSesion']->idRol,$this->datos['rolesPermitidos'])) {
                redireccionar('/');
            }

            $this->datos['menuActivo'] = 1;         // Definimos el menu que sera destacado en la vista
            
        }

        public function index(){
    
            $this->vista('invitados/inicio', $this->datos);
                
        }
    }
?>