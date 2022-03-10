<?php
    class Marcas extends Controlador{

        public function __construct(){
            Sesion::iniciarSesion($this->datos);
            $this->datos['rolesPermitidos'] = [2];          // Definimos los roles que tendran acceso

            if (!tienePrivilegios($this->datos['usuarioSesion']->idRol,$this->datos['rolesPermitidos'])) {
                redireccionar('/');
            }

            $this->datos['menuActivo'] = 1;         // Definimos el menu que sera destacado en la vista
            
            $this->marcaModelo = $this->modelo('Marca');

        }

        public function index(){
            $marcas = $this->marcaModelo->obtenerMarcas($this->datos['usuarioSesion']->id_usuario);

            $this->datos['marca'] = $marcas;

           //print_r($this->datos['grupos']);exit;

            $this->vista('marcas/inicio',$this->datos);
                
        }
    }
?>