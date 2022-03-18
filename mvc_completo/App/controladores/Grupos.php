<?php
    class Grupos extends Controlador{

        public function __construct(){
            Sesion::iniciarSesion($this->datos);
            $this->datos['rolesPermitidos'] = [1,2];          // Definimos los roles que tendran acceso

            if (!tienePrivilegios($this->datos['usuarioSesion']->idRol,$this->datos['rolesPermitidos'])) {
                redireccionar('/');
            }

            $this->grupoModelo = $this->modelo('Grupo');

            $this->datos['menuActivo'] = 1;         // Definimos el menu que sera destacado en la vista
            
        }

        public function index(){
            //Obtenemos los grupos
            if ($this->datos['usuarioSesion']->idRol == 2) {
                $grupos = $this->grupoModelo->obtenerGruposEntrenador($this->datos['usuarioSesion']->id_usuario);
            } elseif ($this->datos['usuarioSesion']->idRol == 1) {
                $grupos = $this->grupoModelo->obtenerGruposAdmin();
            }
            
            $this->datos['grupo'] = $grupos;
            
            $this->vista('grupos/inicio',$this->datos);
 
        }

        public function verGrupos($id){
            //Obtenemos los grupos
            $this->datos['rolesPermitidos'] = [1,2];

            $grupos = $this->grupoModelo->obtenerAlumnosGrupo($id);

            $this->datos['grupo'] = $grupos;
            
            $this->datos['idGrupo'] = $id;

            $this->vista('grupos/alumnos',$this->datos);
 
        }

        public function cerrarGrupos($idGrupo){
            $this->datos['rolesPermitidos'] = [1,2];          // Definimos los roles que tendran acceso

            if (!tienePrivilegios($this->datos['usuarioSesion']->idRol,$this->datos['rolesPermitidos'])) {
                redireccionar('/grupos/inicio');
            }
            // print_r($this->datos);exit();
            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                
                $grupoCerrado = [
                    'abierto' => 0,                    
                ];
                if ($this->grupoModelo->cerrarGrupos($idGrupo, $grupoCerrado)){
                    redireccionar('/grupos/inicio');
                } else {
                    die('Algo ha fallado!!!');
                }
            } else {
                $this->datos['grupo'] = (object) [
                    'abierto' => 1, 
                ];
                $this->datos['grupo'] = $this->grupoModelo->cerrarGrupos($idGrupo, $this->datos['grupo']);

                $this->vista('/entrenadores/inicio',$this->datos);
            }

        }

        public function abrirGrupos($idGrupo){
            $this->datos['rolesPermitidos'] = [1,2];          // Definimos los roles que tendran acceso

            if (!tienePrivilegios($this->datos['usuarioSesion']->idRol,$this->datos['rolesPermitidos'])) {
                redireccionar('/grupos/inicio');
            }
            // print_r($this->datos);exit();
            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                
                $grupoAbierto = [
                    'abierto' => 1,                    
                ];
                if ($this->grupoModelo->abrirGrupos($idGrupo, $grupoAbierto)){
                    redireccionar('/grupos/inicio');
                } else {
                    die('Algo ha fallado!!!');
                }
            } else {
                $this->datos['grupo'] = (object) [
                    'abierto' => 0, 
                ];
                $this->datos['grupo'] = $this->grupoModelo->abrirGrupos($idGrupo, $this->datos['grupo']);

                $this->vista('/entrenadores/inicio',$this->datos);
            }

        }
        
    }
?>