<?php
    class Inscripciones_grupos extends Controlador{

        public function __construct(){
            Sesion::iniciarSesion($this->datos);
            $this->datos['rolesPermitidos'] = [2];          // Definimos los roles que tendran acceso

            if (!tienePrivilegios($this->datos['usuarioSesion']->idRol,$this->datos['rolesPermitidos'])) {
                redireccionar('/');
            }

            $this->inscripcionModelo = $this->modelo('Inscripcion');

            $this->datos['menuActivo'] = 1;         // Definimos el menu que sera destacado en la vista
            
        }

        public function index(){
            
            $inscripciones = $this->inscripcionModelo->obtenerInscripciones($this->datos['usuarioSesion']->id_usuario);

            $this->datos['inscripcion'] = $inscripciones;
            
            $this->vista('inscripciones/aceptarSocios',$this->datos);

            
        }
        
        public function confirmarInscripcion($id, $idGrupo){
            $this->datos['rolesPermitidos'] = [2];          // Definimos los roles que tendran acceso

            if (!tienePrivilegios($this->datos['usuarioSesion']->idRol,$this->datos['rolesPermitidos'])) {
                redireccionar('/inscripciones_grupos');
            }
            // print_r($this->datos);exit();
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                
                $inscripcionConfirmada = [
                    'aceptado' => 1,                    
                ];
                if ($this->inscripcionModelo->confirmarInscripcion($id, $idGrupo, $inscripcionConfirmada)){
                    redireccionar('/inscripciones_grupos');
                } else {
                    die('Algo ha fallado!!!');
                }
            } else {
                $this->datos['inscripcion'] = (object) [
                    'aceptado' => 1, 
                ];
                $this->datos['inscripcion'] = $this->inscripcionModelo->obtenerInscripciones();

                $this->vista('inscripciones/aceptarSocios',$this->datos);
            }

        }

        public function cancelarInscripcion($id, $idGrupo){
            $this->datos['rolesPermitidos'] = [2];          // Definimos los roles que tendran acceso

            if (!tienePrivilegios($this->datos['usuarioSesion']->idRol,$this->datos['rolesPermitidos'])) {
                redireccionar('/inscripciones_grupos');
            }
            // print_r($this->datos);exit();
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                
                $inscripcionCancelada = [
                    'aceptado' => 0,                    
                ];
                if ($this->inscripcionModelo->cancelarInscripcion($id, $idGrupo, $inscripcionCancelada)){
                    redireccionar('/inscripciones_grupos');
                } else {
                    die('Algo ha fallado!!!');
                }
            } else {
                $this->datos['inscripcion'] = (object) [
                    'aceptado' => 0, 
                ];
                $this->datos['inscripcion'] = $this->inscripcionModelo->obtenerInscripciones();

                $this->vista('inscripciones/aceptarSocios',$this->datos);
            }

        }
    }
?>