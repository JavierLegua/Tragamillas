<?php
    class MarcasExt extends Controlador{

        public function __construct(){
            Sesion::iniciarSesionAnonimo($this->datos);
            //print_r($this->datos);exit;
            $this->datos['rolesPermitidos'] = [5];          // Definimos los roles que tendran acceso

            if (!tienePrivilegios($this->datos['usuarioSesion']->idRol,$this->datos['rolesPermitidos'])) {
                redireccionar('/');
            }

            $this->MarcaExtModelo = $this->modelo('MarcaExt');

            $this->datos['menuActivo'] = 1;         // Definimos el menu que sera destacado en la vista
            
        }

        public function index(){
            //Obtenemos los grupos

            $eventoExt = $this->MarcaExtModelo->obtenerTodosEventos();

            $this->datos['evento'] = $eventoExt;
            //print_r($this->datos);exit;
            $this->vista('invitados/verMarcas',$this->datos);

        }

        public function verMarcas($id){
            //Obtenemos los grupos

            $marcasExt = $this->MarcaExtModelo->obtenerMarcasExt($id);
            
            $marcas = $this->MarcaExtModelo->obtenerMarcas($id);
            //print_r($marcas);exit;
            $this->datos['marcaExt'] = $marcasExt;

            $this->datos['marca'] = $marcas; 
            
            $this->vista('invitados/verMarcasEvento',$this->datos);

        }

    }
?>    
