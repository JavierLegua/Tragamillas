<?php
    class InscripcionesEventos extends Controlador{

        public function __construct(){
            Sesion::iniciarSesion($this->datos);
            $this->datos['rolesPermitidos'] = [1,2,3];          // Definimos los roles que tendran acceso

            if (!tienePrivilegios($this->datos['usuarioSesion']->idRol,$this->datos['rolesPermitidos'])) {
                redireccionar('/');
            }

            $this->inscripcionEventoModelo = $this->modelo('InscripcionEvento');

            $this->datos['menuActivo'] = 1;         // Definimos el menu que sera destacado en la vista
            
        }

        public function index(){
            //Obtenemos los grupos
            if ($this->datos['usuarioSesion']->idRol == 3) {
                
                $inscripcionesEvento = $this->inscripcionEventoModelo->obtenerTodosEventos();

                $fecha_actual = getdate();
                $fecha_actual = date("Y-m-d");
                $cont = 0;
                foreach ($inscripcionesEvento as $evt) {
                
                    if ($evt->fecha_ini_even > $fecha_actual) {
                        $ins_evt[$cont] = $evt;
                    }
                    $cont++;
                }
                $this->datos['inscripcionEvento'] = $ins_evt;
                //$this->datos['inscripcionEvento'] = $inscripcionesEvento;
                
                $this->vista('inscripciones/eventos',$this->datos);

            } elseif ($this->datos['usuarioSesion']->idRol == 2) {
                
                // $inscripcionesEvento = $this->inscripcionEventoModelo->obtenerTodasInscripciones();
                $inscripcionesEvento = $this->inscripcionEventoModelo->obtenerInscripciones($this->datos['usuarioSesion']->id_usuario);
             
                $this->datos['inscripcionEvento'] = $inscripcionesEvento;
                
                $this->vista('inscripciones/socioEvento',$this->datos);

            }

        }
        
        public function agregarInscripcion($id){
            $this->datos['rolesPermitidos'] = [3];          // Definimos los roles que tendran acceso

            if (!tienePrivilegios($this->datos['usuarioSesion']->idRol,$this->datos['rolesPermitidos'])) {
                redireccionar('/inscripcionesEvento');
            }
            // print_r($this->datos);exit();
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                $inscripcionNueva = [
                    'idUsuario' => $this->datos['usuarioSesion']->id_usuario,
                    'idEvento' => $id,                     
                ];
                if ($this->inscripcionEventoModelo->agregarInscripcion($inscripcionNueva)){
                    //$this->vista('inscripciones/inicio',$this->datos);
                    redireccionar('/inscripciones');
                } else {
                    die('Algo ha fallado!!!');
                }
            } else {
                $this->datos['inscripcion'] = (object) [
                    'idUsuario' => '',
                    'idEvento' => '',
                ];
                $this->vista('inscripciones/inicio',$this->datos);
            }

        }

        public function aceptarEvento($id, $idUsuario){
            $this->datos['rolesPermitidos'] = [2];          // Definimos los roles que tendran acceso

            if (!tienePrivilegios($this->datos['usuarioSesion']->idRol,$this->datos['rolesPermitidos'])) {
                redireccionar('/inscripcionesEvento');
            }
            // print_r($this->datos);exit();
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $inscripcion = [
                    'idUsuario' => $idUsuario,
                    'idEvento' => $id,
                    'aceptado' => 1,                      
                ];
                if ($this->inscripcionEventoModelo->aceptarEvento($inscripcion)){
                    //$this->vista('inscripciones/inicio',$this->datos);
                    redireccionar('/inscripcionesEventos');
                } else {
                    die('Algo ha fallado!!!');
                }
            } else {
                $this->datos['inscripcion'] = (object) [
                    'idUsuario' => '',
                    'idEvento' => '',
                ];
                $this->vista('inscripciones/inicio',$this->datos);
            }

        }

        public function cancelarEvento($id, $idUsuario){
            $this->datos['rolesPermitidos'] = [2];          // Definimos los roles que tendran acceso

            if (!tienePrivilegios($this->datos['usuarioSesion']->idRol,$this->datos['rolesPermitidos'])) {
                redireccionar('/inscripcionesEvento');
            }
            // print_r($this->datos);exit();
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $inscripcion = [
                    'idUsuario' => $idUsuario,
                    'idEvento' => $id,
                    'aceptado' => 0,                      
                ];
                if ($this->inscripcionEventoModelo->aceptarEvento($inscripcion)){
                    //$this->vista('inscripciones/inicio',$this->datos);
                    redireccionar('/inscripcionesEventos');
                } else {
                    die('Algo ha fallado!!!');
                }
            } else {
                $this->datos['inscripcion'] = (object) [
                    'idUsuario' => '',
                    'idEvento' => '',
                ];
                $this->vista('inscripciones/inicio',$this->datos);
            }

        }

    }
?>