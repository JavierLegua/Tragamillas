<?php
    class Marcas extends Controlador{

        public function __construct(){
            Sesion::iniciarSesion($this->datos);
            $this->datos['rolesPermitidos'] = [2,3];          // Definimos los roles que tendran acceso

            if (!tienePrivilegios($this->datos['usuarioSesion']->idRol,$this->datos['rolesPermitidos'])) {
                redireccionar('/');
            }

            $this->datos['menuActivo'] = 1;         // Definimos el menu que sera destacado en la vista
            
            $this->marcaModelo = $this->modelo('Marca');

        }

        public function index(){
            
            if ($this->datos['usuarioSesion']->idRol == 2) {
                
                $marcas = $this->marcaModelo->obtenerMarcas($this->datos['usuarioSesion']->id_usuario);
                
                $this->datos['marca'] = $marcas;

                $this->vista('marcas/inicio',$this->datos);

            } elseif ($this->datos['usuarioSesion']->idRol == 3) {
                
                $marcas = $this->marcaModelo->obtenerMarcasSocio($this->datos['usuarioSesion']->id_usuario);
                
                $this->datos['marca'] = $marcas;
    
                $this->vista('marcas/socio',$this->datos);

            }
            
                
        }
    }
?>