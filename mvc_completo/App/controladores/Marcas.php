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

            $grupos = $this->marcaModelo->obtenerGruposEntrenador($this->datos['usuarioSesion']->id_usuario);
            
            $this->datos['grupos'] = $grupos;

            for ($i=0; $i < count($this->datos['grupos']); $i++) { 
                $this->datos['grupos'][$i] = $this->marcaModelo->obtenerAlumnosGrupo($this->datos['grupos'][$i]->idGrupo);
            }

            $marcas = $this->marcaModelo->obtenerMarcas();

            $this->datos['marca'] = $marcas;

            print_r($this->datos['grupos'][0]);exit;

            $this->vista('marcas/inicio',$this->datos);
                
        }
    }
?>