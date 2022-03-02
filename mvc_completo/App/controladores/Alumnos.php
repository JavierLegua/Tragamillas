<?php

    class Alumnos extends Controlador{
        
        public function __construct(){
            Sesion::iniciarSesion($this->datos);
            $this->datos['rolesPermitidos'] = [2];          // Definimos los roles que tendran acceso

            if (!tienePrivilegios($this->datos['usuarioSesion']->idRol,$this->datos['rolesPermitidos'])) {
                redireccionar('/');
            }

            $this->alumnoModelo = $this->modelo('Alumno');

            $this->datos['menuActivo'] = 1;         // Definimos el menu que sera destacado en la vista
            
        }
        public function index(){
            //Obtenemos los usuarios
            $alumnos = $this->alumnoModelo->obtenerAlumnos($this->datos['usuarioSesion']->id_usuario);

            $this->datos['alumno'] = $alumnos;

            $this->vista('alumnos/inicio',$this->datos);
        }
    }    
?>
